<?php
// Подключаем Composer-автолоад (PSR-4: App\ -> src/)
require_once __DIR__ . '/vendor/autoload.php';

use App\Config\Config;
use App\Router\Router;
use App\Models\Logger;

// Инициализируем PDO (если БД недоступна, модели будут работать через JSON-fallback)
Config::initDatabase();

// Регистрация обработчиков ошибок и исключений
set_error_handler(function(int $errno, string $errstr, string $errfile, int $errline) {
    Logger::error($errstr, [
        'file' => $errfile,
        'line' => $errline,
        'errno' => $errno
    ]);
    
    // Продолжаем стандартную обработку ошибок
    return false;
});

set_exception_handler(function(Throwable $exception) {
    Logger::error($exception->getMessage(), [
        'file' => $exception->getFile(),
        'line' => $exception->getLine(),
        'trace' => $exception->getTraceAsString()
    ]);
    
    // Показываем пользователю дружелюбное сообщение об ошибке
    if (str_starts_with($_SERVER['REQUEST_URI'] ?? '', '/api/')) {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(500);
        echo json_encode(['error' => 'Внутренняя ошибка сервера'], JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(500);
        echo '<h1>Внутренняя ошибка сервера</h1>';
        echo '<p>Приносим извинения за временные неудобства. Мы уже работаем над решением проблемы.</p>';
    }
});

$router = new Router();
$url = $_SERVER['REQUEST_URI'];

// 👇 Для API возвращаем JSON-заголовки
if (str_starts_with($url, '/api/')) {
    header('Content-Type: application/json; charset=utf-8');
}

echo $router->route($url);