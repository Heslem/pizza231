<?php
namespace App\Router;

use App\Controllers\HomeController;
use App\Controllers\AboutController;
use App\Controllers\ProductController;
use App\Controllers\CatalogController;
use App\Controllers\CartController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\ProfileController;
use App\Models\Logger;
use App\Support\Response;

/**
 * Роутер на таблице маршрутов.
 *
 * Каждый маршрут: HTTP-методы, шаблон пути и обработчик "Класс::метод".
 * Сегменты пути вида {id} извлекаются и передаются в метод аргументами
 * (приводятся к int, если параметр метода объявлен как int).
 */
class Router
{
    /** @var array<int, array{methods: string[], pattern: string, handler: string}> */
    private array $routes = [];

    public function __construct()
    {
        $this->buildRoutes();
    }

    private function buildRoutes(): void
    {
        // ---- Web-страницы ----
        $web = [
            ['GET',      '/',                       HomeController::class . '::get'],
            ['GET',      '/home',                   HomeController::class . '::get'],
            ['GET',      '/about',                  AboutController::class . '::get'],
            ['GET',      '/product/{id}',           ProductController::class . '::get'],
            ['GET',      '/catalog',                CatalogController::class . '::get'],
            ['GET',      '/cart',                   CartController::class . '::get'],
            ['GET|POST', '/register',               AuthController::class . '::register'],
            ['GET|POST', '/verify',                 AuthController::class . '::verify'],
            ['GET|POST', '/login',                  AuthController::class . '::login'],
            ['GET',      '/logout',                 AuthController::class . '::logout'],
            ['GET',      '/profile',                ProfileController::class . '::get'],
            ['GET',      '/admin',                  AdminController::class . '::index'],
            ['GET',      '/admin/orders',           AdminController::class . '::orders'],
            ['GET',      '/admin/users',            AdminController::class . '::users'],
            ['GET',      '/admin/logs',             AdminController::class . '::logs'],
            ['GET',      '/admin/catalog',          AdminController::class . '::catalog'],
        ];

        // ---- API ----
        $api = [
            // Товар
            ['GET',  '/api/product/{id}',            ProductController::class . '::apiGet'],

            // Корзина
            ['POST', '/api/cart/add',                CartController::class . '::add'],
            ['POST', '/api/cart/update',             CartController::class . '::update'],
            ['POST', '/api/cart/remove',             CartController::class . '::remove'],
            ['POST', '/api/cart/clear',              CartController::class . '::clear'],
            ['POST', '/api/cart/order',              CartController::class . '::order'],
            ['POST', '/api/cart/update-status',      CartController::class . '::updateStatus'],

            // Авторизация
            ['POST', '/api/auth/register',           AuthController::class . '::apiRegister'],
            ['POST', '/api/auth/login',              AuthController::class . '::apiLogin'],
            ['POST', '/api/auth/logout',             AuthController::class . '::apiLogout'],
            ['POST', '/api/auth/verify',             AuthController::class . '::apiVerify'],
            ['POST', '/api/auth/resend',             AuthController::class . '::apiResend'],
            ['GET',  '/api/auth/current',            AuthController::class . '::apiGetCurrent'],

            // Админка
            ['GET',    '/api/admin/stats',           AdminController::class . '::apiStats'],
            ['GET',    '/api/admin/orders',          AdminController::class . '::apiOrders'],
            ['GET',    '/api/admin/users',           AdminController::class . '::apiUsers'],
            ['GET',    '/api/admin/logs',            AdminController::class . '::apiLogs'],
            ['POST',   '/api/admin/clear-logs',      AdminController::class . '::apiClearLogs'],
            ['GET',    '/api/admin/products',        AdminController::class . '::apiProducts'],
            ['POST',   '/api/admin/product',         AdminController::class . '::apiCreateProduct'],
            ['PUT',    '/api/admin/product/{id}',    AdminController::class . '::apiUpdateProduct'],
            ['DELETE', '/api/admin/product/{id}',    AdminController::class . '::apiDeleteProduct'],

            // Профиль
            ['GET',  '/api/profile',                 ProfileController::class . '::apiGet'],
            ['GET',  '/api/profile/get',             ProfileController::class . '::apiGet'],
            ['POST', '/api/profile/update',          ProfileController::class . '::apiUpdate'],
            ['POST', '/api/profile/avatar',          ProfileController::class . '::apiUploadAvatar'],
        ];

        foreach (array_merge($web, $api) as [$methods, $pattern, $handler]) {
            $this->add($methods, $pattern, $handler);
        }
    }

    /**
     * Зарегистрировать маршрут
     */
    private function add(string $methods, string $pattern, string $handler): void
    {
        $this->routes[] = [
            'methods' => explode('|', $methods),
            'pattern' => $pattern,
            'handler' => $handler,
        ];
    }

    /**
     * Маршрутизировать запрос
     */
    public function route(string $url): ?string
    {
        $path = rtrim(parse_url($url, PHP_URL_PATH) ?? '/', '/') ?: '/';
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        foreach ($this->routes as $route) {
            if (!in_array($method, $route['methods'], true)) {
                continue;
            }

            $params = $this->match($route['pattern'], $path);
            if ($params === null) {
                continue;
            }

            return $this->invoke($route['handler'], $params);
        }

        return $this->notFound($url, $path);
    }

    /**
     * Совпадает ли путь с шаблоном; возвращает извлечённые параметры или null
     */
    private function match(string $pattern, string $path): ?array
    {
        $patternParts = explode('/', trim($pattern, '/'));
        $pathParts = explode('/', trim($path, '/'));

        if (count($patternParts) !== count($pathParts)) {
            return null;
        }

        $params = [];
        foreach ($patternParts as $i => $part) {
            if (str_starts_with($part, '{') && str_ends_with($part, '}')) {
                $name = substr($part, 1, -1);
                if ($pathParts[$i] === '') {
                    return null; // пустой сегмент вместо обязательного параметра
                }
                $params[$name] = $pathParts[$i];
            } elseif ($part !== $pathParts[$i]) {
                return null;
            }
        }

        return $params;
    }

    /**
     * Вызвать обработчик с параметрами (с приведением к int по сигнатуре метода)
     */
    private function invoke(string $handler, array $params): ?string
    {
        [$class, $method] = explode('::', $handler);

        $controller = new $class();

        if (!$params) {
            return $controller->$method();
        }

        // Приводим строковые параметры к int, если метод ожидает int
        $ref = new \ReflectionMethod($controller, $method);
        $values = array_values($params);
        $args = [];
        foreach ($ref->getParameters() as $position => $parameter) {
            if (!isset($values[$position])) {
                break;
            }
            $type = $parameter->getType();
            $value = $values[$position];
            $args[] = ($type instanceof \ReflectionNamedType && $type->getName() === 'int')
                ? (int)$value
                : $value;
        }

        return $controller->$method(...$args);
    }

    /**
     * Ответ 404 (JSON для API, текст для web)
     */
    private function notFound(string $url, string $path): ?string
    {
        http_response_code(404);
        Logger::info('404 Not Found', ['url' => $url]);

        if (str_starts_with($path, '/api/')) {
            return Response::notFound('API endpoint not found');
        }

        return "404 - Страница не найдена";
    }
}
