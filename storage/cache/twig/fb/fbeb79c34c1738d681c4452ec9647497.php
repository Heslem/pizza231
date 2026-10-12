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

/* base.html.twig */
class __TwigTemplate_fcf120500d39410da2659df20dcff844 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'styles' => [$this, 'block_styles'],
            'content' => [$this, 'block_content'],
            'scripts' => [$this, 'block_scripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        $context["navText"] = ((array_key_exists("navText", $context)) ? (Twig\Extension\CoreExtension::default(($context["navText"] ?? null), [])) : ([]));
        // line 2
        $context["footerText"] = ((array_key_exists("footerText", $context)) ? (Twig\Extension\CoreExtension::default(($context["footerText"] ?? null), [])) : ([]));
        // line 3
        $context["cafeInfo"] = ((array_key_exists("cafeInfo", $context)) ? (Twig\Extension\CoreExtension::default(($context["cafeInfo"] ?? null), [])) : ([]));
        // line 4
        $context["pickupPoints"] = ((array_key_exists("pickupPoints", $context)) ? (Twig\Extension\CoreExtension::default(($context["pickupPoints"] ?? null), [])) : ([]));
        // line 5
        $context["checkoutText"] = ((array_key_exists("checkoutText", $context)) ? (Twig\Extension\CoreExtension::default(($context["checkoutText"] ?? null), [])) : ([]));
        // line 6
        yield "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 11
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", true, true, false, 11)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", false, false, false, 11), "Кафе Бе-Бе")) : ("Кафе Бе-Бе")), "html", null, true);
        yield " - Уйгурско-узбецкая кухня</title>

    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/assets/css/style.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css\">
    <link href=\"https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap\" rel=\"stylesheet\">
    ";
        // line 17
        yield from $this->unwrap()->yieldBlock('styles', $context, $blocks);
        // line 18
        yield "</head>
