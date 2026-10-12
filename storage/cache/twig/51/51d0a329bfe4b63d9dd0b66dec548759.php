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

/* admin_catalog.html.twig */
class __TwigTemplate_7a57ed31d5594b9661ca7762f1fdd979 extends Template
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
        $context["catalogText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "catalog", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "catalog", [], "any", false, false, false, 4), [])) : ([]));
        // line 5
        $context["productsData"] = ((array_key_exists("products", $context)) ? (Twig\Extension\CoreExtension::default(($context["products"] ?? null), [])) : ([]));
        // line 6
        yield "
<div class=\"container-fluid py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h2>";
        // line 9
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "title", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "title", [], "any", false, false, false, 9), "Управление каталогом")) : ("Управление каталогом")), "html", null, true);
        yield "</h2>
        <div>
            <a href=\"/admin\" class=\"btn btn-outline-secondary\">
                <i class=\"bi bi-arrow-left\"></i> ";
        // line 12
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "back", [], "any", true, true, false, 12)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "back", [], "any", false, false, false, 12), "Назад в панель")) : ("Назад в панель")), "html", null, true);
        yield "
            </a>
            <button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#productModal\">
                <i class=\"bi bi-plus-lg\"></i> ";
        // line 15
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "addProduct", [], "any", true, true, false, 15)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "addProduct", [], "any", false, false, false, 15), "Добавить товар")) : ("Добавить товар")), "html", null, true);
        yield "
            </button>
        </div>
    </div>

    <!-- Поиск и фильтр -->
    <div class=\"row mb-4\">
        <div class=\"col-md-6\">
            <input type=\"text\" class=\"form-control\" id=\"searchInput\"
                   placeholder=\"";
        // line 24
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "searchPlaceholder", [], "any", true, true, false, 24)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "searchPlaceholder", [], "any", false, false, false, 24), "Поиск по названию...")) : ("Поиск по названию...")), "html", null, true);
        yield "\">
        </div>
        <div class=\"col-md-4\">
            <select class=\"form-select\" id=\"categoryFilter\">
                <option value=\"\">";
        // line 28
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "allCategories", [], "any", true, true, false, 28)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "allCategories", [], "any", false, false, false, 28), "Все категории")) : ("Все категории")), "html", null, true);
        yield "</option>
                ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 30
            yield "                    <option value=\"";
            yield (string) $this->escaper->escape($context["category"], "html", null, true);
            yield "\">";
            yield (string) $this->escaper->escape($context["category"], "html", null, true);
            yield "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 32
        yield "            </select>
        </div>
    </div>

    <!-- Таблица товаров -->
    <div class=\"card\">
        <div class=\"card-body p-0\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\" id=\"productsTable\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>";
        // line 43
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "id", [], "any", true, true, false, 43)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "id", [], "any", false, false, false, 43), "ID")) : ("ID")), "html", null, true);
        yield "</th>
                            <th>";
        // line 44
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "image", [], "any", true, true, false, 44)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "image", [], "any", false, false, false, 44), "Изображение")) : ("Изображение")), "html", null, true);
        yield "</th>
                            <th>";
        // line 45
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "name", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "name", [], "any", false, false, false, 45), "Название")) : ("Название")), "html", null, true);
        yield "</th>
                            <th>";
        // line 46
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "category", [], "any", true, true, false, 46)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "category", [], "any", false, false, false, 46), "Категория")) : ("Категория")), "html", null, true);
        yield "</th>
                            <th>";
        // line 47
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "price", [], "any", true, true, false, 47)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "price", [], "any", false, false, false, 47), "Цена")) : ("Цена")), "html", null, true);
        yield "</th>
                            <th>";
        // line 48
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "actions", [], "any", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "actions", [], "any", false, false, false, 48), "Действия")) : ("Действия")), "html", null, true);
        yield "</th>
                        </tr>
                    </thead>
                    <tbody id=\"productsTableBody\">
                        ";
        // line 52
        yield (string) ((array_key_exists("productsHtml", $context)) ? (Twig\Extension\CoreExtension::default(($context["productsHtml"] ?? null), "")) : (""));
        yield "
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для добавления/редактирования товара -->
<div class=\"modal fade\" id=\"productModal\" tabindex=\"-1\" aria-labelledby=\"productModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"productModalLabel\">
                    ";
        // line 66
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "addProduct", [], "any", true, true, false, 66)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "addProduct", [], "any", false, false, false, 66), "Добавить товар")) : ("Добавить товар")), "html", null, true);
        yield "
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form id=\"productForm\">
                    <input type=\"hidden\" id=\"productId\" name=\"id\" value=\"\">

                    <div class=\"mb-3\">
                        <label for=\"productName\" class=\"form-label\">
                            ";
        // line 76
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "name", [], "any", true, true, false, 76)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "name", [], "any", false, false, false, 76), "Название")) : ("Название")), "html", null, true);
        yield " *
                        </label>
                        <input type=\"text\" class=\"form-control\" id=\"productName\" name=\"name\" required>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"productDescription\" class=\"form-label\">
                            ";
        // line 83
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "description", [], "any", true, true, false, 83)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "description", [], "any", false, false, false, 83), "Описание")) : ("Описание")), "html", null, true);
        yield "
                        </label>
                        <textarea class=\"form-control\" id=\"productDescription\" name=\"description\" rows=\"4\"></textarea>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"productPrice\" class=\"form-label\">
                                ";
        // line 91
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "price", [], "any", true, true, false, 91)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "price", [], "any", false, false, false, 91), "Цена")) : ("Цена")), "html", null, true);
        yield " *
                            </label>
                            <input type=\"number\" class=\"form-control\" id=\"productPrice\" name=\"price\"
                                   min=\"1\" step=\"1\" required>
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"productCategory\" class=\"form-label\">
                                ";
        // line 99
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "category", [], "any", true, true, false, 99)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "category", [], "any", false, false, false, 99), "Категория")) : ("Категория")), "html", null, true);
        yield " *
                            </label>
                            <div class=\"input-group\">
                                <input type=\"text\" class=\"form-control\" id=\"productCategory\" name=\"category\"
                                       list=\"categoryList\" required>
                                <datalist id=\"categoryList\">
                                    ";
        // line 105
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 106
            yield "                                        <option value=\"";
            yield (string) $this->escaper->escape($context["category"], "html", null, true);
            yield "\">
                                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 108
        yield "                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"productImage\" class=\"form-label\">
                            ";
        // line 115
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "image", [], "any", true, true, false, 115)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "image", [], "any", false, false, false, 115), "Изображение")) : ("Изображение")), "html", null, true);
        yield "
                        </label>
                        <input type=\"text\" class=\"form-control\" id=\"productImage\" name=\"image\"
                               placeholder=\"";
        // line 118
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "imageHint", [], "any", true, true, false, 118)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "imageHint", [], "any", false, false, false, 118), "URL или путь к изображению")) : ("URL или путь к изображению")), "html", null, true);
        yield "\"
                               value=\"/assets/img/no-image.jpg\">
                        <small class=\"text-muted\">";
        // line 120
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "imageHint", [], "any", true, true, false, 120)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "imageHint", [], "any", false, false, false, 120), "Например: /assets/img/photo.jpg или https://example.com/img.jpg")) : ("Например: /assets/img/photo.jpg или https://example.com/img.jpg")), "html", null, true);
        yield "</small>
                    </div>
                </form>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">
                    ";
        // line 126
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "cancel", [], "any", true, true, false, 126)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "cancel", [], "any", false, false, false, 126), "Отмена")) : ("Отмена")), "html", null, true);
        yield "
                </button>
                <button type=\"button\" class=\"btn btn-primary\" id=\"saveProductBtn\">
                    ";
        // line 129
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "save", [], "any", true, true, false, 129)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "save", [], "any", false, false, false, 129), "Сохранить")) : ("Сохранить")), "html", null, true);
        yield "
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно подтверждения удаления -->
<div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"deleteModalLabel\">
                    ";
        // line 142
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "deleteConfirm", [], "any", true, true, false, 142)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "deleteConfirm", [], "any", false, false, false, 142), "Подтверждение удаления")) : ("Подтверждение удаления")), "html", null, true);
        yield "
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                ";
        // line 147
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "confirmDelete", [], "any", true, true, false, 147)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "confirmDelete", [], "any", false, false, false, 147), "Вы уверены, что хотите удалить этот товар?")) : ("Вы уверены, что хотите удалить этот товар?")), "html", null, true);
        yield "
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">
                    ";
        // line 151
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "cancel", [], "any", true, true, false, 151)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "cancel", [], "any", false, false, false, 151), "Отмена")) : ("Отмена")), "html", null, true);
        yield "
                </button>
                <button type=\"button\" class=\"btn btn-danger\" id=\"confirmDeleteBtn\">
                    ";
        // line 154
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "delete", [], "any", true, true, false, 154)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "delete", [], "any", false, false, false, 154), "Удалить")) : ("Удалить")), "html", null, true);
        yield "
                </button>
            </div>
        </div>
    </div>
