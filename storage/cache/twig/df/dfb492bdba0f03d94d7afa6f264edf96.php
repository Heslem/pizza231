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

/* auth.html.twig */
class __TwigTemplate_1c197af98cd8bf40dcffe35a87871cd2 extends Template
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
        $context["mode"] = ((array_key_exists("mode", $context)) ? (Twig\Extension\CoreExtension::default(($context["mode"] ?? null), "login")) : ("login"));
        // line 5
        yield "
";
        // line 6
        if ((($context["mode"] ?? null) == "register")) {
            // line 7
            yield "    ";
            $context["formText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "register", [], "any", true, true, false, 7)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "register", [], "any", false, false, false, 7), [])) : ([]));
        } elseif ((        // line 8
($context["mode"] ?? null) == "verify")) {
            // line 9
            yield "    ";
            $context["formText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "verify", [], "any", true, true, false, 9)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "verify", [], "any", false, false, false, 9), [])) : ([]));
        } else {
            // line 11
            yield "    ";
            $context["formText"] = ((CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "login", [], "any", true, true, false, 11)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["texts"] ?? null), "login", [], "any", false, false, false, 11), [])) : ([]));
        }
        // line 13
        yield "
<div class=\"container py-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-md-6 col-lg-5\">
            <div class=\"card shadow-sm\">
                <div class=\"card-body p-4\">
                    <h2 class=\"text-center mb-4\">";
        // line 19
        yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "title", [], "any", true, true, false, 19)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "title", [], "any", false, false, false, 19), (((($context["mode"] ?? null) == "register")) ? ("Регистрация") : ((((($context["mode"] ?? null) == "verify")) ? ("Подтверждение email") : ("Вход")))))) : ((((($context["mode"] ?? null) == "register")) ? ("Регистрация") : ((((($context["mode"] ?? null) == "verify")) ? ("Подтверждение email") : ("Вход")))))), "html", null, true);
        yield "</h2>

                    ";
        // line 21
        if ((array_key_exists("success", $context) &&  !Twig\Extension\CoreExtension::testEmpty(($context["success"] ?? null)))) {
            // line 22
            yield "                        <div class=\"alert alert-success\">";
            yield (string) $this->escaper->escape(($context["success"] ?? null), "html", null, true);
            yield "</div>
                    ";
        }
        // line 24
        yield "
                    ";
        // line 25
        if ((array_key_exists("error", $context) &&  !Twig\Extension\CoreExtension::testEmpty(($context["error"] ?? null)))) {
            // line 26
            yield "                        <div class=\"alert alert-danger\">";
            yield (string) $this->escaper->escape(($context["error"] ?? null), "html", null, true);
            yield "</div>
                    ";
        }
        // line 28
        yield "
                    ";
        // line 29
        if ((($context["mode"] ?? null) == "register")) {
            // line 30
            yield "                        <form method=\"POST\" action=\"/register\">
                            <div class=\"mb-3\">
                                <label for=\"name\" class=\"form-label\">";
            // line 32
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "name", [], "any", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "name", [], "any", false, false, false, 32), "Имя")) : ("Имя")), "html", null, true);
            yield "</label>
                                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label\">";
            // line 36
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "email", [], "any", true, true, false, 36)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "email", [], "any", false, false, false, 36), "Email")) : ("Email")), "html", null, true);
            yield "</label>
                                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"password\" class=\"form-label\">";
            // line 40
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "password", [], "any", true, true, false, 40)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "password", [], "any", false, false, false, 40), "Пароль")) : ("Пароль")), "html", null, true);
            yield "</label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required minlength=\"6\">
                                <div class=\"form-text\">";
            // line 42
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "passwordHint", [], "any", true, true, false, 42)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "passwordHint", [], "any", false, false, false, 42), "Минимум 6 символов")) : ("Минимум 6 символов")), "html", null, true);
            yield "</div>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"password_confirm\" class=\"form-label\">";
            // line 45
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "passwordConfirm", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "passwordConfirm", [], "any", false, false, false, 45), "Подтверждение пароля")) : ("Подтверждение пароля")), "html", null, true);
            yield "</label>
                                <input type=\"password\" class=\"form-control\" id=\"password_confirm\" name=\"password_confirm\" required>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary w-100\">";
            // line 48
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "submit", [], "any", true, true, false, 48)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "submit", [], "any", false, false, false, 48), "Зарегистрироваться")) : ("Зарегистрироваться")), "html", null, true);
            yield "</button>
                        </form>

                        <div class=\"text-center mt-3\">
                            <span class=\"text-muted\">";
            // line 52
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "hasAccount", [], "any", true, true, false, 52)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "hasAccount", [], "any", false, false, false, 52), "Уже есть аккаунт?")) : ("Уже есть аккаунт?")), "html", null, true);
            yield "</span>
                            <a href=\"/login\">";
            // line 53
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "loginLink", [], "any", true, true, false, 53)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "loginLink", [], "any", false, false, false, 53), "Войти")) : ("Войти")), "html", null, true);
            yield "</a>
                        </div>
                    ";
        } elseif ((        // line 55
($context["mode"] ?? null) == "verify")) {
            // line 56
            yield "                        <div class=\"text-center mb-4\">
                            <p class=\"text-muted\">";
            // line 57
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "subtitle", [], "any", true, true, false, 57)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "subtitle", [], "any", false, false, false, 57), "На ваш email отправлен код подтверждения")) : ("На ваш email отправлен код подтверждения")), "html", null, true);
            yield "</p>
                            <strong>";
            // line 58
            yield (string) $this->escaper->escape(((array_key_exists("email", $context)) ? (Twig\Extension\CoreExtension::default(($context["email"] ?? null), "")) : ("")), "html", null, true);
            yield "</strong>
                        </div>

                        <form method=\"POST\" action=\"/verify\" id=\"verifyForm\">
                            <div class=\"mb-3\">
                                <label for=\"code\" class=\"form-label\">";
            // line 63
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "codeLabel", [], "any", true, true, false, 63)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "codeLabel", [], "any", false, false, false, 63), "Код подтверждения")) : ("Код подтверждения")), "html", null, true);
            yield "</label>
                                <input type=\"text\" class=\"form-control text-center\" id=\"code\" name=\"code\"
                                       required maxlength=\"6\" pattern=\"[0-9]{6}\"
                                       placeholder=\"000000\" style=\"font-size: 24px; letter-spacing: 8px;\">
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary w-100\">";
            // line 68
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "submitVerify", [], "any", true, true, false, 68)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "submitVerify", [], "any", false, false, false, 68), "Подтвердить")) : ("Подтвердить")), "html", null, true);
            yield "</button>
                        </form>

                        <div class=\"text-center mt-3\">
                            <button type=\"button\" class=\"btn btn-link\" id=\"resendBtn\">
                                ";
            // line 73
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "resend", [], "any", true, true, false, 73)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "resend", [], "any", false, false, false, 73), "Отправить код повторно")) : ("Отправить код повторно")), "html", null, true);
            yield "
                            </button>
                            <div id=\"resendMessage\" class=\"mt-2\" style=\"display: none;\"></div>
                        </div>

                        <div class=\"text-center mt-3\">
                            <span class=\"text-muted\">";
            // line 79
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "wrongEmail", [], "any", true, true, false, 79)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "wrongEmail", [], "any", false, false, false, 79), "Неверный email?")) : ("Неверный email?")), "html", null, true);
            yield "</span>
                            <a href=\"/register\">";
            // line 80
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "registerAgain", [], "any", true, true, false, 80)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "registerAgain", [], "any", false, false, false, 80), "Зарегистрироваться заново")) : ("Зарегистрироваться заново")), "html", null, true);
            yield "</a>
                        </div>
                    ";
        } else {
            // line 83
            yield "                        <form method=\"POST\" action=\"/login\">
                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label\">";
            // line 85
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "email", [], "any", true, true, false, 85)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "email", [], "any", false, false, false, 85), "Email")) : ("Email")), "html", null, true);
            yield "</label>
                                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"password\" class=\"form-label\">";
            // line 89
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "password", [], "any", true, true, false, 89)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "password", [], "any", false, false, false, 89), "Пароль")) : ("Пароль")), "html", null, true);
            yield "</label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary w-100\">";
            // line 92
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "submit", [], "any", true, true, false, 92)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "submit", [], "any", false, false, false, 92), "Войти")) : ("Войти")), "html", null, true);
            yield "</button>
                        </form>

                        <div class=\"text-center mt-3\">
                            <span class=\"text-muted\">";
            // line 96
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "noAccount", [], "any", true, true, false, 96)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "noAccount", [], "any", false, false, false, 96), "Нет аккаунта?")) : ("Нет аккаунта?")), "html", null, true);
            yield "</span>
                            <a href=\"/register\">";
            // line 97
            yield (string) $this->escaper->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "registerLink", [], "any", true, true, false, 97)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["formText"] ?? null), "registerLink", [], "any", false, false, false, 97), "Регистрация")) : ("Регистрация")), "html", null, true);
            yield "</a>
                        </div>
                    ";
        }
        // line 100
        yield "                </div>
            </div>
        </div>
    </div>
