<?php
namespace App\Support;

/**
 * Хелпер для чтения HTTP-запросов
 */
class Request
{
    /**
     * Прочитать JSON-тело запроса
     *
     * @return array|null Декодированные данные или null при ошибке
     */
    public static function json(): ?array
    {
        $raw = file_get_contents('php://input');
        if (empty($raw)) {
            return null;
        }
        $data = json_decode($raw, true);
        return is_array($data) ? $data : null;
    }

    /**
     * Получить значение из POST
     */
    public static function post(string $key, $default = null)
    {
        return $_POST[$key] ?? $default;
    }

    /**
     * Получить значение из GET
     */
    public static function query(string $key, $default = null)
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * Получить метод запроса
     */
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * Проверить, что метод POST
     */
    public static function isPost(): bool
    {
        return self::method() === 'POST';
    }
}
