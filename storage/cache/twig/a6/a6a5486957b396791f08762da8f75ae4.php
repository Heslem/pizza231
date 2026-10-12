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
        $context["categoryTabs"] = ((array_key_exists("categoryTabs", $context)) ? (Twig\Extension\CoreExtension::default(($context["categoryTabs"] ?? null), "")) : (""));
        // line 81
        $context["searchInfo"] = ((array_key_exists("searchInfo", $context)) ? (Twig\Extension\CoreExtension::default(($context["searchInfo"] ?? null), "")) : (""));
        // line 82
        $context["productsGrid"] = ((array_key_exists("productsGrid", $context)) ? (Twig\Extension\CoreExtension::default(($context["productsGrid"] ?? null), "")) : (""));
        // line 83
        yield "
<div class=\"container py-5\">
    <!-- Заголовок + Поиск -->
    <div class=\"row mb-4\">
        <div class=\"col-12 text-center\">
            <h1 class=\"display-5 fw-bold mb-4\">";
        // line 88
        yield (string) $this->escaper->escape(($context["titleText"] ?? null), "html", null, true);
        yield "</h1>

            <!-- Форма поиска -->
            <form method=\"GET\" action=\"/catalog\" class=\"col-md-6 col-lg-4 mx-auto\">
                ";
        // line 92
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["category"] ?? null))) {
            // line 93
            yield "                <input type=\"hidden\" name=\"category\" value=\"";
            yield (string) $this->escaper->escape(($context["category"] ?? null), "html", null, true);
            yield "\">
                ";
        }
        // line 95
        yield "                <div class=\"input-group input-group-lg\">
                    <span class=\"input-group-text bg-white border-end-0\">
                        <i class=\"bi bi-search text-muted\"></i>
                    </span>
                    <input
                        type=\"text\"
                        name=\"search\"
                        class=\"form-control border-start-0 ps-0\"
                        placeholder=\"";
        // line 103
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "placeholder", [], "any", true, true, false, 103)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "placeholder", [], "any", false, false, false, 103), "Поиск товаров...")) : ("Поиск товаров...")), "html", null, true);
        yield "\"
                        value=\"";
        // line 104
        yield (string) $this->escaper->escape(($context["search"] ?? null), "html", null, true);
        yield "\"
                        aria-label=\"Поиск\">
                    <button class=\"btn btn-primary px-4\" type=\"submit\">";
        // line 106
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "button", [], "any", true, true, false, 106)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["searchText"] ?? null), "button", [], "any", false, false, false, 106), "Найти")) : ("Найти")), "html", null, true);
        yield "</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Основной контент: боковое меню + товары -->
    <div class=\"row\">
        <!-- Боковое меню категорий -->
        ";
        // line 115
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["categoryTabs"] ?? null))) {
            // line 116
            yield "        <div class=\"col-lg-3 mb-4 mb-lg-0\">
            ";
            // line 117
            yield (string) ($context["categoryTabs"] ?? null);
            yield "
        </div>
        ";
        }
        // line 120
        yield "
        <!-- Товары -->
        <div class=\"";
        // line 122
        yield (string) (( !Twig\Extension\CoreExtension::testEmpty(($context["categoryTabs"] ?? null))) ? ("col-lg-9") : ("col-12"));
        yield "\">
            <!-- Результаты поиска -->
            ";
        // line 124
        yield (string) ($context["searchInfo"] ?? null);
        yield "

            <!-- Секции товаров -->
            ";
        // line 127
        yield (string) ($context["productsGrid"] ?? null);
        yield "
        </div>
    </div>
</div>

