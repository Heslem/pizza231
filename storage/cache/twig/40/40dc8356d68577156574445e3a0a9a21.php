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

/* home.html.twig */
class __TwigTemplate_c262391fbdd81c8d2a40f23f6d3e593a extends Template
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
        $context["hero"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "hero", [], "any", true, true, false, 3)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "hero", [], "any", false, false, false, 3), [])) : ([]));
        // line 4
        $context["features"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "features", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "features", [], "any", false, false, false, 4), [])) : ([]));
        // line 5
        $context["catalog"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "catalog", [], "any", true, true, false, 5)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "catalog", [], "any", false, false, false, 5), [])) : ([]));
        // line 6
        $context["image"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "image", [], "any", true, true, false, 6)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "image", [], "any", false, false, false, 6), [])) : ([]));
        // line 7
        $context["about"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "about", [], "any", true, true, false, 7)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "about", [], "any", false, false, false, 7), [])) : ([]));
        // line 1
        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "<!-- Герой-блок на всю высоту -->
<div class=\"hero-section hero-fullscreen text-center\">
    <div class=\"container\">
        <h1 class=\"display-3 fw-bold\">";
        // line 13
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["hero"] ?? null), "title", [], "any", true, true, false, 13)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["hero"] ?? null), "title", [], "any", false, false, false, 13), "Добро пожаловать в кафе «Бе-Бе»")) : ("Добро пожаловать в кафе «Бе-Бе»")), "html", null, true);
        yield "</h1>
        <p class=\"lead fs-4\">";
        // line 14
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["hero"] ?? null), "subtitle", [], "any", true, true, false, 14)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["hero"] ?? null), "subtitle", [], "any", false, false, false, 14), "Аутентичная уйгурско-узбецкая кухня в самом сердце города.")) : ("Аутентичная уйгурско-узбецкая кухня в самом сердце города.")), "html", null, true);
        yield "</p>
        <a href=\"/catalog\" class=\"btn btn-warning btn-lg mt-4\">";
        // line 15
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["hero"] ?? null), "catalogButton", [], "any", true, true, false, 15)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["hero"] ?? null), "catalogButton", [], "any", false, false, false, 15), "Посмотреть меню")) : ("Посмотреть меню")), "html", null, true);
        yield "</a>
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
        return "home.html.twig";
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
        return array (  87 => 15,  83 => 14,  79 => 13,  74 => 10,  67 => 9,  62 => 1,  60 => 7,  58 => 6,  56 => 5,  54 => 4,  52 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% set hero = texts.hero|default({}) %}
{% set features = texts.features|default({}) %}
{% set catalog = texts.catalog|default({}) %}
{% set image = texts.image|default({}) %}
{% set about = texts.about|default({}) %}

{% block content %}
<!-- Герой-блок на всю высоту -->
<div class=\"hero-section hero-fullscreen text-center\">
    <div class=\"container\">
        <h1 class=\"display-3 fw-bold\">{{ hero.title|default(\x27Добро пожаловать в кафе «Бе-Бе»\x27) }}</h1>
        <p class=\"lead fs-4\">{{ hero.subtitle|default(\x27Аутентичная уйгурско-узбецкая кухня в самом сердце города.\x27) }}</p>
        <a href=\"/catalog\" class=\"btn btn-warning btn-lg mt-4\">{{ hero.catalogButton|default(\x27Посмотреть меню\x27) }}</a>
    </div>
</div>
{% endblock %}
", "home.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\home.html.twig");
    }
}
