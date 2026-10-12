<?php
namespace App\Controllers;

use App\Models\User;
use App\Models\EmailSender;
use App\Views\AuthTemplate;
use App\Support\Session;
use App\Support\Response;
use App\Support\Request;

/**
 * Контроллер авторизации.
 *
 * Вся логика сосредоточена в методах doRegister/doLogin/doVerify/doResend,
 * которые возвращают массив ['error' => ...] или ['user' => ..., ...].
 * Web- и API-эндпоинты — тонкие обёртки над ними.
 */
class AuthController
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        Session::ensure();
    }

    // =====================================================
    // Общая логика
    // =====================================================

    /**
     * Зарегистрировать пользователя и войти в аккаунт
     *
     * @return array ['error' => string] либо ['user' => array, 'needs_verification' => true]
     */
    private function doRegister(string $email, string $password, string $name, string $passwordConfirm = ''): array
    {
        if (empty($email) || empty($password) || empty($name)) {
            return ['error' => 'Заполните все поля'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['error' => 'Введите корректный email'];
        }

        if (strlen($password) < 6) {
            return ['error' => 'Пароль должен быть не менее 6 символов'];
        }

        // Проверка подтверждения пароля — только если поле передано (web-форма)
        if ($passwordConfirm !== '' && $password !== $passwordConfirm) {
            return ['error' => 'Пароли не совпадают'];
        }

        $result = $this->userModel->create($email, $password, $name);

        if (!$result) {
            return ['error' => 'Пользователь с таким email уже существует и подтверждён'];
        }

        // Отправляем код подтверждения
        EmailSender::sendVerificationCode(
            $result['email'],
            $result['verification_code'],
            $result['name']
        );

        // Сразу входим в аккаунт (email ещё не подтверждён)
        $this->putUserInSession([
            'id' => $result['id'],
            'name' => $result['name'],
            'email' => $result['email'],
            'is_admin' => false,
            'is_verified' => false,
        ]);
        Session::set('pending_verification_email', $email);
        Session::writeClose();

        return [
            'user' => [
                'id' => $result['id'],
                'name' => $result['name'],
                'email' => $result['email'],
                'is_verified' => false,
            ],
            'needs_verification' => true,
        ];
    }

    /**
     * Войти по email/паролю
     *
     * @return array ['error' => string] либо ['user' => array, 'needs_verification'?: bool]
     */
    private function doLogin(string $email, string $password): array
    {
        if (empty($email) || empty($password)) {
            return ['error' => 'Заполните все поля'];
        }

        $user = $this->userModel->verifyPassword($email, $password);

        if (!$user) {
            return ['error' => 'Неверный email или пароль'];
        }

        $isVerified = $this->userModel->isVerified($user['email'] ?? $email);

        $this->putUserInSession([
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'is_admin' => $user['is_admin'] ?? false,
            'is_verified' => $isVerified,
        ]);

        $result = [
            'user' => [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'is_admin' => $user['is_admin'] ?? false,
                'is_verified' => $isVerified,
            ],
        ];

        if (!$isVerified) {
            Session::set('pending_verification_email', $email);
            $result['needs_verification'] = true;
        }

        Session::writeClose();

        return $result;
    }

    /**
     * Подтвердить email по коду из сессии
     *
     * @return array ['error' => string] либо ['user' => array]
     */
    private function doVerify(string $code): array
    {
        $email = Session::get('pending_verification_email', '');

        if (empty($email)) {
            return ['error' => 'Сессия истекла. Зарегистрируйтесь снова.'];
        }

        if (empty($code)) {
            return ['error' => 'Введите код подтверждения'];
        }

        if (strlen($code) !== 6 || !ctype_digit($code)) {
            return ['error' => 'Код должен состоять из 6 цифр'];
        }

        if (!$this->userModel->verifyEmail($email, $code)) {
            return ['error' => 'Неверный или истёкший код подтверждения'];
        }

        Session::set('is_verified', true);
        Session::forget('pending_verification_email');

        return [
            'user' => [
                'email' => $email,
                'is_verified' => true,
            ],
        ];
    }

    /**
     * Повторно отправить код подтверждения
     *
     * @return array ['error' => string] либо ['message' => string]
     */
    private function doResend(): array
    {
        $email = Session::get('pending_verification_email', '');

        if (empty($email)) {
            return ['error' => 'Сессия истекла. Зарегистрируйтесь снова.'];
        }

        $code = $this->userModel->regenerateVerificationCode($email);

        if ($code === null) {
            return ['error' => 'Email уже подтверждён'];
        }

        $user = $this->userModel->findByEmail($email);

        if ($user && EmailSender::sendVerificationCode($email, $code, $user['name'])) {
            return ['message' => 'Код отправлен повторно'];
        }

        return ['error' => 'Ошибка отправки письма', 'status' => 500];
    }

    /**
     * Записать данные пользователя в сессию
     */
    private function putUserInSession(array $user): void
    {
        Session::set('user_id', $user['id']);
        Session::set('user_name', $user['name']);
        Session::set('user_email', $user['email']);
        Session::set('is_admin', $user['is_admin'] ?? false);
        Session::set('is_verified', $user['is_verified'] ?? false);
    }

    /**
     * Ответ с ошибкой: для web — текст ошибки, для API — Response::error
     */
    private static function errorResponse(array $result): string
    {
        return Response::error($result['error'], $result['status'] ?? 400);
    }

    // =====================================================
    // Web-страницы
    // =====================================================

    /**
     * Страница регистрации
     */
    public function register(): void
    {
        $error = '';

        if (Request::isPost()) {
            $result = $this->doRegister(
                trim(Request::post('email', '')),
                Request::post('password', ''),
                trim(Request::post('name', '')),
                Request::post('password_confirm', '')
            );

            if (!isset($result['error'])) {
                header('Location: /verify');
                exit;
            }

            $error = $result['error'];
        }

        echo AuthTemplate::renderRegister($error, '');
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

        if (Request::isPost()) {
            $result = $this->doVerify(trim(Request::post('code', '')));

            if (isset($result['error'])) {
                $error = $result['error'];
            } else {
                $success = 'Email подтверждён!';
                // Редирект на главную через 2 секунды
                header('Refresh: 2; URL=/');
            }
        }

        echo AuthTemplate::renderVerify($email, $error, $success);
    }

    /**
     * Страница входа
     */
    public function login(): void
    {
        $error = '';

        if (Request::isPost()) {
            $result = $this->doLogin(
                trim(Request::post('email', '')),
                Request::post('password', '')
            );

            if (!isset($result['error'])) {
                // Если email не подтверждён - перенаправляем на подтверждение
                if ($result['needs_verification'] ?? false) {
                    header('Location: /verify');
                } else {
                    header('Location: /');
                }
                exit;
            }

            $error = $result['error'];
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
     * Получить текущего пользователя из сессии
     */
    public static function getCurrentUser(): ?array
    {
        Session::ensure();

        if (Session::has('user_id')) {
            return [
                'id' => Session::get('user_id'),
                'name' => Session::get('user_name'),
                'email' => Session::get('user_email'),
                'is_admin' => Session::get('is_admin', false),
                'is_verified' => Session::get('is_verified', false)
            ];
        }

        return null;
    }

    // =====================================================
    // API
    // =====================================================

    /**
     * API: регистрация
     */
    public function apiRegister(): string
    {
        $input = Request::json() ?? [];

        $result = $this->doRegister(
            trim($input['email'] ?? ''),
            $input['password'] ?? '',
            trim($input['name'] ?? '')
        );

        if (isset($result['error'])) {
            return self::errorResponse($result);
        }

        return Response::json([
            'success' => true,
            'message' => 'На ваш email отправлен код подтверждения',
            'user' => $result['user'],
            'needs_verification' => true
        ]);
    }

    /**
     * API: вход
     */
    public function apiLogin(): string
    {
        $input = Request::json() ?? [];

        $result = $this->doLogin(
            trim($input['email'] ?? ''),
            $input['password'] ?? ''
        );

        if (isset($result['error'])) {
            return Response::unauthorized($result['error']);
        }

        return Response::json(array_filter([
            'success' => true,
            'user' => $result['user'],
            'needs_verification' => $result['needs_verification'] ?? null,
        ], fn($v) => $v !== null));
    }

    /**
     * API: подтверждение email
     */
    public function apiVerify(): string
    {
        $input = Request::json() ?? [];

        $result = $this->doVerify(trim($input['code'] ?? ''));

        if (isset($result['error'])) {
            return self::errorResponse($result);
        }

        return Response::json([
            'success' => true,
            'message' => 'Email подтверждён!',
            'user' => $result['user']
        ]);
    }

    /**
     * API: повторная отправка кода
     */
    public function apiResend(): string
    {
        $result = $this->doResend();

        if (isset($result['error'])) {
            return self::errorResponse($result);
        }

        return Response::json(['success' => true, 'message' => $result['message']]);
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
     * API: получить текущего пользователя (с актуализацией is_admin/is_verified)
     */
    public function apiGetCurrent(): string
    {
        $user = self::getCurrentUser();

        if ($user) {
            $isAdmin = $this->userModel->isAdmin((int)$user['id'], (string)$user['email']);
            $isVerified = $this->userModel->isVerified($user['email']);

            $user['is_admin'] = $isAdmin;
            $user['is_verified'] = $isVerified;

            Session::set('is_admin', $isAdmin);
            Session::set('is_verified', $isVerified);
        }

        return Response::json(['user' => $user]);
    }
}
