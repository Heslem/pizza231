<?php
namespace App\Views;

class AdminTemplate extends BaseTemplate
{
    private const TEMPLATE_PATH          = __DIR__ . '/templates/admin.html.php';
    private const ORDERS_TEMPLATE_PATH   = __DIR__ . '/templates/admin_orders.html.php';
    private const USERS_TEMPLATE_PATH    = __DIR__ . '/templates/admin_users.html.php';
    private const LOGS_TEMPLATE_PATH     = __DIR__ . '/templates/admin_logs.html.php';
    private const CATALOG_TEMPLATE_PATH  = __DIR__ . '/templates/admin_catalog.html.php';
    private const TEXTS_PATH             = __DIR__ . '/../../storage/templates/admin.json';

    private static function loadTexts(): array
    {
        return parent::texts(self::TEXTS_PATH);
    }

    /**
     * Дашборд админки
     */
    public static function renderDashboard(array $stats): string
    {
        $texts = self::loadTexts();
        return parent::render(self::TEMPLATE_PATH, ['stats' => $stats], $texts);
    }

    /**
     * Страница заказов с вкладками
     */
    public static function renderOrders(array $orders): string
    {
        $texts = self::loadTexts();
        $activeOrders = array_filter($orders, fn($o) => in_array($o['status'] ?? 'new', ['new', 'processing']));
        $completedOrders = array_filter($orders, fn($o) => in_array($o['status'] ?? '', ['completed', 'cancelled']));

        $activeOrdersHtml = self::renderOrdersList($activeOrders, true, $texts);
        $completedOrdersHtml = self::renderOrdersList($completedOrders, false, $texts);

        return parent::render(self::ORDERS_TEMPLATE_PATH, [
            'orders' => $orders,
            'activeOrdersHtml' => $activeOrdersHtml,
            'completedOrdersHtml' => $completedOrdersHtml,
        ], $texts);
    }

    /**
     * Список пользователей
     */
    public static function renderUsers(array $users): string
    {
        $texts = self::loadTexts();
        $usersText = $texts['users'] ?? [];

        $usersHtml = '';
        if (empty($users)) {
            $usersHtml = '<tr><td colspan="4" class="text-center py-4 text-muted">'
                . '<i class="bi bi-people fs-1 d-block mb-2"></i>'
                . htmlspecialchars($usersText['noUsers'] ?? 'Пользователей пока нет')
                . '</td></tr>';
        } else {
            foreach ($users as $user) {
                $id = $user['id'] ?? '—';
                $name = htmlspecialchars($user['name'] ?? '—');
                $email = htmlspecialchars($user['email'] ?? '—');
                $createdAt = date('d.m.Y H:i', strtotime($user['created_at'] ?? time()));
                $usersHtml .= "<tr><td>{$id}</td><td>{$name}</td><td>{$email}</td><td>{$createdAt}</td></tr>";
            }
        }

        return parent::render(self::USERS_TEMPLATE_PATH, ['usersHtml' => $usersHtml], $texts);
    }

    /**
     * Страница логов ошибок
     */
    public static function renderLogs(array $logs): string
    {
        $texts = self::loadTexts();
        return parent::render(self::LOGS_TEMPLATE_PATH, ['logs' => $logs], $texts);
    }

    /**
     * Страница управления каталогом
     */
    public static function renderCatalog(array $products, array $categories): string
    {
        $texts = self::loadTexts();
        $catalogText = $texts['catalog'] ?? [];
        $productsHtml = self::renderProductsList($products, $catalogText);

        return parent::render(self::CATALOG_TEMPLATE_PATH, [
            'productsHtml' => $productsHtml,
            'categories' => $categories,
        ], $texts);
    }

