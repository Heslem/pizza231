<?php
namespace App\Models;

use App\Config\Config;
use App\Support\DatabaseAware;
use App\Support\JsonStore;

/**
 * Модель товаров (PDO + JSON fallback)
 */
class Product
{
    use DatabaseAware;

    private JsonStore $store;

    public function __construct(?string $jsonFile = null)
    {
        $this->store = new JsonStore($jsonFile ?? Config::FILE_PRODUCTS);
        $this->initDatabase();
    }

    /**
     * Загрузить все товары, индексированные по ID
     */
    public function loadData(): ?array
    {
        $rows = $this->dbFetchAll("SELECT * FROM products ORDER BY id");

        if ($rows !== null && !empty($rows)) {
            return $this->indexById($rows);
        }

        return $this->loadFromJson();
    }

    /**
     * Загрузка из JSON файла (fallback)
     */
    private function loadFromJson(): ?array
    {
        $arr = $this->store->read();

        return empty($arr) ? null : $this->indexById($arr);
    }

    /**
     * Индексировать список товаров по полю id
     */
    private function indexById(array $items): array
    {
        $indexed = [];
        foreach ($items as $item) {
            if (isset($item['id'])) {
                $indexed[$item['id']] = $item;
            }
        }
        return $indexed;
    }

    /**
     * Получить товар по ID
     */
    public function findById(int $id): ?array
    {
        $row = $this->dbFetchOne("SELECT * FROM products WHERE id = :id", [':id' => $id]);

        if ($row !== null) {
            return $row;
        }

        return $this->loadFromJson()[$id] ?? null;
    }

    /**
     * Получить товары по категории
     */
    public function findByCategory(string $category): array
    {
        $rows = $this->dbFetchAll(
            "SELECT * FROM products WHERE category = :category ORDER BY id",
            [':category' => $category]
        );

        if ($rows !== null) {
            return $rows;
        }

        $products = $this->loadFromJson() ?? [];
        return array_filter($products, fn($p) => ($p['category'] ?? '') === $category);
    }

    /**
     * Получить все категории
     */
    public function getCategories(): array
    {
        $rows = $this->dbFetchAll("SELECT DISTINCT category FROM products ORDER BY category");

        if ($rows !== null) {
            return array_column($rows, 'category');
        }

        $products = $this->loadFromJson() ?? [];
        return array_values(array_unique(array_filter(array_column($products, 'category'))));
    }

    /**
     * Поиск товаров
     */
    public function search(string $query): array
    {
        $rows = $this->dbFetchAll("
            SELECT * FROM products
            WHERE name LIKE :query OR description LIKE :query OR category LIKE :query
            ORDER BY id
        ", [':query' => "%{$query}%"]);

        if ($rows !== null) {
            return $rows;
        }

        $products = $this->loadFromJson() ?? [];
        $queryLower = mb_strtolower($query);
        return array_filter($products, fn($p) =>
            mb_strpos(mb_strtolower($p['name'] ?? ''), $queryLower) !== false ||
            mb_strpos(mb_strtolower($p['description'] ?? ''), $queryLower) !== false ||
            mb_strpos(mb_strtolower($p['category'] ?? ''), $queryLower) !== false
        );
    }

    /**
     * Создать товар, вернуть его ID
     */
    public function create(array $data): ?int
    {
        if ($this->db !== null) {
            $id = $this->dbInsert("
                INSERT INTO products (name, image, description, price, category)
                VALUES (:name, :image, :description, :price, :category)
            ", [
                ':name' => $data['name'],
                ':image' => $data['image'] ?? '/assets/img/no-image.jpg',
                ':description' => $data['description'] ?? '',
                ':price' => $data['price'],
                ':category' => $data['category'] ?? 'Без категории',
            ]);

            if ($id !== null) {
                return $id;
            }
        }

        // JSON fallback
        return $this->createJson($data);
    }

    /**
     * Создание товара в JSON
     */
    private function createJson(array $data): ?int
    {
        $products = $this->store->read();

        $maxId = 0;
        foreach ($products as $product) {
            $pid = (int)($product['id'] ?? 0);
            if ($pid > $maxId) {
                $maxId = $pid;
            }
        }

        $newId = $maxId + 1;

        $products[] = [
            'id' => $newId,
            'name' => $data['name'],
            'image' => $data['image'] ?? '/assets/img/no-image.jpg',
            'description' => $data['description'] ?? '',
            'price' => $data['price'],
            'category' => $data['category'] ?? 'Без категории',
        ];

        return $this->store->write($products) ? $newId : null;
    }

    /**
     * Обновить товар
     */
    public function update(int $id, array $data): bool
    {
        if ($this->db !== null) {
            if ($this->dbRun("
                UPDATE products
                SET name = :name, image = :image, description = :description,
                    price = :price, category = :category
                WHERE id = :id
            ", [
                ':id' => $id,
                ':name' => $data['name'],
                ':image' => $data['image'] ?? '/assets/img/no-image.jpg',
                ':description' => $data['description'] ?? '',
                ':price' => $data['price'],
                ':category' => $data['category'] ?? 'Без категории',
            ])) {
                return true;
            }
        }

        // JSON fallback
        $products = $this->store->read();
        foreach ($products as &$product) {
            if ((int)($product['id'] ?? 0) === $id) {
                $product['name'] = $data['name'];
                $product['image'] = $data['image'] ?? '/assets/img/no-image.jpg';
                $product['description'] = $data['description'] ?? '';
                $product['price'] = $data['price'];
                $product['category'] = $data['category'] ?? 'Без категории';
                return $this->store->write($products);
            }
        }

        return false;
    }

    /**
     * Удалить товар
     */
    public function delete(int $id): bool
    {
        if ($this->db !== null) {
            if ($this->dbRun("DELETE FROM products WHERE id = :id", [':id' => $id])) {
                return true;
            }
        }

        // JSON fallback
        $products = $this->store->read();
        $filtered = array_values(array_filter($products, fn($p) => (int)($p['id'] ?? 0) !== $id));

        if (count($filtered) === count($products)) {
            return false;
        }

        return $this->store->write($filtered);
    }
}
