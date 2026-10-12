<?php
namespace App\Views;

class CatalogTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/catalog.json';

    public static function getTemplate(array $products = [], string $search = '', string $category = '', array $categories = []): string
    {
        return Twig::renderPage('catalog', [
            'products'   => $products,
            'search'     => $search,
            'category'   => $category,
            'categories' => array_values($categories),
        ], self::TEXTS_PATH);
    }
}