<body>
    <!-- Фиксированная навигация -->
    <nav class=\"navbar navbar-expand-lg navbar-dark fixed-top\">
        <div class=\"container\">
            <a class=\"navbar-brand d-flex align-items-center\" href=\"/\">
                <div class=\"logo-icon me-2\">
                    <i class=\"bi bi-cup-hot-fill\"></i>
                </div>
                <div class=\"logo-text\">
                    <span class=\"brand-name\">";
        // line 28
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", true, true, false, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", false, false, false, 28), "Бе-Бе")) : ("Бе-Бе")), "html", null, true);
        yield "</span>
                    <span class=\"brand-tagline\">";
        // line 29
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", true, true, false, 29)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", false, false, false, 29), "Уйгурско-узбецкая кухня")) : ("Уйгурско-узбецкая кухня")), "html", null, true);
        yield "</span>
                </div>
            </a>

            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav ms-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/\">";
        // line 40
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "home", [], "any", true, true, false, 40)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "home", [], "any", false, false, false, 40), "Главная")) : ("Главная")), "html", null, true);
        yield "</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/catalog\">";
        // line 43
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "catalog", [], "any", true, true, false, 43)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "catalog", [], "any", false, false, false, 43), "Меню")) : ("Меню")), "html", null, true);
        yield "</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/about\">";
        // line 46
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "about", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "about", [], "any", false, false, false, 46), "О кафе")) : ("О кафе")), "html", null, true);
        yield "</a>
                    </li>
                    <!-- Авторизация загружается через JavaScript -->
                    <li class=\"nav-item\" id=\"auth-nav-item\">
                        <a class=\"nav-link\" href=\"/login\">
                            <i class=\"bi bi-person me-1\"></i>";
        // line 51
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "login", [], "any", true, true, false, 51)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "login", [], "any", false, false, false, 51), "Вход")) : ("Вход")), "html", null, true);
        yield "
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Отступ для фиксированной навигации -->
    <div style=\"height: 80px;\"></div>

    <main>
        ";
        // line 63
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 64
        yield "    </main>

    <footer class=\"footer py-4\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-4 mb-3 mb-md-0\">
                    <div class=\"footer-brand mb-2\">
                        <i class=\"bi bi-cup-hot-fill me-2\"></i>
                        <span class=\"fw-bold\">";
        // line 72
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", true, true, false, 72)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", false, false, false, 72), "Кафе Бе-Бе")) : ("Кафе Бе-Бе")), "html", null, true);
        yield "</span>
                    </div>
                    <p class=\"footer-text mb-0\">";
        // line 74
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", true, true, false, 74)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", false, false, false, 74), "Аутентичная уйгурско-узбецкая кухня")) : ("Аутентичная уйгурско-узбецкая кухня")), "html", null, true);
        yield "</p>
                </div>
                <div class=\"col-md-4 mb-3 mb-md-0\">
                    <h6 class=\"footer-heading mb-2\"><i class=\"bi bi-geo-alt me-1\"></i>Адрес</h6>
                    <p class=\"footer-text mb-1\">";
        // line 78
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "address", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "address", [], "any", false, false, false, 78), "г. Кемерово, ул. Примерная, д. 1")) : ("г. Кемерово, ул. Примерная, д. 1")), "html", null, true);
        yield "</p>
                    <p class=\"footer-text mb-0\"><i class=\"bi bi-clock me-1\"></i>";
        // line 79
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "workTime", [], "any", true, true, false, 79)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "workTime", [], "any", false, false, false, 79), "Ежедневно с 10:00 до 23:00")) : ("Ежедневно с 10:00 до 23:00")), "html", null, true);
        yield "</p>
                </div>
                <div class=\"col-md-4\">
                    <h6 class=\"footer-heading mb-2\"><i class=\"bi bi-telephone me-1\"></i>Контакты</h6>
                    <p class=\"footer-text mb-1\">
                        <a href=\"tel:";
        // line 84
        yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::replace(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", true, true, false, 84)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", false, false, false, 84), "")) : ("")), [" " => "", "-" => "", "(" => "", ")" => ""]), "html", null, true);
        yield "\" class=\"footer-link\">
                            ";
        // line 85
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", true, true, false, 85)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", false, false, false, 85), "+7 (3842) 12-34-56")) : ("+7 (3842) 12-34-56")), "html", null, true);
        yield "
                        </a>
                    </p>
                    <p class=\"footer-text mb-0\">&copy; 2026 ";
        // line 88
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["footerText"] ?? null), "copyright", [], "any", true, true, false, 88)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["footerText"] ?? null), "copyright", [], "any", false, false, false, 88), "Кафе «Бе-Бе». Все права защищены.")) : ("Кафе «Бе-Бе». Все права защищены.")), "html", null, true);
        yield "</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Плавающая кнопка корзины в правом нижнем углу -->
    <button class=\"cart-floating-btn\" id=\"cartFloatingBtn\" aria-label=\"Открыть корзину\">
        <i class=\"bi bi-cart3\"></i>
        <span class=\"cart-floating-counter badge bg-danger rounded-pill\" id=\"cartFloatingCounter\" style=\"display: none;\">0</span>
    </button>

    <!-- Slide-out панель корзины -->
    <div class=\"cart-slide-panel\" id=\"cartSlidePanel\">
        <div class=\"cart-slide-header\">
            <h5 class=\"mb-0\"><i class=\"bi bi-cart3 me-2\"></i>Корзина</h5>
            <button class=\"btn-close\" id=\"closeCartPanel\" aria-label=\"Закрыть\"></button>
        </div>
        <div class=\"cart-slide-body\" id=\"cartSlideBody\">
            <!-- Загружается через JS -->
            <div class=\"text-center py-5\">
                <div class=\"spinner-border text-primary\" role=\"status\"></div>
            </div>
        </div>
        <div class=\"cart-slide-footer\" id=\"cartSlideFooter\" style=\"display: none;\">
            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                <span class=\"text-muted\">Итого:</span>
                <span class=\"h4 mb-0 text-success\" id=\"cartSlideTotal\">0 ₽</span>
            </div>
            <button class=\"btn btn-success w-100 btn-lg\" id=\"checkoutFromPanel\">
                <i class=\"bi bi-check-circle me-2\"></i>Оформить заказ
            </button>
        </div>
    </div>

    <!-- Slide-out панель оформления заказа -->
    <div class=\"cart-slide-panel\" id=\"checkoutSlidePanel\">
        <div class=\"cart-slide-header\">
            <h5 class=\"mb-0\"><i class=\"bi bi-check2-square me-2\"></i>Оформление заказа</h5>
            <button class=\"btn-close\" id=\"closeCheckoutPanel\" aria-label=\"Закрыть\"></button>
        </div>
        <div class=\"cart-slide-body\">
            <form id=\"checkout-form-panel\">
                ";
        // line 131
        yield from $this->load("_checkout_form.html.twig", 131)->unwrap()->yield(CoreExtension::toArray(["idPrefix" => "checkout-", "radioSuffix" => "", "deliveryCls" => "delivery-fields", "pickupCls" => "pickup-fields", "pickupId" => "pickup-point", "checkoutText" =>         // line 137
($context["checkoutText"] ?? null), "pickupPoints" =>         // line 138
($context["pickupPoints"] ?? null)]));
        // line 140
        yield "                <hr>
                <div class=\"d-flex justify-content-between align-items-center\">
                    <span>";
        // line 142
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["checkoutText"] ?? null), "totalToPay", [], "any", true, true, false, 142)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["checkoutText"] ?? null), "totalToPay", [], "any", false, false, false, 142), "Итого к оплате:")) : ("Итого к оплате:")), "html", null, true);
        yield "</span>
                    <span class=\"h5 mb-0 text-success\" id=\"checkoutTotalAmount\">0 ₽</span>
                </div>
            </form>
        </div>
        <div class=\"cart-slide-footer\">
            <button class=\"btn btn-outline-secondary w-100 mb-2\" id=\"backToCartPanel\">
                <i class=\"bi bi-arrow-left me-2\"></i>Назад к корзине
            </button>
            <button class=\"btn btn-success w-100 btn-lg\" id=\"submitOrderPanel\">
                <span class=\"spinner-border spinner-border-sm d-none me-2\" role=\"status\"></span>
                <span class=\"btn-text\">Подтвердить заказ</span>
            </button>
        </div>
    </div>

    <!-- Затемнение фона для панелей -->
    <div class=\"cart-overlay\" id=\"cartOverlay\"></div>

    <script>
    // Переключение полей Самовывоз/Доставка
    document.addEventListener(\x27DOMContentLoaded\x27, function() {
        const deliveryTypeRadios = document.querySelectorAll(\x27input[name=\"deliveryType\"]\x27);
        const deliveryFields = document.querySelectorAll(\x27.delivery-fields\x27);
        const pickupFields = document.querySelectorAll(\x27.pickup-fields\x27);
        const addressInput = document.getElementById(\x27checkout-address\x27);
        const pickupSelect = document.getElementById(\x27pickup-point\x27);

        function updateFields() {
            const isDelivery = document.getElementById(\x27deliveryTypeDelivery\x27).checked;

            if (isDelivery) {
                deliveryFields.forEach(f => f.classList.remove(\x27d-none\x27));
                pickupFields.forEach(f => f.classList.add(\x27d-none\x27));
                addressInput.setAttribute(\x27required\x27, \x27required\x27);
                pickupSelect.removeAttribute(\x27required\x27);
                pickupSelect.removeAttribute(\x27name\x27);
                addressInput.setAttribute(\x27name\x27, \x27address\x27);
            } else {
                deliveryFields.forEach(f => f.classList.add(\x27d-none\x27));
                pickupFields.forEach(f => f.classList.remove(\x27d-none\x27));
                addressInput.removeAttribute(\x27required\x27);
                addressInput.removeAttribute(\x27name\x27);
                pickupSelect.setAttribute(\x27required\x27, \x27required\x27);
                pickupSelect.setAttribute(\x27name\x27, \x27address\x27);
            }
        }

        deliveryTypeRadios.forEach(radio => {
            radio.addEventListener(\x27change\x27, updateFields);
        });

        // Инициализация при загрузке
        updateFields();
    });
    </script>

    ";
        // line 199
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 200
        yield "
    ";
        // line 201
        yield from $this->load("_toasts.html.twig", 201)->unwrap()->yield($context);
        // line 202
        yield "
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"/assets/js/cart.js\"></script>
</body>
</html>
";
        return; yield;
    }

    // line 17
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        return; yield;
    }

    // line 63
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        return; yield;
    }

    // line 199
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  340 => 199,  330 => 63,  320 => 17,  310 => 202,  308 => 201,  305 => 200,  303 => 199,  243 => 142,  239 => 140,  237 => 138,  236 => 137,  235 => 131,  189 => 88,  183 => 85,  179 => 84,  171 => 79,  167 => 78,  160 => 74,  155 => 72,  145 => 64,  143 => 63,  128 => 51,  120 => 46,  114 => 43,  108 => 40,  94 => 29,  90 => 28,  78 => 18,  76 => 17,  67 => 11,  60 => 6,  58 => 5,  56 => 4,  54 => 3,  52 => 2,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set navText = navText|default({}) %}
{% set footerText = footerText|default({}) %}
{% set cafeInfo = cafeInfo|default({}) %}
{% set pickupPoints = pickupPoints|default([]) %}
{% set checkoutText = checkoutText|default({}) %}
<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{{ cafeInfo.name|default(\x27Кафе Бе-Бе\x27) }} - Уйгурско-узбецкая кухня</title>

    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/assets/css/style.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css\">
    <link href=\"https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap\" rel=\"stylesheet\">
    {% block styles %}{% endblock %}