</div>
";
        return; yield;
    }

    // line 162
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 163
        yield "<script>
const productsData = ";
        // line 164
        yield (string) ($context["productsJson"] ?? null);
        yield ";
let categoriesData = ";
        // line 165
        yield (string) ($context["categoriesJson"] ?? null);
        yield ";

document.addEventListener(\x27DOMContentLoaded\x27, function() {
    const productModal = new bootstrap.Modal(document.getElementById(\x27productModal\x27));
    const deleteModal = new bootstrap.Modal(document.getElementById(\x27deleteModal\x27));

    let currentProductId = null;
    let products = productsData;

    document.getElementById(\x27searchInput\x27).addEventListener(\x27input\x27, function(e) {
        filterProducts();
    });

    document.getElementById(\x27categoryFilter\x27).addEventListener(\x27change\x27, function(e) {
        filterProducts();
    });

    function filterProducts() {
        const search = document.getElementById(\x27searchInput\x27).value.toLowerCase();
        const category = document.getElementById(\x27categoryFilter\x27).value;

        const filtered = products.filter(p => {
            const matchSearch = !search || (p.name && p.name.toLowerCase().includes(search));
            const matchCategory = !category || p.category === category;
            return matchSearch && matchCategory;
        });

        renderProducts(filtered);
    }

    function renderProducts(productsList) {
        const tbody = document.getElementById(\x27productsTableBody\x27);

        if (productsList.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan=\"6\" class=\"text-center py-4 text-muted\">
                        <i class=\"bi bi-box fs-1 d-block mb-2\"></i>
                        ";
        // line 203
        yield (string) $this->escaper->escape($this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "noProducts", [], "any", true, true, false, 203)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "noProducts", [], "any", false, false, false, 203), "Товаров пока нет")) : ("Товаров пока нет")), "js"), "html", null, true);
        yield "
                    </td>
                </tr>`;
            return;
        }

        tbody.innerHTML = productsList.map(p => `
            <tr data-id=\"\${p.id}\">
                <td>\${p.id}</td>
                <td>
                    <img src=\"\${p.image || \x27/assets/img/no-image.jpg\x27}\" alt=\"\${p.name}\"
                         class=\"img-thumbnail\" style=\"width: 50px; height: 50px; object-fit: cover;\">
                </td>
                <td>\${escapeHtml(p.name)}</td>
                <td>\${escapeHtml(p.category || \x27Без категории\x27)}</td>
                <td>\${Number(p.price).toLocaleString()} ₽</td>
                <td>
                    <button class=\"btn btn-sm btn-primary me-1 btn-edit\" data-id=\"\${p.id}\">
                        <i class=\"bi bi-pencil\"></i> ";
        // line 221
        yield (string) $this->escaper->escape($this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "edit", [], "any", true, true, false, 221)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "edit", [], "any", false, false, false, 221), "Редактировать")) : ("Редактировать")), "js"), "html", null, true);
        yield "
                    </button>
                    <button class=\"btn btn-sm btn-danger btn-delete\" data-id=\"\${p.id}\">
                        <i class=\"bi bi-trash\"></i> ";
        // line 224
        yield (string) $this->escaper->escape($this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "delete", [], "any", true, true, false, 224)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "delete", [], "any", false, false, false, 224), "Удалить")) : ("Удалить")), "js"), "html", null, true);
        yield "
                    </button>
                </td>
            </tr>
        `).join(\x27\x27);

        attachProductHandlers();
    }

    function escapeHtml(text) {
        const div = document.createElement(\x27div\x27);
        div.textContent = text;
        return div.innerHTML;
    }

    function attachProductHandlers() {
        document.querySelectorAll(\x27.btn-edit\x27).forEach(btn => {
            btn.addEventListener(\x27click\x27, function() {
                const id = parseInt(this.dataset.id);
                const product = products.find(p => p.id === id);
                if (product) {
                    openEditModal(product);
                }
            });
        });

        document.querySelectorAll(\x27.btn-delete\x27).forEach(btn => {
            btn.addEventListener(\x27click\x27, function() {
                currentProductId = parseInt(this.dataset.id);
                deleteModal.show();
            });
        });
    }

    function openEditModal(product) {
        document.getElementById(\x27productId\x27).value = product.id;
        document.getElementById(\x27productName\x27).value = product.name || \x27\x27;
        document.getElementById(\x27productDescription\x27).value = product.description || \x27\x27;
        document.getElementById(\x27productPrice\x27).value = product.price || \x27\x27;
        document.getElementById(\x27productCategory\x27).value = product.category || \x27\x27;
        document.getElementById(\x27productImage\x27).value = product.image || \x27/assets/img/no-image.jpg\x27;

        document.querySelector(\x27#productModal .modal-title\x27).textContent =
            \x27";
        // line 267
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "editProduct", [], "any", true, true, false, 267)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "editProduct", [], "any", false, false, false, 267), "Редактировать товар")) : ("Редактировать товар")), "html", null, true);
        yield "\x27;

        productModal.show();
    }

    document.querySelector(\x27[data-bs-target=\"#productModal\"]\x27).addEventListener(\x27click\x27, function() {
        document.getElementById(\x27productForm\x27).reset();
        document.getElementById(\x27productId\x27).value = \x27\x27;
        document.getElementById(\x27productImage\x27).value = \x27/assets/img/no-image.jpg\x27;

        document.querySelector(\x27#productModal .modal-title\x27).textContent =
            \x27";
        // line 278
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "addProduct", [], "any", true, true, false, 278)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "addProduct", [], "any", false, false, false, 278), "Добавить товар")) : ("Добавить товар")), "html", null, true);
        yield "\x27;
    });

    document.getElementById(\x27saveProductBtn\x27).addEventListener(\x27click\x27, async function() {
        const form = document.getElementById(\x27productForm\x27);

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const id = document.getElementById(\x27productId\x27).value;
        const data = {
            id: id ? parseInt(id) : null,
            name: document.getElementById(\x27productName\x27).value,
            description: document.getElementById(\x27productDescription\x27).value,
            price: parseInt(document.getElementById(\x27productPrice\x27).value),
            category: document.getElementById(\x27productCategory\x27).value,
            image: document.getElementById(\x27productImage\x27).value || \x27/assets/img/no-image.jpg\x27
        };

        if (!data.name || !data.price || !data.category) {
            alert(\x27";
        // line 300
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "required", [], "any", true, true, false, 300)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "required", [], "any", false, false, false, 300), "Заполните все обязательные поля")) : ("Заполните все обязательные поля")), "html", null, true);
        yield "\x27);
            return;
        }

        if (data.price <= 0) {
            alert(\x27";
        // line 305
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "minPrice", [], "any", true, true, false, 305)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "minPrice", [], "any", false, false, false, 305), "Цена должна быть больше 0")) : ("Цена должна быть больше 0")), "html", null, true);
        yield "\x27);
            return;
        }

        try {
            const url = id ? `/api/admin/product/\${id}` : \x27/api/admin/product\x27;
            const method = id ? \x27PUT\x27 : \x27POST\x27;

            const response = await fetch(url, {
                method: method,
                headers: {\x27Content-Type\x27: \x27application/json\x27},
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                productModal.hide();
                showAlert(result.message, \x27success\x27);
                setTimeout(() => loadProducts(), 100);
            } else {
                alert(result.error || \x27";
        // line 326
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", true, true, false, 326)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", false, false, false, 326), "Ошибка")) : ("Ошибка")), "html", null, true);
        yield "\x27);
            }
        } catch (error) {
            console.error(\x27Error:\x27, error);
            alert(\x27";
        // line 330
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", true, true, false, 330)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", false, false, false, 330), "Ошибка")) : ("Ошибка")), "html", null, true);
        yield "\x27);
        }
    });

    document.getElementById(\x27confirmDeleteBtn\x27).addEventListener(\x27click\x27, async function() {
        if (!currentProductId) return;

        try {
            const response = await fetch(`/api/admin/product/\${currentProductId}`, {
                method: \x27DELETE\x27,
                headers: {\x27Content-Type\x27: \x27application/json\x27}
            });

            const result = await response.json();

            if (result.success) {
                deleteModal.hide();
                showAlert(result.message, \x27success\x27);
                loadProducts();
            } else {
                alert(result.error || \x27";
        // line 350
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", true, true, false, 350)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", false, false, false, 350), "Ошибка")) : ("Ошибка")), "html", null, true);
        yield "\x27);
            }
        } catch (error) {
            console.error(\x27Error:\x27, error);
            alert(\x27";
        // line 354
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", true, true, false, 354)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["catalogText"] ?? null), "error", [], "any", false, false, false, 354), "Ошибка")) : ("Ошибка")), "html", null, true);
        yield "\x27);
        }

        currentProductId = null;
    });

    async function loadProducts() {
        try {
            const response = await fetch(\x27/api/admin/products\x27);
            const data = await response.json();

            products = data.products || [];
            categoriesData = data.categories || [];

            filterProducts();
        } catch (error) {
            console.error(\x27Error loading products:\x27, error);
        }
    }

    function showAlert(message, type) {
        const alertDiv = document.createElement(\x27div\x27);
        alertDiv.className = `alert alert-\${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
        alertDiv.style.zIndex = \x279999\x27;
        alertDiv.innerHTML = `
            \${message}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        `;
        document.body.appendChild(alertDiv);

        setTimeout(() => {
            alertDiv.remove();
        }, 3000);
    }

    attachProductHandlers();
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
        return "admin_catalog.html.twig";
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
        return array (  569 => 354,  562 => 350,  539 => 330,  532 => 326,  508 => 305,  500 => 300,  475 => 278,  461 => 267,  415 => 224,  409 => 221,  388 => 203,  347 => 165,  343 => 164,  340 => 163,  333 => 162,  321 => 154,  315 => 151,  308 => 147,  300 => 142,  284 => 129,  278 => 126,  269 => 120,  264 => 118,  258 => 115,  249 => 108,  239 => 106,  235 => 105,  226 => 99,  215 => 91,  204 => 83,  194 => 76,  181 => 66,  164 => 52,  157 => 48,  153 => 47,  149 => 46,  145 => 45,  141 => 44,  137 => 43,  124 => 32,  112 => 30,  108 => 29,  104 => 28,  97 => 24,  85 => 15,  79 => 12,  73 => 9,  68 => 6,  66 => 5,  64 => 4,  57 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block content %}
{% set catalogText = texts.catalog|default({}) %}
{% set productsData = products|default([]) %}

