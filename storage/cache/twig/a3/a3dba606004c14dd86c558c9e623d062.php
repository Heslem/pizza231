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

/* admin.html.twig */
class __TwigTemplate_c9e6ebda9120408542f03e5076080b5f extends Template
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
            'content' => [$this, 'block_content'],
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
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        $context["dashboardText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "dashboard", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "dashboard", [], "any", false, false, false, 4), [])) : ([]));
        // line 5
        $context["cardsText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "cards", [], "any", true, true, false, 5)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "cards", [], "any", false, false, false, 5), [])) : ([]));
        // line 6
        $context["revenueFormatted"] = $this->extensions['Twig\Extension\CoreExtension']->formatNumber(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_revenue", [], "any", true, true, false, 6)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_revenue", [], "any", false, false, false, 6), 0)) : (0)), 0, ".", " ");
        // line 7
        yield "
<div class=\"container py-4\">
    <h1 class=\"mb-4\">";
        // line 9
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "title", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "title", [], "any", false, false, false, 9), "Панель администратора")) : ("Панель администратора")), "html", null, true);
        yield "</h1>

    <div class=\"row g-4 mb-4\">
        <div class=\"col-md-3\">
            <div class=\"card bg-primary text-white\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">";
        // line 17
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "users", [], "any", true, true, false, 17)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "users", [], "any", false, false, false, 17), "Пользователи")) : ("Пользователи")), "html", null, true);
        yield "</h6>
                            <h2 class=\"mb-0\">";
        // line 18
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_users", [], "any", true, true, false, 18)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_users", [], "any", false, false, false, 18), 0)) : (0)), "html", null, true);
        yield "</h2>
                        </div>
                        <i class=\"bi bi-people fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card bg-success text-white\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">";
        // line 30
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "products", [], "any", true, true, false, 30)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "products", [], "any", false, false, false, 30), "Товары")) : ("Товары")), "html", null, true);
        yield "</h6>
                            <h2 class=\"mb-0\">";
        // line 31
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_products", [], "any", true, true, false, 31)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_products", [], "any", false, false, false, 31), 0)) : (0)), "html", null, true);
        yield "</h2>
                        </div>
                        <i class=\"bi bi-box fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card bg-warning text-dark\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">";
        // line 43
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "orders", [], "any", true, true, false, 43)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "orders", [], "any", false, false, false, 43), "Заказы")) : ("Заказы")), "html", null, true);
        yield "</h6>
                            <h2 class=\"mb-0\">";
        // line 44
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_orders", [], "any", true, true, false, 44)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["stats"] ?? null), "total_orders", [], "any", false, false, false, 44), 0)) : (0)), "html", null, true);
        yield "</h2>
                        </div>
                        <i class=\"bi bi-cart fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card bg-info text-white\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">";
        // line 56
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "revenue", [], "any", true, true, false, 56)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["dashboardText"] ?? null), "revenue", [], "any", false, false, false, 56), "Выручка")) : ("Выручка")), "html", null, true);
        yield "</h6>
                            <h2 class=\"mb-0\">";
        // line 57
        yield (string) $this->escaper->escape(($context["revenueFormatted"] ?? null), "html", null, true);
        yield " ₽</h2>
                        </div>
                        <i class=\"bi bi-currency-dollar fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"row g-4\">
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-success text-white\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-box-seam me-2\"></i>";
        // line 70
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "catalogTitle", [], "any", true, true, false, 70)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "catalogTitle", [], "any", false, false, false, 70), "Управление каталогом")) : ("Управление каталогом")), "html", null, true);
        yield "</h5>
                </div>
                <div class=\"card-body\">
                    <p>";
        // line 73
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "catalogDesc", [], "any", true, true, false, 73)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "catalogDesc", [], "any", false, false, false, 73), "Добавление, редактирование и удаление товаров")) : ("Добавление, редактирование и удаление товаров")), "html", null, true);
        yield "</p>
                    <a href=\"/admin/catalog\" class=\"btn btn-success\">";
        // line 74
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "catalogLink", [], "any", true, true, false, 74)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "catalogLink", [], "any", false, false, false, 74), "Перейти к каталогу")) : ("Перейти к каталогу")), "html", null, true);
        yield "</a>
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-cart me-2\"></i>";
        // line 81
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "ordersTitle", [], "any", true, true, false, 81)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "ordersTitle", [], "any", false, false, false, 81), "Управление заказами")) : ("Управление заказами")), "html", null, true);
        yield "</h5>
                </div>
                <div class=\"card-body\">
                    <p>";
        // line 84
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "ordersDesc", [], "any", true, true, false, 84)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "ordersDesc", [], "any", false, false, false, 84), "Просмотр и управление заказами клиентов")) : ("Просмотр и управление заказами клиентов")), "html", null, true);
        yield "</p>
                    <a href=\"/admin/orders\" class=\"btn btn-primary\">";
        // line 85
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "ordersLink", [], "any", true, true, false, 85)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "ordersLink", [], "any", false, false, false, 85), "Перейти к заказам")) : ("Перейти к заказам")), "html", null, true);
        yield "</a>
                </div>
            </div>
        </div>
    </div>

    <div class=\"row g-4 mt-2\">
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-people me-2\"></i>";
        // line 95
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "usersTitle", [], "any", true, true, false, 95)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "usersTitle", [], "any", false, false, false, 95), "Управление пользователями")) : ("Управление пользователями")), "html", null, true);
        yield "</h5>
                </div>
                <div class=\"card-body\">
                    <p>";
        // line 98
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "usersDesc", [], "any", true, true, false, 98)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "usersDesc", [], "any", false, false, false, 98), "Просмотр списка зарегистрированных пользователей")) : ("Просмотр списка зарегистрированных пользователей")), "html", null, true);
        yield "</p>
                    <a href=\"/admin/users\" class=\"btn btn-primary\">";
        // line 99
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "usersLink", [], "any", true, true, false, 99)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "usersLink", [], "any", false, false, false, 99), "Перейти к пользователям")) : ("Перейти к пользователям")), "html", null, true);
        yield "</a>
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-warning text-dark\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-exclamation-triangle me-2\"></i>";
        // line 106
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "logsTitle", [], "any", true, true, false, 106)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "logsTitle", [], "any", false, false, false, 106), "Логи ошибок")) : ("Логи ошибок")), "html", null, true);
        yield "</h5>
                </div>
                <div class=\"card-body\">
                    <p>";
        // line 109
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "logsDesc", [], "any", true, true, false, 109)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "logsDesc", [], "any", false, false, false, 109), "Просмотр и управление логами ошибок сайта")) : ("Просмотр и управление логами ошибок сайта")), "html", null, true);
        yield "</p>
                    <a href=\"/admin/logs\" class=\"btn btn-warning\">";
        // line 110
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "logsLink", [], "any", true, true, false, 110)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cardsText"] ?? null), "logsLink", [], "any", false, false, false, 110), "Перейти к логам")) : ("Перейти к логам")), "html", null, true);
        yield "</a>
                </div>
            </div>
        </div>
    </div>

