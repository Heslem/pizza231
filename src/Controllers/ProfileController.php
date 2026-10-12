<?php
namespace App\Controllers;

use App\Models\User;
use App\Views\ProfileTemplate;
use App\Support\Session;
use App\Support\Response;
use App\Support\Request;

class ProfileController
{
    private User $userModel;
    
    public function __construct()
    {
        $this->userModel = new User();
        Session::ensure();
    }
    
    /**
     * Проверить авторизацию
     */
    private function requireAuth(): array
    {
        if (!Session::has('user_id')) {
            header('Location: /login');
            exit;
        }
        
        return [
            'id' => Session::get('user_id'),
            'name' => Session::get('user_name'),
            'email' => Session::get('user_email')
        ];
    }
    
    /**
     * Страница профиля
     */
    public function get(): void
    {
        $user = $this->requireAuth();
        
        // Получить полный профиль
        $profile = $this->userModel->getFullProfile($user['id']);
        
        if (!$profile) {
            echo "Ошибка загрузки профиля";
            return;
        }
        
        // Получить историю заказов
        $orders = $this->userModel->getOrders($user['id']);
        
        echo ProfileTemplate::renderProfile($profile, $orders);
    }
    
    /**
     * API: обновить профиль
     */
    public function apiUpdate(): string
    {
        $user = $this->requireAuth();
        
        $input = Request::json() ?? [];
        
        // Валидация имени
        if (isset($input['name']) && empty(trim($input['name']))) {
            return Response::error('Имя не может быть пустым');
        }
        
        // Обновляем профиль
        $result = $this->userModel->updateProfile($user['id'], $input);
        
        if ($result) {
            // Обновить сессию если изменилось имя
            if (isset($input['name'])) {
                Session::set('user_name', trim($input['name']));
            }
            
            // Получить обновлённый профиль
            $profile = $this->userModel->getFullProfile($user['id']);
            
            return Response::success(json_encode(['profile' => $profile]));
        }
        
        return Response::serverError('Ошибка сохранения профиля');
    }
    
    /**
     * API: загрузить аватар
     */
    public function apiUploadAvatar(): string
    {
        $user = $this->requireAuth();
        
        if (!isset($_FILES['avatar'])) {
            return Response::error('Файл не загружен');
        }
        
        $file = $_FILES['avatar'];
        
        // Проверка на ошибки
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return Response::error('Ошибка загрузки файла');
        }
        
        // Проверка типа файла
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mimeType, $allowedTypes)) {
            return Response::error('Разрешены только изображения (JPEG, PNG, GIF, WebP)');
        }
        
        // Проверка размера (макс. 2MB)
        if ($file['size'] > 2 * 1024 * 1024) {
            return Response::error('Максимальный размер файла - 2MB');
        }
        
        // Создать папку для аватарок
        $uploadDir = __DIR__ . '/../../storage/avatars/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Генерировать уникальное имя файла
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFilename = 'avatar_' . $user['id'] . '_' . time() . '.' . $extension;
        $uploadPath = $uploadDir . $newFilename;
        
        // Удалить старый аватар
        $profile = $this->userModel->getFullProfile($user['id']);
        if (!empty($profile['avatar'])) {
            $oldFile = $uploadDir . basename($profile['avatar']);
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
        
        // Переместить файл
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            // Сохранить путь к аватару в профиле
            $avatarPath = '/storage/avatars/' . $newFilename;
            $this->userModel->updateProfile($user['id'], ['avatar' => $avatarPath]);
            
            return Response::success(json_encode(['avatar' => $avatarPath]));
        }
        
        return Response::serverError('Не удалось сохранить файл');
    }
    
    /**
     * API: получить профиль
     */
    public function apiGet(): string
    {
        $user = $this->requireAuth();
        
        $profile = $this->userModel->getFullProfile($user['id']);
        
        return Response::json(['profile' => $profile]);
    }
}
