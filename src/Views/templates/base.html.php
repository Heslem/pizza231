<?php
$navText = $texts['nav'] ?? [];
$footerText = $texts['footer'] ?? [];
$cafeInfo = $texts['cafe'] ?? [];
$pickupPoints = $texts['pickupPoints'] ?? [];
$checkoutText = $texts['checkout'] ?? [];
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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
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

    <!-- Плавающая кнопка корзины в правом нижнем углу -->
    <button class="cart-floating-btn" id="cartFloatingBtn" aria-label="Открыть корзину">
        <i class="bi bi-cart3"></i>
        <span class="cart-floating-counter badge bg-danger rounded-pill" id="cartFloatingCounter" style="display: none;">0</span>
    </button>

    <!-- Slide-out панель корзины -->
    <div class="cart-slide-panel" id="cartSlidePanel">
        <div class="cart-slide-header">
            <h5 class="mb-0"><i class="bi bi-cart3 me-2"></i>Корзина</h5>
            <button class="btn-close" id="closeCartPanel" aria-label="Закрыть"></button>
        </div>
        <div class="cart-slide-body" id="cartSlideBody">
            <!-- Загружается через JS -->
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status"></div>
            </div>
        </div>
        <div class="cart-slide-footer" id="cartSlideFooter" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Итого:</span>
                <span class="h4 mb-0 text-success" id="cartSlideTotal">0 ₽</span>
            </div>
            <button class="btn btn-success w-100 btn-lg" id="checkoutFromPanel">
                <i class="bi bi-check-circle me-2"></i>Оформить заказ
            </button>
        </div>
    </div>

    <!-- Slide-out панель оформления заказа -->
    <div class="cart-slide-panel" id="checkoutSlidePanel">
        <div class="cart-slide-header">
            <h5 class="mb-0"><i class="bi bi-check2-square me-2"></i>Оформление заказа</h5>
            <button class="btn-close" id="closeCheckoutPanel" aria-label="Закрыть"></button>
        </div>
        <div class="cart-slide-body">
            <form id="checkout-form-panel">
                <div class="mb-3">
                    <label for="checkout-fio" class="form-label">ФИО <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="checkout-fio" name="fio" required placeholder="Иванов Иван Иванович">
                </div>
                <div class="mb-3">
                    <label for="checkout-email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="checkout-email" name="email" required placeholder="example@mail.ru">
                </div>
                <div class="mb-3">
                    <label for="checkout-phone" class="form-label">Телефон <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" required placeholder="+7 (999) 123-45-67">
                </div>
                
                <!-- Переключатель Самовывоз/Доставка -->
                <div class="mb-3">
                    <label class="form-label">Способ получения <span class="text-danger">*</span></label>
                    <div class="btn-group w-100" role="group">
                        <input type="radio" class="btn-check" name="deliveryType" id="deliveryTypeDelivery" value="delivery" checked>
                        <label class="btn btn-outline-dark" for="deliveryTypeDelivery">
                            <i class="bi bi-truck me-1"></i>Доставка
                        </label>
                        <input type="radio" class="btn-check" name="deliveryType" id="deliveryTypePickup" value="pickup">
                        <label class="btn btn-outline-dark" for="deliveryTypePickup">
                            <i class="bi bi-shop me-1"></i>Самовывоз
                        </label>
                    </div>
                </div>
                
                <!-- Адрес доставки (показывается при доставке) -->
                <div class="mb-3 delivery-fields">
                    <label for="checkout-address" class="form-label">Адрес доставки <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="г. Кемерово, ул. Примерная, д. 1, кв. 1">
                </div>
                
                <!-- Выбор точки самовывоза (скрыт по умолчанию) -->
                <div class="mb-3 pickup-fields d-none">
                    <label for="pickup-point" class="form-label">Точка самовывоза <span class="text-danger">*</span></label>
                    <select class="form-select" id="pickup-point" name="pickupPoint">
                        <option value="">Выберите точку самовывоза</option>
                        <?php foreach ($pickupPoints as $point): ?>
                        <option value="<?= htmlspecialchars($point['address']) ?>"><?= htmlspecialchars($point['name'] . ' - ' . $point['address']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="checkout-payment" class="form-label">Способ оплаты <span class="text-danger">*</span></label>
                    <select class="form-select" id="checkout-payment" name="payment" required>
                        <option value="">Выберите способ оплаты</option>
                        <option value="cash">Наличными при получении</option>
                        <option value="card">Банковской картой</option>
                        <option value="online">Онлайн-оплата</option>
                    </select>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <span>К оплате:</span>
                    <span class="h5 mb-0 text-success" id="checkoutTotalAmount">0 ₽</span>
                </div>
            </form>
        </div>
        <div class="cart-slide-footer">
            <button class="btn btn-outline-secondary w-100 mb-2" id="backToCartPanel">
                <i class="bi bi-arrow-left me-2"></i>Назад к корзине
            </button>
            <button class="btn btn-success w-100 btn-lg" id="submitOrderPanel">
                <span class="spinner-border spinner-border-sm d-none me-2" role="status"></span>
                <span class="btn-text">Подтвердить заказ</span>
            </button>
        </div>
    </div>

    <!-- Затемнение фона для панелей -->
    <div class="cart-overlay" id="cartOverlay"></div>

    <script>
    // Переключение полей Самовывоз/Доставка
    document.addEventListener('DOMContentLoaded', function() {
        const deliveryTypeRadios = document.querySelectorAll('input[name="deliveryType"]');
        const deliveryFields = document.querySelectorAll('.delivery-fields');
        const pickupFields = document.querySelectorAll('.pickup-fields');
        const addressInput = document.getElementById('checkout-address');
        const pickupSelect = document.getElementById('pickup-point');
        
        function updateFields() {
            const isDelivery = document.getElementById('deliveryTypeDelivery').checked;
            
            if (isDelivery) {
                deliveryFields.forEach(f => f.classList.remove('d-none'));
                pickupFields.forEach(f => f.classList.add('d-none'));
                addressInput.setAttribute('required', 'required');
                pickupSelect.removeAttribute('required');
                pickupSelect.removeAttribute('name');
                addressInput.setAttribute('name', 'address');
            } else {
                deliveryFields.forEach(f => f.classList.add('d-none'));
                pickupFields.forEach(f => f.classList.remove('d-none'));
                addressInput.removeAttribute('required');
                addressInput.removeAttribute('name');
                pickupSelect.setAttribute('required', 'required');
                pickupSelect.setAttribute('name', 'address');
            }
        }
        
        deliveryTypeRadios.forEach(radio => {
            radio.addEventListener('change', updateFields);
        });
        
        // Инициализация при загрузке
        updateFields();
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/cart.js"></script>
</body>
</html>
