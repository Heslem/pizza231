<?php
namespace App\Controllers;

require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Views/CatalogTemplate.php';

use App\Models\Product;
use App\Views\CatalogTemplate;

class CatalogController
{
    public function get(): void
    {
        $search = trim($_GET['search'] ?? '');
        $category = trim($_GET['category'] ?? '');
        
        $productModel = new Product();
        $allProducts = $productModel->loadData() ?? [];
        
        // Получаем список всех категорий
        $categories = $this->getCategories($allProducts);
        
        // Фильтруем товары
        $filteredProducts = $this->filterProducts($allProducts, $search, $category);
        
        // 👇 Вызываем render() вместо getTemplate()
        echo CatalogTemplate::render($filteredProducts, $search, $category, $categories);
    }
    
    /**
     * Получает список уникальных категорий из товаров
     */
    private function getCategories(array $products): array
    {
        $categories = [];
        foreach ($products as $product) {
            if (!empty($product['category'])) {
                $categories[] = $product['category'];
            }
        }
        return array_unique($categories);
    }
    
    /**
     * Фильтрует товары по поиску и категории
     */
    private function filterProducts(array $products, string $search, string $category): array
    {
        $results = $products;
        
        // Фильтр по категории
        if (!empty($category)) {
            $results = array_filter($results, function($product) use ($category) {
                return ($product['category'] ?? '') === $category;
            });
            // Переиндексируем массив после filter
            $results = array_values($results);
        }
        
        // Фильтр по поиску
        if (!empty($search)) {
            $searchLower = mb_strtolower($search);
            $results = array_filter($results, function($product) use ($searchLower) {
                $name = mb_strtolower($product['name'] ?? '');
                $description = mb_strtolower($product['description'] ?? '');
                return str_contains($name, $searchLower) || str_contains($description, $searchLower);
            });
            // Переиндексируем массив после filter
            $results = array_values($results);
        }
        
        return $results;
    }
}