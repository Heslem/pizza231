<?php
namespace App\Views;

class ProfileTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/profile.json';

    public static function renderProfile(array $profile, array $orders = []): string
    {
        return Twig::renderPage('profile', [
            'profile' => $profile,
            'orders' => $orders,
        ], self::TEXTS_PATH);
    }
}

