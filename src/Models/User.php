<?php
namespace App\Models;

use App\Support\DatabaseAware;
use App\Support\JsonStore;

/**
 * Модель пользователей (PDO + JSON fallback)
 */
class User
{
    use DatabaseAware;

    private JsonStore $usersStore;
    private JsonStore $adminsStore;

    public function __construct(?string $usersFile = null, ?string $adminsFile = null)
    {
        $this->usersStore = new JsonStore($usersFile ?? __DIR__ . '/../../storage/users.json');
        $this->adminsStore = new JsonStore($adminsFile ?? __DIR__ . '/../../storage/admins.json');
        $this->initDatabase();
    }

    /**
     * Загрузить всех пользователей
     */
    public function loadData(): array
    {
        $rows = $this->dbFetchAll("SELECT * FROM users ORDER BY id");

        return $rows ?? $this->loadFromJson();
    }

    /**
     * Загрузка из JSON (fallback)
     */
    private function loadFromJson(): array
    {
        return $this->usersStore->read();
    }

    /**
     * Загрузить всех администраторов (legacy, всегда из JSON)
     */
    public function loadAdmins(): array
    {
        return $this->adminsStore->read();
    }

    /**
     * Сохранить всех пользователей (JSON fallback)
     */
    private function saveData(array $users): bool
    {
        return $this->usersStore->write($users);
    }

    /**
     * Найти пользователя по email
     */
    public function findByEmail(string $email): ?array
    {
        // Проверяем среди админов (всегда из JSON)
        foreach ($this->loadAdmins() as $admin) {
            if (strtolower($admin['email']) === strtolower($email)) {
                $admin['is_admin'] = true;
                $admin['is_verified'] = true;
                return $admin;
            }
        }

        $row = $this->dbFetchOne(
            "SELECT * FROM users WHERE LOWER(email) = LOWER(:email)",
            [':email' => $email]
        );

        if ($row !== null) {
            return $row;
        }

        foreach ($this->loadFromJson() as $user) {
            if (strtolower($user['email']) === strtolower($email)) {
                return $user;
            }
        }

        return null;
    }

    /**
     * Найти пользователя по ID
     */
    public function findById(int $id): ?array
    {
        $row = $this->dbFetchOne("SELECT * FROM users WHERE id = :id", [':id' => $id]);

        if ($row !== null) {
            return $row;
        }

        foreach ($this->loadFromJson() as $user) {
            if ($user['id'] === $id) {
                return $user;
            }
        }

        return null;
    }

