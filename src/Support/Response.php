<?php
namespace App\Support;

/**
 * Хелпер для отправки HTTP-ответов
 */
class Response
{
    /**
     * Отправить JSON-ответ
     *
     * @param array $data Данные для кодирования
     * @param int $statusCode HTTP-код ответа
     * @return string JSON-строка (для возврата из контроллера)
     */
    public static function json(array $data, int $statusCode = 200): string
    {
        if ($statusCode !== 200) {
            http_response_code($statusCode);
        }
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Отправить успешный ответ
     */
    public static function success(string $message = 'OK', array $extra = []): string
    {
        return self::json(array_merge(['success' => true, 'message' => $message], $extra));
    }

    /**
     * Отправить ошибку
     */
    public static function error(string $message, int $statusCode = 400): string
    {
        return self::json(['success' => false, 'error' => $message], $statusCode);
    }

    /**
     * Отправить 404
     */
    public static function notFound(string $message = 'Не найдено'): string
    {
        return self::error($message, 404);
    }

    /**
     * Отправить 403
     */
    public static function forbidden(string $message = 'Доступ запрещён'): string
    {
        return self::error($message, 403);
    }

    /**
     * Отправить 401
     */
    public static function unauthorized(string $message = 'Требуется авторизация'): string
    {
        return self::error($message, 401);
    }

    /**
     * Отправить 422 (валидация)
     */
    public static function validation(string $message = 'Ошибка валидации'): string
    {
        return self::error($message, 422);
    }

    /**
     * Отправить 500
     */
    public static function serverError(string $message = 'Внутренняя ошибка сервера'): string
    {
        return self::error($message, 500);
    }
}
