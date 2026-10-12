<?php
namespace App\Views;

class CartTemplate extends BaseTemplate
{
    private const TEMPLATE_PATH = __DIR__ . '/templates/cart.html.php';
    private const TEXTS_PATH    = __DIR__ . '/../../storage/templates/cart.json';

    public static function getTemplate(): string
    {
        $texts = self::texts(self::TEXTS_PATH);
        return parent::render(self::TEMPLATE_PATH, [], $texts);
    }
}
