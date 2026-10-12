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
        $context["activeCount"] = (( !Twig\Extension\CoreExtension::testEmpty(((array_key_exists("activeOrdersHtml", $context)) ? (Twig\Extension\CoreExtension::default(($context["activeOrdersHtml"] ?? null), "")) : ("")))) ? (Twig\Extension\CoreExtension::length($this->env->getCharset(), ((array_key_exists("activeOrders", $context)) ? (Twig\Extension\CoreExtension::default(($context["activeOrders"] ?? null), [])) : ([])))) : (0));
        // line 6
        $context["completedCount"] = (( !Twig\Extension\CoreExtension::testEmpty(((array_key_exists("completedOrdersHtml", $context)) ? (Twig\Extension\CoreExtension::default(($context["completedOrdersHtml"] ?? null), "")) : ("")))) ? (Twig\Extension\CoreExtension::length($this->env->getCharset(), ((array_key_exists("completedOrders", $context)) ? (Twig\Extension\CoreExtension::default(($context["completedOrders"] ?? null), [])) : ([])))) : (0));
        // line 7
        yield "
<div class=\"container py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"mb-0\">";
        // line 10
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "title", [], "any", true, true, false, 10)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "title", [], "any", false, false, false, 10), "Заказы")) : ("Заказы")), "html", null, true);
        yield "</h1>
        <a href=\"/admin\" class=\"btn btn-outline-secondary\">
            <i class=\"bi bi-arrow-left me-1\"></i>";
        // line 12
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "back", [], "any", true, true, false, 12)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "back", [], "any", false, false, false, 12), "Назад")) : ("Назад")), "html", null, true);
        yield "
        </a>
    </div>

    <!-- Вкладки -->
    <ul class=\"nav nav-tabs mb-4\" id=\"ordersTabs\" role=\"tablist\">
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link active\" id=\"active-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#active-orders\" type=\"button\" role=\"tab\">
                <i class=\"bi bi-clock-history me-1\"></i>";
        // line 20
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "active", [], "any", true, true, false, 20)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "active", [], "any", false, false, false, 20), "Активные")) : ("Активные")), "html", null, true);
        yield "
                <span class=\"badge bg-danger ms-2\">";
        // line 21
        yield (string) $this->escaper->escape(($context["activeCount"] ?? null), "html", null, true);
        yield "</span>
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"completed-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#completed-orders\" type=\"button\" role=\"tab\">
                <i class=\"bi bi-check2-circle me-1\"></i>";
        // line 26
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "completed", [], "any", true, true, false, 26)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "completed", [], "any", false, false, false, 26), "Завершённые")) : ("Завершённые")), "html", null, true);
        yield "
                <span class=\"badge bg-secondary ms-2\">";
        // line 27
        yield (string) $this->escaper->escape(($context["completedCount"] ?? null), "html", null, true);
        yield "</span>
            </button>
        </li>
    </ul>

    <div class=\"tab-content\" id=\"ordersTabsContent\">
        <!-- Активные заказы -->
        <div class=\"tab-pane fade show active\" id=\"active-orders\" role=\"tabpanel\">
            ";
        // line 35
        yield (string) ((array_key_exists("activeOrdersHtml", $context)) ? (Twig\Extension\CoreExtension::default(($context["activeOrdersHtml"] ?? null), "")) : (""));
        yield "
        </div>

        <!-- Завершённые заказы -->
        <div class=\"tab-pane fade\" id=\"completed-orders\" role=\"tabpanel\">
            ";
        // line 40
        yield (string) ((array_key_exists("completedOrdersHtml", $context)) ? (Twig\Extension\CoreExtension::default(($context["completedOrdersHtml"] ?? null), "")) : (""));
        yield "
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
                                    <i class=\"bi bi-person me-1\"></i>";
        // line 61
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "customer", [], "any", true, true, false, 61)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "customer", [], "any", false, false, false, 61), "Клиент")) : ("Клиент")), "html", null, true);
        yield "
                                </h6>
                                <p class=\"mb-2\"><strong>";
        // line 63
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "fio", [], "any", true, true, false, 63)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "fio", [], "any", false, false, false, 63), "ФИО:")) : ("ФИО:")), "html", null, true);
        yield "</strong> <span id=\"orderModalFio\"></span></p>
                                <p class=\"mb-2\"><strong>";
        // line 64
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "email", [], "any", true, true, false, 64)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "email", [], "any", false, false, false, 64), "Email:")) : ("Email:")), "html", null, true);
        yield "</strong> <span id=\"orderModalEmail\"></span></p>
                                <p class=\"mb-2\"><strong>";
        // line 65
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "phone", [], "any", true, true, false, 65)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "phone", [], "any", false, false, false, 65), "Телефон:")) : ("Телефон:")), "html", null, true);
        yield "</strong> <span id=\"orderModalPhone\"></span></p>
                                <p class=\"mb-0\"><strong>";
        // line 66
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "address", [], "any", true, true, false, 66)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "address", [], "any", false, false, false, 66), "Адрес:")) : ("Адрес:")), "html", null, true);
        yield "</strong> <span id=\"orderModalAddress\"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"card h-100 border-0 bg-light\">
                            <div class=\"card-body\">
                                <h6 class=\"text-muted mb-3\">
                                    <i class=\"bi bi-info-circle me-1\"></i>";
        // line 74
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "details", [], "any", true, true, false, 74)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "details", [], "any", false, false, false, 74), "Детали")) : ("Детали")), "html", null, true);
        yield "
                                </h6>
                                <p class=\"mb-2\"><strong>";
        // line 76
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", true, true, false, 76)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "date", [], "any", false, false, false, 76), "Дата:")) : ("Дата:")), "html", null, true);
        yield "</strong> <span id=\"orderModalDate\"></span></p>
                                <p class=\"mb-2\"><strong>";
        // line 77
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "status", [], "any", false, false, false, 77), "Статус:")) : ("Статус:")), "html", null, true);
        yield "</strong> <span id=\"orderModalStatus\"></span></p>
                                <p class=\"mb-0\"><strong>";
        // line 78
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "payment", [], "any", true, true, false, 78)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "payment", [], "any", false, false, false, 78), "Оплата:")) : ("Оплата:")), "html", null, true);
        yield "</strong> <span id=\"orderModalPayment\"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class=\"text-muted mb-3\">
                    <i class=\"bi bi-box-seam me-1\"></i>";
        // line 85
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "items", [], "any", true, true, false, 85)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "items", [], "any", false, false, false, 85), "Товары")) : ("Товары")), "html", null, true);
        yield "
                </h6>
                <div class=\"card border-0 shadow-sm\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-hover mb-0\">
                            <thead class=\"table-light\">
                                <tr>
                                    <th style=\"width: 50%\">";
        // line 92
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "item", [], "any", true, true, false, 92)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "item", [], "any", false, false, false, 92), "Товар")) : ("Товар")), "html", null, true);
        yield "</th>
                                    <th>";
        // line 93
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "price", [], "any", true, true, false, 93)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "price", [], "any", false, false, false, 93), "Цена")) : ("Цена")), "html", null, true);
        yield "</th>
                                    <th>";
        // line 94
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "quantity", [], "any", true, true, false, 94)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "quantity", [], "any", false, false, false, 94), "Кол-во")) : ("Кол-во")), "html", null, true);
        yield "</th>
                                    <th class=\"text-end\">";
        // line 95
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "sum", [], "any", true, true, false, 95)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "sum", [], "any", false, false, false, 95), "Сумма")) : ("Сумма")), "html", null, true);
        yield "</th>
                                </tr>
                            </thead>
                            <tbody id=\"orderModalItems\">
                            </tbody>
                            <tfoot class=\"table-light\">
                                <tr>
                                    <th colspan=\"3\" class=\"text-end\">";
        // line 102
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "total", [], "any", true, true, false, 102)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "total", [], "any", false, false, false, 102), "Итого:")) : ("Итого:")), "html", null, true);
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
        // line 112
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "close", [], "any", true, true, false, 112)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "close", [], "any", false, false, false, 112), "Закрыть")) : ("Закрыть")), "html", null, true);
        yield "
                </button>
                <button type=\"button\" class=\"btn btn-success\" id=\"btnCompleteOrder\">
                    <i class=\"bi bi-check-lg me-1\"></i>";
        // line 115
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "complete", [], "any", true, true, false, 115)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "complete", [], "any", false, false, false, 115), "Завершить")) : ("Завершить")), "html", null, true);
        yield "
                </button>
                <button type=\"button\" class=\"btn btn-outline-danger\" id=\"btnCancelOrder\">
                    <i class=\"bi bi-x-lg me-1\"></i>";
        // line 118
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "cancel", [], "any", true, true, false, 118)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "cancel", [], "any", false, false, false, 118), "Отменить")) : ("Отменить")), "html", null, true);
        yield "
                </button>
            </div>
        </div>
    </div>
