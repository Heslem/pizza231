<?php
namespace App\Views;

class AboutTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/about.json';

    public static function getTemplate(): string
    {
        return Twig::renderPage('about', [], self::TEXTS_PATH);
    }
}
