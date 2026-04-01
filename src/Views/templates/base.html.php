<?php
/**
 * Базовый шаблон страницы
 * Доступные переменные:
 * - $content - основной контент страницы
 * - $texts - массив текстов из storage/templates/base.json
 */

// Значения по умолчанию
$texts = $texts ?? [];
$navText = $texts['nav'] ?? [];
$footerText = $texts['footer'] ?? [];
$cafeInfo = $texts['cafe'] ?? [];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($cafeInfo['name'] ?? 'Кафе Бе-Бе') ?> - Уйгурско-узбецкая кухня</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Фиксированная навигация -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <div class="logo-icon me-2">
                    <i class="bi bi-cup-hot-fill"></i>
                </div>
                <div class="logo-text">
                    <span class="brand-name"><?= htmlspecialchars($cafeInfo['name'] ?? 'Бе-Бе') ?></span>
                    <span class="brand-tagline"><?= htmlspecialchars($cafeInfo['tagline'] ?? 'Уйгурско-узбецкая кухня') ?></span>
                </div>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><?= htmlspecialchars($navText['home'] ?? 'Главная') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalog"><?= htmlspecialchars($navText['catalog'] ?? 'Меню') ?></a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="/cart">
                            <i class="bi bi-cart"></i>
                            <span class="cart-counter badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle" 
                                style="display: none; font-size: 0.7rem;">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about"><?= htmlspecialchars($navText['about'] ?? 'О кафе') ?></a>
                    </li>
                    <!-- Авторизация загружается через JavaScript -->
                    <li class="nav-item" id="auth-nav-item">
                        <a class="nav-link" href="/login">
                            <i class="bi bi-person me-1"></i><?= htmlspecialchars($navText['login'] ?? 'Вход') ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Отступ для фиксированной навигации -->
    <div style="height: 80px;"></div>

    <main>
        <?= $content ?>
    </main>

    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="footer-brand mb-2">
                        <i class="bi bi-cup-hot-fill me-2"></i>
                        <span class="fw-bold"><?= htmlspecialchars($cafeInfo['name'] ?? 'Кафе Бе-Бе') ?></span>
                    </div>
                    <p class="footer-text mb-0"><?= htmlspecialchars($cafeInfo['tagline'] ?? 'Аутентичная уйгурско-узбецкая кухня') ?></p>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <h6 class="footer-heading mb-2"><i class="bi bi-geo-alt me-1"></i>Адрес</h6>
                    <p class="footer-text mb-1"><?= htmlspecialchars($cafeInfo['address'] ?? 'г. Кемерово, ул. Примерная, д. 1') ?></p>
                    <p class="footer-text mb-0"><i class="bi bi-clock me-1"></i><?= htmlspecialchars($cafeInfo['workTime'] ?? 'Ежедневно с 10:00 до 23:00') ?></p>
                </div>
                <div class="col-md-4">
                    <h6 class="footer-heading mb-2"><i class="bi bi-telephone me-1"></i>Контакты</h6>
                    <p class="footer-text mb-1">
                        <a href="tel:<?= htmlspecialchars(str_replace([' ', '-', '(', ')'], '', $cafeInfo['phone'] ?? '')) ?>" class="footer-link">
                            <?= htmlspecialchars($cafeInfo['phone'] ?? '+7 (3842) 12-34-56') ?>
                        </a>
                    </p>
                    <p class="footer-text mb-0">&copy; 2026 <?= htmlspecialchars($footerText['copyright'] ?? 'Кафе «Бе-Бе». Все права защищены.') ?></p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/cart.js"></script>
</body>
</html>
