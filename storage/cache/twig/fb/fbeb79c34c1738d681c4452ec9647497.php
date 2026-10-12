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
        $context["navText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "nav", [], "any", true, true, false, 1)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "nav", [], "any", false, false, false, 1), [])) : ([]));
        // line 2
        $context["footerText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "footer", [], "any", true, true, false, 2)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "footer", [], "any", false, false, false, 2), [])) : ([]));
        // line 3
        $context["cafeInfo"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "cafe", [], "any", true, true, false, 3)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "cafe", [], "any", false, false, false, 3), [])) : ([]));
        // line 4
        $context["pickupPoints"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "pickupPoints", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "pickupPoints", [], "any", false, false, false, 4), [])) : ([]));
        // line 5
        yield "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 10
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", true, true, false, 10)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", false, false, false, 10), "Кафе Бе-Бе")) : ("Кафе Бе-Бе")), "html", null, true);
        yield " - Уйгурско-узбецкая кухня</title>

    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/assets/css/style.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css\">
    <link href=\"https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap\" rel=\"stylesheet\">
    ";
        // line 16
        yield from $this->unwrap()->yieldBlock('styles', $context, $blocks);
        // line 17
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
        // line 27
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", true, true, false, 27)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", false, false, false, 27), "Бе-Бе")) : ("Бе-Бе")), "html", null, true);
        yield "</span>
                    <span class=\"brand-tagline\">";
        // line 28
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", true, true, false, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", false, false, false, 28), "Уйгурско-узбецкая кухня")) : ("Уйгурско-узбецкая кухня")), "html", null, true);
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
        // line 39
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "home", [], "any", true, true, false, 39)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "home", [], "any", false, false, false, 39), "Главная")) : ("Главная")), "html", null, true);
        yield "</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/catalog\">";
        // line 42
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "catalog", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "catalog", [], "any", false, false, false, 42), "Меню")) : ("Меню")), "html", null, true);
        yield "</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"/about\">";
        // line 45
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "about", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "about", [], "any", false, false, false, 45), "О кафе")) : ("О кафе")), "html", null, true);
        yield "</a>
                    </li>
                    <!-- Авторизация загружается через JavaScript -->
                    <li class=\"nav-item\" id=\"auth-nav-item\">
                        <a class=\"nav-link\" href=\"/login\">
                            <i class=\"bi bi-person me-1\"></i>";
        // line 50
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "login", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["navText"] ?? null), "login", [], "any", false, false, false, 50), "Вход")) : ("Вход")), "html", null, true);
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
        // line 62
        yield from $this->unwrap()->yieldBlock('content', $context, $blocks);
        // line 63
        yield "    </main>

    <footer class=\"footer py-4\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-4 mb-3 mb-md-0\">
                    <div class=\"footer-brand mb-2\">
                        <i class=\"bi bi-cup-hot-fill me-2\"></i>
                        <span class=\"fw-bold\">";
        // line 71
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", true, true, false, 71)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "name", [], "any", false, false, false, 71), "Кафе Бе-Бе")) : ("Кафе Бе-Бе")), "html", null, true);
        yield "</span>
                    </div>
                    <p class=\"footer-text mb-0\">";
        // line 73
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", true, true, false, 73)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "tagline", [], "any", false, false, false, 73), "Аутентичная уйгурско-узбецкая кухня")) : ("Аутентичная уйгурско-узбецкая кухня")), "html", null, true);
        yield "</p>
                </div>
                <div class=\"col-md-4 mb-3 mb-md-0\">
                    <h6 class=\"footer-heading mb-2\"><i class=\"bi bi-geo-alt me-1\"></i>Адрес</h6>
                    <p class=\"footer-text mb-1\">";
        // line 77
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "address", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "address", [], "any", false, false, false, 77), "г. Кемерово, ул. Примерная, д. 1")) : ("г. Кемерово, ул. Примерная, д. 1")), "html", null, true);
        yield "</p>
                    <p class=\"footer-text mb-0\"><i class=\"bi bi-clock me-1\"></i>";
        // line 78
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "workTime", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "workTime", [], "any", false, false, false, 78), "Ежедневно с 10:00 до 23:00")) : ("Ежедневно с 10:00 до 23:00")), "html", null, true);
        yield "</p>
                </div>
                <div class=\"col-md-4\">
                    <h6 class=\"footer-heading mb-2\"><i class=\"bi bi-telephone me-1\"></i>Контакты</h6>
                    <p class=\"footer-text mb-1\">
                        <a href=\"tel:";
        // line 83
        yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::replace(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", false, false, false, 83), "")) : ("")), [" " => "", "-" => "", "(" => "", ")" => ""]), "html", null, true);
        yield "\" class=\"footer-link\">
                            ";
        // line 84
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", true, true, false, 84)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cafeInfo"] ?? null), "phone", [], "any", false, false, false, 84), "+7 (3842) 12-34-56")) : ("+7 (3842) 12-34-56")), "html", null, true);
        yield "
                        </a>
                    </p>
                    <p class=\"footer-text mb-0\">&copy; 2026 ";
        // line 87
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["footerText"] ?? null), "copyright", [], "any", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["footerText"] ?? null), "copyright", [], "any", false, false, false, 87), "Кафе «Бе-Бе». Все права защищены.")) : ("Кафе «Бе-Бе». Все права защищены.")), "html", null, true);
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
                <div class=\"mb-3\">
                    <label for=\"checkout-fio\" class=\"form-label\">ФИО <span class=\"text-danger\">*</span></label>
                    <input type=\"text\" class=\"form-control\" id=\"checkout-fio\" name=\"fio\" required placeholder=\"Иванов Иван Иванович\">
                </div>
                <div class=\"mb-3\">
                    <label for=\"checkout-email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                    <input type=\"email\" class=\"form-control\" id=\"checkout-email\" name=\"email\" required placeholder=\"example@mail.ru\">
                </div>
                <div class=\"mb-3\">
                    <label for=\"checkout-phone\" class=\"form-label\">Телефон <span class=\"text-danger\">*</span></label>
                    <input type=\"tel\" class=\"form-control\" id=\"checkout-phone\" name=\"phone\" required placeholder=\"+7 (999) 123-45-67\">
                </div>

                <!-- Переключатель Самовывоз/Доставка -->
                <div class=\"mb-3\">
                    <label class=\"form-label\">Способ получения <span class=\"text-danger\">*</span></label>
                    <div class=\"btn-group w-100\" role=\"group\">
                        <input type=\"radio\" class=\"btn-check\" name=\"deliveryType\" id=\"deliveryTypeDelivery\" value=\"delivery\" checked>
                        <label class=\"btn btn-outline-dark\" for=\"deliveryTypeDelivery\">
                            <i class=\"bi bi-truck me-1\"></i>Доставка
                        </label>
                        <input type=\"radio\" class=\"btn-check\" name=\"deliveryType\" id=\"deliveryTypePickup\" value=\"pickup\">
                        <label class=\"btn btn-outline-dark\" for=\"deliveryTypePickup\">
                            <i class=\"bi bi-shop me-1\"></i>Самовывоз
                        </label>
                    </div>
                </div>

                <!-- Адрес доставки (показывается при доставке) -->
                <div class=\"mb-3 delivery-fields\">
                    <label for=\"checkout-address\" class=\"form-label\">Адрес доставки <span class=\"text-danger\">*</span></label>
                    <input type=\"text\" class=\"form-control\" id=\"checkout-address\" name=\"address\" placeholder=\"г. Кемерово, ул. Примерная, д. 1, кв. 1\">
                </div>

                <!-- Выбор точки самовывоза (скрыт по умолчанию) -->
                <div class=\"mb-3 pickup-fields d-none\">
                    <label for=\"pickup-point\" class=\"form-label\">Точка самовывоза <span class=\"text-danger\">*</span></label>
                    <select class=\"form-select\" id=\"pickup-point\" name=\"pickupPoint\">
                        <option value=\"\">Выберите точку самовывоза</option>
                        ";
        // line 169
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["pickupPoints"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["point"]) {
            // line 170
            yield "                        <option value=\"";
            yield (string) $this->escaper->escape(CoreExtension::getAttribute($this->env, $this->source, $context["point"], "address", [], "any", false, false, false, 170), "html", null, true);
            yield "\">";
            yield (string) $this->escaper->escape(CoreExtension::getAttribute($this->env, $this->source, $context["point"], "name", [], "any", false, false, false, 170), "html", null, true);
            yield " - ";
            yield (string) $this->escaper->escape(CoreExtension::getAttribute($this->env, $this->source, $context["point"], "address", [], "any", false, false, false, 170), "html", null, true);
            yield "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['point'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 172
        yield "                    </select>
                </div>

                <div class=\"mb-3\">
                    <label for=\"checkout-payment\" class=\"form-label\">Способ оплаты <span class=\"text-danger\">*</span></label>
                    <select class=\"form-select\" id=\"checkout-payment\" name=\"payment\" required>
                        <option value=\"\">Выберите способ оплаты</option>
                        <option value=\"cash\">Наличными при получении</option>
                        <option value=\"card\">Банковской картой</option>
                        <option value=\"online\">Онлайн-оплата</option>
                    </select>
                </div>
                <hr>
                <div class=\"d-flex justify-content-between align-items-center\">
                    <span>К оплате:</span>
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
        // line 243
        yield from $this->unwrap()->yieldBlock('scripts', $context, $blocks);
        // line 244
        yield "    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"/assets/js/cart.js\"></script>
</body>
</html>
";
        return; yield;
    }

    // line 16
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_styles(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        return; yield;
    }

    // line 62
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        return; yield;
    }

    // line 243
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
        return array (  394 => 243,  384 => 62,  374 => 16,  365 => 244,  363 => 243,  290 => 172,  276 => 170,  272 => 169,  187 => 87,  181 => 84,  177 => 83,  169 => 78,  165 => 77,  158 => 73,  153 => 71,  143 => 63,  141 => 62,  126 => 50,  118 => 45,  112 => 42,  106 => 39,  92 => 28,  88 => 27,  76 => 17,  74 => 16,  65 => 10,  58 => 5,  56 => 4,  54 => 3,  52 => 2,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% set navText = texts.nav|default({}) %}
{% set footerText = texts.footer|default({}) %}
{% set cafeInfo = texts.cafe|default({}) %}
{% set pickupPoints = texts.pickupPoints|default({}) %}
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
                <div class=\"mb-3\">
                    <label for=\"checkout-fio\" class=\"form-label\">ФИО <span class=\"text-danger\">*</span></label>
                    <input type=\"text\" class=\"form-control\" id=\"checkout-fio\" name=\"fio\" required placeholder=\"Иванов Иван Иванович\">
                </div>
                <div class=\"mb-3\">
                    <label for=\"checkout-email\" class=\"form-label\">Email <span class=\"text-danger\">*</span></label>
                    <input type=\"email\" class=\"form-control\" id=\"checkout-email\" name=\"email\" required placeholder=\"example@mail.ru\">
                </div>
                <div class=\"mb-3\">
                    <label for=\"checkout-phone\" class=\"form-label\">Телефон <span class=\"text-danger\">*</span></label>
                    <input type=\"tel\" class=\"form-control\" id=\"checkout-phone\" name=\"phone\" required placeholder=\"+7 (999) 123-45-67\">
                </div>

                <!-- Переключатель Самовывоз/Доставка -->
                <div class=\"mb-3\">
                    <label class=\"form-label\">Способ получения <span class=\"text-danger\">*</span></label>
                    <div class=\"btn-group w-100\" role=\"group\">
                        <input type=\"radio\" class=\"btn-check\" name=\"deliveryType\" id=\"deliveryTypeDelivery\" value=\"delivery\" checked>
                        <label class=\"btn btn-outline-dark\" for=\"deliveryTypeDelivery\">
                            <i class=\"bi bi-truck me-1\"></i>Доставка
                        </label>
                        <input type=\"radio\" class=\"btn-check\" name=\"deliveryType\" id=\"deliveryTypePickup\" value=\"pickup\">
                        <label class=\"btn btn-outline-dark\" for=\"deliveryTypePickup\">
                            <i class=\"bi bi-shop me-1\"></i>Самовывоз
                        </label>
                    </div>
                </div>

                <!-- Адрес доставки (показывается при доставке) -->
                <div class=\"mb-3 delivery-fields\">
                    <label for=\"checkout-address\" class=\"form-label\">Адрес доставки <span class=\"text-danger\">*</span></label>
                    <input type=\"text\" class=\"form-control\" id=\"checkout-address\" name=\"address\" placeholder=\"г. Кемерово, ул. Примерная, д. 1, кв. 1\">
                </div>

                <!-- Выбор точки самовывоза (скрыт по умолчанию) -->
                <div class=\"mb-3 pickup-fields d-none\">
                    <label for=\"pickup-point\" class=\"form-label\">Точка самовывоза <span class=\"text-danger\">*</span></label>
                    <select class=\"form-select\" id=\"pickup-point\" name=\"pickupPoint\">
                        <option value=\"\">Выберите точку самовывоза</option>
                        {% for point in pickupPoints %}
                        <option value=\"{{ point.address }}\">{{ point.name }} - {{ point.address }}</option>
                        {% endfor %}
                    </select>
                </div>

                <div class=\"mb-3\">
                    <label for=\"checkout-payment\" class=\"form-label\">Способ оплаты <span class=\"text-danger\">*</span></label>
                    <select class=\"form-select\" id=\"checkout-payment\" name=\"payment\" required>
                        <option value=\"\">Выберите способ оплаты</option>
                        <option value=\"cash\">Наличными при получении</option>
                        <option value=\"card\">Банковской картой</option>
                        <option value=\"online\">Онлайн-оплата</option>
                    </select>
                </div>
                <hr>
                <div class=\"d-flex justify-content-between align-items-center\">
                    <span>К оплате:</span>
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
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"/assets/js/cart.js\"></script>
</body>
</html>
", "base.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\base.html.twig");
    }
}