    /**
     * Проверить, является ли пользователь админом
     *
     * userId = 0 — legacy-админы из admins.json: проверяются по email.
     */
    public function isAdmin(int $userId, string $email = ''): bool
    {
        if ($userId === 0) {
            if ($email === '') {
                return false;
            }
            foreach ($this->loadAdmins() as $admin) {
                if (strtolower($admin['email']) === strtolower($email)) {
                    return true;
                }
            }
            return false;
        }

        $user = $this->findById($userId);
        if (!$user) {
            return false;
        }

        // Проверяем поле is_admin в БД
        $row = $this->dbFetchOne("SELECT is_admin FROM users WHERE id = :id", [':id' => $userId]);
        if ($row !== null && !empty($row['is_admin'])) {
            return true;
        }

        // Fallback: проверяем по email среди админов
        foreach ($this->loadAdmins() as $admin) {
            if (strtolower($admin['email']) === strtolower($user['email'])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Создать нового пользователя
     */
    public function create(string $email, string $password, string $name): ?array
    {
        $verificationCode = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $verificationExpires = date('Y-m-d H:i:s', time() + 3600);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if ($this->db !== null) {
            // Проверяем, существует ли пользователь
            $existing = $this->findByEmail($email);
            if ($existing) {
                if ($existing['is_verified'] ?? false) {
                    return null; // Уже подтверждён
                }
                // Обновляем код подтверждения
                $updated = $this->updateUnverifiedUser($existing['id'], $email, $hashedPassword, $name, $verificationCode, $verificationExpires);
                if ($updated !== null) {
                    return $updated;
                }
            } else {
                $id = $this->dbInsert("
                    INSERT INTO users (email, password, name, verification_code, verification_expires)
                    VALUES (:email, :password, :name, :code, :expires)
                ", [
                    ':email' => $email,
                    ':password' => $hashedPassword,
                    ':name' => $name,
                    ':code' => $verificationCode,
                    ':expires' => $verificationExpires,
                ]);

                if ($id !== null) {
                    return [
                        'id' => $id,
                        'email' => $email,
                        'name' => $name,
                        'is_verified' => false,
                        'verification_code' => $verificationCode
                    ];
                }
            }
        }

        // Fallback на JSON
        return $this->createJson($email, $password, $name, $verificationCode, $verificationExpires);
    }

    /**
     * Обновить неподтверждённого пользователя (БД)
     */
    private function updateUnverifiedUser(int $id, string $email, string $password, string $name, string $code, string $expires): ?array
    {
        $ok = $this->dbRun("
            UPDATE users
            SET password = :password, name = :name, verification_code = :code, verification_expires = :expires
            WHERE id = :id AND (is_verified = 0 OR is_verified IS NULL)
        ", [
            ':id' => $id,
            ':password' => $password,
            ':name' => $name,
            ':code' => $code,
            ':expires' => $expires,
        ]);

        if (!$ok) {
            return null;
        }

        return [
            'id' => $id,
            'email' => $email,
            'name' => $name,
            'is_verified' => false,
            'verification_code' => $code
        ];
    }

    /**
     * Создание пользователя в JSON (fallback)
     */
    private function createJson(string $email, string $password, string $name, string $code, string $expires): ?array
    {
        $users = $this->loadFromJson();

        $existingKey = null;
        foreach ($users as $key => $user) {
            if (strtolower($user['email']) === strtolower($email)) {
                $existingKey = $key;
                break;
            }
        }

        if ($existingKey !== null) {
            if ($users[$existingKey]['is_verified'] ?? false) {
                return null;
            }

            $users[$existingKey]['password'] = password_hash($password, PASSWORD_DEFAULT);
            $users[$existingKey]['name'] = $name;
            $users[$existingKey]['verification_code'] = $code;
            $users[$existingKey]['verification_expires'] = $expires;

            if ($this->saveData($users)) {
                return [
                    'id' => $users[$existingKey]['id'],
                    'email' => $email,
                    'name' => $name,
                    'is_verified' => false,
                    'verification_code' => $code
                ];
            }

            return null;
        }

        $maxId = 0;
        foreach ($users as $user) {
            if ($user['id'] > $maxId) {
                $maxId = $user['id'];
            }
        }

        $newUser = [
            'id' => $maxId + 1,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'name' => $name,
            'is_verified' => false,
            'verification_code' => $code,
            'verification_expires' => $expires,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $users[] = $newUser;

        if ($this->saveData($users)) {
            unset($newUser['password']);
            return $newUser;
        }

        return null;
    }

    /**
     * Подтвердить email пользователя
     */
    public function verifyEmail(string $email, string $code): bool
    {
        $user = $this->dbFetchOne(
            "SELECT * FROM users WHERE LOWER(email) = LOWER(:email)",
            [':email' => $email]
        );

        if ($user !== null) {
            if (!empty($user['is_verified'])) {
                return true;
            }
            if ($user['verification_code'] !== $code) {
                return false;
            }
            if (strtotime($user['verification_expires']) < time()) {
                return false;
            }

            return $this->dbRun("
                UPDATE users
                SET is_verified = 1, verification_code = NULL, verification_expires = NULL, verified_at = NOW()
                WHERE id = :id
            ", [':id' => $user['id']]);
        }

        // JSON fallback (только если БД недоступна)
        if ($this->db !== null) {
            return false;
        }

        $users = $this->loadFromJson();
        foreach ($users as &$user) {
            if (strtolower($user['email']) === strtolower($email)) {
                if ($user['is_verified'] ?? false) {
                    return true;
                }
                if (($user['verification_code'] ?? '') !== $code) {
                    return false;
                }
                $expires = strtotime($user['verification_expires'] ?? '');
                if ($expires < time()) {
                    return false;
                }
                $user['is_verified'] = true;
                $user['verification_code'] = null;
                $user['verification_expires'] = null;
                $user['verified_at'] = date('Y-m-d H:i:s');
                return $this->saveData($users);
            }
        }

        return false;
    }

    /**
     * Проверить, подтверждён ли email
     */
    public function isVerified(string $email): bool
    {
        $user = $this->findByEmail($email);
        // MySQL возвращает is_verified как число 1/0, поэтому используем !empty()
        return $user !== null && !empty($user['is_verified']);
    }

    /**
     * Обновить код подтверждения
     */
    public function regenerateVerificationCode(string $email): ?string
    {
        $verificationCode = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $verificationExpires = date('Y-m-d H:i:s', time() + 3600);

        if ($this->db !== null) {
            $rows = $this->dbFetchAll("
                SELECT id, is_verified FROM users
                WHERE LOWER(email) = LOWER(:email)
            ", [':email' => $email]);

            if ($rows !== null && !empty($rows)) {
                if (!empty($rows[0]['is_verified'])) {
                    return null;
                }

                $ok = $this->dbRun("
                    UPDATE users
                    SET verification_code = :code, verification_expires = :expires
                    WHERE id = :id AND (is_verified = 0 OR is_verified IS NULL)
                ", [
                    ':code' => $verificationCode,
                    ':expires' => $verificationExpires,
                    ':id' => $rows[0]['id'],
                ]);

                return $ok ? $verificationCode : null;
            }
        }

        // JSON fallback
        $users = $this->loadFromJson();
        foreach ($users as &$user) {
            if (strtolower($user['email']) === strtolower($email)) {
                if ($user['is_verified'] ?? false) {
                    return null;
                }
                $user['verification_code'] = $verificationCode;
                $user['verification_expires'] = $verificationExpires;
                if ($this->saveData($users)) {
                    return $verificationCode;
                }
                return null;
            }
        }

        return null;
    }

    /**
     * Проверить пароль
     */
    public function verifyPassword(string $email, string $password): ?array
    {
        // Проверяем среди админов (JSON, legacy plain-пароль)
        foreach ($this->loadAdmins() as $admin) {
            if (strtolower($admin['email']) === strtolower($email)) {
                if ($password === $admin['password']) {
                    return [
                        'id' => 0,
                        'email' => $admin['email'],
                        'name' => $admin['name'],
                        'is_admin' => true
                    ];
                }
                return null;
            }
        }

        $row = $this->dbFetchOne(
            "SELECT * FROM users WHERE LOWER(email) = LOWER(:email)",
            [':email' => $email]
        );

        if ($row !== null) {
            if (password_verify($password, $row['password'])) {
                unset($row['password']);
                return $row;
            }
            return null;
        }

        // JSON fallback
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['password'] ?? '')) {
            unset($user['password']);
            return $user;
        }

        return null;
    }

    /**
     * Обновить профиль пользователя
     */
    public function updateProfile(int $userId, array $data): bool
    {
        if ($this->db !== null) {
            $fields = [];
            $params = [':id' => $userId];

            foreach (['name', 'phone', 'address'] as $field) {
                if (isset($data[$field])) {
                    $fields[] = "$field = :$field";
                    $params[":$field"] = trim($data[$field]);
                }
            }
            if (isset($data['avatar'])) {
                $fields[] = 'avatar = :avatar';
                $params[':avatar'] = $data['avatar'];
            }

            if (empty($fields)) {
                return false;
            }

            $fields[] = 'updated_at = NOW()';

            if ($this->dbRun("UPDATE users SET " . implode(', ', $fields) . " WHERE id = :id", $params)) {
                return true;
            }
        }

        // JSON fallback
        $users = $this->loadFromJson();
        foreach ($users as &$user) {
            if ($user['id'] === $userId) {
                foreach (['name', 'phone', 'address'] as $field) {
                    if (isset($data[$field])) {
                        $user[$field] = trim($data[$field]);
                    }
                }
                if (isset($data['avatar'])) {
                    $user['avatar'] = $data['avatar'];
                }
                $user['updated_at'] = date('Y-m-d H:i:s');
                return $this->saveData($users);
            }
        }

        return false;
    }

    /**
     * Получить полный профиль пользователя
     */
    public function getFullProfile(int $userId): ?array
    {
        $user = $this->findById($userId);

        if ($user) {
            return array_merge([
                'phone' => '',
                'address' => '',
                'avatar' => ''
            ], $user);
        }

        return null;
    }

    /**
     * Получить историю заказов пользователя (делегировано модели Order)
     */
    public function getOrders(int $userId): array
    {
        $user = $this->findById($userId);
        if (!$user) {
            return [];
        }

        $orderModel = new Order();
        return $orderModel->getForUser($userId, $user['email'] ?? '');
    }

    /**
     * Получить всех пользователей (для админки)
     */
    public function getAll(): array
    {
        return $this->loadData();
    }
}
