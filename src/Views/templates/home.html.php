<?php
/**
 * Шаблон главной страницы
 * Доступные переменные:
 * - $productsHtml - HTML карточек товаров
 * - $showCatalog - показывать ли каталог на главной
 * - $texts - массив текстов из storage/templates/home.json
 */

// Значения по умолчанию, если файл не загружен
$texts = $texts ?? [];
$hero = $texts['hero'] ?? [];
$features = $texts['features'] ?? [];
$catalog = $texts['catalog'] ?? [];
$image = $texts['image'] ?? [];
$about = $texts['about'] ?? [];
?>

<!-- Герой-блок на всю высоту -->
<div class="hero-section hero-fullscreen text-center">
    <div class="container">
        <h1 class="display-3 fw-bold"><?= htmlspecialchars($hero['title'] ?? 'Добро пожаловать в кафе «Бе-Бе»') ?></h1>
        <p class="lead fs-4"><?= htmlspecialchars($hero['subtitle'] ?? 'Аутентичная уйгурско-узбецкая кухня в самом сердце города.') ?></p>
        <a href="/catalog" class="btn btn-warning btn-lg mt-4"><?= htmlspecialchars($hero['catalogButton'] ?? 'Посмотреть меню') ?></a>
    </div>
</div>
