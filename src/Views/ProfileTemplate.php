<?php
namespace App\Views;

class ProfileTemplate extends BaseTemplate
{
    private const TEMPLATE_PATH = __DIR__ . '/templates/profile.html.php';
    private const TEXTS_PATH    = __DIR__ . '/../../storage/templates/profile.json';

    public static function render(array $profile, array $orders = []): string
    {
        $texts = self::texts(self::TEXTS_PATH);
        return parent::render(self::TEMPLATE_PATH, [
            'profile' => $profile,
            'orders' => $orders,
        ], $texts, self::LAYOUT_PATH, '<link rel="stylesheet" href="/assets/css/profile.css"><script src="/assets/js/profile.js"></script>');
    }
}

