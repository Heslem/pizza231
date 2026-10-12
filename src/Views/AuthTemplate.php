<?php
namespace App\Views;

class AuthTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/auth.json';

    /**
     * Регистрация
     */
    public static function renderRegister(string $error = '', string $success = ''): string
    {
        return Twig::renderPage('auth', [
            'mode' => 'register',
            'error' => $error,
            'success' => $success,
        ], self::TEXTS_PATH);
    }

    /**
     * Вход
     */
    public static function renderLogin(string $error = ''): string
    {
        return Twig::renderPage('auth', [
            'mode' => 'login',
            'error' => $error,
        ], self::TEXTS_PATH);
    }

    /**
     * Подтверждение email
     */
    public static function renderVerify(string $email, string $error = '', string $success = ''): string
    {
        return Twig::renderPage('auth', [
            'email' => $email,
            'mode' => 'verify',
            'error' => $error,
            'success' => $success,
        ], self::TEXTS_PATH);
    }
}
