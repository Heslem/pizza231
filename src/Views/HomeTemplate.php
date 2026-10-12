<?php
namespace App\Views;

class HomeTemplate extends BaseTemplate
{
    private const TEMPLATE_PATH = __DIR__ . '/templates/home.html.php';
    private const TEXTS_PATH    = __DIR__ . '/../../storage/templates/home.json';

    public static function getTemplate(): string
    {
        $texts = self::texts(self::TEXTS_PATH);
        return parent::render(self::TEMPLATE_PATH, [], $texts);
    }
}
