<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Logger;
use App\Views\AdminTemplate;
use App\Support\Session;
use App\Support\Response;
use App\Support\Request;

class AdminController
{
    private User $userModel;
    private Product $productModel;
    
    public function __construct()
    {
        $this->userModel = new User();
        $this->productModel = new Product();
        Session::ensure();
    }
    
    /**
     * Проверить, является ли текущий пользователь админом
     */
    private function checkAdmin(): bool
    {
        if (!Session::has('user_id')) {
            return false;
        }
        
        // Сначала проверяем сессию
        if (Session::get('is_admin') === true) {
            return true;
        }
        
        // Если нет в сессии - проверяем через модель
        return $this->userModel->isAdmin((int)Session::get('user_id'), (string)Session::get('user_email', ''));
    }
    
    /**
     * Требовать доступ админа (для web-страниц)
     */
    private function requireAdminWeb(): void
    {
        if (!$this->checkAdmin()) {
            header('Location: /login');
            exit;
        }
    }
    
    /**
     * Требовать доступ админа (для API) — возвращает Response::forbidden() или null
     */
    private function requireAdminApi(): ?string
    {
        if (!$this->checkAdmin()) {
            return Response::forbidden();
        }
        return null;
    }
    
    /**
     * Главная страница админки
     */
    public function index(): void
    {
        $this->requireAdminWeb();
        $stats = $this->getStats();
        echo AdminTemplate::renderDashboard($stats);
    }
    
    /**
     * Страница заказов
     */
    public function orders(): void
    {
        $this->requireAdminWeb();
        $orders = $this->getOrders();
        echo AdminTemplate::renderOrders($orders);
    }
    
    /**
     * Страница пользователей
     */
    public function users(): void
    {
        $this->requireAdminWeb();
        $users = $this->userModel->loadData();
        echo AdminTemplate::renderUsers($users);
    }
    
    /**
     * Получить статистику
     */
    private function getStats(): array
    {
        $users = $this->userModel->loadData();
        $products = $this->productModel->loadData() ?? [];
        $orders = $this->getOrders();
        
        $totalRevenue = 0;
        foreach ($orders as $order) {
            $totalRevenue += $order['total'] ?? 0;
        }
        
        return [
            'total_users' => count($users),
            'total_products' => count($products),
            'total_orders' => count($orders),
            'total_revenue' => $totalRevenue
        ];
    }
    
    /**
     * Получить все заказы (через единую модель Order)
     */
    private function getOrders(): array
    {
        $orderModel = new Order();
        return $orderModel->getAll();
    }
    
    /**
     * API: получить статистику
     */
    public function apiStats(): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        return Response::json($this->getStats());
    }
    
    /**
     * API: получить заказы
     */
    public function apiOrders(): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        return Response::json($this->getOrders());
    }
    
    /**
     * API: получить пользователей
     */
    public function apiUsers(): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        
        $users = $this->userModel->loadData();
        
        // Удаляем пароли из данных
        foreach ($users as &$user) {
            unset($user['password']);
        }
        
        return Response::json($users);
    }
    
    /**
     * Страница логов ошибок
     */
    public function logs(): void
    {
        $this->requireAdminWeb();
        $logs = Logger::getErrors(100);
        echo AdminTemplate::renderLogs($logs);
    }
    
    /**
     * API: получить логи ошибок
     */
    public function apiLogs(): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        
        $limit = Request::query('limit', 100);
        $limit = is_int($limit) ? $limit : intval($limit);
        $logs = Logger::getErrors($limit);
        
        return Response::json($logs);
    }
    
    /**
     * API: очистить логи ошибок
     */
    public function apiClearLogs(): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        
        Logger::clear();
        
        return Response::json(['success' => true, 'message' => 'Логи успешно очищены']);
    }
    
    /**
     * Страница управления каталогом
     */
    public function catalog(): void
    {
        $this->requireAdminWeb();
        $products = $this->productModel->loadData() ?? [];
        $categories = $this->productModel->getCategories();
        
        echo AdminTemplate::renderCatalog($products, $categories);
    }
    
    /**
     * API: получить все товары и категории
     */
    public function apiProducts(): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        
        $products = $this->productModel->loadData() ?? [];
        $categories = $this->productModel->getCategories();
        
        return Response::json([
            'products' => array_values($products),
            'categories' => $categories
        ]);
    }
    
    /**
     * API: создать товар
     */
    public function apiCreateProduct(): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        
        $input = Request::json() ?? [];
        
        $name = trim($input['name'] ?? '');
        $description = trim($input['description'] ?? '');
        $price = floatval($input['price'] ?? 0);
        $category = trim($input['category'] ?? 'Без категории');
        $image = trim($input['image'] ?? '/assets/img/no-image.jpg');
        
        if (empty($name) || $price <= 0 || empty($category)) {
            return Response::error('Заполните название, цену и категорию');
        }
        
        $id = $this->productModel->create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'category' => $category,
            'image' => $image
        ]);
        
        if ($id) {
            return Response::json([
                'success' => true,
                'message' => 'Товар успешно добавлен',
                'id' => $id
            ]);
        }
        
        return Response::serverError('Не удалось создать товар');
    }
    
    /**
     * API: обновить товар
     */
    public function apiUpdateProduct(int $id): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        
        $input = Request::json() ?? [];
        
        $name = trim($input['name'] ?? '');
        $description = trim($input['description'] ?? '');
        $price = floatval($input['price'] ?? 0);
        $category = trim($input['category'] ?? 'Без категории');
        $image = trim($input['image'] ?? '/assets/img/no-image.jpg');
        
        if (empty($name) || $price <= 0 || empty($category)) {
            return Response::error('Заполните название, цену и категорию');
        }
        
        $result = $this->productModel->update($id, [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'category' => $category,
            'image' => $image
        ]);
        
        if ($result) {
            return Response::json(['success' => true, 'message' => 'Товар успешно обновлён']);
        }
        
        return Response::serverError('Не удалось обновить товар');
    }
    
    /**
     * API: удалить товар
     */
    public function apiDeleteProduct(int $id): string
    {
        if ($forbidden = $this->requireAdminApi()) return $forbidden;
        
        $result = $this->productModel->delete($id);
        
        if ($result) {
            return Response::json(['success' => true, 'message' => 'Товар успешно удалён']);
        }
        
        return Response::serverError('Не удалось удалить товар');
    }
}
