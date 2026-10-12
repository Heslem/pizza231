<?php
namespace App\Support;

use App\Config\Config;
use App\Database\Database;
use PDO;

/**
 * Общий слой «PDO с JSON-fallback» для моделей.
 *
 * Методы db* выполняют запрос и возвращают null при отсутствии БД
 * или ошибке PDOException (ошибка логируется) — модель в этом случае
 * уходит на JSON-fallback.
 */
trait DatabaseAware
{
    protected ?PDO $db = null;

    /**
     * Инициализировать подключение к БД, если она доступна
     */
    protected function initDatabase(): void
    {
        if (Config::isDatabaseAvailable()) {
            $this->db = Database::getConnection();
        }
    }

    /**
     * SELECT -> массив строк (null при ошибке/отсутствии БД)
     */
    protected function dbFetchAll(string $sql, array $params = []): ?array
    {
        if ($this->db === null) {
            return null;
        }

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * SELECT -> одна строка (null при ошибке/отсутствии БД/пустом результате)
     */
    protected function dbFetchOne(string $sql, array $params = []): ?array
    {
        if ($this->db === null) {
            return null;
        }

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            $row = $stmt->fetch();
            return $row ?: null;
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * INSERT -> lastInsertId (null при ошибке/отсутствии БД)
     */
    protected function dbInsert(string $sql, array $params = []): ?int
    {
        if ($this->db === null) {
            return null;
        }

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
            return (int)$this->db->lastInsertId();
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }

    /**
     * UPDATE/DELETE -> true при успехе (false при ошибке/отсутствии БД)
     */
    protected function dbRun(string $sql, array $params = []): bool
    {
        if ($this->db === null) {
            return false;
        }

        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute($params);
        } catch (\PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }
}
