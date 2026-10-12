<?php
namespace App\Views;

class AdminTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/admin.json';

    /**
     * Дашборд админки
     */
    public static function renderDashboard(array $stats): string
    {
        return Twig::renderPage('admin', ['stats' => $stats], self::TEXTS_PATH);
    }

    /**
     * Страница заказов с вкладками
     */
    public static function renderOrders(array $orders): string
    {
        return Twig::renderPage('admin_orders', [
            'orders' => $orders,
            'ordersJson' => json_encode($orders, JSON_UNESCAPED_UNICODE),
        ], self::TEXTS_PATH);
    }

    /**
     * Список пользователей
     */
    public static function renderUsers(array $users): string
    {
        return Twig::renderPage('admin_users', [
            'users' => $users,
        ], self::TEXTS_PATH);
    }

    /**
     * Страница логов ошибок
     */
    public static function renderLogs(array $logs): string
    {
        return Twig::renderPage('admin_logs', ['logs' => $logs], self::TEXTS_PATH);
    }

    /**
     * Страница управления каталогом
     */
    public static function renderCatalog(array $products, array $categories): string
    {
        return Twig::renderPage('admin_catalog', [
            'products' => $products,
            'categories' => $categories,
            'productsJson' => json_encode($products, JSON_UNESCAPED_UNICODE),
            'categoriesJson' => json_encode($categories, JSON_UNESCAPED_UNICODE),
        ], self::TEXTS_PATH);
    }
}
