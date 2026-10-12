<?php
namespace Tests\Models;

use Tests\BaseTestCase;
use App\Models\User;

class UserTest extends BaseTestCase
{
    private ?string $usersFile = null;
    private ?string $adminsFile = null;
    private User $user;

    protected function setUp(): void
    {
        // Временные JSON — тесты не трогают реальные storage/users.json и admins.json
        $this->usersFile = $this->createTempJsonFile([]);
        $this->adminsFile = $this->createTempJsonFile([
            ['email' => 'admin@example.com', 'password' => 'admin123', 'name' => 'Admin'],
        ]);
        $this->user = new User($this->usersFile, $this->adminsFile);
    }

    protected function tearDown(): void
    {
        if ($this->usersFile) {
            $this->cleanupTempFile($this->usersFile);
        }
        if ($this->adminsFile) {
            $this->cleanupTempFile($this->adminsFile);
        }
    }

    /**
     * Тест: loadData возвращает массив
     */
    public function testLoadDataReturnsArray(): void
    {
        $this->assertIsArray($this->user->loadData());
    }

    /**
     * Тест: loadAdmins возвращает массив
     */
    public function testLoadAdminsReturnsArray(): void
    {
        $admins = $this->user->loadAdmins();

        $this->assertIsArray($admins);
        $this->assertCount(1, $admins);
    }

    /**
     * Тест: findByEmail возвращает null для несуществующего пользователя
     */
    public function testFindByEmailReturnsNullForNonExistent(): void
    {
        $this->assertNull($this->user->findByEmail('nonexistent@example.com'));
    }

    /**
     * Тест: findByEmail находит legacy-админа
     */
    public function testFindByEmailFindsAdmin(): void
    {
        $admin = $this->user->findByEmail('admin@example.com');

        $this->assertNotNull($admin);
        $this->assertTrue($admin['is_admin']);
        $this->assertTrue($admin['is_verified']);
    }

    /**
     * Тест: findById возвращает null для несуществующего пользователя
     */
    public function testFindByIdReturnsNullForNonExistent(): void
    {
        $this->assertNull($this->user->findById(999999));
    }

    /**
     * Тест: isAdmin возвращает false для несуществующего пользователя
     */
    public function testIsAdminReturnsFalseForNonExistent(): void
    {
        $this->assertFalse($this->user->isAdmin(999999));
    }

    /**
     * Тест: isAdmin(0) без email возвращает false (верифицированный legacy-доступ)
     */
    public function testIsAdminIdZeroWithoutEmailIsFalse(): void
    {
        $this->assertFalse($this->user->isAdmin(0));
    }

    /**
     * Тест: isAdmin(0) с email из admins.json возвращает true
     */
    public function testIsAdminIdZeroWithAdminEmailIsTrue(): void
    {
        $this->assertTrue($this->user->isAdmin(0, 'admin@example.com'));
        $this->assertFalse($this->user->isAdmin(0, 'hacker@example.com'));
    }

    /**
     * Тест: isVerified возвращает false для несуществующего email
     */
    public function testIsVerifiedReturnsFalseForNonExistent(): void
    {
        $this->assertFalse($this->user->isVerified('nonexistent@example.com'));
    }

    /**
     * Тест: verifyPassword возвращает null для несуществующего пользователя
     */
    public function testVerifyPasswordReturnsNullForNonExistent(): void
    {
        $this->assertNull($this->user->verifyPassword('nonexistent@example.com', 'password'));
    }

    /**
     * Тест: verifyPassword аутентифицирует legacy-админа (plain-пароль)
     */
    public function testVerifyPasswordAuthenticatesAdmin(): void
    {
        $user = $this->user->verifyPassword('admin@example.com', 'admin123');

        $this->assertNotNull($user);
        $this->assertTrue($user['is_admin']);
        $this->assertSame(0, $user['id']);
    }

