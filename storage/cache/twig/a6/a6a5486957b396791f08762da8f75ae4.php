<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\MacroNamespace;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* catalog.html.twig */
class __TwigTemplate_24343e27c5ac170ba6e42afcd40f7e01 extends Template
{
    private Source $source;
    /**
     * @var array<string, MacroNamespace>
     */
    private array $macros = [];
    private \Twig\Runtime\EscaperRuntime $escaper;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->escaper = $env->getRuntime('Twig\Runtime\EscaperRuntime');

        $this->blocks = [
            'styles' => [$this, 'block_styles'],
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return $this->parent ??= $this->load("base.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "<style>
/* Стили для бокового меню категорий (как KFC) */
.category-sidebar {
    position: sticky;
    top: 100px;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.category-link {
    display: block;
    padding: 0.75rem 1rem;
    color: #212529;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s ease;
    font-weight: 500;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
}

.category-link:hover {
    background: #e9ecef;
    color: #212529;
    border-color: #adb5bd;
}

.category-link.active {
    background: #212529 !important;
    color: #fff !important;
    border-color: #212529;
}

.category-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #212529;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #dee2e6;
}

.product-section {
    margin-bottom: 3rem;
    scroll-margin-top: 100px;
}

/* Адаптив для мобильных - скрываем боковое меню, показываем горизонтальное */
@media (max-width: 991px) {
    .category-sidebar {
        position: static;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .category-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.9rem;
    }

    .product-section {
        scroll-margin-top: 80px;
    }
}
</style>
";
        return; yield;
    }

    // line 73
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 74
        $context["searchText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "search", [], "any", true, true, false, 74)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "search", [], "any", false, false, false, 74), [])) : ([]));
        // line 75
        $context["toastText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "toast", [], "any", true, true, false, 75)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "toast", [], "any", false, false, false, 75), [])) : ([]));
        // line 76
        $context["modalText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "modal", [], "any", true, true, false, 76)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "modal", [], "any", false, false, false, 76), [])) : ([]));
        // line 77
        $context["titleText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "title", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "title", [], "any", false, false, false, 77), "Каталог товаров")) : ("Каталог товаров"));
        // line 78
        $context["search"] = ((array_key_exists("search", $context)) ? (Twig\Extension\CoreExtension::default(($context["search"] ?? null), "")) : (""));
        // line 79
        $context["category"] = ((array_key_exists("category", $context)) ? (Twig\Extension\CoreExtension::default(($context["category"] ?? null), "")) : (""));
        // line 80
        $context["categories"] = ((array_key_exists("categories", $context)) ? (Twig\Extension\CoreExtension::default(($context["categories"] ?? null), [])) : ([]));
        // line 81
        $context["products"] = ((array_key_exists("products", $context)) ? (Twig\Extension\CoreExtension::default(($context["products"] ?? null), [])) : ([]));
        // line 82
        yield "
<div class=\"container py-5\">
    <!-- Заголовок + Поиск -->
    <div class=\"row mb-4\">
        <div class=\"col-12 text-center\">
            <h1 class=\"display-5 fw-bold mb-4\">";
        // line 87
        yield (string) $this->escaper->escape(($context["titleText"] ?? null), "html", null, true);
        yield "</h1>

            <!-- Форма поиска -->
            <form method=\"GET\" action=\"/catalog\" class=\"col-md-6 col-lg-4 mx-auto\">
                ";
        // line 91
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["category"] ?? null))) {
            // line 92
            yield "                <input type=\"hidden\" name=\"category\" value=\"";
            yield (string) $this->escaper->escape(($context["category"] ?? null), "html", null, true);
            yield "\">
                ";
        }
        // line 94
        yield "                <div class=\"input-group input-group-lg\">
                    <span class=\"input-group-text bg-white border-end-0\">
                        <i class=\"bi bi-search text-muted\"></i>
                    </span>
                    <input
                        type=\"text\"
                        name=\"search\"
                        class=\"form-control border-start-0 ps-0\"
                        placeholder=\"";
        // line 102
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "placeholder", [], "any", true, true, false, 102)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "placeholder", [], "any", false, false, false, 102), "Поиск товаров...")) : ("Поиск товаров...")), "html", null, true);
        yield "\"
                        value=\"";
        // line 103
        yield (string) $this->escaper->escape(($context["search"] ?? null), "html", null, true);
        yield "\"
                        aria-label=\"Поиск\">
                    <button class=\"btn btn-primary px-4\" type=\"submit\">";
        // line 105
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "button", [], "any", true, true, false, 105)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "button", [], "any", false, false, false, 105), "Найти")) : ("Найти")), "html", null, true);
        yield "</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Основной контент: боковое меню + товары -->
    <div class=\"row\">
        <!-- Боковое меню категорий -->
        ";
        // line 114
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["categories"] ?? null))) {
            // line 115
            yield "        <div class=\"col-lg-3 mb-4 mb-lg-0\">
            <div class=\"category-sidebar\">
                <h5 class=\"category-title\">Категории</h5>
                ";
            // line 118
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
                // line 119
                yield "                    <a href=\"/catalog?category=";
                yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::urlencode($context["cat"]), "html", null, true);
                yield "\"
                       class=\"category-link";
                // line 120
                yield (string) ((($context["cat"] == ($context["category"] ?? null))) ? (" active") : (""));
                yield "\">";
                yield (string) $this->escaper->escape($context["cat"], "html", null, true);
                yield "</a>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['cat'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 122
            yield "            </div>
        </div>
        ";
        }
        // line 125
        yield "
        <!-- Товары -->
        <div class=\"";
        // line 127
        yield (string) (( !Twig\Extension\CoreExtension::testEmpty(($context["categories"] ?? null))) ? ("col-lg-9") : ("col-12"));
        yield "\">
            <!-- Результаты поиска -->
            ";
        // line 129
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["search"] ?? null))) {
            // line 130
            yield "                ";
            if ( !Twig\Extension\CoreExtension::testEmpty(($context["products"] ?? null))) {
                // line 131
                yield "                    <div class=\"alert alert-success\">Найдено по запросу «";
                yield (string) $this->escaper->escape(($context["search"] ?? null), "html", null, true);
                yield "» <strong>";
                yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["products"] ?? null)), "html", null, true);
                yield "</strong> ";
                yield (string) (((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["products"] ?? null)) == 1)) ? ("товар") : ("товаров"));
                yield "</div>
                ";
            } else {
                // line 133
                yield "                    <div class=\"alert alert-warning\">По запросу «";
                yield (string) $this->escaper->escape(($context["search"] ?? null), "html", null, true);
                yield "» ничего не найдено</div>
                ";
            }
            // line 135
            yield "            ";
        }
        // line 136
        yield "
            <!-- Сетка товаров -->
            ";
        // line 138
        if (Twig\Extension\CoreExtension::testEmpty(($context["products"] ?? null))) {
            // line 139
            yield "                <div class=\"alert alert-info\">Товары отсутствуют</div>
            ";
        } else {
            // line 141
            yield "                <div class=\"row g-4\">
                    ";
            // line 142
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 143
                yield "                    <div class=\"col-6 col-md-4 col-lg-3\">
                        <div class=\"card h-100\">
                            <img src=\"";
                // line 145
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", true, true, false, 145)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 145), "/assets/img/no-image.jpg")) : ("/assets/img/no-image.jpg")), "html", null, true);
                yield "\"
                                 class=\"card-img-top\"
                                 alt=\"";
                // line 147
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", true, true, false, 147)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 147), "")) : ("")), "html", null, true);
                yield "\"
                                 onerror=\"this.src=\x27/assets/img/no-image.jpg\x27\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">";
                // line 150
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", true, true, false, 150)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 150), "")) : ("")), "html", null, true);
                yield "</h5>
                                <p class=\"card-text\">";
                // line 151
                yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "description", [], "any", true, true, false, 151)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 151), "")) : ("")), 0, 100), "html", null, true);
                yield "</p>
                            </div>
                            <div class=\"card-footer\">
                                <span class=\"price\">";
                // line 154
                yield (string) $this->escaper->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", true, true, false, 154)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 154), 0)) : (0)), 0, ".", " "), "html", null, true);
                yield " ₽</span>
                                <button class=\"btn btn-primary btn-sm btn-product-details\" data-id=\"";
                // line 155
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", true, true, false, 155)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 155), "")) : ("")), "html", null, true);
                yield "\">Подробнее</button>
                                <button class=\"btn btn-outline-primary btn-sm btn-add-to-cart\"
                                        data-product=\x27";
                // line 157
                yield (string) $this->escaper->escape(json_encode(["id" => ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", true, true, false, 157)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 157), "")) : ("")), "name" => ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", true, true, false, 157)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 157), "")) : ("")), "price" => ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", true, true, false, 157)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 157), 0)) : (0)), "image" => ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", true, true, false, 157)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 157), "/assets/img/no-image.jpg")) : ("/assets/img/no-image.jpg"))]), "html_attr");
                yield "\x27
                                        data-id=\"";
                // line 158
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", true, true, false, 158)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 158), "")) : ("")), "html", null, true);
                yield "\">В корзину</button>
                            </div>
                        </div>
                    </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 163
            yield "                </div>
            ";
        }
        // line 165
        yield "        </div>
    </div>