<div class=\"container-fluid py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h2>{{ catalogText.title|default(\x27Управление каталогом\x27) }}</h2>
        <div>
            <a href=\"/admin\" class=\"btn btn-outline-secondary\">
                <i class=\"bi bi-arrow-left\"></i> {{ catalogText.back|default(\x27Назад в панель\x27) }}
            </a>
            <button class=\"btn btn-success\" data-bs-toggle=\"modal\" data-bs-target=\"#productModal\">
                <i class=\"bi bi-plus-lg\"></i> {{ catalogText.addProduct|default(\x27Добавить товар\x27) }}
            </button>
        </div>
    </div>

    <!-- Поиск и фильтр -->
    <div class=\"row mb-4\">
        <div class=\"col-md-6\">
            <input type=\"text\" class=\"form-control\" id=\"searchInput\"
                   placeholder=\"{{ catalogText.searchPlaceholder|default(\x27Поиск по названию...\x27) }}\">
        </div>
        <div class=\"col-md-4\">
            <select class=\"form-select\" id=\"categoryFilter\">
                <option value=\"\">{{ catalogText.allCategories|default(\x27Все категории\x27) }}</option>
                {% for category in categories %}
                    <option value=\"{{ category }}\">{{ category }}</option>
                {% endfor %}
            </select>
        </div>
    </div>

    <!-- Таблица товаров -->
    <div class=\"card\">
        <div class=\"card-body p-0\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover mb-0\" id=\"productsTable\">
                    <thead class=\"table-light\">
                        <tr>
                            <th>{{ catalogText.id|default(\x27ID\x27) }}</th>
                            <th>{{ catalogText.image|default(\x27Изображение\x27) }}</th>
                            <th>{{ catalogText.name|default(\x27Название\x27) }}</th>
                            <th>{{ catalogText.category|default(\x27Категория\x27) }}</th>
                            <th>{{ catalogText.price|default(\x27Цена\x27) }}</th>
                            <th>{{ catalogText.actions|default(\x27Действия\x27) }}</th>
                        </tr>
                    </thead>
                    <tbody id=\"productsTableBody\">
                        {{ productsHtml|default(\x27\x27)|raw }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для добавления/редактирования товара -->
<div class=\"modal fade\" id=\"productModal\" tabindex=\"-1\" aria-labelledby=\"productModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"productModalLabel\">
                    {{ catalogText.addProduct|default(\x27Добавить товар\x27) }}
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <form id=\"productForm\">
                    <input type=\"hidden\" id=\"productId\" name=\"id\" value=\"\">

                    <div class=\"mb-3\">
                        <label for=\"productName\" class=\"form-label\">
                            {{ catalogText.name|default(\x27Название\x27) }} *
                        </label>
                        <input type=\"text\" class=\"form-control\" id=\"productName\" name=\"name\" required>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"productDescription\" class=\"form-label\">
                            {{ catalogText.description|default(\x27Описание\x27) }}
                        </label>
                        <textarea class=\"form-control\" id=\"productDescription\" name=\"description\" rows=\"4\"></textarea>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 mb-3\">
                            <label for=\"productPrice\" class=\"form-label\">
                                {{ catalogText.price|default(\x27Цена\x27) }} *
                            </label>
                            <input type=\"number\" class=\"form-control\" id=\"productPrice\" name=\"price\"
                                   min=\"1\" step=\"1\" required>
                        </div>

                        <div class=\"col-md-6 mb-3\">
                            <label for=\"productCategory\" class=\"form-label\">
                                {{ catalogText.category|default(\x27Категория\x27) }} *
                            </label>
                            <div class=\"input-group\">
                                <input type=\"text\" class=\"form-control\" id=\"productCategory\" name=\"category\"
                                       list=\"categoryList\" required>
                                <datalist id=\"categoryList\">
                                    {% for category in categories %}
                                        <option value=\"{{ category }}\">
                                    {% endfor %}
                                </datalist>
                            </div>
                        </div>
                    </div>

                    <div class=\"mb-3\">
                        <label for=\"productImage\" class=\"form-label\">
                            {{ catalogText.image|default(\x27Изображение\x27) }}
                        </label>
                        <input type=\"text\" class=\"form-control\" id=\"productImage\" name=\"image\"
                               placeholder=\"{{ catalogText.imageHint|default(\x27URL или путь к изображению\x27) }}\"
                               value=\"/assets/img/no-image.jpg\">
                        <small class=\"text-muted\">{{ catalogText.imageHint|default(\x27Например: /assets/img/photo.jpg или https://example.com/img.jpg\x27) }}</small>
                    </div>
                </form>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">
                    {{ catalogText.cancel|default(\x27Отмена\x27) }}
                </button>
                <button type=\"button\" class=\"btn btn-primary\" id=\"saveProductBtn\">
                    {{ catalogText.save|default(\x27Сохранить\x27) }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно подтверждения удаления -->
<div class=\"modal fade\" id=\"deleteModal\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"deleteModalLabel\">
                    {{ catalogText.deleteConfirm|default(\x27Подтверждение удаления\x27) }}
                </h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                {{ catalogText.confirmDelete|default(\x27Вы уверены, что хотите удалить этот товар?\x27) }}
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">
                    {{ catalogText.cancel|default(\x27Отмена\x27) }}
                </button>
                <button type=\"button\" class=\"btn btn-danger\" id=\"confirmDeleteBtn\">
                    {{ catalogText.delete|default(\x27Удалить\x27) }}
                </button>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
const productsData = {{ productsJson|raw }};
let categoriesData = {{ categoriesJson|raw }};

document.addEventListener(\x27DOMContentLoaded\x27, function() {
    const productModal = new bootstrap.Modal(document.getElementById(\x27productModal\x27));
    const deleteModal = new bootstrap.Modal(document.getElementById(\x27deleteModal\x27));

    let currentProductId = null;
    let products = productsData;

    document.getElementById(\x27searchInput\x27).addEventListener(\x27input\x27, function(e) {
        filterProducts();
    });

    document.getElementById(\x27categoryFilter\x27).addEventListener(\x27change\x27, function(e) {
        filterProducts();
    });

    function filterProducts() {
        const search = document.getElementById(\x27searchInput\x27).value.toLowerCase();
        const category = document.getElementById(\x27categoryFilter\x27).value;

        const filtered = products.filter(p => {
            const matchSearch = !search || (p.name && p.name.toLowerCase().includes(search));
            const matchCategory = !category || p.category === category;
            return matchSearch && matchCategory;
        });

        renderProducts(filtered);
    }

    function renderProducts(productsList) {
        const tbody = document.getElementById(\x27productsTableBody\x27);

        if (productsList.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan=\"6\" class=\"text-center py-4 text-muted\">
                        <i class=\"bi bi-box fs-1 d-block mb-2\"></i>
                        {{ catalogText.noProducts|default(\x27Товаров пока нет\x27)|e(\x27js\x27) }}
                    </td>
                </tr>`;
            return;
        }

        tbody.innerHTML = productsList.map(p => `
            <tr data-id=\"\${p.id}\">
                <td>\${p.id}</td>
                <td>
                    <img src=\"\${p.image || \x27/assets/img/no-image.jpg\x27}\" alt=\"\${p.name}\"
                         class=\"img-thumbnail\" style=\"width: 50px; height: 50px; object-fit: cover;\">
                </td>
                <td>\${escapeHtml(p.name)}</td>
                <td>\${escapeHtml(p.category || \x27Без категории\x27)}</td>
                <td>\${Number(p.price).toLocaleString()} ₽</td>
                <td>
                    <button class=\"btn btn-sm btn-primary me-1 btn-edit\" data-id=\"\${p.id}\">
                        <i class=\"bi bi-pencil\"></i> {{ catalogText.edit|default(\x27Редактировать\x27)|e(\x27js\x27) }}
                    </button>
                    <button class=\"btn btn-sm btn-danger btn-delete\" data-id=\"\${p.id}\">
                        <i class=\"bi bi-trash\"></i> {{ catalogText.delete|default(\x27Удалить\x27)|e(\x27js\x27) }}
                    </button>
                </td>
            </tr>
        `).join(\x27\x27);

        attachProductHandlers();
    }

    function escapeHtml(text) {
        const div = document.createElement(\x27div\x27);
        div.textContent = text;
        return div.innerHTML;
    }

    function attachProductHandlers() {
        document.querySelectorAll(\x27.btn-edit\x27).forEach(btn => {
            btn.addEventListener(\x27click\x27, function() {
                const id = parseInt(this.dataset.id);
                const product = products.find(p => p.id === id);
                if (product) {
                    openEditModal(product);
                }
            });
        });

        document.querySelectorAll(\x27.btn-delete\x27).forEach(btn => {
            btn.addEventListener(\x27click\x27, function() {
                currentProductId = parseInt(this.dataset.id);
                deleteModal.show();
            });
        });
    }

    function openEditModal(product) {
        document.getElementById(\x27productId\x27).value = product.id;
        document.getElementById(\x27productName\x27).value = product.name || \x27\x27;
        document.getElementById(\x27productDescription\x27).value = product.description || \x27\x27;
        document.getElementById(\x27productPrice\x27).value = product.price || \x27\x27;
        document.getElementById(\x27productCategory\x27).value = product.category || \x27\x27;
        document.getElementById(\x27productImage\x27).value = product.image || \x27/assets/img/no-image.jpg\x27;

        document.querySelector(\x27#productModal .modal-title\x27).textContent =
            \x27{{ catalogText.editProduct|default(\x27Редактировать товар\x27) }}\x27;

        productModal.show();
    }

    document.querySelector(\x27[data-bs-target=\"#productModal\"]\x27).addEventListener(\x27click\x27, function() {
        document.getElementById(\x27productForm\x27).reset();
        document.getElementById(\x27productId\x27).value = \x27\x27;
        document.getElementById(\x27productImage\x27).value = \x27/assets/img/no-image.jpg\x27;

        document.querySelector(\x27#productModal .modal-title\x27).textContent =
            \x27{{ catalogText.addProduct|default(\x27Добавить товар\x27) }}\x27;
    });

    document.getElementById(\x27saveProductBtn\x27).addEventListener(\x27click\x27, async function() {
        const form = document.getElementById(\x27productForm\x27);

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const id = document.getElementById(\x27productId\x27).value;
        const data = {
            id: id ? parseInt(id) : null,
            name: document.getElementById(\x27productName\x27).value,
            description: document.getElementById(\x27productDescription\x27).value,
            price: parseInt(document.getElementById(\x27productPrice\x27).value),
            category: document.getElementById(\x27productCategory\x27).value,
            image: document.getElementById(\x27productImage\x27).value || \x27/assets/img/no-image.jpg\x27
        };

        if (!data.name || !data.price || !data.category) {
            alert(\x27{{ catalogText.required|default(\x27Заполните все обязательные поля\x27) }}\x27);
            return;
        }

        if (data.price <= 0) {
            alert(\x27{{ catalogText.minPrice|default(\x27Цена должна быть больше 0\x27) }}\x27);
            return;
        }

        try {
            const url = id ? `/api/admin/product/\${id}` : \x27/api/admin/product\x27;
            const method = id ? \x27PUT\x27 : \x27POST\x27;

            const response = await fetch(url, {
                method: method,
                headers: {\x27Content-Type\x27: \x27application/json\x27},
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (result.success) {
                productModal.hide();
                showAlert(result.message, \x27success\x27);
                setTimeout(() => loadProducts(), 100);
            } else {
                alert(result.error || \x27{{ catalogText.error|default(\x27Ошибка\x27) }}\x27);
            }
        } catch (error) {
            console.error(\x27Error:\x27, error);
            alert(\x27{{ catalogText.error|default(\x27Ошибка\x27) }}\x27);
        }
    });

    document.getElementById(\x27confirmDeleteBtn\x27).addEventListener(\x27click\x27, async function() {
        if (!currentProductId) return;

        try {
            const response = await fetch(`/api/admin/product/\${currentProductId}`, {
                method: \x27DELETE\x27,
                headers: {\x27Content-Type\x27: \x27application/json\x27}
            });

            const result = await response.json();

            if (result.success) {
                deleteModal.hide();
                showAlert(result.message, \x27success\x27);
                loadProducts();
            } else {
                alert(result.error || \x27{{ catalogText.error|default(\x27Ошибка\x27) }}\x27);
            }
        } catch (error) {
            console.error(\x27Error:\x27, error);
            alert(\x27{{ catalogText.error|default(\x27Ошибка\x27) }}\x27);
        }

        currentProductId = null;
    });

    async function loadProducts() {
        try {
            const response = await fetch(\x27/api/admin/products\x27);
            const data = await response.json();

            products = data.products || [];
            categoriesData = data.categories || [];

            filterProducts();
        } catch (error) {
            console.error(\x27Error loading products:\x27, error);
        }
    }

    function showAlert(message, type) {
        const alertDiv = document.createElement(\x27div\x27);
        alertDiv.className = `alert alert-\${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
        alertDiv.style.zIndex = \x279999\x27;
        alertDiv.innerHTML = `
            \${message}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
        `;
        document.body.appendChild(alertDiv);

        setTimeout(() => {
            alertDiv.remove();
        }, 3000);
    }

    attachProductHandlers();
});
</script>
{% endblock %}
", "admin_catalog.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\admin_catalog.html.twig");
    }
}