    /**
     * Тест: create возвращает массив с данными пользователя
     */
    public function testCreateReturnsUserArray(): void
    {
        $result = $this->user->create('new@example.com', 'password123', 'Test User');

        $this->assertIsArray($result);
        $this->assertArrayHasKey('id', $result);
        $this->assertArrayHasKey('email', $result);
        $this->assertArrayHasKey('name', $result);
        $this->assertArrayHasKey('is_verified', $result);
        $this->assertArrayHasKey('verification_code', $result);
        $this->assertFalse($result['is_verified']);
    }

    /**
     * Тест: create возвращает null при попытке создать дубликат подтверждённого пользователя
     */
    public function testCreateReturnsNullForExistingVerifiedUser(): void
    {
        $email = 'dup@example.com';
        $created = $this->user->create($email, 'password123', 'Test User');
        $this->user->verifyEmail($email, $created['verification_code']);

        $result = $this->user->create($email, 'password456', 'Test User 2');

        $this->assertNull($result);
    }

    /**
     * Тест: verifyEmail подтверждает пользователя по коду
     */
    public function testVerifyEmailWithCorrectCode(): void
    {
        $created = $this->user->create('verify@example.com', 'password123', 'Verify User');

        $this->assertNotNull($created);
        $result = $this->user->verifyEmail('verify@example.com', $created['verification_code']);

        $this->assertTrue($result);
        $this->assertTrue($this->user->isVerified('verify@example.com'));
    }

    /**
     * Тест: verifyEmail возвращает false для неверного кода
     */
    public function testVerifyEmailWithWrongCode(): void
    {
        $this->user->create('wrong@example.com', 'password123', 'Wrong User');

        $this->assertFalse($this->user->verifyEmail('wrong@example.com', '999999'));
    }

    /**
     * Тест: verifyEmail возвращает false для несуществующего email
     */
    public function testVerifyEmailReturnsFalseForNonExistent(): void
    {
        $this->assertFalse($this->user->verifyEmail('nonexistent@example.com', '000000'));
    }

    /**
     * Тест: regenerateVerificationCode возвращает null для несуществующего email
     */
    public function testRegenerateVerificationCodeReturnsNullForNonExistent(): void
    {
        $this->assertNull($this->user->regenerateVerificationCode('nonexistent@example.com'));
    }

    /**
     * Тест: regenerateVerificationCode возвращает новый код для неподтверждённого
     */
    public function testRegenerateVerificationCodeReturnsCode(): void
    {
        $this->user->create('regen@example.com', 'password123', 'Regen User');

        $code = $this->user->regenerateVerificationCode('regen@example.com');

        $this->assertIsString($code);
        $this->assertSame(6, strlen($code));
    }

    /**
     * Тест: updateProfile изменяет данные пользователя
     */
    public function testUpdateProfileUpdatesUser(): void
    {
        $created = $this->user->create('profile@example.com', 'password123', 'Old Name');

        $result = $this->user->updateProfile($created['id'], ['name' => 'New Name', 'phone' => '+79000000000']);

        $this->assertTrue($result);

        $profile = $this->user->getFullProfile($created['id']);
        $this->assertSame('New Name', $profile['name']);
        $this->assertSame('+79000000000', $profile['phone']);
    }

    /**
     * Тест: updateProfile возвращает false для несуществующего пользователя
     */
    public function testUpdateProfileReturnsFalseForNonExistent(): void
    {
        $this->assertFalse($this->user->updateProfile(999999, ['name' => 'New Name']));
    }

    /**
     * Тест: getFullProfile возвращает null для несуществующего пользователя
     */
    public function testGetFullProfileReturnsNullForNonExistent(): void
    {
        $this->assertNull($this->user->getFullProfile(999999));
    }

    /**
     * Тест: getOrders возвращает пустой массив для несуществующего пользователя
     */
    public function testGetOrdersReturnsEmptyArrayForNonExistent(): void
    {
        $result = $this->user->getOrders(999999);

        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    /**
     * Тест: getAll возвращает массив
     */
    public function testGetAllReturnsArray(): void
    {
        $this->assertIsArray($this->user->getAll());
    }
}
