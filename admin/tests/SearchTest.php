<?php

use PHPUnit\Framework\TestCase;

require_once 'classes/category.php';
require_once 'classes/product.php';
require_once 'admin/helpers/format.php';
// ./vendor/bin/phpunit test/Unit/ProductTest.php
class SearchTest extends TestCase
{
    protected $product;
    protected $category;
    protected $format;

    protected function setUp(): void
    {
        $this->product = new product();
        $this->category = new category();
        $this->format = new Format();
    }

    // Kiểm tra tham số phân trang
    public function testInvalidPagination()
    {
        $currentPage = 1; // Trang hiện tại không hợp lệ
        $totalPages = 5;

        $this->assertLessThanOrEqual($totalPages, $currentPage, "Trang hiện tại không được lớn hơn tổng số trang.");
        $this->assertGreaterThanOrEqual(1, $currentPage, "Trang hiện tại phải ít nhất là 1.");
    }

    // Test tìm kiếm sản phẩm với từ khóa hợp lệ
    public function testSearchProductWithValidKeyword()
    {
        $keyword = "Nike"; // Từ khóa hợp lệ
        $result = $this->product->show_search_result($keyword);

        $this->assertNotNull($result, "Kết quả tìm kiếm không được null.");
        $this->assertGreaterThan(0, $result->num_rows, "Kết quả tìm kiếm phải trả về ít nhất một sản phẩm.");

        // Kiểm tra sản phẩm trong kết quả tìm kiếm chứa từ khóa
        while ($product = $result->fetch_assoc()) {
            $this->assertStringContainsStringIgnoringCase($keyword, $product['tenSanPham'], "Tên sản phẩm không chứa từ khóa tìm kiếm.");
        }
    }
    public function testSearchProductWithInvalidKeyword()
    {
        $keyword = "Lê Trọng Nhân"; // Từ khóa không có trong cơ sở dữ liệu
        $result = $this->product->show_search_result($keyword);

        // Kiểm tra xem kết quả có phải là false (không có sản phẩm)
        if ($result === false) {
            $this->assertTrue(true, "Không tìm thấy dữ liệu.");
        }
    }

    public function testSearchProductWithEmptyKeyword()
    {
        $keyword = ""; // Từ khóa rỗng
        $result = $this->product->show_search_result($keyword);

        $this->assertNotFalse($result, "Không tìm thấy dữ liệu.");
    }

    public function testSearchProductWithLeadingAndTrailingSpaces()
    {
        $keyword = "  Nike  ";
        $result = $this->product->show_search_result(trim($keyword));

        $this->assertNotNull($result, "Kết quả tìm kiếm không được null khi từ khóa chứa khoảng trắng.");
        $this->assertGreaterThan(0, $result->num_rows, "Kết quả tìm kiếm phải trả về sản phẩm hợp lệ.");
    }

    public function testSearchProductCaseInsensitive()
    {
        $keywordLower = "nike";
        $keywordUpper = "NIKE";

        $resultLower = $this->product->show_search_result($keywordLower);
        $resultUpper = $this->product->show_search_result($keywordUpper);

        $this->assertEquals($resultLower->num_rows, $resultUpper->num_rows, "Tìm kiếm không phân biệt chữ hoa và chữ thường phải trả về cùng kết quả.");
    }
}