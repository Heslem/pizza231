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

<!-- Герой-блок -->
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold"><?= htmlspecialchars($hero['title'] ?? 'Добро пожаловать в кафе «Бе-Бе»') ?></h1>
        <p class="lead"><?= htmlspecialchars($hero['subtitle'] ?? 'Аутентичная уйгурско-узбецкая кухня в самом сердце города.') ?></p>
        <a href="/catalog" class="btn btn-warning btn-lg mt-3"><?= htmlspecialchars($hero['catalogButton'] ?? 'Посмотреть меню') ?></a>
    </div>
</div>

<div class="container">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h2 class="mb-3"><?= htmlspecialchars($features['title'] ?? 'Почему выбирают нас?') ?></h2>
            <ul class="list-group list-group-flush">
                <?php foreach ($features['items'] ?? ['Блюда по традиционным рецептам', 'Свежие ингредиенты и натуральные специи', 'Уютная атмосфера востока'] as $item): ?>
                <li class="list-group-item"><i class="bi bi-check-circle-fill" style="color: var(--cafe-orange);"></i> <?= htmlspecialchars($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="about-image-placeholder rounded shadow-lg d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--cafe-orange) 0%, var(--cafe-red) 100%); min-height: 300px;">
                <div class="text-center text-white">
                    <i class="bi bi-cup-hot-fill" style="font-size: 4rem;"></i>
                    <p class="mt-3 fw-bold">Кафе «Бе-Бе»</p>
                    <p>Уйгурско-узбецкая кухня</p>
                </div>
            </div>
        </div>
    </div>
    
    <?php if (!empty($about['title']) || !empty($about['text'])): ?>
    <!-- Секция "О кафе" -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-4">
                    <h2 class="mb-3"><?= htmlspecialchars($about['title'] ?? 'О кафе') ?></h2>
                    <p class="lead mb-0"><?= htmlspecialchars($about['text'] ?? 'Кафе «Бе-Бе» — это место, где встречаются традиции уйгурской и узбецкой кухни.') ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if ($showCatalog): ?>
    <!-- Секция с товарами -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-4"><?= htmlspecialchars($catalog['title'] ?? 'Наши блюда') ?></h2>
            <?= $productsHtml ?>
        </div>
    </div>
    <?php endif; ?>
</div>
