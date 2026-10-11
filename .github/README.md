# CI/CD для GitHub Actions

Этот каталог содержит пайплайны непрерывной интеграции и доставки для проекта.

## Файлы

| Файл | Назначение | Когда запускается |
|------|-----------|------------------|
| `ci.yml` | Проверка синтаксиса + тесты PHPUnit | `push`/`pull_request` в `main`/`master`/`develop`, ручной запуск |
| `deploy.yml` | Сборка и деплой на сервер | Публикация GitHub Release, ручной запуск |

## Как это работает

### CI (`ci.yml`)

Три параллельных задачи:

1. **`lint`** — проверяет синтаксис всех PHP-файлов в `src/` и `tests/` через `php -l`.
2. **`test`** — запускает PHPUnit-тесты на матрице PHP `8.1 / 8.2 / 8.3`.
   - Кэширует `vendor/` между запусками (быстрее).
   - Создаёт каталог `storage/logs/` (нужен для JSON-режима).
3. **`validate`** — проверяет `composer.json` через `composer validate --strict`.

Тесты запускаются только после успешного `lint` (`needs: lint`).

### CD (`deploy.yml`)

Два основных шага (деплой выключен по умолчанию — нужно настроить секреты):

1. **`build`** — собирает прод-зависимости (`composer install --no-dev`), упаковывает `app.tar.gz`, сохраняет как артефакт.
2. **`deploy-ssh`** — загружает артефакт по SSH и активирует через симлинк `current` (atomic deploy, без простоя).
3. **`deploy-git`** — альтернатива через `git push` в отдельный репозиторий.

> Шаги деплоя имеют `if: false` — удали эту строку, когда настроишь секреты.

## Быстрый старт

### 1. Настрой CI (работает сразу)

Просто закоммить файлы и сделай push — workflow запустится автоматически:

```bash
git add .github/workflows/ci.yml storage/logs/.gitkeep
git commit -m "ci: добавить GitHub Actions CI"
git push
```

Проверить запуск: **вкладка Actions** в твоём GitHub-репозитории.

### 2. Настрой CD (нужны секреты)

Для деплоя добавь **Secrets** в репозитории:
**Settings → Secrets and variables → Actions → New repository secret**

| Имя секрета | Пример значения | Описание |
|-------------|----------------|----------|
| `SSH_HOST` | `192.168.1.10` | IP/домен сервера |
| `SSH_USER` | `deploy` | Пользователь SSH |
| `SSH_PRIVATE_KEY` | `-----BEGIN OPENSSH PRIVATE KEY-----...` | Приватный ключ (сгенерируй `ssh-keygen -t ed25519`) |
| `SSH_PORT` | `22` | (опционально) |

После этого:
1. Открой `.github/workflows/deploy.yml`.
2. Найди `if: false` в job'ах `deploy-ssh` (и/или `deploy-git`) и удали.
3. Настрой пути на сервере (`/var/www/myapp`).
4. Сделай **Release** на GitHub — деплой запустится.

## Настройка под себя

### Сменить версию PHP

В `ci.yml` и `deploy.yml` измени `php-version` в `setup-php`:

```yaml
- uses: shivammathur/setup-php@v2
  with:
    php-version: '8.3'   # <-- здесь
```

### Сменить ветки-триггеры

В начале `ci.yml` измени `on:`:

```yaml
on:
  push:
    branches: [ main, develop ]   # <-- только main и develop
  pull_request:
    branches: [ main ]            # <-- PR только в main
```

### Добавить покрытие кода (coverage)

В `ci.yml` в job `test` замени `coverage: none` на `coverage: pcov`, и в шаге PHPUnit добавь `--coverage-clover coverage.xml`. Затем можно отправлять в [CodeCov](https://codecov.io) через `codecov/codecov-action@v4`.

### Добавить линтер (PHP_CodeSniffer / PHPStan)

В `ci.yml` создай новый job:

```yaml
static-analysis:
  runs-on: ubuntu-latest
  steps:
    - uses: actions/checkout@v4
    - uses: shivammathur/setup-php@v2
      with:
        php-version: '8.2'
    - run: composer install
    - run: vendor/bin/phpstan analyse src --level=5
```

## Полезные ссылки

- [GitHub Actions — синтаксис workflow](https://docs.github.com/en/actions/using-workflows/workflow-syntax-for-github-actions)
- [shivammathur/setup-php](https://github.com/shivammathur/setup-php) — установка PHP в Actions
- [PHPUnit докам](https://docs.phpunit.de/)
- [Composer — best practices](https://getcomposer.org/doc/articles/versions.md)
