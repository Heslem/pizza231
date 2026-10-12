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

/* about.html.twig */
class __TwigTemplate_243e051ff78d68c55816abc3908be88a extends Template
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
        // line 3
        $context["history"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "history", [], "any", true, true, false, 3)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "history", [], "any", false, false, false, 3), [])) : ([]));
        // line 4
        $context["contacts"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "contacts", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "contacts", [], "any", false, false, false, 4), [])) : ([]));
        // line 5
        $context["mapId"] = "YOUR_CONSTRUCTOR_ID";
        // line 1
        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 8
        yield "<div class=\"container mt-4\">
    <h1 class=\"text-center mb-4\">";
        // line 9
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "title", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "title", [], "any", false, false, false, 9), "О кафе «Бе-Бе»")) : ("О кафе «Бе-Бе»")), "html", null, true);
        yield "</h1>

    <div class=\"row\">
        <div class=\"col-md-8\">
            <p class=\"lead\">
                ";
        // line 14
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "intro", [], "any", true, true, false, 14)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "intro", [], "any", false, false, false, 14), "Добро пожаловать в кафе «Бе-Бе» — настоящий уголок Востока в Кемерово!")) : ("Добро пожаловать в кафе «Бе-Бе» — настоящий уголок Востока в Кемерово!")), "html", null, true);
        yield "
            </p>

            <p>
                ";
        // line 18
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "founded", [], "any", true, true, false, 18)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "founded", [], "any", false, false, false, 18), "Кафе открылось в")) : ("Кафе открылось в")), "html", null, true);
        yield "
                <strong>";
        // line 19
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "foundedYear", [], "any", true, true, false, 19)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "foundedYear", [], "any", false, false, false, 19), "2018 году")) : ("2018 году")), "html", null, true);
        yield "</strong>
                ";
        // line 20
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "reason", [], "any", true, true, false, 20)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "reason", [], "any", false, false, false, 20), "чтобы порадовать жителей города настоящей уйгурско-узбецкой кухней.")) : ("чтобы порадовать жителей города настоящей уйгурско-узбецкой кухней.")), "html", null, true);
        yield "
            </p>

            <p>
                ";
        // line 24
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "today", [], "any", true, true, false, 24)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "today", [], "any", false, false, false, 24), "")) : ("")), "html", null, true);
        yield "
            </p>

            <p>
                ";
        // line 28
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "graduates", [], "any", true, true, false, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "graduates", [], "any", false, false, false, 28), "За годы работы мы поставили свыше")) : ("За годы работы мы поставили свыше")), "html", null, true);
        yield "
                <strong>";
        // line 29
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "graduatesCount", [], "any", true, true, false, 29)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "graduatesCount", [], "any", false, false, false, 29), "50 000 блюд")) : ("50 000 блюд")), "html", null, true);
        yield "</strong>
                ";
        // line 30
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "forText", [], "any", true, true, false, 30)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "forText", [], "any", false, false, false, 30), "довольным гостям.")) : ("довольным гостям.")), "html", null, true);
        yield "
            </p>

            <p>
                ";
        // line 34
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "teachers", [], "any", true, true, false, 34)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["history"] ?? null), "teachers", [], "any", false, false, false, 34), "Наши повара — мастера своего дела, которые используют только свежие ингредиенты и натуральные специи.")) : ("Наши повара — мастера своего дела, которые используют только свежие ингредиенты и натуральные специи.")), "html", null, true);
        yield "
            </p>

            <h4 class=\"mt-4\">";
        // line 37
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "title", [], "any", true, true, false, 37)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "title", [], "any", false, false, false, 37), "Контакты")) : ("Контакты")), "html", null, true);
        yield "</h4>
            <ul class=\"list-unstyled\">
                <li><i class=\"bi bi-geo-alt-fill me-2\" style=\"color: var(--cafe-orange);\"></i>";
        // line 39
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "address", [], "any", true, true, false, 39)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "address", [], "any", false, false, false, 39), "Адрес:")) : ("Адрес:")), "html", null, true);
        yield " ";
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "addressValue", [], "any", true, true, false, 39)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "addressValue", [], "any", false, false, false, 39), "г. Кемерово, ул. Примерная, д. 1")) : ("г. Кемерово, ул. Примерная, д. 1")), "html", null, true);
        yield "</li>
                <li><i class=\"bi bi-telephone-fill me-2\" style=\"color: var(--cafe-orange);\"></i>";
        // line 40
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "phone", [], "any", true, true, false, 40)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "phone", [], "any", false, false, false, 40), "Телефон:")) : ("Телефон:")), "html", null, true);
        yield " ";
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "phoneValue", [], "any", true, true, false, 40)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "phoneValue", [], "any", false, false, false, 40), "+7 (3842) 12-34-56")) : ("+7 (3842) 12-34-56")), "html", null, true);
        yield "</li>
                <li><i class=\"bi bi-envelope-fill me-2\" style=\"color: var(--cafe-orange);\"></i>";
        // line 41
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "email", [], "any", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "email", [], "any", false, false, false, 41), "E-mail:")) : ("E-mail:")), "html", null, true);
        yield " ";
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "emailValue", [], "any", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "emailValue", [], "any", false, false, false, 41), "info@cafe-be-be.ru")) : ("info@cafe-be-be.ru")), "html", null, true);
        yield "</li>
                <li><i class=\"bi bi-person-fill me-2\" style=\"color: var(--cafe-orange);\"></i>";
        // line 42
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "director", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "director", [], "any", false, false, false, 42), "Шеф-повар:")) : ("Шеф-повар:")), "html", null, true);
        yield " ";
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "directorName", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["contacts"] ?? null), "directorName", [], "any", false, false, false, 42), "Ахмедов Бека")) : ("Ахмедов Бека")), "html", null, true);
        yield "</li>
            </ul>
        </div>

        <div class=\"col-md-4\">
            <!-- Карта Яндекс -->
            <div class=\"card\">
                <div class=\"card-body p-0\">
                    <script type=\"text/javascript\" charset=\"utf-8\"
                            async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A";
        // line 51
        yield (string) $this->escaper->escape(($context["mapId"] ?? null), "html", null, true);
        yield "&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true\">
                    </script>
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
        return "about.html.twig";
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
        return array (  168 => 51,  154 => 42,  148 => 41,  142 => 40,  136 => 39,  131 => 37,  125 => 34,  118 => 30,  114 => 29,  110 => 28,  103 => 24,  96 => 20,  92 => 19,  88 => 18,  81 => 14,  73 => 9,  70 => 8,  63 => 7,  58 => 1,  56 => 5,  54 => 4,  52 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% set history = texts.history|default({}) %}
{% set contacts = texts.contacts|default({}) %}
{% set mapId = \x27YOUR_CONSTRUCTOR_ID\x27 %}