<!-- Полноэкранный Toast -->
<div id=\"fullscreenToast\" class=\"fullscreen-toast\" aria-hidden=\"true\">
    <button class=\"toast-close\" id=\"closeFullscreenToast\" aria-label=\"Закрыть\">
        <i class=\"bi bi-x-lg\"></i>
    </button>

    <video class=\"toast-video\" id=\"toastVideo\" autoplay muted playsinline loop>
        <source src=\"/assets/img/cart_video.mp4\" type=\"video/mp4\">
        Ваш браузер не поддерживает видео.
    </video>

    <div class=\"toast-message\" id=\"fullscreenToastMessage\">
        ";
        // line 144
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["toastText"] ?? null), "addedWithEmoji", [], "any", true, true, false, 144)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["toastText"] ?? null), "addedWithEmoji", [], "any", false, false, false, 144), "🎉 Товар добавлен в корзину!")) : ("🎉 Товар добавлен в корзину!")), "html", null, true);
        yield "
    </div>
</div>

<!-- Стандартный Toast -->
<div class=\"toast-container position-fixed bottom-0 end-0 p-3\">
    <div id=\"cartToast\" class=\"toast align-items-center text-bg-success border-0\" role=\"alert\">
        <div class=\"d-flex\">
            <div class=\"toast-body\">
                <i class=\"bi bi-check-circle-fill me-2\"></i>
                <span id=\"toastMessage\">";
        // line 154
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["toastText"] ?? null), "added", [], "any", true, true, false, 154)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["toastText"] ?? null), "added", [], "any", false, false, false, 154), "Товар добавлен в корзину!")) : ("Товар добавлен в корзину!")), "html", null, true);
        yield "</span>
            </div>
            <button type=\"button\" class=\"btn-close btn-close-white me-2 m-auto\" data-bs-dismiss=\"toast\"></button>
        </div>
    </div>
</div>

<!-- Модальное окно товара -->
<div class=\"modal fade\" id=\"productModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-dialog-centered modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 166
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "title", [], "any", true, true, false, 166)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "title", [], "any", false, false, false, 166), "Информация о товаре")) : ("Информация о товаре")), "html", null, true);
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

    // line 177
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 178
        yield "<script>
document.addEventListener(\"DOMContentLoaded\", function() {
    const toastEl = document.getElementById(\"cartToast\");
    if (toastEl && typeof bootstrap !== \"undefined\") {
        window.cartToast = new bootstrap.Toast(toastEl, { delay: 3000 });
    }

    // Закрытие полноэкранного toast
    document.getElementById(\x27closeFullscreenToast\x27)?.addEventListener(\x27click\x27, function() {
        const toast = document.getElementById(\x27fullscreenToast\x27);
        toast.classList.remove(\x27show\x27);
        toast.setAttribute(\x27aria-hidden\x27, \x27true\x27);
        document.body.classList.remove(\x27toast-open\x27);
    });

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
        // line 233
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "notFound", [], "any", true, true, false, 233)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "notFound", [], "any", false, false, false, 233), "Товар не найден")) : ("Товар не найден")), "html", null, true);
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
        // line 264
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, true, false, 264), "label", [], "any", true, true, false, 264)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, false, false, 264), "label", [], "any", false, false, false, 264), "Наше меню")) : ("Наше меню")), "html", null, true);
        yield "</h5>
                    <h3 class=\"card-title fw-bold mb-3\">\${product.name}</h3>
                    <p class=\"card-text text-muted\" style=\"line-height: 1.6;\">\${product.description}</p>

                    <div class=\"d-flex align-items-center mb-3\">
                        <span class=\"h3 fw-bold me-3\">\${priceFormatted} ₽</span>
                        <span class=\"badge bg-success px-3 py-2 rounded-pill\">";
        // line 270
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, true, false, 270), "inStock", [], "any", true, true, false, 270)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, false, false, 270), "inStock", [], "any", false, false, false, 270), "В наличии")) : ("В наличии")), "html", null, true);
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
        // line 290
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, true, false, 290), "addToCart", [], "any", true, true, false, 290)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "product", [], "any", false, false, false, 290), "addToCart", [], "any", false, false, false, 290), "В корзину")) : ("В корзину")), "html", null, true);
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
        // line 301
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "error", [], "any", true, true, false, 301)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["modalText"] ?? null), "error", [], "any", false, false, false, 301), "Ошибка загрузки товара")) : ("Ошибка загрузки товара")), "html", null, true);
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
        return array (  448 => 301,  434 => 290,  411 => 270,  402 => 264,  368 => 233,  311 => 178,  304 => 177,  289 => 166,  274 => 154,  261 => 144,  241 => 127,  235 => 124,  230 => 122,  226 => 120,  220 => 117,  217 => 116,  215 => 115,  203 => 106,  198 => 104,  194 => 103,  184 => 95,  178 => 93,  176 => 92,  169 => 88,  162 => 83,  160 => 82,  158 => 81,  156 => 80,  154 => 79,  152 => 78,  150 => 77,  148 => 76,  146 => 75,  144 => 74,  137 => 73,  65 => 4,  58 => 3,  47 => 1,);
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
{% set searchText = texts.search|default([]) %}
{% set toastText = texts.toast|default([]) %}
{% set modalText = texts.modal|default([]) %}
{% set titleText = texts.title|default(\x27Каталог товаров\x27) %}
{% set search = search|default(\x27\x27) %}
{% set category = category|default(\x27\x27) %}
{% set categoryTabs = categoryTabs|default(\x27\x27) %}
{% set searchInfo = searchInfo|default(\x27\x27) %}
{% set productsGrid = productsGrid|default(\x27\x27) %}

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
        {% if categoryTabs is not empty %}
        <div class=\"col-lg-3 mb-4 mb-lg-0\">
            {{ categoryTabs|raw }}
        </div>
        {% endif %}

        <!-- Товары -->
        <div class=\"{{ categoryTabs is not empty ? \x27col-lg-9\x27 : \x27col-12\x27 }}\">
            <!-- Результаты поиска -->
            {{ searchInfo|raw }}

            <!-- Секции товаров -->
            {{ productsGrid|raw }}
        </div>
    </div>
