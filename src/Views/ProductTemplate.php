<?php
namespace App\Views;

class ProductTemplate extends BaseTemplate
{
    private const TEMPLATE_PATH = __DIR__ . '/templates/product.html.php';
    private const TEXTS_PATH    = __DIR__ . '/../../storage/templates/product.json';

    /**
     * Рендер страницы товара
     */
    public static function renderProduct(array $product, array $related = []): string
    {
        $texts = self::texts(self::TEXTS_PATH);
        $fallbackImage = '/assets/img/no-image.jpg';
        $notFound = empty($product) || !isset($product['id']);

        if ($notFound) {
            return parent::render(self::TEMPLATE_PATH, [
                'notFound' => true,
                'texts' => $texts,
            ], $texts, self::LAYOUT_PATH);
        }

        $price = floatval($product['price'] ?? 0);
        $priceFormatted = number_format($price, 0, '.', ' ');

        return parent::render(self::TEMPLATE_PATH, [
            'id' => $product['id'],
            'title' => $product['name'] ?? '',
            'description' => $product['description'] ?? '',
            'price' => $price,
            'priceFormatted' => $priceFormatted,
            'image' => $product['image'] ?? $fallbackImage,
            'fallbackImage' => $fallbackImage,
            'productJson' => json_encode($product, JSON_UNESCAPED_UNICODE),
            'notFound' => false,
            'related' => $related,
            'texts' => $texts,
        ], $texts, self::LAYOUT_PATH, '<link rel="stylesheet" href="/assets/css/product.css"><script src="/assets/js/product.js"></script>');
    }
}