</div>
";
        return; yield;
    }

    // line 126
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 127
        yield "<script>
document.addEventListener(\"DOMContentLoaded\", function() {
    let currentOrderId = null;
    let currentOrderStatus = null;
    const orders = ";
        // line 131
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
        // line 165
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCash", [], "any", true, true, false, 165)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCash", [], "any", false, false, false, 165), "Наличными")) : ("Наличными")), "html", null, true);
        yield "\" : \"";
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCard", [], "any", true, true, false, 165)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "paymentCard", [], "any", false, false, false, 165), "Картой")) : ("Картой")), "html", null, true);
        yield "\";

            const statusMap = {
                \"new\": {text: \"";
        // line 168
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusNew", [], "any", true, true, false, 168)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusNew", [], "any", false, false, false, 168), "Новый")) : ("Новый")), "html", null, true);
        yield "\", class: \"bg-primary\"},
                \"processing\": {text: \"";
        // line 169
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusProcessing", [], "any", true, true, false, 169)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusProcessing", [], "any", false, false, false, 169), "В обработке")) : ("В обработке")), "html", null, true);
        yield "\", class: \"bg-warning text-dark\"},
                \"completed\": {text: \"";
        // line 170
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCompleted", [], "any", true, true, false, 170)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCompleted", [], "any", false, false, false, 170), "Выполнен")) : ("Выполнен")), "html", null, true);
        yield "\", class: \"bg-success\"},
                \"cancelled\": {text: \"";
        // line 171
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCancelled", [], "any", true, true, false, 171)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["ordersText"] ?? null), "statusCancelled", [], "any", false, false, false, 171), "Отменён")) : ("Отменён")), "html", null, true);
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
        return array (  340 => 171,  336 => 170,  332 => 169,  328 => 168,  320 => 165,  283 => 131,  277 => 127,  270 => 126,  258 => 118,  252 => 115,  246 => 112,  233 => 102,  223 => 95,  219 => 94,  215 => 93,  211 => 92,  201 => 85,  191 => 78,  187 => 77,  183 => 76,  178 => 74,  167 => 66,  163 => 65,  159 => 64,  155 => 63,  150 => 61,  126 => 40,  118 => 35,  107 => 27,  103 => 26,  95 => 21,  91 => 20,  80 => 12,  75 => 10,  70 => 7,  68 => 6,  66 => 5,  64 => 4,  57 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block content %}
{% set ordersText = texts.orders|default({}) %}
{% set activeCount = activeOrdersHtml|default(\x27\x27) is not empty ? activeOrders|default([])|length : 0 %}
{% set completedCount = completedOrdersHtml|default(\x27\x27) is not empty ? completedOrders|default([])|length : 0 %}

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
                <span class=\"badge bg-danger ms-2\">{{ activeCount }}</span>
            </button>
        </li>
        <li class=\"nav-item\" role=\"presentation\">
            <button class=\"nav-link\" id=\"completed-tab\" data-bs-toggle=\"tab\" data-bs-target=\"#completed-orders\" type=\"button\" role=\"tab\">
                <i class=\"bi bi-check2-circle me-1\"></i>{{ ordersText.completed|default(\x27Завершённые\x27) }}
                <span class=\"badge bg-secondary ms-2\">{{ completedCount }}</span>
            </button>
        </li>
    </ul>

    <div class=\"tab-content\" id=\"ordersTabsContent\">
        <!-- Активные заказы -->
        <div class=\"tab-pane fade show active\" id=\"active-orders\" role=\"tabpanel\">
            {{ activeOrdersHtml|default(\x27\x27)|raw }}
        </div>

        <!-- Завершённые заказы -->
        <div class=\"tab-pane fade\" id=\"completed-orders\" role=\"tabpanel\">
            {{ completedOrdersHtml|default(\x27\x27)|raw }}
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
