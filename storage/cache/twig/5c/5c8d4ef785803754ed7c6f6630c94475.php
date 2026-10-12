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

/* admin_orders.html.twig */
class __TwigTemplate_b1e735422b363203e3888ea1a32c04f2 extends Template
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
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        $context["ordersText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "orders", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "orders", [], "any", false, false, false, 4), [])) : ([]));
        // line 5
        yield "
";
        // line 6
        $context["activeOrders"] = Twig\Extension\CoreExtension::filter($this->env, $this->env->hasExtension(\Twig\Extension\SandboxExtension::class) && $this->env->getExtension(\Twig\Extension\SandboxExtension::class)->getChecker()->isSandboxed($this->source), ($context["orders"] ?? null), function ($__o__) use ($context, $macros) { $context["o"] = $__o__; return CoreExtension::inFilter(((CoreExtension::getAttribute($this->env, $this->source, ($context["o"] ?? null), "status", [], "any", true, true, false, 6)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["o"] ?? null), "status", [], "any", false, false, false, 6), "new")) : ("new")), ["new", "processing"]); });
        // line 7
        $context["completedOrders"] = Twig\Extension\CoreExtension::filter($this->env, $this->env->hasExtension(\Twig\Extension\SandboxExtension::class) && $this->env->getExtension(\Twig\Extension\SandboxExtension::class)->getChecker()->isSandboxed($this->source), ($context["orders"] ?? null), function ($__o__) use ($context, $macros) { $context["o"] = $__o__; return CoreExtension::inFilter(((CoreExtension::getAttribute($this->env, $this->source, ($context["o"] ?? null), "status", [], "any", true, true, false, 7)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["o"] ?? null), "status", [], "any", false, false, false, 7), "")) : ("")), ["completed", "cancelled"]); });
        // line 8
        yield "
