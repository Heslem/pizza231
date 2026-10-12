<?php
namespace App\Views;

class HomeTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/home.json';

    public static function getTemplate(): string
    {
        return Twig::renderPage('home', [], self::TEXTS_PATH);
    }
}
