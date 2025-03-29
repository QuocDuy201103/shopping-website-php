<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../classes/product.php';
require_once __DIR__ . '/../lib/database.php';
require_once __DIR__ . '/../helpers/format.php';

class ProductTest extends TestCase
{
    protected $product;
    protected $dbMock;

    protected function setUp(): void
    {
        // Create a mock for the Database class
        $this->dbMock = $this->createMock(Database::class);

        // Instantiate the Product class with the mocked Database
        $this->product = new Product($this->dbMock); // Assuming Product has a constructor accepting Database instance
    }

    // Test case for inserting a product successfully
    public function testInsertProductSuccess()
    {
        // Mock the insert method to return true (indicating success)
        $this->dbMock->method('insert')->willReturn(true);

        // Prepare mock data for insertion
        $data = [
            'tenSanPham' => 'Test Product',
            'maLoai' => '1',
            'sizeSanPham' => '37',
            'mieuTaSanPham' => 'This is a test product',
            'soLuongSanPham' => '10',
            'giaSanPham' => '200000'
        ];

        // Simulate file upload
        $_FILES['image'] = [
            'name' => 'image.jpg',
            'tmp_name' => '/tmp/php12345',
            'size' => 1000
        ];

        // Call the insert_product method
        $result = $this->product->insert_product($data, $_FILES);

        // Assert that the success message is returned
        $this->assertStringContainsString('Thêm sản phẩm thành công!', $result);
    }

    // Test case for failing to insert a product (mocking insert failure)
    public function testInsertProductFailure()
    {
        // Mock the insert method to return false (indicating failure)
        $this->dbMock->method('insert')->willReturn(false);

        // Prepare mock data for insertion
        $data = [
            'tenSanPham' => 'Test Product',
            'maLoai' => '1',
            'sizeSanPham' => '37',
            'mieuTaSanPham' => 'This is a test product',
            'soLuongSanPham' => '10',
            'giaSanPham' => '200000'
        ];

        // Simulate file upload
        $_FILES['image'] = [
            'name' => 'image.jpg',
            'tmp_name' => '/tmp/php12345',
            'size' => 1000
        ];

        // Call the insert_product method
        $result = $this->product->insert_product($data, $_FILES);

        // Assert that the failure message is returned
        $this->assertStringContainsString('Thêm sản phẩm không thành công!', $result);
    }

    // Test case for editing a product successfully
    public function testEditProductSuccess()
    {
        // Mock the update method to return true (indicating success)
        $this->dbMock->method('update')->willReturn(true);

        // Prepare mock data for editing
        $data = [
            'tenSanPham' => 'Updated Product',
            'maLoai' => '1',
            'sizeSanPham' => '37',
            'mieuTaSanPham' => 'Updated description',
            'soLuongSanPham' => '20',
            'giaSanPham' => '300000'
        ];

        // Simulate file upload
        $_FILES['image'] = [
            'name' => 'updated_image.jpg',
            'tmp_name' => '/tmp/php67890',
            'size' => 1000
        ];

        // Call the edit_product method
        $result = $this->product->edit_product($data, $_FILES, 1); // Assuming product ID is 1

        // Assert that the success message is returned
        $this->assertStringContainsString('Sửa sản phẩm thành công!', $result);
    }

    // Test case for hiding a product successfully
    public function testHideProductSuccess()
    {
        // Mock the update method to return true (indicating success)
        $this->dbMock->method('update')->willReturn(true);

        // Call the hide_product method
        $result = $this->product->hide_product(1); // Assuming product ID is 1

        // Assert that the success message is returned
        $this->assertStringContainsString('Xóa sản phẩm thành công!', $result);
    }

    // Test case for failing to hide a product (mocking update failure)
    public function testHideProductFailure()
    {
        // Mock the update method to return false (indicating failure)
        $this->dbMock->method('update')->willReturn(false);

        // Call the hide_product method
        $result = $this->product->hide_product(1); // Assuming product ID is 1

        // Assert that the failure message is returned
        $this->assertStringContainsString('Xóa sản phẩm không thành công!', $result);
    }

 
}