</div>
";
        return; yield;
    }

    // line 107
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_scripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 108
        if ((($context["mode"] ?? null) == "verify")) {
            // line 109
            yield "<script>
document.getElementById(\x27verifyForm\x27).addEventListener(\x27submit\x27, function(e) {
    e.preventDefault();
    const code = document.getElementById(\x27code\x27).value;

    fetch(\x27/api/auth/verify\x27, {
        method: \x27POST\x27,
        headers: {\x27Content-Type\x27: \x27application/json\x27},
        body: JSON.stringify({code: code})
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            window.location.href = \x27/\x27;
        } else {
            alert(data.error || \x27Ошибка подтверждения\x27);
        }
    })
    .catch(() => alert(\x27Ошибка соединения\x27));
});

document.getElementById(\x27resendBtn\x27).addEventListener(\x27click\x27, function() {
    const btn = this;
    btn.disabled = true;

    fetch(\x27/api/auth/resend\x27, {
        method: \x27POST\x27,
        headers: {\x27Content-Type\x27: \x27application/json\x27}
    })
    .then(r => r.json())
    .then(data => {
        const msg = document.getElementById(\x27resendMessage\x27);
        msg.style.display = \x27block\x27;
        if (data.success) {
            msg.className = \x27mt-2 text-success\x27;
            msg.textContent = data.message;
        } else {
            msg.className = \x27mt-2 text-danger\x27;
            msg.textContent = data.error;
        }
        btn.disabled = false;
    })
    .catch(() => {
        alert(\x27Ошибка соединения\x27);
        btn.disabled = false;
    });
});
</script>
";
        }
        return; yield;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "auth.html.twig";
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
        return array (  277 => 109,  275 => 108,  268 => 107,  258 => 100,  252 => 97,  248 => 96,  241 => 92,  235 => 89,  228 => 85,  224 => 83,  218 => 80,  214 => 79,  205 => 73,  197 => 68,  189 => 63,  181 => 58,  177 => 57,  174 => 56,  172 => 55,  167 => 53,  163 => 52,  156 => 48,  150 => 45,  144 => 42,  139 => 40,  132 => 36,  125 => 32,  121 => 30,  119 => 29,  116 => 28,  110 => 26,  108 => 25,  105 => 24,  99 => 22,  97 => 21,  92 => 19,  84 => 13,  80 => 11,  76 => 9,  74 => 8,  71 => 7,  69 => 6,  66 => 5,  64 => 4,  57 => 3,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends \x27base.html.twig\x27 %}

