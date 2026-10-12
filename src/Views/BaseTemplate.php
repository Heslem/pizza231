<?php
namespace App\Views;

/**
 * Базовый шаблонизатор проекта.
 *
 * - texts(): загрузка и кэширование JSON-текстов (страница + base.json);
 * - render(): рендер HTML-шаблона с явной передачей данных и обёрткой layout;
 * - partial(): подключение парциала с возвратом его вывода строкой.
 */
class BaseTemplate
{
    protected const BASE_TEXTS_PATH  = __DIR__ . '/../../storage/templates/base.json';
    protected const LAYOUT_PATH      = __DIR__ . '/templates/base.html.php';

    /** @var array<string, array> кэш загруженных JSON-текстов */
    private static array $cache = [];

    /**
     * Тексты по умолчанию для кафе "Бе-Бе" (используются, если JSON отсутствует)
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
     * Прочитать JSON-файл (без кэша).
     */
    private static function readJson(string $path): array
    {
        if (!is_file($path)) {
            return [];
        }
        $data = json_decode((string)file_get_contents($path), true);
        return is_array($data) ? $data : [];
    }

    /**
     * Загрузить и закэшировать объединённые тексты страницы и base.json.
     *
     * @param string $pageTextsPath путь к JSON с текстами страницы
     * @param array  $defaults      значения по умолчанию
     */
    protected static function texts(string $pageTextsPath, array $defaults = []): array
    {
        $cacheKey = $pageTextsPath;
        if (isset(self::$cache[$cacheKey])) {
            return self::$cache[$cacheKey];
        }

        // base-тексты (с дефолтами) + тексты страницы поверх
        $merged = array_replace_recursive(
            array_merge(self::getDefaultTexts(), self::readJson(self::BASE_TEXTS_PATH)),
            $defaults,
            self::readJson($pageTextsPath)
        );

        return self::$cache[$cacheKey] = $merged;
    }

    /**
     * Подключить парциал с переданными данными и вернуть его вывод.
     *
     * @param string $tpl  путь к .html.php-парциалу
     * @param array  $data переменные, доступные внутри парциала
     */
    protected static function partial(string $tpl, array $data = []): string
    {
        $render = static function () use ($tpl, $data): string {
            extract($data, EXTR_SKIP);
            ob_start();
            include $tpl;
            return ob_get_clean();
        };
        return $render();
    }

    /**
     * Отрендерить страницу целиком: HTML-шаблон контента + layout-обёртка.
     *
     * @param string $tpl     путь к .html.php-шаблону контента
     * @param array  $data    переменные для шаблона ($texts подставляется автоматически)
     * @param array  $texts   объединённые тексты (см. self::texts())
     * @param string $scripts HTML с тегами <script>/<link>, вставляется перед </body>
     */
    protected static function render(
        string $tpl,
        array $data,
        array $texts,
        string $layout = self::LAYOUT_PATH,
        string $scripts = ''
    ): string {
        $content = self::partial($tpl, $data + ['texts' => $texts]);

        // Layout получает $content и $texts
        $html = self::partial($layout, ['content' => $content, 'texts' => $texts]);

        if ($scripts !== '') {
            $html = str_replace('</body>', $scripts . '</body>', $html);
        }

        return $html;
    }
}
