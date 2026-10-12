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

/* admin_users.html.twig */
class __TwigTemplate_09971f96ceac8954e0590cdaaf6b3328 extends Template
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
        $context["usersText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "users", [], "any", true, true, false, 3)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "users", [], "any", false, false, false, 3), [])) : ([]));
        // line 1
        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<div class=\"container py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"mb-0\">";
        // line 8
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "title", [], "any", true, true, false, 8)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "title", [], "any", false, false, false, 8), "Пользователи")) : ("Пользователи")), "html", null, true);
        yield "</h1>
        <a href=\"/admin\" class=\"btn btn-outline-secondary\">";
        // line 9
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "back", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "back", [], "any", false, false, false, 9), "Назад в панель")) : ("Назад в панель")), "html", null, true);
        yield "</a>
    </div>

    <div class=\"card\">
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>";
        // line 18
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "id", [], "any", true, true, false, 18)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "id", [], "any", false, false, false, 18), "ID")) : ("ID")), "html", null, true);
        yield "</th>
                            <th>";
        // line 19
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "name", [], "any", true, true, false, 19)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "name", [], "any", false, false, false, 19), "Имя")) : ("Имя")), "html", null, true);
        yield "</th>
                            <th>";
        // line 20
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "email", [], "any", true, true, false, 20)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "email", [], "any", false, false, false, 20), "Email")) : ("Email")), "html", null, true);
        yield "</th>
                            <th>";
        // line 21
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "registered", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["usersText"] ?? null), "registered", [], "any", false, false, false, 21), "Дата регистрации")) : ("Дата регистрации")), "html", null, true);
        yield "</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 25
        yield (string) ($context["usersHtml"] ?? null);
        yield "
                    </tbody>
                </table>
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
        return "admin_users.html.twig";
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
        return array (  105 => 25,  98 => 21,  94 => 20,  90 => 19,  86 => 18,  74 => 9,  70 => 8,  66 => 6,  59 => 5,  54 => 1,  52 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% set usersText = texts.users|default({}) %}

{% block content %}
<div class=\"container py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"mb-0\">{{ usersText.title|default(\x27Пользователи\x27) }}</h1>
        <a href=\"/admin\" class=\"btn btn-outline-secondary\">{{ usersText.back|default(\x27Назад в панель\x27) }}</a>
    </div>

    <div class=\"card\">
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover\">
                    <thead>
                        <tr>
                            <th>{{ usersText.id|default(\x27ID\x27) }}</th>
                            <th>{{ usersText.name|default(\x27Имя\x27) }}</th>
                            <th>{{ usersText.email|default(\x27Email\x27) }}</th>
                            <th>{{ usersText.registered|default(\x27Дата регистрации\x27) }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ usersHtml|raw }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{% endblock %}
", "admin_users.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\admin_users.html.twig");
    }
}
