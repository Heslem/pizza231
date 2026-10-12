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

/* admin_logs.html.twig */
class __TwigTemplate_1a1d8fa457cb09b02075e1d9656761bc extends Template
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
        $context["logsText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "logs", [], "any", true, true, false, 4)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "logs", [], "any", false, false, false, 4), [])) : ([]));
        // line 5
        $context["logCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), ((array_key_exists("logs", $context)) ? (Twig\Extension\CoreExtension::default(($context["logs"] ?? null), [])) : ([])));
        // line 6
        yield "
<div class=\"container py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"mb-0\">";
        // line 9
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "title", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "title", [], "any", false, false, false, 9), "Логи ошибок")) : ("Логи ошибок")), "html", null, true);
        yield "</h1>
        <div>
            <button id=\"refreshLogsBtn\" class=\"btn btn-outline-primary btn-sm\">
                <i class=\"bi bi-arrow-clockwise\"></i> Обновить
            </button>
            <button id=\"clearLogsBtn\" class=\"btn btn-outline-danger btn-sm ms-2\" data-bs-toggle=\"modal\" data-bs-target=\"#clearLogsModal\">
                <i class=\"bi bi-trash\"></i> Очистить логи
            </button>
        </div>
    </div>

    <div class=\"card shadow-sm\">
        <div class=\"card-body\">
            <div class=\"alert alert-info d-flex align-items-center mb-4\">
                <i class=\"bi bi-info-circle fs-4 me-2\"></i>
                <div>
                    <strong>Информация:</strong> Здесь отображаются последние ошибки и предупреждения сайта. Всего записей: <strong>";
        // line 25
        yield (string) $this->escaper->escape(($context["logCount"] ?? null), "html", null, true);
        yield "</strong>
                </div>
            </div>

            ";
        // line 29
        if (Twig\Extension\CoreExtension::testEmpty(($context["logs"] ?? null))) {
            // line 30
            yield "                <div class=\"text-center py-5\">
                    <i class=\"bi bi-check-circle-fill fs-1 text-success mb-3 d-block\"></i>
                    <h5 class=\"text-muted\">";
            // line 32
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "noLogs", [], "any", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "noLogs", [], "any", false, false, false, 32), "Ошибок не найдено")) : ("Ошибок не найдено")), "html", null, true);
            yield "</h5>
                    <p class=\"text-muted\">Система работает стабильно, ошибок не обнаружено.</p>
                </div>
            ";
        } else {
            // line 36
            yield "                <div class=\"table-responsive\">
                    <table class=\"table table-hover table-striped\">
                        <thead>
                            <tr>
                                <th width=\"150\">Время</th>
                                <th width=\"100\">Уровень</th>
                                <th>Сообщение</th>
                                <th width=\"100\">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["logs"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                // line 48
                yield "                                <tr>
                                    <td>
                                        <small class=\"text-muted\">";
                // line 50
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", true, true, false, 50)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", false, false, false, 50), "")) : ("")), "html", null, true);
                yield "</small>
                                    </td>
                                    <td>
                                        ";
                // line 53
                $context["level"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "level", [], "any", true, true, false, 53)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "level", [], "any", false, false, false, 53), "UNKNOWN")) : ("UNKNOWN"));
                // line 54
                yield "                                        ";
                $context["badgeClass"] = (((($context["level"] ?? null) == "ERROR")) ? ("bg-danger") : ((((($context["level"] ?? null) == "INFO")) ? ("bg-info") : ((((($context["level"] ?? null) == "WARNING")) ? ("bg-warning") : ("bg-secondary"))))));
                // line 55
                yield "                                        <span class=\"badge ";
                yield (string) $this->escaper->escape(($context["badgeClass"] ?? null), "html", null, true);
                yield "\">";
                yield (string) $this->escaper->escape(($context["level"] ?? null), "html", null, true);
                yield "</span>
                                    </td>
                                    <td>
                                        <div class=\"log-message\">";
                // line 58
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", true, true, false, 58)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 58), "")) : ("")), "html", null, true);
                yield "</div>
                                        ";
                // line 59
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "context", [], "any", true, true, false, 59) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "context", [], "any", false, false, false, 59)))) {
                    // line 60
                    yield "                                            <small class=\"text-muted d-block mt-1\">
                                                <button class=\"btn btn-sm btn-link p-0 text-decoration-none\" type=\"button\"
                                                        data-bs-toggle=\"collapse\" data-bs-target=\"#context-";
                    // line 62
                    yield (string) $this->escaper->escape(((((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", true, true, false, 62)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", false, false, false, 62), "")) : ("")) . ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", true, true, false, 62)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 62), "")) : (""))) . CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 62)), "html", null, true);
                    yield "\">
                                                    <i class=\"bi bi-chevron-down\"></i> Контекст
                                                </button>
                                            </small>
                                            <div class=\"collapse mt-2\" id=\"context-";
                    // line 66
                    yield (string) $this->escaper->escape(((((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", true, true, false, 66)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "timestamp", [], "any", false, false, false, 66), "")) : ("")) . ((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", true, true, false, 66)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 66), "")) : (""))) . CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 66)), "html", null, true);
                    yield "\">
                                                <pre class=\"bg-light p-2 rounded small\"><code>";
                    // line 67
                    yield (string) $this->escaper->escape(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "context", [], "any", false, false, false, 67), "html", null, true);
                    yield "</code></pre>
                                            </div>
                                        ";
                }
                // line 70
                yield "                                    </td>
                                    <td>
                                        <button class=\"btn btn-sm btn-outline-primary copy-log-btn\"
                                                data-message=\"";
                // line 73
                yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", true, true, false, 73)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["log"], "message", [], "any", false, false, false, 73), "")) : ("")), "html", null, true);
                yield "\"
                                                title=\"Копировать сообщение\">
                                            <i class=\"bi bi-clipboard\"></i>
                                        </button>
                                    </td>
                                </tr>
                            ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 80
            yield "                        </tbody>
                    </table>
                </div>

                <div class=\"d-flex justify-content-between align-items-center mt-3\">
                    <small class=\"text-muted\">
                        Показано последних ";
            // line 86
            yield (string) $this->escaper->escape(($context["logCount"] ?? null), "html", null, true);
            yield " записей
                    </small>
                    <div>
                        <a href=\"/api/admin/logs?limit=100\" class=\"btn btn-sm btn-outline-secondary\" target=\"_blank\">
                            <i class=\"bi bi-download\"></i> JSON
                        </a>
                    </div>
                </div>
            ";
        }
        // line 95
        yield "        </div>
    </div>
