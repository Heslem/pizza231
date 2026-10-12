<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\EmailSender;
use App\Views\AuthTemplate;
use App\Support\Session;
use App\Support\Response;
use App\Support\Request;

class AuthController
{
    private User $userModel;
    
    public function __construct()
    {
        $this->userModel = new User();
        Session::ensure();
    }
    
    /**
     * Страница регистрации
     */
    public function register(): void
    {
        $error = '';
        $success = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $passwordConfirm = $_POST['password_confirm'] ?? '';
            $name = trim($_POST['name'] ?? '');
            
            // Валидация
            if (empty($email) || empty($password) || empty($name)) {
                $error = 'Заполните все поля';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Введите корректный email';
            } elseif (strlen($password) < 6) {
                $error = 'Пароль должен быть не менее 6 символов';
            } elseif ($password !== $passwordConfirm) {
                $error = 'Пароли не совпадают';
            } else {
                $result = $this->userModel->create($email, $password, $name);
                
                if ($result) {
                    // Отправляем код подтверждения
                    EmailSender::sendVerificationCode(
                        $result['email'],
                        $result['verification_code'],
                        $result['name']
                    );
                    
                    // Сразу входим в аккаунт
                    Session::set('user_id', $result['id']);
                    Session::set('user_name', $result['name']);
                    Session::set('user_email', $result['email']);
                    Session::set('is_admin', false);
                    Session::set('is_verified', false); // Ещё не подтверждён
                    Session::set('pending_verification_email', $email);
                    
                    Session::writeClose();
                    
                    // Перенаправляем на страницу подтверждения
                    header('Location: /verify');
                    exit;
                } else {
                    $error = 'Пользователь с таким email уже существует и подтверждён';
                }
            }
        }
        