</div>

<!-- Модальное окно товара -->
<div class=\"modal fade\" id=\"productModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 174
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "title", [], "any", true, true, false, 174)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "title", [], "any", false, false, false, 174), "Информация о товаре")) : ("Информация о товаре")), "html", null, true);
        yield "</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Закрыть\"></button>
            </div>
            <div class=\"modal-body\">
                <!-- Загружается через JS -->
            </div>
        </div>
    </div>
</div>
";
        return; yield;
    }

    // line 185
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 186
        yield "<script>
document.addEventListener(\"DOMContentLoaded\", function() {
    // Обработчики для кнопок \"Подробнее\"
    document.querySelectorAll(\x27.btn-product-details\x27).forEach(btn => {
        btn.addEventListener(\x27click\x27, function() {
            const productId = this.dataset.id;
            loadProductModal(productId);
        });
    });

    // === Плавный скролл при клике на категорию (KFC стиль) ===
    document.querySelectorAll(\x27.category-link\x27).forEach(link => {
        link.addEventListener(\x27click\x27, function(e) {
            e.preventDefault();

            document.querySelectorAll(\x27.category-link\x27).forEach(l => l.classList.remove(\x27active\x27));
            this.classList.add(\x27active\x27);

            const targetId = this.getAttribute(\x27href\x27);
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({ behavior: \x27smooth\x27, block: \x27start\x27 });
            }
        });
    });
});

