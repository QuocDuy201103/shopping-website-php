<?php
use PHPUnit\Framework\TestCase;

// Include các file cần thiết
require_once '../lib/database.php';
require_once '../helpers/format.php';
require_once '../classes/category.php';

class CategoryTest extends TestCase
{
    private $category;
    private $mockDB;
    private $mockFormat;

    protected function setUp(): void
    {
        // Mock Database và Format
        $this->mockDB = $this->createMock(Database::class);
        $this->mockFormat = $this->createMock(Format::class);

        // Gán các đối tượng mock vào thuộc tính của category
        $this->category->db = $this->mockDB;
        $this->category->fm = $this->mockFormat;
    }

    public function testInsertCategory_EmptyInput()
    {
        // Arrange
        $this->mockFormat->method('validation')->willReturn('');

        // Act
        $result = $this->category->insert_category('');

        // Assert
        $this->assertStringContainsString('Không được để trống', $result);
    }

    public function testInsertCategory_SuccessfulInsert()
    {
        // Arrange
        $this->mockFormat->method('validation')->willReturn('Test');
        $this->mockDB->method('insert')->willReturn(true);

        // Act
        $result = $this->category->insert_category('Test');

        // Assert
        $this->assertStringContainsString('Thêm danh mục thành công', $result);
    }

    public function testInsertCategory_FailedInsert()
    {
        // Arrange
        $this->mockFormat->method('validation')->willReturn('Test');
        $this->mockDB->method('insert')->willReturn(false);

        // Act
        $result = $this->category->insert_category('Test');

        // Assert
        $this->assertStringContainsString('Thêm danh mục không thành công', $result);
    }

    public function testDeleteCategory_Success()
    {
        // Arrange
        $this->mockDB->method('delete')->willReturn(true);

        // Act
        $result = $this->category->delete_category(1);

        // Assert
        $this->assertStringContainsString('Xóa danh mục thành công', $result);
    }

    public function testDeleteCategory_Failed()
    {
        // Arrange
        $this->mockDB->method('delete')->willReturn(false);

        // Act
        $result = $this->category->delete_category(1);

        // Assert
        $this->assertStringContainsString('Xóa danh mục không thành công', $result);
    }
}
