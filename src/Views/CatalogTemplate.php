<?php
namespace App\Views;

class CatalogTemplate
{
    private const TEXTS_PATH = __DIR__ . '/../../storage/templates/catalog.json';

    public static function getTemplate(array $products = [], string $search = '', string $category = '', array $categories = []): string
    {
        $searchInfo = '';
        if ($search !== '') {
            $count = count($products);
            if ($count > 0) {
                $searchInfo = '<div class="alert alert-success">'
                    . str_replace('{query}', htmlspecialchars($search), 'Найдено по запросу «{query}»')
                    . ' <strong>' . $count . '</strong> ' . ($count === 1 ? 'товар' : 'товаров')
                    . '</div>';
            } else {
                $searchInfo = '<div class="alert alert-warning">'
                    . str_replace('{query}', htmlspecialchars($search), 'По запросу «{query}» ничего не найдено')
                    . '</div>';
            }
        }

        // Формируем сетку продуктов
        if (empty($products)) {
            $productsGrid = '<div class="alert alert-info">Товары отсутствуют</div>';
        } else {
            $cards = [];
            foreach ($products as $product) {
                $cards[] = self::renderCard($product);
            }
            $productsGrid = '<div class="row g-4">' . implode('', $cards) . '</div>';
        }

        return Twig::renderPage('catalog', [
            'search' => $search,
            'category' => $category,
            'searchInfo' => $searchInfo,
            'productsGrid' => $productsGrid,
            'categoryTabs' => self::renderCategoryTabs($categories, $category),
        ], self::TEXTS_PATH);
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
    public static function renderCard(array $product): string
    {
        $price = floatval($product['price'] ?? 0);
        $priceFormatted = number_format($price, 0, '.', ' ');

        $title = htmlspecialchars($product['name'] ?? '', ENT_QUOTES);
        $desc = htmlspecialchars(mb_substr($product['description'] ?? '', 0, 100), ENT_QUOTES);
        $image = $product['image'] ?? '/assets/img/no-image.jpg';

        return '<div class="col-6 col-md-4 col-lg-3"><div class="card h-100">'
            . '<img src="' . $image . '" class="card-img-top" alt="' . $title . '" onerror="this.src=\'/assets/img/no-image.jpg\'">'
            . '<div class="card-body">'
            . '<h5 class="card-title">' . $title . '</h5>'
            . '<p class="card-text">' . $desc . '</p>'
            . '</div>'
            . '<div class="card-footer">'
            . '<span class="price">' . $priceFormatted . ' ₽</span>'
            . '<button class="btn btn-primary btn-sm" data-id="' . ($product['id'] ?? '') . '">Заказать</button>'
            . '<button class="btn btn-outline-primary btn-sm" data-id="' . ($product['id'] ?? '') . '">В корзину</button>'
            . '</div>'
            . '</div></div>';
    }
}