// Загрузка данных товара и показ модального окна
async function loadProductModal(productId) {
    const modalEl = document.getElementById(\x27productModal\x27);
    const modalBody = modalEl.querySelector(\x27.modal-body\x27);
    const modal = new bootstrap.Modal(modalEl);

    modalBody.innerHTML = \x27<div class=\"text-center py-5\"><div class=\"spinner-border text-primary\" role=\"status\"></div></div>\x27;
    modal.show();

    try {
        const response = await fetch(\x27/api/product/\x27 + productId);
        const data = await response.json();

        if (data.notFound) {
            modalBody.innerHTML = \x27<div class=\"alert alert-warning\">";
        // line 228
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "notFound", [], "any", true, true, false, 228)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "notFound", [], "any", false, false, false, 228), "Товар не найден")) : ("Товар не найден")), "html", null, true);
        yield "</div>\x27;
            return;
        }

        const product = data;
        const priceFormatted = new Intl.NumberFormat(\x27ru-RU\x27).format(product.price);
        const image = product.image || \x27/assets/img/no-image.jpg\x27;
        const fallbackImage = \x27/assets/img/error.jpg\x27;

        const cart = CartManager ? CartManager.get() : [];
        const cartItem = cart.find(item => item.id === product.id);
        const inCart = !!cartItem;
        const quantity = cartItem ? cartItem.quantity : 1;

        const productJson = JSON.stringify({
            id: product.id,
            name: product.name,
            price: product.price,
            image: product.image
        }).replace(/\"/g, \x27&quot;\x27);

        modalBody.innerHTML = `
            <div class=\"row\">
                <div class=\"col-md-5 mb-3 mb-md-0\">
                    <img src=\"\${image}\"
                         class=\"img-fluid rounded-3 shadow-sm\"
                         alt=\"\${product.name}\"
                         style=\"width: 100%; max-height: 300px; object-fit: contain;\"
                         onerror=\"this.src=\x27\${fallbackImage}\x27; this.onerror=null;\">
                </div>
                <div class=\"col-md-7\">
                    <h5 class=\"text-uppercase fw-bold ls-1 mb-2 text-muted\" style=\"font-size: 0.8rem;\">";
        // line 259
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, true, false, 259), "label", [], "any", true, true, false, 259)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, false, false, 259), "label", [], "any", false, false, false, 259), "Наше меню")) : ("Наше меню")), "html", null, true);
        yield "</h5>
                    <h3 class=\"card-title fw-bold mb-3\">\${product.name}</h3>
                    <p class=\"card-text text-muted\" style=\"line-height: 1.6;\">\${product.description}</p>

                    <div class=\"d-flex align-items-center mb-3\">
                        <span class=\"h3 fw-bold me-3\">\${priceFormatted} ₽</span>
                        <span class=\"badge bg-success px-3 py-2 rounded-pill\">";
        // line 265
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, true, false, 265), "inStock", [], "any", true, true, false, 265)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, false, false, 265), "inStock", [], "any", false, false, false, 265), "В наличии")) : ("В наличии")), "html", null, true);
        yield "</span>
                    </div>

                    <div class=\"d-flex align-items-center gap-2\">
                        \${inCart ? `
                            <div class=\"input-group input-group-sm\" style=\"max-width: 130px;\">
                                <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"decrease\" data-id=\"\${product.id}\">−</button>
                                <input type=\"number\" class=\"form-control text-center qty-input-modal\"
                                       value=\"\${quantity}\" min=\"1\" data-id=\"\${product.id}\">
                                <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"increase\" data-id=\"\${product.id}\">+</button>
                            </div>
                        ` : `
                            <button type=\"button\"
                                    class=\"btn btn-primary btn-add-to-cart\"
                                    data-product=\"\${productJson}\"
                                    data-id=\"\${product.id}\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-cart-plus me-1\" viewBox=\"0 0 16 16\">
                                    <path d=\"M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z\"/>
                                    <path d=\"M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z\"/>
                                </svg>
                                ";
        // line 285
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, true, false, 285), "addToCart", [], "any", true, true, false, 285)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, false, false, 285), "addToCart", [], "any", false, false, false, 285), "В корзину")) : ("В корзину")), "html", null, true);
        yield "
                            </button>
                        `}
                    </div>
                </div>
            </div>
        `;

        initModalCartHandlers(product.id);

    } catch (error) {
        modalBody.innerHTML = \x27<div class=\"alert alert-danger\">";
        // line 296
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "error", [], "any", true, true, false, 296)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "error", [], "any", false, false, false, 296), "Ошибка загрузки товара")) : ("Ошибка загрузки товара")), "html", null, true);
        yield "</div>\x27;
    }
}