</div>
";
        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin.html.twig";
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
        return array (  234 => 110,  230 => 109,  224 => 106,  214 => 99,  210 => 98,  204 => 95,  191 => 85,  187 => 84,  181 => 81,  171 => 74,  167 => 73,  161 => 70,  145 => 57,  141 => 56,  126 => 44,  122 => 43,  107 => 31,  103 => 30,  88 => 18,  84 => 17,  73 => 9,  69 => 7,  67 => 6,  65 => 5,  63 => 4,  56 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block content %}
{% set dashboardText = texts.dashboard|default({}) %}
{% set cardsText = texts.cards|default({}) %}
{% set revenueFormatted = stats.total_revenue|default(0)|number_format(0, \x27.\x27, \x27 \x27) %}

<div class=\"container py-4\">
    <h1 class=\"mb-4\">{{ dashboardText.title|default(\x27Панель администратора\x27) }}</h1>

    <div class=\"row g-4 mb-4\">
        <div class=\"col-md-3\">
            <div class=\"card bg-primary text-white\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">{{ dashboardText.users|default(\x27Пользователи\x27) }}</h6>
                            <h2 class=\"mb-0\">{{ stats.total_users|default(0) }}</h2>
                        </div>
                        <i class=\"bi bi-people fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card bg-success text-white\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">{{ dashboardText.products|default(\x27Товары\x27) }}</h6>
                            <h2 class=\"mb-0\">{{ stats.total_products|default(0) }}</h2>
                        </div>
                        <i class=\"bi bi-box fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card bg-warning text-dark\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">{{ dashboardText.orders|default(\x27Заказы\x27) }}</h6>
                            <h2 class=\"mb-0\">{{ stats.total_orders|default(0) }}</h2>
                        </div>
                        <i class=\"bi bi-cart fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-3\">
            <div class=\"card bg-info text-white\">
                <div class=\"card-body\">
                    <div class=\"d-flex justify-content-between align-items-center\">
                        <div>
                            <h6 class=\"card-title\">{{ dashboardText.revenue|default(\x27Выручка\x27) }}</h6>
                            <h2 class=\"mb-0\">{{ revenueFormatted }} ₽</h2>
                        </div>
                        <i class=\"bi bi-currency-dollar fs-1 opacity-50\"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"row g-4\">
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-success text-white\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-box-seam me-2\"></i>{{ cardsText.catalogTitle|default(\x27Управление каталогом\x27) }}</h5>
                </div>
                <div class=\"card-body\">
                    <p>{{ cardsText.catalogDesc|default(\x27Добавление, редактирование и удаление товаров\x27) }}</p>
                    <a href=\"/admin/catalog\" class=\"btn btn-success\">{{ cardsText.catalogLink|default(\x27Перейти к каталогу\x27) }}</a>
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-cart me-2\"></i>{{ cardsText.ordersTitle|default(\x27Управление заказами\x27) }}</h5>
                </div>
                <div class=\"card-body\">
                    <p>{{ cardsText.ordersDesc|default(\x27Просмотр и управление заказами клиентов\x27) }}</p>
                    <a href=\"/admin/orders\" class=\"btn btn-primary\">{{ cardsText.ordersLink|default(\x27Перейти к заказам\x27) }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class=\"row g-4 mt-2\">
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-primary text-white\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-people me-2\"></i>{{ cardsText.usersTitle|default(\x27Управление пользователями\x27) }}</h5>
                </div>
                <div class=\"card-body\">
                    <p>{{ cardsText.usersDesc|default(\x27Просмотр списка зарегистрированных пользователей\x27) }}</p>
                    <a href=\"/admin/users\" class=\"btn btn-primary\">{{ cardsText.usersLink|default(\x27Перейти к пользователям\x27) }}</a>
                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"card\">
                <div class=\"card-header bg-warning text-dark\">
                    <h5 class=\"mb-0\"><i class=\"bi bi-exclamation-triangle me-2\"></i>{{ cardsText.logsTitle|default(\x27Логи ошибок\x27) }}</h5>
                </div>
                <div class=\"card-body\">
                    <p>{{ cardsText.logsDesc|default(\x27Просмотр и управление логами ошибок сайта\x27) }}</p>
                    <a href=\"/admin/logs\" class=\"btn btn-warning\">{{ cardsText.logsLink|default(\x27Перейти к логам\x27) }}</a>
                </div>
            </div>
        </div>
    </div>

</div>
{% endblock %}
", "admin.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\admin.html.twig");
    }
}
