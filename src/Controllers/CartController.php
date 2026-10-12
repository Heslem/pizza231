<?php
namespace App\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\EmailSender;
use App\Models\Payment;
use App\Views\CartTemplate;
use App\Support\Session;
use App\Support\Response;
use App\Support\Request;

class CartController
{
    public function __construct()
    {
        Session::ensure();
    }

    /**
     * Отображение страницы корзины
     */
    public function get(): string
    {
        return CartTemplate::render();
    }

    /**
     * API: Оформить заказ
     * @param array $data ['fio', 'email', 'phone', 'address', 'payment', 'items', 'total']
     */
    public function order(?array $data = null): string
    {
        $data ??= Request::json();

        if (!$data) {
            return Response::error('Некорректные данные');
        }

        // Валидация обязательных полей
        $required = ['fio', 'email', 'phone', 'payment'];
        foreach ($required as $field) {
            if (empty($data[$field])) {
                return Response::error('Заполните все обязательные поля');
            }
        }

        // Для адреса - принимаем либо address (доставка), либо pickupPoint (самовывоз)
        $address = $data['address'] ?? $data['pickupPoint'] ?? '';
        if (empty($address)) {
            return Response::error('Укажите адрес доставки или выберите точку самовывоза');
        }

        // Получаем товары из корзины
        $items = Cart::getItems();
        if (empty($items)) {
            return Response::error('Корзина пуста');
        }

        $total = Cart::getTotal();

        // Данные заказа
        $order = [
            'created_at' => date('Y-m-d H:i:s'),
            'fio' => htmlspecialchars(trim($data['fio'])),
            'email' => htmlspecialchars(trim($data['email'])),
            'phone' => htmlspecialchars(trim($data['phone'])),
            'address' => htmlspecialchars(trim($address)),
            'deliveryType' => htmlspecialchars($data['deliveryType'] ?? 'delivery'),
            'payment' => htmlspecialchars($data['payment']),
            'items' => $items,
            'total' => $total,
            'status' => 'new'
        ];

        // Добавляем user_id только если пользователь авторизован
        if (Session::has('user_id')) {
            $order['user_id'] = (int)Session::get('user_id');
        }

        // Сохраняем заказ через модель (PDO + JSON fallback)
        $orderModel = new Order();
        $orderId = $orderModel->create($order);

        if ($orderId === null) {
            return Response::error('Ошибка сохранения заказа', 500);
        }

        $order['id'] = $orderId;

        // Отправляем email-уведомление
        try {
            $emailSent = EmailSender::sendOrderNotification($order, $order['email']);
            if (!$emailSent) {
                // Логируем, но не прерываем выполнение
                error_log('Не удалось отправить email-уведомление для заказа ' . $orderId);
            }
        } catch (\Exception $e) {
            error_log('Ошибка при отправке email: ' . $e->getMessage());
        }
        
        // Очищаем корзину
        Cart::clear();

        // Если выбрана онлайн-оплата - возвращаем URL для оплаты
        $paymentUrl = '';
        if ($data['payment'] === 'online' && Payment::isPaymentEnabled()) {
            $paymentUrl = Payment::getRobokassaUrl($order);
        }

        return Response::json([
            'success' => true,
            'orderId' => $orderId,
            'paymentUrl' => $paymentUrl
        ]);
    }

    /**
     * API: Добавить товар в корзину
     * @param array $data ['id', 'name', 'price', 'image', 'quantity']
     */
    public function add(?array $data = null): string
    {
        $data ??= Request::json();

        if (!$data || !isset($data['id'], $data['name'], $data['price'])) {
            return Response::error('Некорректные данные');
        }

        Cart::add(
            (int)$data['id'],
            (string)$data['name'],
            (float)$data['price'],
            $data['image'] ?? '',
            (int)($data['quantity'] ?? 1)
        );

        return Response::json([
            'success' => true,
            'count' => Cart::getCount(),
            'total' => Cart::getTotal()
        ]);
    }

    /**
     * API: Обновить количество товара
     * @param array $data ['id', 'quantity']
     */
    public function update(?array $data = null): string
    {
        $data ??= Request::json();

        if (!$data || !isset($data['id'], $data['quantity'])) {
            return Response::error('Некорректные данные');
        }

        Cart::updateQuantity((int)$data['id'], (int)$data['quantity']);

        return Response::json([
            'success' => true,
            'count' => Cart::getCount(),
            'total' => Cart::getTotal()
        ]);
    }

    /**
     * API: Удалить товар из корзины
     * @param array $data ['id']
     */
    public function remove(?array $data = null): string
    {
        $data ??= Request::json();

        if (!$data || !isset($data['id'])) {
            return Response::error('Некорректные данные');
        }

        Cart::remove((int)$data['id']);

        return Response::json([
            'success' => true,
            'count' => Cart::getCount(),
            'total' => Cart::getTotal()
        ]);
    }

    /**
     * API: Очистить корзину
     */
    public function clear(): string
    {
        Cart::clear();

        return Response::json([
            'success' => true,
            'count' => 0,
            'total' => 0
        ]);
    }
    
    /**
     * API: Изменить статус заказа (закрыть/открыть)
     * @param array $data ['id', 'status']
     */
    public function updateStatus(?array $data = null): string
    {
        $data ??= Request::json();

        if (!$data || !isset($data['id'], $data['status'])) {
            return Response::error('Некорректные данные');
        }

        $orderModel = new Order();
        $result = $orderModel->updateStatus((string)$data['id'], (string)$data['status']);

        if (!$result) {
            return Response::notFound('Заказ не найден');
        }

        return Response::json(['success' => true]);
    }
}