{% block content %}
<div class=\"container mt-4\">
    <h1 class=\"text-center mb-4\">{{ texts.title|default(\x27О кафе «Бе-Бе»\x27) }}</h1>

    <div class=\"row\">
        <div class=\"col-md-8\">
            <p class=\"lead\">
                {{ texts.intro|default(\x27Добро пожаловать в кафе «Бе-Бе» — настоящий уголок Востока в Кемерово!\x27) }}
            </p>

            <p>
                {{ history.founded|default(\x27Кафе открылось в\x27) }}
                <strong>{{ history.foundedYear|default(\x272018 году\x27) }}</strong>
                {{ history.reason|default(\x27чтобы порадовать жителей города настоящей уйгурско-узбецкой кухней.\x27) }}
            </p>

            <p>
                {{ history.today|default(\x27\x27) }}
            </p>

            <p>
                {{ history.graduates|default(\x27За годы работы мы поставили свыше\x27) }}
                <strong>{{ history.graduatesCount|default(\x2750 000 блюд\x27) }}</strong>
                {{ history.forText|default(\x27довольным гостям.\x27) }}
            </p>

            <p>
                {{ history.teachers|default(\x27Наши повара — мастера своего дела, которые используют только свежие ингредиенты и натуральные специи.\x27) }}
            </p>

            <h4 class=\"mt-4\">{{ contacts.title|default(\x27Контакты\x27) }}</h4>
            <ul class=\"list-unstyled\">
                <li><i class=\"bi bi-geo-alt-fill me-2\" style=\"color: var(--cafe-orange);\"></i>{{ contacts.address|default(\x27Адрес:\x27) }} {{ contacts.addressValue|default(\x27г. Кемерово, ул. Примерная, д. 1\x27) }}</li>
                <li><i class=\"bi bi-telephone-fill me-2\" style=\"color: var(--cafe-orange);\"></i>{{ contacts.phone|default(\x27Телефон:\x27) }} {{ contacts.phoneValue|default(\x27+7 (3842) 12-34-56\x27) }}</li>
                <li><i class=\"bi bi-envelope-fill me-2\" style=\"color: var(--cafe-orange);\"></i>{{ contacts.email|default(\x27E-mail:\x27) }} {{ contacts.emailValue|default(\x27info@cafe-be-be.ru\x27) }}</li>
                <li><i class=\"bi bi-person-fill me-2\" style=\"color: var(--cafe-orange);\"></i>{{ contacts.director|default(\x27Шеф-повар:\x27) }} {{ contacts.directorName|default(\x27Ахмедов Бека\x27) }}</li>
            </ul>
        </div>

        <div class=\"col-md-4\">
            <!-- Карта Яндекс -->
            <div class=\"card\">
                <div class=\"card-body p-0\">
                    <script type=\"text/javascript\" charset=\"utf-8\"
                            async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A{{ mapId }}&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true\">
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "about.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\about.html.twig");
    }
}
