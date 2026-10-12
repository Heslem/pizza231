<?php
namespace Tests\Models;

use Tests\BaseTestCase;
use App\Models\Order;

class OrderTest extends BaseTestCase
{
    private ?string $tempFile = null;
    private Order $order;

    protected function setUp(): void
    {
        // Пустой временный JSON — тесты не трогают реальный storage/orders.json
        $this->tempFile = $this->createTempJsonFile([]);
        $this->order = new Order($this->tempFile);
    }

    protected function tearDown(): void
    {
        if ($this->tempFile) {
            $this->cleanupTempFile($this->tempFile);
        }
    }

    /**
     * Тест: create создаёт заказ и возвращает строковый ID
     */
    public function testCreateCreatesOrderAndReturnsId(): void
    {
        $result = $this->order->create([
            'email' => 'test@example.com',
            'fio' => 'Test User',
            'phone' => '+79000000000',
            'address' => 'Test Address 1',
            'total' => 500.00,
            'status' => 'new',
            'items' => [
                ['id' => 1, 'name' => 'Product 1', 'price' => 250, 'quantity' => 2]
            ]
        ]);

        $this->assertIsString($result);
        $this->assertStringStartsWith('order_', $result);
    }

    /**
     * Тест: заказ сохраняется в JSON со всеми полями
     */
    public function testCreatePersistsAllFields(): void
    {
        $id = $this->order->create([
            'email' => 'persist@example.com',
            'fio' => 'Persist User',
            'phone' => '+79001110000',
            'address' => 'Street 1',
            'payment' => 'cash',
            'total' => 150,
            'items' => []
        ]);

        $orders = json_decode(file_get_contents($this->tempFile), true);

        $this->assertCount(1, $orders);
        $this->assertSame($id, $orders[0]['id']);
        $this->assertSame('Persist User', $orders[0]['fio']);
        $this->assertSame('cash', $orders[0]['payment']);
        $this->assertArrayHasKey('created_at', $orders[0]);
    }

    /**
     * Тест: getAll возвращает массив
     */
    public function testGetAllReturnsArray(): void
    {
        $result = $this->order->getAll();

        $this->assertIsArray($result);
    }

    /**
     * Тест: getAll сортирует заказы по дате (новые сверху)
     */
    public function testGetAllSortedByDateDescending(): void
    {
        $this->order->create(['email' => 'a@b.c', 'total' => 1, 'items' => [], 'created_at' => '2026-01-01 00:00:00']);
        $this->order->create(['email' => 'a@b.c', 'total' => 2, 'items' => [], 'created_at' => '2026-05-01 00:00:00']);
        $this->order->create(['email' => 'a@b.c', 'total' => 3, 'items' => [], 'created_at' => '2026-03-01 00:00:00']);

        $orders = $this->order->getAll();

        $this->assertCount(3, $orders);
        $this->assertEquals(2, $orders[0]['total']);
        $this->assertEquals(3, $orders[1]['total']);
        $this->assertEquals(1, $orders[2]['total']);
    }

    /**
     * Тест: findById возвращает null для несуществующего заказа
     */
    public function testFindByIdReturnsNullForNonExistent(): void
    {
        $result = $this->order->findById('order_nonexistent_999999');

        $this->assertNull($result);
    }

    /**
     * Тест: create + findById + updateStatus работают со строковым ID
     */
    public function testCreateFindAndUpdateStatusWithStringId(): void
    {
        $orderId = $this->order->create([
            'email' => 'test_status@example.com',
            'fio' => 'Test User',
            'total' => 100,
            'items' => []
        ]);

        $found = $this->order->findById($orderId);
        $this->assertNotNull($found);
        $this->assertSame($orderId, $found['id']);
        $this->assertSame('Test User', $found['fio']);

        $result = $this->order->updateStatus($orderId, 'completed');
        $this->assertTrue($result);

        $updated = $this->order->findById($orderId);
        $this->assertSame('completed', $updated['status']);
        $this->assertArrayHasKey('completed_at', $updated);
    }

    /**
     * Тест: updateStatus возвращает false для несуществующего заказа
     */
    public function testUpdateStatusReturnsFalseForNonExistent(): void
    {
        $result = $this->order->updateStatus('order_missing_123', 'completed');

        $this->assertFalse($result);
    }

    /**
     * Тест: getForUser находит заказы по user_id и по email
     */
    public function testGetForUserMatchesByIdAndEmail(): void
    {
        $this->order->create(['email' => 'user@example.com', 'total' => 10, 'items' => [], 'user_id' => 42]);
        $this->order->create(['email' => 'USER@example.com', 'total' => 20, 'items' => []]);
        $this->order->create(['email' => 'other@example.com', 'total' => 30, 'items' => []]);

        $orders = $this->order->getForUser(42, 'user@example.com');

        $this->assertCount(2, $orders);
    }

    /**
     * Тест: getForUser возвращает пустой массив для чужого пользователя
     */
    public function testGetForUserReturnsEmptyForUnknownUser(): void
    {
        $this->order->create(['email' => 'someone@example.com', 'total' => 10, 'items' => []]);

        $result = $this->order->getForUser(999999, 'nobody@example.com');

        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }
}
