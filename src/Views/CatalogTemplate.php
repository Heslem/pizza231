<?php
namespace App\Views;

class CatalogTemplate extends BaseTemplate
{
    private const TEMPLATE_PATH = __DIR__ . '/templates/catalog.html.php';
    private const TEXTS_PATH    = __DIR__ . '/../../storage/templates/catalog.json';

    public static function getTemplate(array $products = [], string $search = '', string $category = '', array $categories = []): string
    {
        $texts = self::texts(self::TEXTS_PATH);

        // Поисковая информация
        $searchInfo = false;
        if ($search !== '') {
            $searchInfo = [
                'query' => $search,
                'count' => count($products),
                'empty' => count($products) === 0,
                'emptyText' => count($products) === 0
                    ? str_replace('{query}', $search, $texts['search_empty_text'] ?? 'По запросу «{query}» ничего не найдено')
                    : '',
            ];
        }

        // Формируем сетку продуктов
        if (empty($products)) {
            $productsGrid = '<div class="alert alert-info">' . ($texts['no_products'] ?? 'Товары отсутствуют') . '</div>';
        } else {
            $cards = [];
            foreach ($products as $product) {
                $cards[] = self::renderCard($product, $texts);
            }
            $productsGrid = '<div class="row g-4">' . implode('', $cards) . '</div>';
        }

        return parent::render(self::TEMPLATE_PATH, [
            'search' => $search,
            'category' => $category,
            'categories' => $categories,
            'searchInfo' => $searchInfo,
            'productsGrid' => $productsGrid,
            'categoryTabs' => self::renderCategoryTabs($categories, $category),
            'texts' => $texts,
        ], $texts);
    }

    /**
     * Рендер бокового меню категорий
     */
    private static function renderCategoryTabs(array $categories, string $activeCategory): string
    {
        if (empty($categories)) {
            return '';
        }

        $tabs = '<div class="category-sidebar"><h5 class="category-title">Категории</h5>';
        foreach ($categories as $cat) {
            $active = $cat === $activeCategory ? ' active' : '';
            $tabs .= '<a href="/catalog?category=' . urlencode($cat) . '" class="category-link' . $active . '">'
                . htmlspecialchars($cat) . '</a>';
        }
        $tabs .= '</div>';

        return $tabs;
    }

    /**
     * Рендер карточки товара
     */
    public static function renderCard(array $product, array $texts = []): string
    {
        if (empty($texts)) {
            $texts = self::texts(self::TEXTS_PATH);
        }

        $price = floatval($product['price'] ?? 0);
        $priceFormatted = number_format($price, 0, '.', ' ');

        $title = htmlspecialchars($product['name'] ?? '', ENT_QUOTES);
        $desc = htmlspecialchars(mb_substr($product['description'] ?? '', 0, 100), ENT_QUOTES);
        $image = $product['image'] ?? '/assets/img/no-image.jpg';

        $addToCart = $texts['add_to_cart'] ?? 'В корзину';
        $orderBtn = $texts['order_button'] ?? 'Заказать';
        $currency = $texts['currency'] ?? '₽';

        return '<div class="col-6 col-md-4 col-lg-3"><div class="card h-100">'
            . '<img src="' . $image . '" class="card-img-top" alt="' . $title . '" onerror="this.src=\'/assets/img/no-image.jpg\'">'
            . '<div class="card-body">'
            . '<h5 class="card-title">' . $title . '</h5>'
            . '<p class="card-text">' . $desc . '</p>'
            . '</div>'
            . '<div class="card-footer">'
            . '<span class="price">' . $priceFormatted . ' ' . $currency . '</span>'
            . '<button class="btn btn-primary btn-sm" data-id="' . ($product['id'] ?? '') . '">' . $orderBtn . '</button>'
            . '<button class="btn btn-outline-primary btn-sm" data-id="' . ($product['id'] ?? '') . '">' . $addToCart . '</button>'
            . '</div>'
            . '</div></div>';
    }
}