    /**
     * Рендер списка заказов
     */
    private static function renderOrdersList(array $orders, bool $showActions, array $texts = []): string
    {
        $ordersText = $texts['orders'] ?? [];

        if (empty($orders)) {
            return '<div class="text-center py-5"><i class="bi bi-inbox fs-1 text-muted mb-3 d-block"></i>'
                . '<h5 class="text-muted">' . htmlspecialchars($ordersText['noOrders'] ?? 'Заказов нет') . '</h5></div>';
        }

        $html = '';
        foreach ($orders as $order) {
            $id = $order['id'] ?? '—';
            $fio = htmlspecialchars($order['fio'] ?? '—');
            $phone = htmlspecialchars($order['phone'] ?? '—');
            $total = number_format($order['total'] ?? 0, 0, '.', ' ');
            $status = $order['status'] ?? 'new';
            $dateStr = $order['created_at'] ?? $order['date'] ?? '';
            $createdAt = !empty($dateStr) ? date('d.m.Y H:i', strtotime($dateStr)) : '—';

            $statusText = match($status) {
                'new' => $ordersText['statusNew'] ?? 'Новый',
                'processing' => $ordersText['statusProcessing'] ?? 'В обработке',
                'completed' => $ordersText['statusCompleted'] ?? 'Выполнен',
                'cancelled' => $ordersText['statusCancelled'] ?? 'Отменён',
                default => $status
            };
            $statusClass = match($status) {
                'new' => 'bg-primary',
                'processing' => 'bg-warning text-dark',
                'completed' => 'bg-success',
                'cancelled' => 'bg-danger',
                default => 'bg-secondary'
            };
            $statusBadge = '<span class="badge ' . $statusClass . '">' . htmlspecialchars($statusText) . '</span>';
            $itemsCount = count($order['items'] ?? []);

            $html .= '<div class="card mb-3 shadow-sm order-card" style="cursor: pointer;"><div class="card-body"><div class="row align-items-center">'
                . '<div class="col-md-1"><button class="btn btn-link text-decoration-none fw-bold btn-view-order" data-id="' . $id . '">#' . substr($id, -8) . '</button></div>'
                . '<div class="col-md-3"><div class="fw-medium">' . $fio . '</div><small class="text-muted">' . $phone . '</small></div>'
                . '<div class="col-md-2"><small class="text-muted d-block">' . htmlspecialchars($ordersText['products'] ?? 'Товаров') . '</small><strong>' . $itemsCount . '</strong></div>'
                . '<div class="col-md-2"><small class="text-muted d-block">' . htmlspecialchars($ordersText['amount'] ?? 'Сумма') . '</small><strong class="text-success">' . $total . ' ₽</strong></div>'
                . '<div class="col-md-2"><small class="text-muted d-block">' . htmlspecialchars($ordersText['status'] ?? 'Статус') . '</small><div>' . $statusBadge . '</div></div>'
                . '<div class="col-md-2"><small class="text-muted d-block">' . htmlspecialchars($ordersText['date'] ?? 'Дата') . '</small><small>' . $createdAt . '</small></div>'
                . '</div></div></div>';
        }

        return $html;
    }

    /**
     * Рендер списка товаров
     */
    private static function renderProductsList(array $products, array $texts = []): string
    {
        if (empty($products)) {
            return '<tr><td colspan="6" class="text-center py-4 text-muted">'
                . '<i class="bi bi-box fs-1 d-block mb-2"></i>'
                . htmlspecialchars($texts['noProducts'] ?? 'Товаров пока нет')
                . '</td></tr>';
        }

        $html = '';
        foreach ($products as $product) {
            $id = $product['id'] ?? '—';
            $name = htmlspecialchars($product['name'] ?? '—');
            $category = htmlspecialchars($product['category'] ?? 'Без категории');
            $price = number_format($product['price'] ?? 0, 0, '.', ' ');
            $image = htmlspecialchars($product['image'] ?? '/assets/img/no-image.jpg');

            $html .= '<tr data-id="' . $id . '"><td>' . $id . '</td>'
                . '<td><img src="' . $image . '" alt="' . $name . '" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;"></td>'
                . '<td>' . $name . '</td><td>' . $category . '</td><td>' . $price . ' ₽</td>'
                . '<td><button class="btn btn-sm btn-primary me-1 btn-edit" data-id="' . $id . '"><i class="bi bi-pencil"></i> ' . htmlspecialchars($texts['edit'] ?? 'Редактировать') . '</button>'
                . '<button class="btn btn-sm btn-danger btn-delete" data-id="' . $id . '"><i class="bi bi-trash"></i> ' . htmlspecialchars($texts['delete'] ?? 'Удалить') . '</button></td></tr>';
        }

        return $html;
    }
}
