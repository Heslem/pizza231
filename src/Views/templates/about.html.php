<?php
/**
 * Шаблон страницы "О кафе"
 * Доступные переменные:
 * - $texts - массив текстов из storage/templates/about.json + base.json
 */

// Значения по умолчанию
$texts = $texts ?? [];
$history = $texts['history'] ?? [];
$contacts = $texts['contacts'] ?? [];
$mapId = 'YOUR_CONSTRUCTOR_ID';
?>

<div class="container mt-4">
    <h1 class="text-center mb-4"><?= htmlspecialchars($texts['title'] ?? 'О кафе «Бе-Бе»') ?></h1>
    
    <div class="row">
        <div class="col-md-8">
            <p class="lead">
                <?= htmlspecialchars($texts['intro'] ?? 'Добро пожаловать в кафе «Бе-Бе» — настоящий уголок Востока в Кемерово!') ?>
            </p>
            
            <p>
                <?= htmlspecialchars($history['founded'] ?? 'Кафе открылось в') ?> 
                <strong><?= htmlspecialchars($history['foundedYear'] ?? '2018 году') ?></strong> 
                <?= htmlspecialchars($history['reason'] ?? 'чтобы порадовать жителей города настоящей уйгурско-узбецкой кухней.') ?>
            </p>
            
            <p>
                <?= htmlspecialchars($history['today'] ?? '') ?>
            </p>
            
            <p>
                <?= htmlspecialchars($history['graduates'] ?? 'За годы работы мы поставили свыше') ?> 
                <strong><?= htmlspecialchars($history['graduatesCount'] ?? '50 000 блюд') ?></strong> 
                <?= htmlspecialchars($history['forText'] ?? 'довольным гостям.') ?>
            </p>
            
            <p>
                <?= htmlspecialchars($history['teachers'] ?? 'Наши повара — мастера своего дела, которые используют только свежие ингредиенты и натуральные специи.') ?>
            </p>
            
            <h4 class="mt-4"><?= htmlspecialchars($contacts['title'] ?? 'Контакты') ?></h4>
            <ul class="list-unstyled">
                <li><i class="bi bi-geo-alt-fill me-2" style="color: var(--cafe-orange);"></i><?= htmlspecialchars($contacts['address'] ?? 'Адрес:') ?> <?= htmlspecialchars($contacts['addressValue'] ?? 'г. Кемерово, ул. Примерная, д. 1') ?></li>
                <li><i class="bi bi-telephone-fill me-2" style="color: var(--cafe-orange);"></i><?= htmlspecialchars($contacts['phone'] ?? 'Телефон:') ?> <?= htmlspecialchars($contacts['phoneValue'] ?? '+7 (3842) 12-34-56') ?></li>
                <li><i class="bi bi-envelope-fill me-2" style="color: var(--cafe-orange);"></i><?= htmlspecialchars($contacts['email'] ?? 'E-mail:') ?> <?= htmlspecialchars($contacts['emailValue'] ?? 'info@cafe-be-be.ru') ?></li>
                <li><i class="bi bi-person-fill me-2" style="color: var(--cafe-orange);"></i><?= htmlspecialchars($contacts['director'] ?? 'Шеф-повар:') ?> <?= htmlspecialchars($contacts['directorName'] ?? 'Ахмедов Бека') ?></li>
            </ul>
        </div>
        
        <div class="col-md-4">
            <!-- Карта Яндекс -->
            <div class="card">
                <div class="card-body p-0">
                    <script type="text/javascript" charset="utf-8" 
                            async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A<?= $mapId ?>&amp;width=100%25&amp;height=300&amp;lang=ru_RU&amp;scroll=true">
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>