<div class=\"container py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"mb-0\">";
        // line 11
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "title", [], "any", true, true, false, 11)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "title", [], "any", false, false, false, 11), "Заказы")) : ("Заказы")), "html", null, true);
        yield "</h1>
        <a href=\"/admin\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i>";
        // line 13
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "back", [], "any", true, true, false, 13)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "back", [], "any", false, false, false, 13), "Назад")) : ("Назад")), "html", null, true);
        yield "
        </a>
    </div>

    <!-- Вкладки -->
    <ul class=\"nav nav-tabs mb-4\" id=\"ordersTabs\" role=\"tablist\">
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link active\" id=\"active-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#active-orders\" type=\"button\" role=\"tab\">
                <i class=\"bi bi-clock-history me-1\"></i>";
        // line 21
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "active", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "active", [], "any", false, false, false, 21), "Активные")) : ("Активные")), "html", null, true);
        yield "
                <span class=\"badge bg-danger ms-2\">";
        // line 22
        yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["activeOrders"] ?? null)), "html", null, true);
        yield "</span>
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"completed-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#completed-orders\" type=\"button\" role=\"tab\">
                <i class=\"bi bi-check2-circle me-1\"></i>";
        // line 27
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "completed", [], "any", true, true, false, 27)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "completed", [], "any", false, false, false, 27), "Завершённые")) : ("Завершённые")), "html", null, true);
        yield "
                <span class=\"badge bg-secondary ms-2\">";
        // line 28
        yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["completedOrders"] ?? null)), "html", null, true);
        yield "</span>
            </button>
        </li>
    </ul>

    <div class=\"tab-content\" id=\"ordersTabsContent\">
        <!-- Активные заказы -->
        <div class=\"tab-pane fade show active\" id=\"active-orders\" role=\"tabpanel\">
            ";
        // line 36
        if (Twig\Extension\CoreExtension::testEmpty(($context["activeOrders"] ?? null))) {
            // line 37
            yield "                <div class=\"text-center py-5\"><i class=\"bi bi-inbox fs-1 text-muted mb-3 d-block\"></i>
                    <h5 class=\"text-muted\">";
            // line 38
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "noOrders", [], "any", true, true, false, 38)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "noOrders", [], "any", false, false, false, 38), "Заказов нет")) : ("Заказов нет")), "html", null, true);
            yield "</h5></div>
            ";
        } else {
            // line 40
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["activeOrders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 41
                yield "                    ";
                $context["status"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "status", [], "any", true, true, false, 41)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 41), "new")) : ("new"));
                // line 42
                yield "                    ";
                $context["statusBadge"] = $this->env->getFilter('status_badge')->getCallable()(($context["status"] ?? null), ($context["ordersText"] ?? null));
                // line 43
                yield "                    ";
                $context["itemsCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["order"], "items", [], "any", false, false, false, 43));
                // line 44
                yield "                    ";
                $context["total"] = $this->extensions['Twig\Extension\CoreExtension']->formatNumber(((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "total", [], "any", true, true, false, 44)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "total", [], "any", false, false, false, 44), 0)) : (0)), 0, ".", " ");
                // line 45
                yield "                    ";
                $context["dateStr"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "created_at", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "created_at", [], "any", false, false, false, 45), ((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", false, false, false, 45), "")) : ("")))) : (((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", false, false, false, 45), "")) : (""))));
                // line 46
                yield "                    ";
                $context["createdAt"] = (((($tmp = ($context["dateStr"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["dateStr"] ?? null), "d.m.Y H:i")) : ("—"));
                // line 47
                yield "                    <div class=\"card mb-3 shadow-sm order-card\" style=\"cursor: pointer;\">
                        <div class=\"card-body\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-md-1\">
                                    <button class=\"btn btn-link text-decoration-none fw-bold btn-view-order\" data-id=\"";
                // line 51
                yield (string) $this->escaper->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 51), "html", null, true);
                yield "\">#";
                yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 51),  -8), "html", null, true);
                yield "</button>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"fw-medium\">";
                // line 54
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "fio", [], "any", true, true, false, 54)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "fio", [], "any", false, false, false, 54), "—")) : ("—")), "html", null, true);
                yield "</div>
                                    <small class=\"text-muted\">";
                // line 55
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "phone", [], "any", true, true, false, 55)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "phone", [], "any", false, false, false, 55), "—")) : ("—")), "html", null, true);
                yield "</small>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 58
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "products", [], "any", true, true, false, 58)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "products", [], "any", false, false, false, 58), "Товаров")) : ("Товаров")), "html", null, true);
                yield "</small>
                                    <strong>";
                // line 59
                yield (string) $this->escaper->escape(($context["itemsCount"] ?? null), "html", null, true);
                yield "</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 62
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "amount", [], "any", true, true, false, 62)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "amount", [], "any", false, false, false, 62), "Сумма")) : ("Сумма")), "html", null, true);
                yield "</small>
                                    <strong class=\"text-success\">";
                // line 63
                yield (string) $this->escaper->escape(($context["total"] ?? null), "html", null, true);
                yield " ₽</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 66
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", true, true, false, 66)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", false, false, false, 66), "Статус")) : ("Статус")), "html", null, true);
                yield "</small>
                                    <div>";
                // line 67
                yield (string) $this->escaper->escape(($context["statusBadge"] ?? null), "html", null, true);
                yield "</div>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 70
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", true, true, false, 70)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", false, false, false, 70), "Дата")) : ("Дата")), "html", null, true);
                yield "</small>
                                    <small>";
                // line 71
                yield (string) $this->escaper->escape(($context["createdAt"] ?? null), "html", null, true);
                yield "</small>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['order'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 77
            yield "            ";
        }
        // line 78
        yield "        </div>

        <!-- Завершённые заказы -->
        <div class=\"tab-pane fade\" id=\"completed-orders\" role=\"tabpanel\">
            ";
        // line 82
        if (Twig\Extension\CoreExtension::testEmpty(($context["completedOrders"] ?? null))) {
            // line 83
            yield "                <div class=\"text-center py-5\"><i class=\"bi bi-inbox fs-1 text-muted mb-3 d-block\"></i>
                    <h5 class=\"text-muted\">";
            // line 84
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "noOrders", [], "any", true, true, false, 84)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "noOrders", [], "any", false, false, false, 84), "Заказов нет")) : ("Заказов нет")), "html", null, true);
            yield "</h5></div>
            ";
        } else {
            // line 86
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["completedOrders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 87
                yield "                    ";
                $context["status"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "status", [], "any", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 87), "new")) : ("new"));
                // line 88
                yield "                    ";
                $context["statusBadge"] = $this->env->getFilter('status_badge')->getCallable()(($context["status"] ?? null), ($context["ordersText"] ?? null));
                // line 89
                yield "                    ";
                $context["itemsCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["order"], "items", [], "any", false, false, false, 89));
                // line 90
                yield "                    ";
                $context["total"] = $this->extensions['Twig\Extension\CoreExtension']->formatNumber(((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "total", [], "any", true, true, false, 90)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "total", [], "any", false, false, false, 90), 0)) : (0)), 0, ".", " ");
                // line 91
                yield "                    ";
                $context["dateStr"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "created_at", [], "any", true, true, false, 91)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "created_at", [], "any", false, false, false, 91), ((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", true, true, false, 91)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", false, false, false, 91), "")) : ("")))) : (((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", true, true, false, 91)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", false, false, false, 91), "")) : (""))));
                // line 92
                yield "                    ";
                $context["createdAt"] = (((($tmp = ($context["dateStr"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->extensions['Twig\Extension\CoreExtension']->formatDate(($context["dateStr"] ?? null), "d.m.Y H:i")) : ("—"));
                // line 93
                yield "                    <div class=\"card mb-3 shadow-sm order-card\" style=\"cursor: pointer;\">
                        <div class=\"card-body\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-md-1\">
                                    <button class=\"btn btn-link text-decoration-none fw-bold btn-view-order\" data-id=\"";
                // line 97
                yield (string) $this->escaper->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 97), "html", null, true);
                yield "\">#";
                yield (string) $this->escaper->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 97),  -8), "html", null, true);
                yield "</button>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"fw-medium\">";
                // line 100
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "fio", [], "any", true, true, false, 100)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "fio", [], "any", false, false, false, 100), "—")) : ("—")), "html", null, true);
                yield "</div>
                                    <small class=\"text-muted\">";
                // line 101
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["order"], "phone", [], "any", true, true, false, 101)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "phone", [], "any", false, false, false, 101), "—")) : ("—")), "html", null, true);
                yield "</small>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 104
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "products", [], "any", true, true, false, 104)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "products", [], "any", false, false, false, 104), "Товаров")) : ("Товаров")), "html", null, true);
                yield "</small>
                                    <strong>";
                // line 105
                yield (string) $this->escaper->escape(($context["itemsCount"] ?? null), "html", null, true);
                yield "</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 108
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "amount", [], "any", true, true, false, 108)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "amount", [], "any", false, false, false, 108), "Сумма")) : ("Сумма")), "html", null, true);
                yield "</small>
                                    <strong class=\"text-success\">";
                // line 109
                yield (string) $this->escaper->escape(($context["total"] ?? null), "html", null, true);
                yield " ₽</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 112
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", true, true, false, 112)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", false, false, false, 112), "Статус")) : ("Статус")), "html", null, true);
                yield "</small>
                                    <div>";
                // line 113
                yield (string) $this->escaper->escape(($context["statusBadge"] ?? null), "html", null, true);
                yield "</div>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">";
                // line 116
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", true, true, false, 116)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", false, false, false, 116), "Дата")) : ("Дата")), "html", null, true);
                yield "</small>
                                    <small>";
                // line 117
                yield (string) $this->escaper->escape(($context["createdAt"] ?? null), "html", null, true);
                yield "</small>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['order'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 123
            yield "            ";
        }
        // line 124
        yield "        </div>
    </div>