// Инициализация обработчиков корзины в модальном окне
function initModalCartHandlers(productId) {
    const addBtn = document.querySelector(`#productModal .btn-add-to-cart[data-id=\"\${productId}\"]`);
    if (addBtn) {
        addBtn.addEventListener(\x27click\x27, function() {
            const product = JSON.parse(this.dataset.product);
            CartManager.add(product);
            CartManager.showToast(\x27\"\x27 + product.name + \x27\" добавлен в корзину!\x27, \x27success\x27, false);

            const modalBody = document.querySelector(\x27#productModal .modal-body\x27);
            const cart = CartManager.get();
            const item = cart.find(i => i.id === productId);

            if (item) {
                const productJson = JSON.stringify({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image
                }).replace(/\"/g, \x27&quot;\x27);

                const controlsHtml = `
                    <div class=\"input-group input-group-sm\" style=\"max-width: 130px;\">
                        <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"decrease\" data-id=\"\${product.id}\">−</button>
                        <input type=\"number\" class=\"form-control text-center qty-input-modal\"
                               value=\"\${item.quantity}\" min=\"1\" data-id=\"\${product.id}\">
                        <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"increase\" data-id=\"\${product.id}\">+</button>
                    </div>
                `;

                this.outerHTML = controlsHtml;
                initModalCartHandlers(productId);
            }
        });
    }

    document.querySelectorAll(`#productModal .btn-qty-modal`).forEach(btn => {
        btn.addEventListener(\x27click\x27, function() {
            const id = parseInt(this.dataset.id);
            const input = document.querySelector(`#productModal .qty-input-modal[data-id=\"\${id}\"]`);
            let value = parseInt(input.value) || 1;

            if (this.dataset.action === \x27increase\x27) {
                value++;
            } else {
                value = Math.max(0, value - 1);
            }

            input.value = value;

            if (value === 0) {
                CartManager.remove(id);
                CartManager.showToast(\x27Товар удалён\x27, \x27success\x27, false);
                loadProductModal(id);
            } else {
                CartManager.updateQuantity(id, value);
            }
        });
    });

    document.querySelectorAll(`#productModal .qty-input-modal`).forEach(input => {
        input.addEventListener(\x27change\x27, function() {
            const id = parseInt(this.dataset.id);
            const value = parseInt(this.value) || 1;

            if (value <= 0) {
                CartManager.remove(id);
                CartManager.showToast(\x27Товар удалён\x27, \x27success\x27, false);
                loadProductModal(id);
            } else {
                CartManager.updateQuantity(id, value);
            }
        });
    });
}
</script>
";
        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "catalog.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDefaultEscapeStrategy(): string|false
    {
        return "html";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  506 => 296,  492 => 285,  469 => 265,  460 => 259,  426 => 228,  382 => 186,  375 => 185,  360 => 174,  349 => 165,  345 => 163,  333 => 158,  329 => 157,  324 => 155,  320 => 154,  314 => 151,  310 => 150,  304 => 147,  299 => 145,  295 => 143,  291 => 142,  288 => 141,  284 => 139,  282 => 138,  278 => 136,  275 => 135,  269 => 133,  259 => 131,  256 => 130,  254 => 129,  249 => 127,  245 => 125,  240 => 122,  229 => 120,  224 => 119,  220 => 118,  215 => 115,  213 => 114,  201 => 105,  196 => 103,  192 => 102,  182 => 94,  176 => 92,  174 => 91,  167 => 87,  160 => 82,  158 => 81,  156 => 80,  154 => 79,  152 => 78,  150 => 77,  148 => 76,  146 => 75,  144 => 74,  137 => 73,  65 => 4,  58 => 3,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block styles %}
<style>
/* Стили для бокового меню категорий (как KFC) */
.category-sidebar {
    position: sticky;
    top: 100px;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.category-link {
    display: block;
    padding: 0.75rem 1rem;
    color: #212529;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.2s ease;
    font-weight: 500;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
}

.category-link:hover {
    background: #e9ecef;
    color: #212529;
    border-color: #adb5bd;
}

.category-link.active {
    background: #212529 !important;
    color: #fff !important;
    border-color: #212529;
}

.category-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #212529;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #dee2e6;
}

.product-section {
    margin-bottom: 3rem;
    scroll-margin-top: 100px;
}

/* Адаптив для мобильных - скрываем боковое меню, показываем горизонтальное */
@media (max-width: 991px) {
    .category-sidebar {
        position: static;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .category-link {
        padding: 0.5rem 0.75rem;
        font-size: 0.9rem;
    }

    .product-section {
        scroll-margin-top: 80px;
    }
}
</style>
{% endblock %}

{% block content %}
{% set searchText = texts.search|default({}) %}
{% set toastText = texts.toast|default({}) %}
{% set modalText = texts.modal|default({}) %}
{% set titleText = texts.title|default(\x27Каталог товаров\x27) %}
{% set search = search|default(\x27\x27) %}
{% set category = category|default(\x27\x27) %}
{% set categories = categories|default([]) %}
{% set products = products|default([]) %}

<div class=\"container py-5\">
    <!-- Заголовок + Поиск -->
    <div class=\"row mb-4\">
        <div class=\"col-12 text-center\">
            <h1 class=\"display-5 fw-bold mb-4\">{{ titleText }}</h1>

            <!-- Форма поиска -->
            <form method=\"GET\" action=\"/catalog\" class=\"col-md-6 col-lg-4 mx-auto\">
                {% if category is not empty %}
                <input type=\"hidden\" name=\"category\" value=\"{{ category }}\">
                {% endif %}
                <div class=\"input-group input-group-lg\">
                    <span class=\"input-group-text bg-white border-end-0\">
                        <i class=\"bi bi-search text-muted\"></i>
                    </span>
                    <input
                        type=\"text\"
                        name=\"search\"
                        class=\"form-control border-start-0 ps-0\"
                        placeholder=\"{{ searchText.placeholder|default(\x27Поиск товаров...\x27) }}\"
                        value=\"{{ search }}\"
                        aria-label=\"Поиск\">
                    <button class=\"btn btn-primary px-4\" type=\"submit\">{{ searchText.button|default(\x27Найти\x27) }}</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Основной контент: боковое меню + товары -->
    <div class=\"row\">
        <!-- Боковое меню категорий -->
        {% if categories is not empty %}
        <div class=\"col-lg-3 mb-4 mb-lg-0\">
            <div class=\"category-sidebar\">
                <h5 class=\"category-title\">Категории</h5>
                {% for cat in categories %}
                    <a href=\"/catalog?category={{ cat|url_encode }}\"
                       class=\"category-link{{ cat == category ? \x27 active\x27 : \x27\x27 }}\">{{ cat }}</a>
                {% endfor %}
            </div>
        </div>
        {% endif %}

        <!-- Товары -->
        <div class=\"{{ categories is not empty ? \x27col-lg-9\x27 : \x27col-12\x27 }}\">
            <!-- Результаты поиска -->
            {% if search is not empty %}
                {% if products is not empty %}
                    <div class=\"alert alert-success\">Найдено по запросу «{{ search }}» <strong>{{ products|length }}</strong> {{ products|length == 1 ? \x27товар\x27 : \x27товаров\x27 }}</div>
                {% else %}
                    <div class=\"alert alert-warning\">По запросу «{{ search }}» ничего не найдено</div>
                {% endif %}
            {% endif %}

            <!-- Сетка товаров -->
            {% if products is empty %}
                <div class=\"alert alert-info\">Товары отсутствуют</div>
            {% else %}
                <div class=\"row g-4\">
                    {% for product in products %}
                    <div class=\"col-6 col-md-4 col-lg-3\">
                        <div class=\"card h-100\">
                            <img src=\"{{ product.image|default(\x27/assets/img/no-image.jpg\x27) }}\"
                                 class=\"card-img-top\"
                                 alt=\"{{ product.name|default(\x27\x27) }}\"
                                 onerror=\"this.src=\x27/assets/img/no-image.jpg\x27\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">{{ product.name|default(\x27\x27) }}</h5>
                                <p class=\"card-text\">{{ product.description|default(\x27\x27)|slice(0, 100) }}</p>
                            </div>
                            <div class=\"card-footer\">
                                <span class=\"price\">{{ product.price|default(0)|number_format(0, \x27.\x27, \x27 \x27) }} ₽</span>
                                <button class=\"btn btn-primary btn-sm btn-product-details\" data-id=\"{{ product.id|default(\x27\x27) }}\">Подробнее</button>
                                <button class=\"btn btn-outline-primary btn-sm btn-add-to-cart\"
                                        data-product=\x27{{ {\"id\": product.id|default(\x27\x27), \"name\": product.name|default(\x27\x27), \"price\": product.price|default(0), \"image\": product.image|default(\x27/assets/img/no-image.jpg\x27)}|json_encode|e(\x27html_attr\x27) }}\x27
                                        data-id=\"{{ product.id|default(\x27\x27) }}\">В корзину</button>
                            </div>
                        </div>
                    </div>
                    {% endfor %}
                </div>
            {% endif %}
        </div>
    </div>
</div>

<!-- Модальное окно товара -->
<div class=\"modal fade\" id=\"productModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">{{ modalText.title|default(\x27Информация о товаре\x27) }}</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Закрыть\"></button>
            </div>
            <div class=\"modal-body\">
                <!-- Загружается через JS -->
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
document.addEventListener(\"DOMContentLoaded\", function() {
    // Обработчики для кнопок \"Подробнее\"
    document.querySelectorAll(\x27.btn-product-details\x27).forEach(btn => {
        btn.addEventListener(\x27click\x27, function() {
            const productId = this.dataset.id;
            loadProductModal(productId);
        });
    });

    // === Плавный скролл при клике на категорию (KFC стиль) ===
    document.querySelectorAll(\x27.category-link\x27).forEach(link => {
        link.addEventListener(\x27click\x27, function(e) {
            e.preventDefault();

            document.querySelectorAll(\x27.category-link\x27).forEach(l => l.classList.remove(\x27active\x27));
            this.classList.add(\x27active\x27);

            const targetId = this.getAttribute(\x27href\x27);
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({ behavior: \x27smooth\x27, block: \x27start\x27 });
            }
        });
    });
});

// Загрузка данных товара и показ модального окна
async function loadProductModal(productId) {
    const modalEl = document.getElementById(\x27productModal\x27);
    const modalBody = modalEl.querySelector(\x27.modal-body\x27);
    const modal = new bootstrap.Modal(modalEl);

    modalBody.innerHTML = \x27<div class=\"text-center py-5\"><div class=\"spinner-border text-primary\" role=\"status\"></div></div>\x27;
    modal.show();

    try {
        const response = await fetch(\x27/api/product/\x27 + productId);
        const data = await response.json();

        if (data.notFound) {
            modalBody.innerHTML = \x27<div class=\"alert alert-warning\">{{ modalText.notFound|default(\x27Товар не найден\x27) }}</div>\x27;
            return;
        }

        const product = data;
        const priceFormatted = new Intl.NumberFormat(\x27ru-RU\x27).format(product.price);
        const image = product.image || \x27/assets/img/no-image.jpg\x27;
        const fallbackImage = \x27/assets/img/error.jpg\x27;

        const cart = CartManager ? CartManager.get() : [];
        const cartItem = cart.find(item => item.id === product.id);
        const inCart = !!cartItem;
        const quantity = cartItem ? cartItem.quantity : 1;

        const productJson = JSON.stringify({
            id: product.id,
            name: product.name,
            price: product.price,
            image: product.image
        }).replace(/\"/g, \x27&quot;\x27);

        modalBody.innerHTML = `
            <div class=\"row\">
                <div class=\"col-md-5 mb-3 mb-md-0\">
                    <img src=\"\${image}\"
                         class=\"img-fluid rounded-3 shadow-sm\"
                         alt=\"\${product.name}\"
                         style=\"width: 100%; max-height: 300px; object-fit: contain;\"
                         onerror=\"this.src=\x27\${fallbackImage}\x27; this.onerror=null;\">
                </div>
                <div class=\"col-md-7\">
                    <h5 class=\"text-uppercase fw-bold ls-1 mb-2 text-muted\" style=\"font-size: 0.8rem;\">{{ texts.product.label|default(\x27Наше меню\x27) }}</h5>
                    <h3 class=\"card-title fw-bold mb-3\">\${product.name}</h3>
                    <p class=\"card-text text-muted\" style=\"line-height: 1.6;\">\${product.description}</p>

                    <div class=\"d-flex align-items-center mb-3\">
                        <span class=\"h3 fw-bold me-3\">\${priceFormatted} ₽</span>
                        <span class=\"badge bg-success px-3 py-2 rounded-pill\">{{ texts.product.inStock|default(\x27В наличии\x27) }}</span>
                    </div>

                    <div class=\"d-flex align-items-center gap-2\">
                        \${inCart ? `
                            <div class=\"input-group input-group-sm\" style=\"max-width: 130px;\">
                                <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"decrease\" data-id=\"\${product.id}\">−</button>
                                <input type=\"number\" class=\"form-control text-center qty-input-modal\"
                                       value=\"\${quantity}\" min=\"1\" data-id=\"\${product.id}\">
                                <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"increase\" data-id=\"\${product.id}\">+</button>
                            </div>
                        ` : `
                            <button type=\"button\"
                                    class=\"btn btn-primary btn-add-to-cart\"
                                    data-product=\"\${productJson}\"
                                    data-id=\"\${product.id}\">
                                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-cart-plus me-1\" viewBox=\"0 0 16 16\">
                                    <path d=\"M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z\"/>
                                    <path d=\"M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z\"/>
                                </svg>
                                {{ texts.product.addToCart|default(\x27В корзину\x27) }}
                            </button>
                        `}
                    </div>
                </div>
            </div>
        `;

        initModalCartHandlers(product.id);

    } catch (error) {
        modalBody.innerHTML = \x27<div class=\"alert alert-danger\">{{ modalText.error|default(\x27Ошибка загрузки товара\x27) }}</div>\x27;
    }
}

// Инициализация обработчиков корзины в модальном окне
function initModalCartHandlers(productId) {
    const addBtn = document.querySelector(`#productModal .btn-add-to-cart[data-id=\"\${productId}\"]`);
    if (addBtn) {
        addBtn.addEventListener(\x27click\x27, function() {
            const product = JSON.parse(this.dataset.product);
            CartManager.add(product);
            CartManager.showToast(\x27\"\x27 + product.name + \x27\" добавлен в корзину!\x27, \x27success\x27, false);

            const modalBody = document.querySelector(\x27#productModal .modal-body\x27);
            const cart = CartManager.get();
            const item = cart.find(i => i.id === productId);

            if (item) {
                const productJson = JSON.stringify({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    image: product.image
                }).replace(/\"/g, \x27&quot;\x27);

                const controlsHtml = `
                    <div class=\"input-group input-group-sm\" style=\"max-width: 130px;\">
                        <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"decrease\" data-id=\"\${product.id}\">−</button>
                        <input type=\"number\" class=\"form-control text-center qty-input-modal\"
                               value=\"\${item.quantity}\" min=\"1\" data-id=\"\${product.id}\">
                        <button class=\"btn btn-outline-secondary btn-qty-modal\" data-action=\"increase\" data-id=\"\${product.id}\">+</button>
                    </div>
                `;

                this.outerHTML = controlsHtml;
                initModalCartHandlers(productId);
            }
        });
    }

    document.querySelectorAll(`#productModal .btn-qty-modal`).forEach(btn => {
        btn.addEventListener(\x27click\x27, function() {
            const id = parseInt(this.dataset.id);
            const input = document.querySelector(`#productModal .qty-input-modal[data-id=\"\${id}\"]`);
            let value = parseInt(input.value) || 1;

            if (this.dataset.action === \x27increase\x27) {
                value++;
            } else {
                value = Math.max(0, value - 1);
            }

            input.value = value;

            if (value === 0) {
                CartManager.remove(id);
                CartManager.showToast(\x27Товар удалён\x27, \x27success\x27, false);
                loadProductModal(id);
            } else {
                CartManager.updateQuantity(id, value);
            }
        });
    });

    document.querySelectorAll(`#productModal .qty-input-modal`).forEach(input => {
        input.addEventListener(\x27change\x27, function() {
            const id = parseInt(this.dataset.id);
            const value = parseInt(this.value) || 1;

            if (value <= 0) {
                CartManager.remove(id);
                CartManager.showToast(\x27Товар удалён\x27, \x27success\x27, false);
                loadProductModal(id);
            } else {
                CartManager.updateQuantity(id, value);
            }
        });
    });
}
</script>
{% endblock %}
", "catalog.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\catalog.html.twig");
    }
}
