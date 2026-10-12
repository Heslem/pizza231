<?php
namespace App\Views;

class AuthTemplate extends BaseTemplate
{
    private const TEMPLATE_PATH = __DIR__ . '/templates/auth.html.php';
    private const TEXTS_PATH    = __DIR__ . '/../../storage/templates/auth.json';

    /**
     * Регистрация
     */
    public static function renderRegister(string $error = '', string $success = ''): string
    {
        $texts = self::texts(self::TEXTS_PATH);
        return parent::render(self::TEMPLATE_PATH, [
            'mode' => 'register',
            'error' => $error,
            'success' => $success,
        ], $texts);
    }

    /**
     * Вход
     */
    public static function renderLogin(string $error = ''): string
    {
        $texts = self::texts(self::TEXTS_PATH);
        return parent::render(self::TEMPLATE_PATH, [
            'mode' => 'login',
            'error' => $error,
        ], $texts);
    }

    /**
     * Подтверждение email
     */
    public static function renderVerify(string $email, string $error = '', string $success = ''): string
    {
        $texts = self::texts(self::TEXTS_PATH);
        return parent::render(self::TEMPLATE_PATH, [
            'email' => $email,
            'mode' => 'verify',
            'error' => $error,
            'success' => $success,
        ], $texts);
    }
}
