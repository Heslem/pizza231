<?php
namespace App\Support;

/**
 * Хелпер для управления сессией
 */
class Session
{
    /**
     * Убедиться, что сессия запущена
     */
    public static function ensure(): void
    {
        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            session_start();
        }
    }

    /**
     * Получить значение из сессии
     */
    public static function get(string $key, $default = null)
    {
        self::ensure();
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Установить значение в сессию
     */
    public static function set(string $key, $value): void
    {
        self::ensure();
        $_SESSION[$key] = $value;
    }

    /**
     * Удалить значение из сессии
     */
    public static function forget(string $key): void
    {
        self::ensure();
        unset($_SESSION[$key]);
    }

    /**
     * Проверить наличие ключа в сессии
     */
    public static function has(string $key): bool
    {
        self::ensure();
        return isset($_SESSION[$key]);
    }

    /**
     * Разрушить сессию
     */
    public static function destroy(): void
    {
        self::ensure();
        session_destroy();
    }

    /**
     * Записать данные сессии и освободить блокировку
     */
    public static function writeClose(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_write_close();
        }
    }
}
