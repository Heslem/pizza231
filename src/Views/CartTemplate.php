<?php
namespace App\Views;

use App\Models\Cart;

class CartTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/cart.json';

    public static function getTemplate(): string
    {
        $items = Cart::getItems();
        $isEmpty = empty($items);
        $count = Cart::getCount();
        $total = Cart::getTotal();
        $cartJson = json_encode($items, JSON_UNESCAPED_UNICODE);

        return Twig::renderPage('cart', [
            'items' => $items,
            'isEmpty' => $isEmpty,
            'count' => $count,
            'total' => $total,
            'cartJson' => $cartJson,
        ], self::TEXTS_PATH);
    }
}