        echo AuthTemplate::renderRegister($error, $success);
    }
    
    /**
     * Страница подтверждения email
     */
    public function verify(): void
    {
        $error = '';
        $success = '';
        $email = Session::get('pending_verification_email', '');
        
        // Если нет email в сессии, редирект на регистрацию
        if (empty($email)) {
            header('Location: /register');
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $code = trim($_POST['code'] ?? '');
            
            if (empty($code)) {
                $error = 'Введите код подтверждения';
            } elseif (strlen($code) !== 6 || !ctype_digit($code)) {
                $error = 'Код должен состоять из 6 цифр';
            } else {
                // Проверяем код
                if ($this->userModel->verifyEmail($email, $code)) {
                    $success = 'Email подтверждён!';
                    Session::set('is_verified', true);
                    Session::forget('pending_verification_email');
                    
                    // Редирект на главную через 2 секунды
                    header('Refresh: 2; URL=/');
                } else {
                    $error = 'Неверный или истёкший код подтверждения';
                }
            }
        }
        
        echo AuthTemplate::renderVerify($email, $error, $success);
    }
    
    /**
     * Повторная отправка кода подтверждения
     */
    public function resendCode(): string
    {
        $email = Session::get('pending_verification_email', '');
        
        if (empty($email)) {
            return Response::error('Сессия истекла. Зарегистрируйтесь снова.');
        }
        
        $code = $this->userModel->regenerateVerificationCode($email);
        
        if ($code === null) {
            return Response::error('Email уже подтверждён');
        }
        
        $user = $this->userModel->findByEmail($email);
        
        if ($user && EmailSender::sendVerificationCode($email, $code, $user['name'])) {
            return Response::json(['success' => true, 'message' => 'Код отправлен повторно']);
        }
        
        return Response::serverError('Ошибка отправки письма');
    }
    
    /**
     * Страница входа
     */
    public function login(): void
    {
        $error = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            
            if (empty($email) || empty($password)) {
                $error = 'Заполните все поля';
            } else {
                $user = $this->userModel->verifyPassword($email, $password);
                
                if ($user) {
                    // Проверяем, подтверждён ли email
                    $isVerified = $this->userModel->isVerified($email);
                    
                    // Установка сессии
                    Session::set('user_id', $user['id']);
                    Session::set('user_name', $user['name']);
                    Session::set('user_email', $user['email']);
                    Session::set('is_admin', $user['is_admin'] ?? false);
                    Session::set('is_verified', $isVerified);
                    
                    // Если email не подтверждён - перенаправляем на подтверждение
                    if (!$isVerified) {
                        Session::set('pending_verification_email', $email);
                        Session::writeClose();
                        header('Location: /verify');
                        exit;
                    }
                    
                    // Записать сессию
                    Session::writeClose();
                    
                    // Перенаправление
                    header('Location: /');
                    exit;
                } else {
                    $error = 'Неверный email или пароль';
                }
            }
        }
        
        echo AuthTemplate::renderLogin($error);
    }
    
    /**
     * Выход
     */
    public function logout(): void
    {
        Session::destroy();
        header('Location: /');
        exit;
    }
    
    /**
     * Получить текущего пользователя
     */
    public static function getCurrentUser(): ?array
    {
        Session::ensure();
        
        if (Session::has('user_id')) {
            $isAdmin = Session::get('is_admin', false);
            $isVerified = Session::get('is_verified', false);
            
            return [
                'id' => Session::get('user_id'),
                'name' => Session::get('user_name'),
                'email' => Session::get('user_email'),
                'is_admin' => $isAdmin,
                'is_verified' => $isVerified
            ];
        }
        
        return null;
    }
    
    /**
     * API: регистрация
     */
    public function apiRegister(): string
    {
        $input = Request::json() ?? [];
        $email = trim($input['email'] ?? '');
        $password = $input['password'] ?? '';
        $name = trim($input['name'] ?? '');
        
        if (empty($email) || empty($password) || empty($name)) {
            return Response::error('Заполните все поля');
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return Response::error('Введите корректный email');
        }
        
        if (strlen($password) < 6) {
            return Response::error('Пароль должен быть не менее 6 символов');
        }
        
        $result = $this->userModel->create($email, $password, $name);
        
        if ($result) {
            // Отправляем код подтверждения
            EmailSender::sendVerificationCode(
                $result['email'],
                $result['verification_code'],
                $result['name']
            );
            
            // Сразу входим в аккаунт
            Session::set('user_id', $result['id']);
            Session::set('user_name', $result['name']);
            Session::set('user_email', $result['email']);
            Session::set('is_admin', false);
            Session::set('is_verified', false);
            Session::set('pending_verification_email', $email);
            
            Session::writeClose();
            
            return Response::json([
                'success' => true, 
                'message' => 'На ваш email отправлен код подтверждения',
                'user' => [
                    'id' => $result['id'],
                    'name' => $result['name'],
                    'email' => $result['email'],
                    'is_verified' => false
                ],
                'needs_verification' => true
            ]);
        }
        
        return Response::error('Пользователь с таким email уже существует и подтверждён');
    }
    
    /**
     * API: вход
     */
    public function apiLogin(): string
    {
        $input = Request::json() ?? [];
        $email = trim($input['email'] ?? '');
        $password = $input['password'] ?? '';
        
        if (empty($email) || empty($password)) {
            return Response::error('Заполните все поля');
        }
        
        $user = $this->userModel->verifyPassword($email, $password);
        
        if ($user) {
            // Проверяем, подтверждён ли email
            $isVerified = $this->userModel->isVerified($email);
            
            Session::set('user_id', $user['id']);
            Session::set('user_name', $user['name']);
            Session::set('user_email', $user['email']);
            Session::set('is_admin', $user['is_admin'] ?? false);
            Session::set('is_verified', $isVerified);
            
            // Если email не подтверждён - возвращаем информацию об этом
            if (!$isVerified) {
                Session::set('pending_verification_email', $email);
                Session::writeClose();
                
                return Response::json([
                    'success' => true,
                    'user' => [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'is_admin' => $user['is_admin'] ?? false,
                        'is_verified' => false
                    ],
                    'needs_verification' => true
                ]);
            }
            
            Session::writeClose();
            
            return Response::json([
                'success' => true, 
                'user' => [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'is_admin' => $user['is_admin'] ?? false,
                    'is_verified' => true
                ]
            ]);
        }
        
        return Response::unauthorized('Неверный email или пароль');
    }
    
    /**
     * API: подтверждение email
     */
    public function apiVerify(): string
    {
        $input = Request::json() ?? [];
        $code = trim($input['code'] ?? '');
        $email = Session::get('pending_verification_email', '');
        
        if (empty($email)) {
            return Response::error('Сессия истекла. Зарегистрируйтесь снова.');
        }
        
        if (empty($code)) {
            return Response::error('Введите код подтверждения');
        }
        
        if (strlen($code) !== 6 || !ctype_digit($code)) {
            return Response::error('Код должен состоять из 6 цифр');
        }
        
        if ($this->userModel->verifyEmail($email, $code)) {
            Session::set('is_verified', true);
            Session::forget('pending_verification_email');
            
            return Response::json([
                'success' => true, 
                'message' => 'Email подтверждён!',
                'user' => [
                    'email' => $email,
                    'is_verified' => true
                ]
            ]);
        }
        
        return Response::error('Неверный или истёкший код подтверждения');
    }
    
    /**
     * API: повторная отправка кода
     */
    public function apiResend(): string
    {
        $email = Session::get('pending_verification_email', '');
        
        if (empty($email)) {
            return Response::error('Сессия истекла. Зарегистрируйтесь снова.');
        }
        
        $code = $this->userModel->regenerateVerificationCode($email);
        
        if ($code === null) {
            return Response::error('Email уже подтверждён');
        }
        
        $user = $this->userModel->findByEmail($email);
        
        if ($user && EmailSender::sendVerificationCode($email, $code, $user['name'])) {
            return Response::json(['success' => true, 'message' => 'Код отправлен повторно']);
        }
        
        return Response::serverError('Ошибка отправки письма');
    }
    
    /**
     * API: выход
     */
    public function apiLogout(): string
    {
        Session::destroy();
        return Response::json(['success' => true]);
    }
    
    /**
     * API: получить текущего пользователя
     */
    public function apiGetCurrent(): string
    {
        Session::ensure();
        
        $user = self::getCurrentUser();
        
        // Если есть user, но нет is_admin - проверить через модель
        if ($user) {
            $isAdmin = $this->userModel->isAdmin($user['id']);
            $user['is_admin'] = $isAdmin;
            
            // Обновить сессию
            Session::set('is_admin', $isAdmin);
            
            // Проверить актуальный статус верификации
            $isVerified = $this->userModel->isVerified($user['email']);
            $user['is_verified'] = $isVerified;
            Session::set('is_verified', $isVerified);
        }
        
        return Response::json(['user' => $user]);
    }
}
