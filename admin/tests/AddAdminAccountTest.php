<?php
require_once 'database.php';
require_once 'UserManager.php';

?>
<?php

use PHPUnit\Framework\TestCase;

class AddAdminAccountTest extends TestCase
{
    // Mock Database object
    protected $mockDb;

    // Set up the mock database before each test
    protected function setUp(): void
    {
        $this->mockDb = $this->createMock(Database::class);
    }

    // Test case when fields are empty
    public function testInsertUserWithEmptyFields()
    {
        $userManager = new UserManager($this->mockDb);

        // Simulate empty data
        $data = [
            'tenDangNhap' => '',
            'matKhau' => '',
            'tenNguoiQuanTri' => '',
            'thuDienTuQT' => '',
            'maVaiTro' => ''
        ];

        // Call the method
        $result = $userManager->insert_user($data);

        // Assert the returned result contains the error message for empty fields
        $this->assertStringContainsString('Không được để trống!', $result);
    }

    // Test case when username already exists
    public function testInsertUserWithDuplicateUsername()
    {
        // Mock the select method to simulate the username already existing
        $this->mockDb->method('select')->willReturn((object) [
            'fetch_assoc' => function () {
                return ['tenDangNhap' => 'existingUser']; // Simulate existing user
            }
        ]);

        $userManager = new UserManager($this->mockDb);

        // Simulate valid data but with an existing username
        $data = [
            'tenDangNhap' => 'existingUser', // Already exists
            'matKhau' => 'password123',
            'tenNguoiQuanTri' => 'Admin User',
            'thuDienTuQT' => 'admin@example.com',
            'maVaiTro' => '1'
        ];

        // Call the method
        $result = $userManager->insert_user($data);

        // Assert the returned result contains the error message for duplicate username
        $this->assertStringContainsString('Tên đăng nhập đã tồn tại trong CSDL, mời nhập lại!', $result);
    }

    // Test case when insertion is successful
    public function testInsertUserSuccess()
    {
        // Mock the select method to simulate no existing user
        $this->mockDb->method('select')->willReturn(null); // Simulate no existing user

        // Mock the insert method to simulate successful insertion
        $this->mockDb->method('insert')->willReturn(true);

        $userManager = new UserManager($this->mockDb);

        // Simulate valid data for insertion
        $data = [
            'tenDangNhap' => 'newUser',
            'matKhau' => 'password123',
            'tenNguoiQuanTri' => 'Admin User',
            'thuDienTuQT' => 'admin@example.com',
            'maVaiTro' => '1'
        ];

        // Call the method
        $result = $userManager->insert_user($data);

        // Assert the returned result contains the success message
        $this->assertStringContainsString('Thêm người dùng thành công!', $result);
    }

    // Test case when insertion fails
    public function testInsertUserFailure()
    {
        // Mock the select method to simulate no existing user
        $this->mockDb->method('select')->willReturn(null); // Simulate no existing user

        // Mock the insert method to simulate a failed insertion
        $this->mockDb->method('insert')->willReturn(false);

        $userManager = new UserManager($this->mockDb);

        // Simulate valid data for insertion
        $data = [
            'tenDangNhap' => 'newUser',
            'matKhau' => 'password123',
            'tenNguoiQuanTri' => 'Admin User',
            'thuDienTuQT' => 'admin@example.com',
            'maVaiTro' => '1'
        ];

        // Call the method
        $result = $userManager->insert_user($data);

        // Assert the returned result contains the failure message
        $this->assertStringContainsString('Thêm người dùng không thành công!', $result);
    }
}