</div>

<!-- Полноэкранный Toast -->
<div id=\"fullscreenToast\" class=\"fullscreen-toast\" aria-hidden=\"true\">
    <button class=\"toast-close\" id=\"closeFullscreenToast\" aria-label=\"Закрыть\">
        <i class=\"bi bi-x-lg\"></i>
    </button>

    <video class=\"toast-video\" id=\"toastVideo\" autoplay muted playsinline loop>
        <source src=\"/assets/img/cart_video.mp4\" type=\"video/mp4\">
        Ваш браузер не поддерживает видео.
    </video>

    <div class=\"toast-message\" id=\"fullscreenToastMessage\">
        {{ toastText.addedWithEmoji|default(\x27🎉 Товар добавлен в корзину!\x27) }}
    </div>
</div>

<!-- Стандартный Toast -->
<div class=\"toast-container position-fixed bottom-0 end-0 p-3\">
    <div id=\"cartToast\" class=\"toast align-items-center text-bg-success border-0\" role=\"alert\">
        <div class=\"d-flex\">
            <div class=\"toast-body\">
                <i class=\"bi bi-check-circle-fill me-2\"></i>
                <span id=\"toastMessage\">{{ toastText.added|default(\x27Товар добавлен в корзину!\x27) }}</span>
            </div>
            <button type=\"button\" class=\"btn-close btn-close-white me-2 m-auto\" data-bs-dismiss=\"toast\"></button>
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
    const toastEl = document.getElementById(\"cartToast\");
    if (toastEl && typeof bootstrap !== \"undefined\") {
        window.cartToast = new bootstrap.Toast(toastEl, { delay: 3000 });
    }

    // Закрытие полноэкранного toast
    document.getElementById(\x27closeFullscreenToast\x27)?.addEventListener(\x27click\x27, function() {
        const toast = document.getElementById(\x27fullscreenToast\x27);
        toast.classList.remove(\x27show\x27);
        toast.setAttribute(\x27aria-hidden\x27, \x27true\x27);
        document.body.classList.remove(\x27toast-open\x27);
    });

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
