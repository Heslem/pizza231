<?php
namespace App\Models;

use App\Support\DatabaseAware;
use App\Support\JsonStore;

/**
 * Модель заказов — единый слой данных (PDO + JSON fallback)
 *
 * Формат заказа единый для БД и JSON:
 * id (string order_xxx), created_at, fio, email, phone, address,
 * deliveryType, payment, items, total, status, user_id?, completed_at?
 */
class Order
{
    use DatabaseAware;

    private JsonStore $store;

    public function __construct(?string $jsonFile = null)
    {
        $this->store = new JsonStore($jsonFile ?? __DIR__ . '/../../storage/orders.json');
        $this->initDatabase();
    }

    /**
     * Создать заказ, вернуть его ID
     */
    public function create(array $orderData): ?string
    {
        if ($this->db !== null) {
            $id = $this->dbInsert("
                INSERT INTO orders (user_id, email, name, phone, address, total, status, items)
                VALUES (:user_id, :email, :name, :phone, :address, :total, :status, :items)
            ", [
                ':user_id' => $orderData['user_id'] ?? null,
                ':email' => $orderData['email'] ?? '',
                ':name' => $orderData['fio'] ?? $orderData['name'] ?? '',
                ':phone' => $orderData['phone'] ?? '',
                ':address' => $orderData['address'] ?? '',
                ':total' => $orderData['total'] ?? 0,
                ':status' => $this->mapStatusToDb($orderData['status'] ?? 'new'),
                ':items' => json_encode($orderData['items'] ?? [], JSON_UNESCAPED_UNICODE),
            ]);

            if ($id !== null) {
                return (string)$id;
            }
        }

        return $this->createJson($orderData);
    }

    /**
     * Создание заказа в JSON
     */
    private function createJson(array $orderData): ?string
    {
        $id = $orderData['id'] ?? uniqid('order_');
        $orders = $this->store->read();

        $newOrder = array_merge([
            'id' => $id,
            'created_at' => date('Y-m-d H:i:s'),
            'fio' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'deliveryType' => 'delivery',
            'payment' => 'cash',
            'items' => [],
            'total' => 0,
            'status' => 'new',
        ], $orderData, ['id' => $id]);

        $orders[] = $newOrder;

        return $this->store->write($orders) ? $id : null;
    }

    /**
     * Получить все заказы (новые сверху)
     */
    public function getAll(): array
    {
        $rows = $this->dbFetchAll("SELECT * FROM orders ORDER BY created_at DESC");

        if ($rows !== null) {
            return array_map([$this, 'normalizeDbRow'], $rows);
        }

        $orders = $this->store->read();

        usort($orders, function ($a, $b) {
            return strtotime($b['created_at'] ?? '') - strtotime($a['created_at'] ?? '');
        });

        return $orders;
    }

    /**
     * Получить заказ по ID
     */
    public function findById(string $id): ?array
    {
        $row = $this->dbFetchOne("SELECT * FROM orders WHERE id = :id", [':id' => $id]);

        if ($row !== null) {
            return $this->normalizeDbRow($row);
        }

        foreach ($this->store->read() as $order) {
            if ((string)($order['id'] ?? '') === $id) {
                return $order;
            }
        }

        return null;
    }

    /**
     * Получить заказы пользователя (по user_id или email)
     */
    public function getForUser(int $userId, string $email = ''): array
    {
        $rows = $this->dbFetchAll("
            SELECT * FROM orders
            WHERE user_id = :user_id OR LOWER(email) = LOWER(:email)
            ORDER BY created_at DESC
        ", [':user_id' => $userId, ':email' => $email]);

        if ($rows !== null) {
            return array_map([$this, 'normalizeDbRow'], $rows);
        }

        $userOrders = array_filter($this->store->read(), function ($order) use ($userId, $email) {
            if (isset($order['user_id']) && (int)$order['user_id'] === $userId) {
                return true;
            }
            return $email !== '' && !isset($order['user_id'])
                && strtolower($order['email'] ?? '') === strtolower($email);
        });

        $userOrders = array_values($userOrders);

        usort($userOrders, function ($a, $b) {
            return strtotime($b['created_at'] ?? '') - strtotime($a['created_at'] ?? '');
        });

        return $userOrders;
    }

    /**
     * Обновить статус заказа
     */
    public function updateStatus(string $id, string $status): bool
    {
        if ($this->db !== null) {
            if ($this->dbRun("UPDATE orders SET status = :status, updated_at = NOW() WHERE id = :id", [
                ':id' => $id,
                ':status' => $this->mapStatusToDb($status),
            ])) {
                return true;
            }
        }

        $orders = $this->store->read();
        foreach ($orders as &$order) {
            if ((string)($order['id'] ?? '') === $id) {
                $order['status'] = $status;
                if ($status === 'completed') {
                    $order['completed_at'] = date('Y-m-d H:i:s');
                }
                return $this->store->write($orders);
            }
        }

        return false;
    }

    /**
     * Привести строку БД к единому JSON-формату
     */
    private function normalizeDbRow(array $order): array
    {
        if (isset($order['items']) && is_string($order['items'])) {
            $order['items'] = json_decode($order['items'], true) ?? [];
        }
        if (isset($order['name']) && !isset($order['fio'])) {
            $order['fio'] = $order['name'];
        }
        return $order;
    }

    /**
     * Маппинг статуса приложения в ENUM таблицы orders
     */
    private function mapStatusToDb(string $status): string
    {
        $allowed = ['pending', 'processing', 'completed', 'cancelled'];
        return in_array($status, $allowed, true) ? $status : 'pending';
    }
}