</div>

<!-- Модальное окно просмотра заказа -->
<div class=\"modal fade\" id=\"orderModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\">
            <div class=\"modal-header bg-primary text-white\">
                <h5 class=\"modal-title\">
                    <i class=\"bi bi-receipt me-2\"></i>Заказ #<span id=\"orderModalId\"></span>
                </h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Закрыть\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row g-3 mb-4\">
                    <div class=\"col-md-6\">
                        <div class=\"card h-100 border-0 bg-light\">
                            <div class=\"card-body\">
                                <h6 class=\"text-muted mb-3\">
                                    <i class=\"bi bi-person me-1\"></i>";
        // line 144
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "customer", [], "any", true, true, false, 144)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "customer", [], "any", false, false, false, 144), "Клиент")) : ("Клиент")), "html", null, true);
        yield "
                                </h6>
                                <p class=\"mb-2\"><strong>";
        // line 146
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "fio", [], "any", true, true, false, 146)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "fio", [], "any", false, false, false, 146), "ФИО:")) : ("ФИО:")), "html", null, true);
        yield "</strong> <span id=\"orderModalFio\"></span></p>
                                <p class=\"mb-2\"><strong>";
        // line 147
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "email", [], "any", true, true, false, 147)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "email", [], "any", false, false, false, 147), "Email:")) : ("Email:")), "html", null, true);
        yield "</strong> <span id=\"orderModalEmail\"></span></p>
                                <p class=\"mb-2\"><strong>";
        // line 148
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "phone", [], "any", true, true, false, 148)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "phone", [], "any", false, false, false, 148), "Телефон:")) : ("Телефон:")), "html", null, true);
        yield "</strong> <span id=\"orderModalPhone\"></span></p>
                                <p class=\"mb-0\"><strong>";
        // line 149
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "address", [], "any", true, true, false, 149)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "address", [], "any", false, false, false, 149), "Адрес:")) : ("Адрес:")), "html", null, true);
        yield "</strong> <span id=\"orderModalAddress\"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"card h-100 border-0 bg-light\">
                            <div class=\"card-body\">
                                <h6 class=\"text-muted mb-3\">
                                    <i class=\"bi bi-info-circle me-1\"></i>";
        // line 157
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "details", [], "any", true, true, false, 157)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "details", [], "any", false, false, false, 157), "Детали")) : ("Детали")), "html", null, true);
        yield "
                                </h6>
                                <p class=\"mb-2\"><strong>";
        // line 159
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", true, true, false, 159)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", false, false, false, 159), "Дата:")) : ("Дата:")), "html", null, true);
        yield "</strong> <span id=\"orderModalDate\"></span></p>
                                <p class=\"mb-2\"><strong>";
        // line 160
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", true, true, false, 160)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", false, false, false, 160), "Статус:")) : ("Статус:")), "html", null, true);
        yield "</strong> <span id=\"orderModalStatus\"></span></p>
                                <p class=\"mb-0\"><strong>";
        // line 161
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "payment", [], "any", true, true, false, 161)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "payment", [], "any", false, false, false, 161), "Оплата:")) : ("Оплата:")), "html", null, true);
        yield "</strong> <span id=\"orderModalPayment\"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class=\"text-muted mb-3\">
                    <i class=\"bi bi-box-seam me-1\"></i>";
        // line 168
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "items", [], "any", true, true, false, 168)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "items", [], "any", false, false, false, 168), "Товары")) : ("Товары")), "html", null, true);
        yield "
                </h6>
                <div class=\"card border-0 shadow-sm\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover mb-0\">
                            <thead class=\"table-light\">
                                <tr>
                                    <th style=\"width: 50%\">";
        // line 175
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "item", [], "any", true, true, false, 175)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "item", [], "any", false, false, false, 175), "Товар")) : ("Товар")), "html", null, true);
        yield "</th>
                                    <th>";
        // line 176
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "price", [], "any", true, true, false, 176)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "price", [], "any", false, false, false, 176), "Цена")) : ("Цена")), "html", null, true);
        yield "</th>
                                    <th>";
        // line 177
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "quantity", [], "any", true, true, false, 177)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "quantity", [], "any", false, false, false, 177), "Кол-во")) : ("Кол-во")), "html", null, true);
        yield "</th>
                                    <th class=\"text-end\">";
        // line 178
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "sum", [], "any", true, true, false, 178)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "sum", [], "any", false, false, false, 178), "Сумма")) : ("Сумма")), "html", null, true);
        yield "</th>
                                </tr>
                            </thead>
                            <tbody id=\"orderModalItems\">
                            </tbody>
                            <tfoot class=\"table-light\">
                                <tr>
                                    <th colspan=\"3\" class=\"text-end\">";
        // line 185
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "total", [], "any", true, true, false, 185)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "total", [], "any", false, false, false, 185), "Итого:")) : ("Итого:")), "html", null, true);
        yield "</th>
                                    <th class=\"text-end text-success\" id=\"orderModalTotal\"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">
                    <i class=\"bi bi-x-lg me-1\"></i>";
        // line 195
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "close", [], "any", true, true, false, 195)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "close", [], "any", false, false, false, 195), "Закрыть")) : ("Закрыть")), "html", null, true);
        yield "
                </button>
                <button type=\"button\" class=\"btn btn-success\" id=\"btnCompleteOrder\">
                    <i class=\"bi bi-check-lg me-1\"></i>";
        // line 198
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "complete", [], "any", true, true, false, 198)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "complete", [], "any", false, false, false, 198), "Завершить")) : ("Завершить")), "html", null, true);
        yield "
                </button>
                <button type=\"button\" class=\"btn btn-outline-danger\" id=\"btnCancelOrder\">
                    <i class=\"bi bi-x-lg me-1\"></i>";
        // line 201
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "cancel", [], "any", true, true, false, 201)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "cancel", [], "any", false, false, false, 201), "Отменить")) : ("Отменить")), "html", null, true);
        yield "
                </button>
            </div>
        </div>
    </div>
