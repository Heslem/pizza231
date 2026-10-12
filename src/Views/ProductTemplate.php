<?php
namespace App\Views;

class ProductTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/product.json';

    /**
     * Рендер страницы товара
     */
    public static function renderProduct(array $product): string
    {
        $fallbackImage = '/assets/img/no-image.jpg';
        $notFound = empty($product) || !isset($product['id']);

        if ($notFound) {
            return Twig::renderPage('product', [
                'notFound' => true,
            ], self::TEXTS_PATH);
        }

        $price = floatval($product['price'] ?? 0);
        $priceFormatted = number_format($price, 0, '.', ' ');

        return Twig::renderPage('product', [
            'id' => $product['id'],
            'title' => $product['name'] ?? '',
            'description' => $product['description'] ?? '',
            'price' => $price,
            'priceFormatted' => $priceFormatted,
            'image' => $product['image'] ?? $fallbackImage,
            'fallbackImage' => $fallbackImage,
            'productJson' => json_encode($product, JSON_UNESCAPED_UNICODE),
            'notFound' => false,
        ], self::TEXTS_PATH);
    }
}
