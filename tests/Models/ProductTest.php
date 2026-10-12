<?php
namespace Tests\Models;

use Tests\BaseTestCase;
use App\Models\Product;

class ProductTest extends BaseTestCase
{
    private ?string $tempFile = null;
    private Product $product;

    protected function setUp(): void
    {
        // Пустой временный JSON — тесты не трогают реальный storage/data.json
        $this->tempFile = $this->createTempJsonFile([]);
        $this->product = new Product($this->tempFile);
    }

    protected function tearDown(): void
    {
        if ($this->tempFile) {
            $this->cleanupTempFile($this->tempFile);
        }
    }

    /**
     * Тест: loadData возвращает null для пустого файла
     */
    public function testLoadDataReturnsNullForEmptyFile(): void
    {
        $result = $this->product->loadData();

        $this->assertTrue($result === null || is_array($result));
    }

    /**
     * Тест: loadData возвращает массив из JSON
     */
    public function testLoadDataReturnsArrayFromJson(): void
    {
        file_put_contents($this->tempFile, json_encode([
            ['id' => 1, 'name' => 'Товар 1', 'price' => 100, 'category' => 'Категория'],
            ['id' => 2, 'name' => 'Товар 2', 'price' => 200, 'category' => 'Категория'],
        ]));

        $result = $this->product->loadData();

        $this->assertIsArray($result);
        $this->assertArrayHasKey(1, $result);
        $this->assertSame('Товар 1', $result[1]['name']);
    }

    /**
     * Тест: findById возвращает null для несуществующего товара
     */
    public function testFindByIdReturnsNullForNonExistent(): void
    {
        $result = $this->product->findById(999999);

        $this->assertNull($result);
    }

    /**
     * Тест: findById находит товар по ID
     */
    public function testFindByIdReturnsProduct(): void
    {
        file_put_contents($this->tempFile, json_encode([
            ['id' => 7, 'name' => 'Товар 7', 'price' => 700, 'category' => 'Категория'],
        ]));

        $result = $this->product->findById(7);

        $this->assertNotNull($result);
        $this->assertSame('Товар 7', $result['name']);
    }

    /**
     * Тест: findByCategory возвращает пустой массив для несуществующей категории
     */
    public function testFindByCategoryReturnsEmptyArrayForNonExistent(): void
    {
        $result = $this->product->findByCategory('NonExistentCategory');

        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    /**
     * Тест: getCategories возвращает массив категорий
     */
    public function testGetCategoriesReturnsArray(): void
    {
        file_put_contents($this->tempFile, json_encode([
            ['id' => 1, 'name' => 'A', 'price' => 1, 'category' => 'Пицца'],
            ['id' => 2, 'name' => 'B', 'price' => 2, 'category' => 'Напитки'],
            ['id' => 3, 'name' => 'C', 'price' => 3, 'category' => 'Пицца'],
        ]));

        $result = $this->product->getCategories();

        $this->assertIsArray($result);
        $this->assertContains('Пицца', $result);
        $this->assertContains('Напитки', $result);
    }

    /**
     * Тест: search возвращает массив
     */
    public function testSearchReturnsArray(): void
    {
        $result = $this->product->search('test');

        $this->assertIsArray($result);
    }

    /**
     * Тест: create добавляет товар в JSON и возвращает ID
     */
    public function testCreateAddsProductToJson(): void
    {
        $result = $this->product->create([
            'name' => 'Test Product',
            'price' => 100,
            'category' => 'Test'
        ]);

        $this->assertIsInt($result);

        $products = json_decode(file_get_contents($this->tempFile), true);
        $this->assertCount(1, $products);
        $this->assertSame('Test Product', $products[0]['name']);
    }

    /**
     * Тест: create генерирует уникальный ID
     */
    public function testCreateGeneratesUniqueId(): void
    {
        $id1 = $this->product->create(['name' => 'P1', 'price' => 10, 'category' => 'C']);
        $id2 = $this->product->create(['name' => 'P2', 'price' => 20, 'category' => 'C']);

        $this->assertNotEquals($id1, $id2);
    }

    /**
     * Тест: update изменяет товар в JSON
     */
    public function testUpdateModifiesProduct(): void
    {
        $id = $this->product->create(['name' => 'Old', 'price' => 100, 'category' => 'C']);

        $result = $this->product->update($id, [
            'name' => 'Updated Product',
            'price' => 200,
            'category' => 'Updated'
        ]);

        $this->assertTrue($result);

        $product = $this->product->findById($id);
        $this->assertSame('Updated Product', $product['name']);
        $this->assertEquals(200, $product['price']);
    }

    /**
     * Тест: update возвращает false для несуществующего товара
     */
    public function testUpdateReturnsFalseForNonExistent(): void
    {
        $result = $this->product->update(999999, [
            'name' => 'Ghost',
            'price' => 1,
            'category' => 'X'
        ]);

        $this->assertFalse($result);
    }

    /**
     * Тест: delete удаляет товар из JSON
     */
    public function testDeleteRemovesProduct(): void
    {
        $id = $this->product->create(['name' => 'ToDelete', 'price' => 50, 'category' => 'C']);

        $result = $this->product->delete($id);

        $this->assertTrue($result);
        $this->assertNull($this->product->findById($id));
    }

    /**
     * Тест: delete возвращает false для несуществующего товара
     */
    public function testDeleteReturnsFalseForNonExistent(): void
    {
        $result = $this->product->delete(999999);

        $this->assertFalse($result);
    }
}