</div>
";
        return; yield;
    }

    // line 209
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 210
        yield "<script>
document.addEventListener(\"DOMContentLoaded\", function() {
    let currentOrderId = null;
    let currentOrderStatus = null;
    const orders = ";
        // line 214
        yield (string) ($context["ordersJson"] ?? null);
        yield ";

    function getOrderDate(order) {
        return order.created_at || order.date || null;
    }

    function formatDate(dateStr) {
        if (!dateStr) return \"—\";
        const date = new Date(dateStr);
        if (isNaN(date.getTime())) return \"—\";
        return date.toLocaleString(\"ru-RU\", {
            day: \"2-digit\",
            month: \"2-digit\",
            year: \"numeric\",
            hour: \"2-digit\",
            minute: \"2-digit\"
        });
    }

    document.querySelectorAll(\".btn-view-order\").forEach(btn => {
        btn.addEventListener(\"click\", function() {
            const orderId = this.dataset.id;
            const order = orders.find(o => o.id == orderId);
            if (!order) return;

            currentOrderId = orderId;
            currentOrderStatus = order.status;

            document.getElementById(\"orderModalId\").textContent = orderId;
            document.getElementById(\"orderModalFio\").textContent = order.fio || \"—\";
            document.getElementById(\"orderModalEmail\").textContent = order.email || \"—\";
            document.getElementById(\"orderModalPhone\").textContent = order.phone || \"—\";
            document.getElementById(\"orderModalAddress\").textContent = order.address || \"—\";
            document.getElementById(\"orderModalDate\").textContent = formatDate(getOrderDate(order));
            document.getElementById(\"orderModalPayment\").textContent = order.payment === \"cash\" ? \"";
        // line 248
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCash", [], "any", true, true, false, 248)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCash", [], "any", false, false, false, 248), "Наличными")) : ("Наличными")), "html", null, true);
        yield "\" : \"";
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCard", [], "any", true, true, false, 248)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCard", [], "any", false, false, false, 248), "Картой")) : ("Картой")), "html", null, true);
        yield "\";

            const statusMap = {
                \"new\": {text: \"";
        // line 251
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusNew", [], "any", true, true, false, 251)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusNew", [], "any", false, false, false, 251), "Новый")) : ("Новый")), "html", null, true);
        yield "\", class: \"bg-primary\"},
                \"processing\": {text: \"";
        // line 252
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusProcessing", [], "any", true, true, false, 252)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusProcessing", [], "any", false, false, false, 252), "В обработке")) : ("В обработке")), "html", null, true);
        yield "\", class: \"bg-warning text-dark\"},
                \"completed\": {text: \"";
        // line 253
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCompleted", [], "any", true, true, false, 253)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCompleted", [], "any", false, false, false, 253), "Выполнен")) : ("Выполнен")), "html", null, true);
        yield "\", class: \"bg-success\"},
                \"cancelled\": {text: \"";
        // line 254
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCancelled", [], "any", true, true, false, 254)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCancelled", [], "any", false, false, false, 254), "Отменён")) : ("Отменён")), "html", null, true);
        yield "\", class: \"bg-danger\"}
            };
            const status = statusMap[order.status] || {text: order.status, class: \"bg-secondary\"};
            document.getElementById(\"orderModalStatus\").innerHTML = `<span class=\"badge \${status.class}\">\${status.text}</span>`;

            const itemsHtml = (order.items || []).map(item => `
                <tr>
                    <td>
                        <div class=\"d-flex align-items-center\">
                            <img src=\"\${item.image || \"/assets/img/no-image.jpg\"}\" alt=\"\" width=\"40\" height=\"40\" class=\"rounded me-2\" style=\"object-fit: cover;\">
                            <span>\${item.name}</span>
                        </div>
                    </td>
                    <td>\${new Intl.NumberFormat(\"ru-RU\").format(item.price)} ₽</td>
                    <td>× \${item.quantity}</td>
                    <td class=\"text-end\">\${new Intl.NumberFormat(\"ru-RU\").format(item.price * item.quantity)} ₽</td>
                </tr>
            `).join(\"\");
            document.getElementById(\"orderModalItems\").innerHTML = itemsHtml;
            document.getElementById(\"orderModalTotal\").textContent = new Intl.NumberFormat(\"ru-RU\").format(order.total) + \" ₽\";

            const btnComplete = document.getElementById(\"btnCompleteOrder\");
            const btnCancel = document.getElementById(\"btnCancelOrder\");

            if (order.status === \"completed\" || order.status === \"cancelled\") {
                btnComplete.style.display = \"none\";
                btnCancel.style.display = \"none\";
            } else {
                btnComplete.style.display = \"\";
                btnCancel.style.display = \"\";
            }

            const modal = new bootstrap.Modal(document.getElementById(\"orderModal\"));
            modal.show();
        });
    });

    document.getElementById(\"btnCompleteOrder\").addEventListener(\"click\", function() {
        if (!currentOrderId) return;
        updateOrderStatus(currentOrderId, \"completed\");
    });

    document.getElementById(\"btnCancelOrder\").addEventListener(\"click\", function() {
        if (!currentOrderId) return;
        if (confirm(\"Вы уверены, что хотите отменить этот заказ?\")) {
            updateOrderStatus(currentOrderId, \"cancelled\");
        }
    });

    document.querySelectorAll(\".btn-complete-order\").forEach(btn => {
        btn.addEventListener(\"click\", function(e) {
            e.stopPropagation();
            updateOrderStatus(this.dataset.id, \"completed\");
        });
    });

    document.querySelectorAll(\".btn-cancel-order\").forEach(btn => {
        btn.addEventListener(\"click\", function(e) {
            e.stopPropagation();
            if (confirm(\"Вы уверены, что хотите отменить этот заказ?\")) {
                updateOrderStatus(this.dataset.id, \"cancelled\");
            }
        });
    });

    async function updateOrderStatus(orderId, status) {
        try {
            const response = await fetch(\"/api/cart/update-status\", {
                method: \"POST\",
                headers: {\"Content-Type\": \"application/json\"},
                body: JSON.stringify({id: orderId, status: status})
            });
            const result = await response.json();

            if (result.success) {
                location.reload();
            } else {
                alert(result.error || \"Ошибка\");
            }
        } catch (e) {
            alert(\"Ошибка соединения\");
        }
    }
});
</script>
";
        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin_orders.html.twig";
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
        return array (  553 => 254,  549 => 253,  545 => 252,  541 => 251,  533 => 248,  496 => 214,  490 => 210,  483 => 209,  471 => 201,  465 => 198,  459 => 195,  446 => 185,  436 => 178,  432 => 177,  428 => 176,  424 => 175,  414 => 168,  404 => 161,  400 => 160,  396 => 159,  391 => 157,  380 => 149,  376 => 148,  372 => 147,  368 => 146,  363 => 144,  341 => 124,  338 => 123,  325 => 117,  321 => 116,  315 => 113,  311 => 112,  305 => 109,  301 => 108,  295 => 105,  291 => 104,  285 => 101,  281 => 100,  273 => 97,  267 => 93,  264 => 92,  261 => 91,  258 => 90,  255 => 89,  252 => 88,  249 => 87,  244 => 86,  239 => 84,  236 => 83,  234 => 82,  228 => 78,  225 => 77,  212 => 71,  208 => 70,  202 => 67,  198 => 66,  192 => 63,  188 => 62,  182 => 59,  178 => 58,  172 => 55,  168 => 54,  160 => 51,  154 => 47,  151 => 46,  148 => 45,  145 => 44,  142 => 43,  139 => 42,  136 => 41,  131 => 40,  126 => 38,  123 => 37,  121 => 36,  110 => 28,  106 => 27,  98 => 22,  94 => 21,  83 => 13,  78 => 11,  73 => 8,  71 => 7,  69 => 6,  66 => 5,  64 => 4,  57 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block content %}
{% set ordersText = texts.orders|default({}) %}

{% set activeOrders = orders|filter(o => o.status|default(\x27new\x27) in [\x27new\x27, \x27processing\x27]) %}
{% set completedOrders = orders|filter(o => o.status|default(\x27\x27) in [\x27completed\x27, \x27cancelled\x27]) %}

<div class=\"container py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"mb-0\">{{ ordersText.title|default(\x27Заказы\x27) }}</h1>
        <a href=\"/admin\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i>{{ ordersText.back|default(\x27Назад\x27) }}
        </a>
    </div>

    <!-- Вкладки -->
    <ul class=\"nav nav-tabs mb-4\" id=\"ordersTabs\" role=\"tablist\">
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link active\" id=\"active-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#active-orders\" type=\"button\" role=\"tab\">
                <i class=\"bi bi-clock-history me-1\"></i>{{ ordersText.active|default(\x27Активные\x27) }}
                <span class=\"badge bg-danger ms-2\">{{ activeOrders|length }}</span>
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"completed-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#completed-orders\" type=\"button\" role=\"tab\">
                <i class=\"bi bi-check2-circle me-1\"></i>{{ ordersText.completed|default(\x27Завершённые\x27) }}
                <span class=\"badge bg-secondary ms-2\">{{ completedOrders|length }}</span>
            </button>
        </li>
    </ul>

    <div class=\"tab-content\" id=\"ordersTabsContent\">
        <!-- Активные заказы -->
        <div class=\"tab-pane fade show active\" id=\"active-orders\" role=\"tabpanel\">
            {% if activeOrders is empty %}
                <div class=\"text-center py-5\"><i class=\"bi bi-inbox fs-1 text-muted mb-3 d-block\"></i>
                    <h5 class=\"text-muted\">{{ ordersText.noOrders|default(\x27Заказов нет\x27) }}</h5></div>
            {% else %}
                {% for order in activeOrders %}
                    {% set status = order.status|default(\x27new\x27) %}
                    {% set statusBadge = status|status_badge(ordersText) %}
                    {% set itemsCount = order.items|length %}
                    {% set total = order.total|default(0)|number_format(0, \x27.\x27, \x27 \x27) %}
                    {% set dateStr = order.created_at|default(order.date|default(\x27\x27)) %}
                    {% set createdAt = dateStr ? dateStr|date(\x27d.m.Y H:i\x27) : \x27—\x27 %}
                    <div class=\"card mb-3 shadow-sm order-card\" style=\"cursor: pointer;\">
                        <div class=\"card-body\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-md-1\">
                                    <button class=\"btn btn-link text-decoration-none fw-bold btn-view-order\" data-id=\"{{ order.id }}\">#{{ order.id|slice(-8) }}</button>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"fw-medium\">{{ order.fio|default(\x27—\x27) }}</div>
                                    <small class=\"text-muted\">{{ order.phone|default(\x27—\x27) }}</small>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.products|default(\x27Товаров\x27) }}</small>
                                    <strong>{{ itemsCount }}</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.amount|default(\x27Сумма\x27) }}</small>
                                    <strong class=\"text-success\">{{ total }} ₽</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.status|default(\x27Статус\x27) }}</small>
                                    <div>{{ statusBadge }}</div>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.date|default(\x27Дата\x27) }}</small>
                                    <small>{{ createdAt }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            {% endif %}
        </div>

        <!-- Завершённые заказы -->
        <div class=\"tab-pane fade\" id=\"completed-orders\" role=\"tabpanel\">
            {% if completedOrders is empty %}
                <div class=\"text-center py-5\"><i class=\"bi bi-inbox fs-1 text-muted mb-3 d-block\"></i>
                    <h5 class=\"text-muted\">{{ ordersText.noOrders|default(\x27Заказов нет\x27) }}</h5></div>
            {% else %}
                {% for order in completedOrders %}
                    {% set status = order.status|default(\x27new\x27) %}
                    {% set statusBadge = status|status_badge(ordersText) %}
                    {% set itemsCount = order.items|length %}
                    {% set total = order.total|default(0)|number_format(0, \x27.\x27, \x27 \x27) %}
                    {% set dateStr = order.created_at|default(order.date|default(\x27\x27)) %}
                    {% set createdAt = dateStr ? dateStr|date(\x27d.m.Y H:i\x27) : \x27—\x27 %}
                    <div class=\"card mb-3 shadow-sm order-card\" style=\"cursor: pointer;\">
                        <div class=\"card-body\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-md-1\">
                                    <button class=\"btn btn-link text-decoration-none fw-bold btn-view-order\" data-id=\"{{ order.id }}\">#{{ order.id|slice(-8) }}</button>
                                </div>
                                <div class=\"col-md-3\">
                                    <div class=\"fw-medium\">{{ order.fio|default(\x27—\x27) }}</div>
                                    <small class=\"text-muted\">{{ order.phone|default(\x27—\x27) }}</small>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.products|default(\x27Товаров\x27) }}</small>
                                    <strong>{{ itemsCount }}</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.amount|default(\x27Сумма\x27) }}</small>
                                    <strong class=\"text-success\">{{ total }} ₽</strong>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.status|default(\x27Статус\x27) }}</small>
                                    <div>{{ statusBadge }}</div>
                                </div>
                                <div class=\"col-md-2\">
                                    <small class=\"text-muted d-block\">{{ ordersText.date|default(\x27Дата\x27) }}</small>
                                    <small>{{ createdAt }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                {% endfor %}
            {% endif %}
        </div>
    </div>
</div>

<!-- Модальное окно просмотра заказа -->
<div class=\"modal fade\" id=\"orderModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\">
            <div class=\"modal-header bg-primary text-white\">
                <h5 class=\"modal-title\">
                    <i class=\"bi bi-receipt me-2\"></i>Заказ #<span id=\"orderModalId\"></span>
                </h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\" aria-label=\"Закрыть\"></button>
            </div>
            <div class=\"modal-body\">
                <div class=\"row g-3 mb-4\">
                    <div class=\"col-md-6\">
                        <div class=\"card h-100 border-0 bg-light\">
                            <div class=\"card-body\">
                                <h6 class=\"text-muted mb-3\">
                                    <i class=\"bi bi-person me-1\"></i>{{ ordersText.customer|default(\x27Клиент\x27) }}
                                </h6>
                                <p class=\"mb-2\"><strong>{{ ordersText.fio|default(\x27ФИО:\x27) }}</strong> <span id=\"orderModalFio\"></span></p>
                                <p class=\"mb-2\"><strong>{{ ordersText.email|default(\x27Email:\x27) }}</strong> <span id=\"orderModalEmail\"></span></p>
                                <p class=\"mb-2\"><strong>{{ ordersText.phone|default(\x27Телефон:\x27) }}</strong> <span id=\"orderModalPhone\"></span></p>
                                <p class=\"mb-0\"><strong>{{ ordersText.address|default(\x27Адрес:\x27) }}</strong> <span id=\"orderModalAddress\"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"card h-100 border-0 bg-light\">
                            <div class=\"card-body\">
                                <h6 class=\"text-muted mb-3\">
                                    <i class=\"bi bi-info-circle me-1\"></i>{{ ordersText.details|default(\x27Детали\x27) }}
                                </h6>
                                <p class=\"mb-2\"><strong>{{ ordersText.date|default(\x27Дата:\x27) }}</strong> <span id=\"orderModalDate\"></span></p>
                                <p class=\"mb-2\"><strong>{{ ordersText.status|default(\x27Статус:\x27) }}</strong> <span id=\"orderModalStatus\"></span></p>
                                <p class=\"mb-0\"><strong>{{ ordersText.payment|default(\x27Оплата:\x27) }}</strong> <span id=\"orderModalPayment\"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class=\"text-muted mb-3\">
                    <i class=\"bi bi-box-seam me-1\"></i>{{ ordersText.items|default(\x27Товары\x27) }}
                </h6>
                <div class=\"card border-0 shadow-sm\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover mb-0\">
                            <thead class=\"table-light\">
                                <tr>
                                    <th style=\"width: 50%\">{{ ordersText.item|default(\x27Товар\x27) }}</th>
                                    <th>{{ ordersText.price|default(\x27Цена\x27) }}</th>
                                    <th>{{ ordersText.quantity|default(\x27Кол-во\x27) }}</th>
                                    <th class=\"text-end\">{{ ordersText.sum|default(\x27Сумма\x27) }}</th>
                                </tr>
                            </thead>
                            <tbody id=\"orderModalItems\">
                            </tbody>
                            <tfoot class=\"table-light\">
                                <tr>
                                    <th colspan=\"3\" class=\"text-end\">{{ ordersText.total|default(\x27Итого:\x27) }}</th>
                                    <th class=\"text-end text-success\" id=\"orderModalTotal\"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">
                    <i class=\"bi bi-x-lg me-1\"></i>{{ ordersText.close|default(\x27Закрыть\x27) }}
                </button>
                <button type=\"button\" class=\"btn btn-success\" id=\"btnCompleteOrder\">
                    <i class=\"bi bi-check-lg me-1\"></i>{{ ordersText.complete|default(\x27Завершить\x27) }}
                </button>
                <button type=\"button\" class=\"btn btn-outline-danger\" id=\"btnCancelOrder\">
                    <i class=\"bi bi-x-lg me-1\"></i>{{ ordersText.cancel|default(\x27Отменить\x27) }}
                </button>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
document.addEventListener(\"DOMContentLoaded\", function() {
    let currentOrderId = null;
    let currentOrderStatus = null;
    const orders = {{ ordersJson|raw }};

    function getOrderDate(order) {
        return order.created_at || order.date || null;
    }

    function formatDate(dateStr) {
        if (!dateStr) return \"—\";
        const date = new Date(dateStr);
        if (isNaN(date.getTime())) return \"—\";
        return date.toLocaleString(\"ru-RU\", {
            day: \"2-digit\",
            month: \"2-digit\",
            year: \"numeric\",
            hour: \"2-digit\",
            minute: \"2-digit\"
        });
    }

    document.querySelectorAll(\".btn-view-order\").forEach(btn => {
        btn.addEventListener(\"click\", function() {
            const orderId = this.dataset.id;
            const order = orders.find(o => o.id == orderId);
            if (!order) return;

            currentOrderId = orderId;
            currentOrderStatus = order.status;

            document.getElementById(\"orderModalId\").textContent = orderId;
            document.getElementById(\"orderModalFio\").textContent = order.fio || \"—\";
            document.getElementById(\"orderModalEmail\").textContent = order.email || \"—\";
            document.getElementById(\"orderModalPhone\").textContent = order.phone || \"—\";
            document.getElementById(\"orderModalAddress\").textContent = order.address || \"—\";
            document.getElementById(\"orderModalDate\").textContent = formatDate(getOrderDate(order));
            document.getElementById(\"orderModalPayment\").textContent = order.payment === \"cash\" ? \"{{ ordersText.paymentCash|default(\x27Наличными\x27) }}\" : \"{{ ordersText.paymentCard|default(\x27Картой\x27) }}\";

            const statusMap = {
                \"new\": {text: \"{{ ordersText.statusNew|default(\x27Новый\x27) }}\", class: \"bg-primary\"},
                \"processing\": {text: \"{{ ordersText.statusProcessing|default(\x27В обработке\x27) }}\", class: \"bg-warning text-dark\"},
                \"completed\": {text: \"{{ ordersText.statusCompleted|default(\x27Выполнен\x27) }}\", class: \"bg-success\"},
                \"cancelled\": {text: \"{{ ordersText.statusCancelled|default(\x27Отменён\x27) }}\", class: \"bg-danger\"}
            };
            const status = statusMap[order.status] || {text: order.status, class: \"bg-secondary\"};
            document.getElementById(\"orderModalStatus\").innerHTML = `<span class=\"badge \${status.class}\">\${status.text}</span>`;

            const itemsHtml = (order.items || []).map(item => `
                <tr>
                    <td>
                        <div class=\"d-flex align-items-center\">
                            <img src=\"\${item.image || \"/assets/img/no-image.jpg\"}\" alt=\"\" width=\"40\" height=\"40\" class=\"rounded me-2\" style=\"object-fit: cover;\">
                            <span>\${item.name}</span>
                        </div>
                    </td>
                    <td>\${new Intl.NumberFormat(\"ru-RU\").format(item.price)} ₽</td>
                    <td>× \${item.quantity}</td>
                    <td class=\"text-end\">\${new Intl.NumberFormat(\"ru-RU\").format(item.price * item.quantity)} ₽</td>
                </tr>
            `).join(\"\");
            document.getElementById(\"orderModalItems\").innerHTML = itemsHtml;
            document.getElementById(\"orderModalTotal\").textContent = new Intl.NumberFormat(\"ru-RU\").format(order.total) + \" ₽\";

            const btnComplete = document.getElementById(\"btnCompleteOrder\");
            const btnCancel = document.getElementById(\"btnCancelOrder\");

            if (order.status === \"completed\" || order.status === \"cancelled\") {
                btnComplete.style.display = \"none\";
                btnCancel.style.display = \"none\";
            } else {
                btnComplete.style.display = \"\";
                btnCancel.style.display = \"\";
            }

            const modal = new bootstrap.Modal(document.getElementById(\"orderModal\"));
            modal.show();
        });
    });

    document.getElementById(\"btnCompleteOrder\").addEventListener(\"click\", function() {
        if (!currentOrderId) return;
        updateOrderStatus(currentOrderId, \"completed\");
    });

    document.getElementById(\"btnCancelOrder\").addEventListener(\"click\", function() {
        if (!currentOrderId) return;
        if (confirm(\"Вы уверены, что хотите отменить этот заказ?\")) {
            updateOrderStatus(currentOrderId, \"cancelled\");
        }
    });

    document.querySelectorAll(\".btn-complete-order\").forEach(btn => {
        btn.addEventListener(\"click\", function(e) {
            e.stopPropagation();
            updateOrderStatus(this.dataset.id, \"completed\");
        });
    });

    document.querySelectorAll(\".btn-cancel-order\").forEach(btn => {
        btn.addEventListener(\"click\", function(e) {
            e.stopPropagation();
            if (confirm(\"Вы уверены, что хотите отменить этот заказ?\")) {
                updateOrderStatus(this.dataset.id, \"cancelled\");
            }
        });
    });

    async function updateOrderStatus(orderId, status) {
        try {
            const response = await fetch(\"/api/cart/update-status\", {
                method: \"POST\",
                headers: {\"Content-Type\": \"application/json\"},
                body: JSON.stringify({id: orderId, status: status})
            });
            const result = await response.json();

            if (result.success) {
                location.reload();
            } else {
                alert(result.error || \"Ошибка\");
            }
        } catch (e) {
            alert(\"Ошибка соединения\");
        }
    }
});
</script>
{% endblock %}
", "admin_orders.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\admin_orders.html.twig");
    }
}
