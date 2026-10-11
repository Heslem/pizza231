<?php
namespace App\Config;

use App\Database\Database;

class Config
{
    // === Файловые данные (fallback) ===
    public const FILE_PRODUCTS = ".\storage\data.json";
    public const SHOW_CATALOG_AT_HOME = false;
 
    // === Настройки базы данных PDO ===
    public const DB_DRIVER = 'mysql';
    public const DB_HOST = 'localhost';
    public const DB_PORT = 3306;
    public const DB_DATABASE = 'cafebebe';      // Имя БД
    public const DB_USERNAME = 'root';            // Имя пользователя
    public const DB_PASSWORD = '';                // Пароль
    public const DB_CHARSET = 'utf8mb4';

    // === Инициализация PDO ===
    public static function initDatabase(): void
    {
        Database::init([
            'driver' => self::DB_DRIVER,
            'host' => self::DB_HOST,
            'port' => self::DB_PORT,
            'database' => self::DB_DATABASE,
            'username' => self::DB_USERNAME,
            'password' => self::DB_PASSWORD,
            'charset' => self::DB_CHARSET,
        ]);
    }

    // === Проверка доступности БД ===
    public static function isDatabaseAvailable(): bool
    {
        try {
            Database::getConnection();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}