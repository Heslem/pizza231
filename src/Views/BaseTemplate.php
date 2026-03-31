<?php
namespace App\Views;

class BaseTemplate
{
    /**
     * Путь к файлу базового шаблона
     */
    private const TEMPLATE_PATH = __DIR__ . '/templates/base.html.php';

    /**
     * Путь к файлу с текстами
     */
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/base.json';

    /**
     * Тексты по умолчанию для кафе "Бе-Бе"
     */
    private static function getDefaultTexts(): array
    {
        return [
            'nav' => [
                'home' => 'Главная',
                'catalog' => 'Меню',
                'cart' => 'Корзина',
                'about' => 'О кафе',
                'login' => 'Вход'
            ],
            'footer' => [
                'copyright' => 'Кафе «Бе-Бе». Уйгурско-узбецкая кухня. Все права защищены.'
            ],
            'cafe' => [
                'name' => 'Кафе Бе-Бе',
                'tagline' => 'Аутентичная уйгурско-узбецкая кухня',
                'address' => 'г. Кемерово, ул. Примерная, д. 1',
                'phone' => '+7 (3842) 12-34-56',
                'workTime' => 'Ежедневно с 10:00 до 23:00'
            ]
        ];
    }

    /**
     * Загружает тексты из JSON файла
     */
    private static function loadTexts(): array
    {
        $path = self::TEXTS_PATH;
        if (!file_exists($path)) {
            return self::getDefaultTexts();
        }
        $json = file_get_contents($path);
        $loaded = json_decode($json, true) ?? [];

        // Объединяем с текстами по умолчанию
        return array_merge(self::getDefaultTexts(), $loaded);
    }

    public static function getTemplate(string $content, array $texts = []): string
    {
        // Если тексты не переданы, загружаем базовые
        if (empty($texts)) {
            $texts = self::loadTexts();
        }

        // Буферизация вывода для подключения PHP-шаблона
        ob_start();
        include self::TEMPLATE_PATH;
        return ob_get_clean();
    }
}