</head>
<body>
    <!-- Фиксированная навигация -->
    <nav class=\"navbar navbar-expand-lg navbar-dark fixed-top\">
        <div class=\"container\">
            <a class=\"navbar-brand d-flex align-items-center\" href=\"/\">
                <div class=\"logo-icon me-2\">
                    <i class=\"bi bi-cup-hot-fill\"></i>
                </div>
                <div class=\"logo-text\">
                    <span class=\"brand-name\">{{ cafeInfo.name|default(\x27Бе-Бе\x27) }}</span>
                    <span class=\"brand-tagline\">{{ cafeInfo.tagline|default(\x27Уйгурско-узбецкая кухня\x27) }}</span>
                </div>
            </a>

            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>

            <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                <ul class=\"navbar-nav ms-auto\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/\">{{ navText.home|default(\x27Главная\x27) }}</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/catalog\">{{ navText.catalog|default(\x27Меню\x27) }}</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/about\">{{ navText.about|default(\x27О кафе\x27) }}</a>
                    </li>
                    <!-- Авторизация загружается через JavaScript -->
                    <li class=\"nav-item\" id=\"auth-nav-item\">
                        <a class=\"nav-link\" href=\"/login\">
                            <i class=\"bi bi-person me-1\"></i>{{ navText.login|default(\x27Вход\x27) }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Отступ для фиксированной навигации -->
    <div style=\"height: 80px;\"></div>

    <main>
        {% block content %}{% endblock %}
    </main>

    <footer class=\"footer py-4\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-4 mb-3 mb-md-0\">
                    <div class=\"footer-brand mb-2\">
                        <i class=\"bi bi-cup-hot-fill me-2\"></i>
                        <span class=\"fw-bold\">{{ cafeInfo.name|default(\x27Кафе Бе-Бе\x27) }}</span>
                    </div>
                    <p class=\"footer-text mb-0\">{{ cafeInfo.tagline|default(\x27Аутентичная уйгурско-узбецкая кухня\x27) }}</p>
                </div>
                <div class=\"col-md-4 mb-3 mb-md-0\">
                    <h6 class=\"footer-heading mb-2\"><i class=\"bi bi-geo-alt me-1\"></i>Адрес</h6>
                    <p class=\"footer-text mb-1\">{{ cafeInfo.address|default(\x27г. Кемерово, ул. Примерная, д. 1\x27) }}</p>
                    <p class=\"footer-text mb-0\"><i class=\"bi bi-clock me-1\"></i>{{ cafeInfo.workTime|default(\x27Ежедневно с 10:00 до 23:00\x27) }}</p>
                </div>
                <div class=\"col-md-4\">
                    <h6 class=\"footer-heading mb-2\"><i class=\"bi bi-telephone me-1\"></i>Контакты</h6>
                    <p class=\"footer-text mb-1\">
                        <a href=\"tel:{{ cafeInfo.phone|default(\x27\x27)|replace({\x27 \x27: \x27\x27, \x27-\x27: \x27\x27, \x27(\x27: \x27\x27, \x27)\x27: \x27\x27}) }}\" class=\"footer-link\">
                            {{ cafeInfo.phone|default(\x27+7 (3842) 12-34-56\x27) }}
                        </a>
                    </p>
                    <p class=\"footer-text mb-0\">&copy; 2026 {{ footerText.copyright|default(\x27Кафе «Бе-Бе». Все права защищены.\x27) }}</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Плавающая кнопка корзины в правом нижнем углу -->
    <button class=\"cart-floating-btn\" id=\"cartFloatingBtn\" aria-label=\"Открыть корзину\">
        <i class=\"bi bi-cart3\"></i>
        <span class=\"cart-floating-counter badge bg-danger rounded-pill\" id=\"cartFloatingCounter\" style=\"display: none;\">0</span>
    </button>

    <!-- Slide-out панель корзины -->
    <div class=\"cart-slide-panel\" id=\"cartSlidePanel\">
        <div class=\"cart-slide-header\">
            <h5 class=\"mb-0\"><i class=\"bi bi-cart3 me-2\"></i>Корзина</h5>
            <button class=\"btn-close\" id=\"closeCartPanel\" aria-label=\"Закрыть\"></button>
        </div>
        <div class=\"cart-slide-body\" id=\"cartSlideBody\">
            <!-- Загружается через JS -->
            <div class=\"text-center py-5\">
                <div class=\"spinner-border text-primary\" role=\"status\"></div>
            </div>
        </div>
        <div class=\"cart-slide-footer\" id=\"cartSlideFooter\" style=\"display: none;\">
            <div class=\"d-flex justify-content-between align-items-center mb-3\">
                <span class=\"text-muted\">Итого:</span>
                <span class=\"h4 mb-0 text-success\" id=\"cartSlideTotal\">0 ₽</span>
            </div>
            <button class=\"btn btn-success w-100 btn-lg\" id=\"checkoutFromPanel\">
                <i class=\"bi bi-check-circle me-2\"></i>Оформить заказ
            </button>
        </div>
    </div>

    <!-- Slide-out панель оформления заказа -->
    <div class=\"cart-slide-panel\" id=\"checkoutSlidePanel\">
        <div class=\"cart-slide-header\">
            <h5 class=\"mb-0\"><i class=\"bi bi-check2-square me-2\"></i>Оформление заказа</h5>
            <button class=\"btn-close\" id=\"closeCheckoutPanel\" aria-label=\"Закрыть\"></button>
        </div>
        <div class=\"cart-slide-body\">
            <form id=\"checkout-form-panel\">
                {% include \x27_checkout_form.html.twig\x27 with {
                    idPrefix: \x27checkout-\x27,
                    radioSuffix: \x27\x27,
                    deliveryCls: \x27delivery-fields\x27,
                    pickupCls: \x27pickup-fields\x27,
                    pickupId: \x27pickup-point\x27,
                    checkoutText: checkoutText,
                    pickupPoints: pickupPoints
                } only %}
                <hr>
                <div class=\"d-flex justify-content-between align-items-center\">
                    <span>{{ checkoutText.totalToPay|default(\x27Итого к оплате:\x27) }}</span>
                    <span class=\"h5 mb-0 text-success\" id=\"checkoutTotalAmount\">0 ₽</span>
                </div>
            </form>
        </div>
        <div class=\"cart-slide-footer\">
            <button class=\"btn btn-outline-secondary w-100 mb-2\" id=\"backToCartPanel\">
                <i class=\"bi bi-arrow-left me-2\"></i>Назад к корзине
            </button>
            <button class=\"btn btn-success w-100 btn-lg\" id=\"submitOrderPanel\">
                <span class=\"spinner-border spinner-border-sm d-none me-2\" role=\"status\"></span>
                <span class=\"btn-text\">Подтвердить заказ</span>
            </button>
        </div>
    </div>

    <!-- Затемнение фона для панелей -->
    <div class=\"cart-overlay\" id=\"cartOverlay\"></div>

    <script>
    // Переключение полей Самовывоз/Доставка
    document.addEventListener(\x27DOMContentLoaded\x27, function() {
        const deliveryTypeRadios = document.querySelectorAll(\x27input[name=\"deliveryType\"]\x27);
        const deliveryFields = document.querySelectorAll(\x27.delivery-fields\x27);
        const pickupFields = document.querySelectorAll(\x27.pickup-fields\x27);
        const addressInput = document.getElementById(\x27checkout-address\x27);
        const pickupSelect = document.getElementById(\x27pickup-point\x27);

        function updateFields() {
            const isDelivery = document.getElementById(\x27deliveryTypeDelivery\x27).checked;

            if (isDelivery) {
                deliveryFields.forEach(f => f.classList.remove(\x27d-none\x27));
                pickupFields.forEach(f => f.classList.add(\x27d-none\x27));
                addressInput.setAttribute(\x27required\x27, \x27required\x27);
                pickupSelect.removeAttribute(\x27required\x27);
                pickupSelect.removeAttribute(\x27name\x27);
                addressInput.setAttribute(\x27name\x27, \x27address\x27);
            } else {
                deliveryFields.forEach(f => f.classList.add(\x27d-none\x27));
                pickupFields.forEach(f => f.classList.remove(\x27d-none\x27));
                addressInput.removeAttribute(\x27required\x27);
                addressInput.removeAttribute(\x27name\x27);
                pickupSelect.setAttribute(\x27required\x27, \x27required\x27);
                pickupSelect.setAttribute(\x27name\x27, \x27address\x27);
            }
        }

        deliveryTypeRadios.forEach(radio => {
            radio.addEventListener(\x27change\x27, updateFields);
        });

        // Инициализация при загрузке
        updateFields();
    });
    </script>

    {% block scripts %}{% endblock %}

    {% include \x27_toasts.html.twig\x27 %}

    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"/assets/js/cart.js\"></script>
</body>
</html>
", "base.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\base.html.twig");
    }
}
