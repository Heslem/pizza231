<?php
namespace App\Views;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

class Twig
{
    private static ?Environment $env = null;

    private const TEMPLATES_PATH = __DIR__ . '/templates/';
    private const CACHE_PATH     = __DIR__ . '/../../storage/cache/twig/';
    private const BASE_TEXTS_PATH = __DIR__ . '/../../storage/templates/base.json';

    /**
     * Получить Environment (для тестов и partial-рендеринга).
     */
    public static function getEnvironment(): Environment
    {
        return self::initEnvironment();
    }

    /**
     * Получить экземпляр Environment (синглтон).
     */
    private static function initEnvironment(): Environment
    {
        if (self::$env !== null) {
            return self::$env;
        }

        // Создаём директорию кэша, если нет
        if (!is_dir(self::CACHE_PATH)) {
            mkdir(self::CACHE_PATH, 0777, true);
        }

        $loader = new FilesystemLoader(self::TEMPLATES_PATH);
        self::$env = new Environment($loader, [
            'cache' => self::CACHE_PATH,
            'debug' => true,
            'auto_reload' => true,
        ]);

        // Кастомные фильтры
        self::$env->addFilter(new TwigFilter('status_badge', function(string $status, array $texts = []): string {
            $map = [
                'new'        => ['text' => $texts['statusNew'] ?? 'Новый',        'class' => 'bg-primary'],
                'processing' => ['text' => $texts['statusProcessing'] ?? 'В обработке', 'class' => 'bg-warning text-dark'],
                'completed'  => ['text' => $texts['statusCompleted'] ?? 'Выполнен', 'class' => 'bg-success'],
                'cancelled'  => ['text' => $texts['statusCancelled'] ?? 'Отменён',   'class' => 'bg-danger'],
            ];
            $cfg = $map[$status] ?? ['text' => $status, 'class' => 'bg-secondary'];
            return '<span class="badge ' . $cfg['class'] . '">' . htmlspecialchars($cfg['text']) . '</span>';
        }));

        return self::$env;
    }

    /**
     * Загрузить JSON-тексты страницы и объединить с base.json.
     */
    private static function loadTexts(string $pageTextsPath): array
    {
        $defaults = self::getDefaultTexts();
        $base = is_file(self::BASE_TEXTS_PATH)
            ? json_decode(file_get_contents(self::BASE_TEXTS_PATH), true)
            : [];
        $page = is_file($pageTextsPath)
            ? json_decode(file_get_contents($pageTextsPath), true)
            : [];

        return array_replace_recursive($defaults, $base, $page);
    }

    /**
     * Тексты по умолчанию для кафе "Бе-Бе".
     */
    private static function getDefaultTexts(): array
    {
        return [
            'nav' => [
                'home' => 'Главная',
                'catalog' => 'Меню',
                'cart' => 'Корзина',
                'about' => 'О кафе',
                'login' => 'Вход',
            ],
            'footer' => [
                'copyright' => 'Кафе «Бе-Бе». Уйгурско-узбецкая кухня. Все права защищены.',
            ],
            'cafe' => [
                'name' => 'Кафе Бе-Бе',
                'tagline' => 'Аутентичная уйгурско-узбецкая кухня',
                'address' => 'г. Кемерово, ул. Примерная, д. 1',
                'phone' => '+7 (3842) 12-34-56',
                'workTime' => 'Ежедневно с 10:00 до 23:00',
            ],
        ];
    }

    /**
     * Отрендерить страницу: шаблон extends base.html.twig.
     *
     * @param string $template  имя шаблона без расширения (например, 'home')
     * @param array  $data      данные для шаблона
     * @param string $textsPath путь к JSON-файлу текстов страницы
     * @return string HTML
     */
    public static function renderPage(string $template, array $data, string $textsPath): string
    {
        $data['texts'] = self::loadTexts($textsPath);
        return self::initEnvironment()->render($template . '.html.twig', $data);
    }
}