</div>

<!-- Модальное окно очистки логов -->
<div class=\"modal fade\" id=\"clearLogsModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">";
        // line 104
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clearTitle", [], "any", true, true, false, 104)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clearTitle", [], "any", false, false, false, 104), "Очистить логи ошибок")) : ("Очистить логи ошибок")), "html", null, true);
        yield "</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <p>";
        // line 108
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clearWarning", [], "any", true, true, false, 108)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clearWarning", [], "any", false, false, false, 108), "Вы уверены, что хотите очистить все логи ошибок? Это действие невозможно отменить.")) : ("Вы уверены, что хотите очистить все логи ошибок? Это действие невозможно отменить.")), "html", null, true);
        yield "</p>
                <div class=\"alert alert-warning\">
                    <i class=\"bi bi-exclamation-triangle me-2\"></i>
                    ";
        // line 111
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clearNote", [], "any", true, true, false, 111)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clearNote", [], "any", false, false, false, 111), "Рекомендуется сохранить логи перед очисткой, нажав кнопку \"JSON\" выше.")) : ("Рекомендуется сохранить логи перед очисткой, нажав кнопку \"JSON\" выше.")), "html", null, true);
        yield "
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
        // line 115
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "cancel", [], "any", true, true, false, 115)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "cancel", [], "any", false, false, false, 115), "Отмена")) : ("Отмена")), "html", null, true);
        yield "</button>
                <button type=\"button\" class=\"btn btn-danger\" id=\"confirmClearLogsBtn\">";
        // line 116
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clear", [], "any", true, true, false, 116)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["logsText"] ?? null), "clear", [], "any", false, false, false, 116), "Очистить логи")) : ("Очистить логи")), "html", null, true);
        yield "</button>
            </div>
        </div>
    </div>
</div>
";
        return; yield;
    }

    // line 123
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 124
        yield "<script>