{% block content %}
{% set mode = mode|default(\x27login\x27) %}

{% if mode == \x27register\x27 %}
    {% set formText = texts.register|default({}) %}
{% elseif mode == \x27verify\x27 %}
    {% set formText = texts.verify|default({}) %}
{% else %}
    {% set formText = texts.login|default({}) %}
{% endif %}

<div class=\"container py-5\">
    <div class=\"row justify-content-center\">
        <div class=\"col-md-6 col-lg-5\">
            <div class=\"card shadow-sm\">
                <div class=\"card-body p-4\">
                    <h2 class=\"text-center mb-4\">{{ formText.title|default(mode == \x27register\x27 ? \x27Регистрация\x27 : (mode == \x27verify\x27 ? \x27Подтверждение email\x27 : \x27Вход\x27)) }}</h2>

                    {% if success is defined and success is not empty %}
                        <div class=\"alert alert-success\">{{ success }}</div>
                    {% endif %}

                    {% if error is defined and error is not empty %}
                        <div class=\"alert alert-danger\">{{ error }}</div>
                    {% endif %}

                    {% if mode == \x27register\x27 %}
                        <form method=\"POST\" action=\"/register\">
                            <div class=\"mb-3\">
                                <label for=\"name\" class=\"form-label\">{{ formText.name|default(\x27Имя\x27) }}</label>
                                <input type=\"text\" class=\"form-control\" id=\"name\" name=\"name\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label\">{{ formText.email|default(\x27Email\x27) }}</label>
                                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"password\" class=\"form-label\">{{ formText.password|default(\x27Пароль\x27) }}</label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required minlength=\"6\">
                                <div class=\"form-text\">{{ formText.passwordHint|default(\x27Минимум 6 символов\x27) }}</div>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"password_confirm\" class=\"form-label\">{{ formText.passwordConfirm|default(\x27Подтверждение пароля\x27) }}</label>
                                <input type=\"password\" class=\"form-control\" id=\"password_confirm\" name=\"password_confirm\" required>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary w-100\">{{ formText.submit|default(\x27Зарегистрироваться\x27) }}</button>
                        </form>

                        <div class=\"text-center mt-3\">
                            <span class=\"text-muted\">{{ formText.hasAccount|default(\x27Уже есть аккаунт?\x27) }}</span>
                            <a href=\"/login\">{{ formText.loginLink|default(\x27Войти\x27) }}</a>
                        </div>
                    {% elseif mode == \x27verify\x27 %}
                        <div class=\"text-center mb-4\">
                            <p class=\"text-muted\">{{ formText.subtitle|default(\x27На ваш email отправлен код подтверждения\x27) }}</p>
                            <strong>{{ email|default(\x27\x27) }}</strong>
                        </div>

                        <form method=\"POST\" action=\"/verify\" id=\"verifyForm\">
                            <div class=\"mb-3\">
                                <label for=\"code\" class=\"form-label\">{{ formText.codeLabel|default(\x27Код подтверждения\x27) }}</label>
                                <input type=\"text\" class=\"form-control text-center\" id=\"code\" name=\"code\"
                                       required maxlength=\"6\" pattern=\"[0-9]{6}\"
                                       placeholder=\"000000\" style=\"font-size: 24px; letter-spacing: 8px;\">
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary w-100\">{{ formText.submitVerify|default(\x27Подтвердить\x27) }}</button>
                        </form>

                        <div class=\"text-center mt-3\">
                            <button type=\"button\" class=\"btn btn-link\" id=\"resendBtn\">
                                {{ formText.resend|default(\x27Отправить код повторно\x27) }}
                            </button>
                            <div id=\"resendMessage\" class=\"mt-2\" style=\"display: none;\"></div>
                        </div>

                        <div class=\"text-center mt-3\">
                            <span class=\"text-muted\">{{ formText.wrongEmail|default(\x27Неверный email?\x27) }}</span>
                            <a href=\"/register\">{{ formText.registerAgain|default(\x27Зарегистрироваться заново\x27) }}</a>
                        </div>
                    {% else %}
                        <form method=\"POST\" action=\"/login\">
                            <div class=\"mb-3\">
                                <label for=\"email\" class=\"form-label\">{{ formText.email|default(\x27Email\x27) }}</label>
                                <input type=\"email\" class=\"form-control\" id=\"email\" name=\"email\" required>
                            </div>
                            <div class=\"mb-3\">
                                <label for=\"password\" class=\"form-label\">{{ formText.password|default(\x27Пароль\x27) }}</label>
                                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
                            </div>
                            <button type=\"submit\" class=\"btn btn-primary w-100\">{{ formText.submit|default(\x27Войти\x27) }}</button>
                        </form>

                        <div class=\"text-center mt-3\">
                            <span class=\"text-muted\">{{ formText.noAccount|default(\x27Нет аккаунта?\x27) }}</span>
                            <a href=\"/register\">{{ formText.registerLink|default(\x27Регистрация\x27) }}</a>
                        </div>
                    {% endif %}
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
{% if mode == \x27verify\x27 %}
<script>
document.getElementById(\x27verifyForm\x27).addEventListener(\x27submit\x27, function(e) {
    e.preventDefault();
    const code = document.getElementById(\x27code\x27).value;

    fetch(\x27/api/auth/verify\x27, {
        method: \x27POST\x27,
        headers: {\x27Content-Type\x27: \x27application/json\x27},
        body: JSON.stringify({code: code})
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            window.location.href = \x27/\x27;
        } else {
            alert(data.error || \x27Ошибка подтверждения\x27);
        }
    })
    .catch(() => alert(\x27Ошибка соединения\x27));
});

document.getElementById(\x27resendBtn\x27).addEventListener(\x27click\x27, function() {
    const btn = this;
    btn.disabled = true;

    fetch(\x27/api/auth/resend\x27, {
        method: \x27POST\x27,
        headers: {\x27Content-Type\x27: \x27application/json\x27}
    })
    .then(r => r.json())
    .then(data => {
        const msg = document.getElementById(\x27resendMessage\x27);
        msg.style.display = \x27block\x27;
        if (data.success) {
            msg.className = \x27mt-2 text-success\x27;
            msg.textContent = data.message;
        } else {
            msg.className = \x27mt-2 text-danger\x27;
            msg.textContent = data.error;
        }
        btn.disabled = false;
    })
    .catch(() => {
        alert(\x27Ошибка соединения\x27);
        btn.disabled = false;
    });
});
</script>
{% endif %}
{% endblock %}
", "auth.html.twig", "D:\\xampp\\htdocs\\src\\Views\\templates\\auth.html.twig");
    }
}
