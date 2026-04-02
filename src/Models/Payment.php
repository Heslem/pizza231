<?php
namespace App\Models;

class Payment
{
    private const CONFIG_PATH = __DIR__ . '/../../storage/payment.json';
    
    private static ?array $config = null;
    
    /**
     * Загрузить конфигурацию платежей
     */
    private static function loadConfig(): array
    {
        if (self::$config === null) {
            if (file_exists(self::CONFIG_PATH)) {
                $json = file_get_contents(self::CONFIG_PATH);
                self::$config = json_decode($json, true) ?? [];
            } else {
                self::$config = [];
            }
        }
        return self::$config;
    }
    
    /**
     * Получить URL для оплаты через Robokassa
     */
    public static function getRobokassaUrl(array $order): string
    {
        $config = self::loadConfig();
        $robokassa = $config['robokassa'] ?? [];
        
        if (empty($robokassa['enabled'])) {
            return '';
        }
        
        $mrhLogin = $robokassa['merchantLogin'] ?? '';
        $mrhPass1 = $robokassa['password1'] ?? '';
        $isTest = $robokassa['isTest'] ?? true;
        $description = $robokassa['description'] ?? 'Оплата заказа';
        
        $invId = self::generateInvoiceId($order['id'] ?? '');
        $invDesc = $description . ' #' . ($order['id'] ?? '');
        $outSumm = number_format($order['total'] ?? 0, 2, '.', '');
        
        // Формируем подпись
        $crc = md5("$mrhLogin:$outSumm:$invId:$mrhPass1");
        
        $params = [
            'MerchantLogin' => $mrhLogin,
            'OutSum' => $outSumm,
            'InvoiceID' => $invId,
            'Description' => $invDesc,
            'SignatureValue' => $crc,
            'IsTest' => $isTest ? 1 : 0
        ];
        
        return 'https://auth.robokassa.ru/Merchant/Index.aspx?' . http_build_query($params);
    }
    
    /**
     * Сгенерировать InvoiceID из ID заказа
     */
    private static function generateInvoiceId(string $orderId): int
    {
        // Убираем префикс и оставляем только цифры
        $numeric = preg_replace('/[^0-9]/', '', $orderId);
        return !empty($numeric) ? (int)$numeric : time() % 1000000;
    }
    
    /**
     * Проверить подпись уведомления от Robokassa
     */
    public static function verifyCallback(array $data): bool
    {
        $config = self::loadConfig();
        $robokassa = $config['robokassa'] ?? [];
        
        if (empty($robokassa['enabled'])) {
            return false;
        }
        
        $mrhPass2 = $robokassa['password2'] ?? '';
        
        $outSum = $data['OutSum'] ?? '';
        $invId = $data['InvoiceID'] ?? '';
        $signature = $data['SignatureValue'] ?? '';
        
        // Формируем подпись для проверки
        $crc = strtoupper(md5("$outSum:$invId:$mrhPass2"));
        
        return strtoupper($signature) === $crc;
    }
    
    /**
     * Получить статус оплаты заказа
     */
    public static function isPaymentEnabled(): bool
    {
        $config = self::loadConfig();
        return !empty($config['robokassa']['enabled']);
    }
}