document.addEventListener(\x27DOMContentLoaded\x27, function() {
    document.querySelectorAll(\x27.copy-log-btn\x27).forEach(btn => {
        btn.addEventListener(\x27click\x27, function() {
            const message = this.getAttribute(\x27data-message\x27);
            navigator.clipboard.writeText(message).then(() => {
                const icon = this.querySelector(\x27i\x27);
                const originalClass = icon.className;
                icon.className = \x27bi bi-check\x27;
                setTimeout(() => {
                    icon.className = originalClass;
                }, 1000);
            });
        });
    });

    document.getElementById(\x27refreshLogsBtn\x27).addEventListener(\x27click\x27, function() {
        window.location.reload();
    });

    document.getElementById(\x27confirmClearLogsBtn\x27).addEventListener(\x27click\x27, function() {
        fetch(\x27/api/admin/clear-logs\x27, {
            method: \x27POST\x27,
            headers: {
                \x27Content-Type\x27: \x27application/json\x27
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert(\x27Ошибка при очистке логов: \x27 + (data.error || \x27Неизвестная ошибка\x27));
            }
        })
        .catch(error => {
            console.error(\x27Error:\x27, error);
            alert(\x27Ошибка при очистке логов\x27);
        })
        .finally(() => {
            const modal = bootstrap.Modal.getInstance(document.getElementById(\x27clearLogsModal\x27));
            modal.hide();
        });
    });
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
        return "admin_logs.html.twig";
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
        return array (  293 => 124,  286 => 123,  275 => 116,  271 => 115,  264 => 111,  258 => 108,  251 => 104,  240 => 95,  228 => 86,  220 => 80,  198 => 73,  193 => 70,  187 => 67,  183 => 66,  176 => 62,  172 => 60,  170 => 59,  166 => 58,  157 => 55,  154 => 54,  152 => 53,  146 => 50,  142 => 48,  125 => 47,  112 => 36,  105 => 32,  101 => 30,  99 => 29,  92 => 25,  73 => 9,  68 => 6,  66 => 5,  64 => 4,  57 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block content %}
{% set logsText = texts.logs|default({}) %}
{% set logCount = logs|default([])|length %}

<div class=\"container py-4\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"mb-0\">{{ logsText.title|default(\x27Логи ошибок\x27) }}</h1>
        <div>
            <button id=\"refreshLogsBtn\" class=\"btn btn-outline-primary btn-sm\">
                <i class=\"bi bi-arrow-clockwise\"></i> Обновить
            </button>
            <button id=\"clearLogsBtn\" class=\"btn btn-outline-danger btn-sm ms-2\" data-bs-toggle=\"modal\" data-bs-target=\"#clearLogsModal\">
                <i class=\"bi bi-trash\"></i> Очистить логи
            </button>
        </div>
    </div>

    <div class=\"card shadow-sm\">
        <div class=\"card-body\">
            <div class=\"alert alert-info d-flex align-items-center mb-4\">
                <i class=\"bi bi-info-circle fs-4 me-2\"></i>
                <div>
                    <strong>Информация:</strong> Здесь отображаются последние ошибки и предупреждения сайта. Всего записей: <strong>{{ logCount }}</strong>
                </div>
            </div>

            {% if logs is empty %}
                <div class=\"text-center py-5\">
                    <i class=\"bi bi-check-circle-fill fs-1 text-success mb-3 d-block\"></i>
                    <h5 class=\"text-muted\">{{ logsText.noLogs|default(\x27Ошибок не найдено\x27) }}</h5>
                    <p class=\"text-muted\">Система работает стабильно, ошибок не обнаружено.</p>
                </div>
            {% else %}
                <div class=\"table-responsive\">
                    <table class=\"table table-hover table-striped\">
                        <thead>
                            <tr>
                                <th width=\"150\">Время</th>
                                <th width=\"100\">Уровень</th>
                                <th>Сообщение</th>
                                <th width=\"100\">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for log in logs %}
                                <tr>
                                    <td>
                                        <small class=\"text-muted\">{{ log.timestamp|default(\x27\x27) }}</small>
                                    </td>
                                    <td>
                                        {% set level = log.level|default(\x27UNKNOWN\x27) %}
                                        {% set badgeClass = level == \x27ERROR\x27 ? \x27bg-danger\x27 : (level == \x27INFO\x27 ? \x27bg-info\x27 : (level == \x27WARNING\x27 ? \x27bg-warning\x27 : \x27bg-secondary\x27)) %}
                                        <span class=\"badge {{ badgeClass }}\">{{ level }}</span>
                                    </td>
                                    <td>
                                        <div class=\"log-message\">{{ log.message|default(\x27\x27) }}</div>
                                        {% if log.context is defined and log.context is not empty %}
                                            <small class=\"text-muted d-block mt-1\">
                                                <button class=\"btn btn-sm btn-link p-0 text-decoration-none\" type=\"button\"
                                                        data-bs-toggle=\"collapse\" data-bs-target=\"#context-{{ log.timestamp|default(\x27\x27) ~ log.message|default(\x27\x27) ~ loop.index }}\">
                                                    <i class=\"bi bi-chevron-down\"></i> Контекст
                                                </button>
                                            </small>
                                            <div class=\"collapse mt-2\" id=\"context-{{ log.timestamp|default(\x27\x27) ~ log.message|default(\x27\x27) ~ loop.index }}\">
                                                <pre class=\"bg-light p-2 rounded small\"><code>{{ log.context }}</code></pre>
                                            </div>
                                        {% endif %}
                                    </td>
                                    <td>
                                        <button class=\"btn btn-sm btn-outline-primary copy-log-btn\"
                                                data-message=\"{{ log.message|default(\x27\x27) }}\"
                                                title=\"Копировать сообщение\">
                                            <i class=\"bi bi-clipboard\"></i>
                                        </button>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>

                <div class=\"d-flex justify-content-between align-items-center mt-3\">
                    <small class=\"text-muted\">
                        Показано последних {{ logCount }} записей
                    </small>
                    <div>
                        <a href=\"/api/admin/logs?limit=100\" class=\"btn btn-sm btn-outline-secondary\" target=\"_blank\">
                            <i class=\"bi bi-download\"></i> JSON
                        </a>
                    </div>
                </div>
            {% endif %}
        </div>
    </div>
</div>

<!-- Модальное окно очистки логов -->
<div class=\"modal fade\" id=\"clearLogsModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">{{ logsText.clearTitle|default(\x27Очистить логи ошибок\x27) }}</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
            </div>
            <div class=\"modal-body\">
                <p>{{ logsText.clearWarning|default(\x27Вы уверены, что хотите очистить все логи ошибок? Это действие невозможно отменить.\x27) }}</p>
                <div class=\"alert alert-warning\">
                    <i class=\"bi bi-exclamation-triangle me-2\"></i>
                    {{ logsText.clearNote|default(\x27Рекомендуется сохранить логи перед очисткой, нажав кнопку \"JSON\" выше.\x27) }}
                </div>
            </div>
            <div class=\"modal-footer\">
                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">{{ logsText.cancel|default(\x27Отмена\x27) }}</button>
                <button type=\"button\" class=\"btn btn-danger\" id=\"confirmClearLogsBtn\">{{ logsText.clear|default(\x27Очистить логи\x27) }}</button>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
document.addEventListener(\x27DOMContentLoaded\x27, function() {
    document.querySelectorAll(\x27.copy-log-btn\x27).forEach(btn => {
        btn.addEventListener(\x27click\x27, function() {
            const message = this.getAttribute(\x27data-message\x27);
            navigator.clipboard.writeText(message).then(() => {
                const icon = this.querySelector(\x27i\x27);
                const originalClass = icon.className;
                icon.className = \x27bi bi-check\x27;
                setTimeout(() => {
                    icon.className = originalClass;
                }, 1000);
            });
        });
    });

    document.getElementById(\x27refreshLogsBtn\x27).addEventListener(\x27click\x27, function() {
        window.location.reload();
    });

    document.getElementById(\x27confirmClearLogsBtn\x27).addEventListener(\x27click\x27, function() {
        fetch(\x27/api/admin/clear-logs\x27, {
            method: \x27POST\x27,
            headers: {
                \x27Content-Type\x27: \x27application/json\x27
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert(\x27Ошибка при очистке логов: \x27 + (data.error || \x27Неизвестная ошибка\x27));
            }
        })
        .catch(error => {
            console.error(\x27Error:\x27, error);
            alert(\x27Ошибка при очистке логов\x27);
        })
        .finally(() => {
            const modal = bootstrap.Modal.getInstance(document.getElementById(\x27clearLogsModal\x27));
            modal.hide();
        });
    });
});
</script>
{% endblock %}
", "admin_logs.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\admin_logs.html.twig");
    }
}
