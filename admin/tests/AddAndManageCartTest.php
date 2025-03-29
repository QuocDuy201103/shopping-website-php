<?php

use PHPUnit\Framework\TestCase;

class AddAndManageCartTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        // Giả lập kết nối cơ sở dữ liệu
        $this->conn = $this->createMock(mysqli::class);
    }

    public function testAddToCart()
    {
        $sessionId = 'testSession';
        $productId = 1;
        $quantity = 2;

        // Giả lập truy vấn thêm sản phẩm vào giỏ hàng
        $query = "INSERT INTO tbl_giohang (sessionID, maSanPham, soLuongSanPham) VALUES ('$sessionId', $productId, $quantity)";
        $this->conn->expects($this->once())
            ->method('query')
            ->with($this->equalTo($query))
            ->willReturn(true);

        $this->assertTrue($this->conn->query($query));
    }

    public function testRemoveFromCart()
    {
        $sessionId = 'testSession';
        $productId = 1;

        // Giả lập truy vấn xóa sản phẩm khỏi giỏ hàng
        $query = "DELETE FROM tbl_giohang WHERE sessionID = '$sessionId' AND maSanPham = $productId";
        $this->conn->expects($this->once())
            ->method('query')
            ->with($this->equalTo($query))
            ->willReturn(true);

        $this->assertTrue($this->conn->query($query));
    }

    // update số lượng trong giỏ hàng
    public function testUpdateCartQuantity()
    {
        $sessionId = 'testSession';
        $productId = 1;
        $newQuantity = 5;

        $query = "UPDATE tbl_giohang SET soLuongSanPham = $newQuantity WHERE sessionID = '$sessionId' AND maSanPham = $productId";
        $this->conn->expects($this->once())
            ->method('query')
            ->with($this->equalTo($query))
            ->willReturn(true);

        $this->assertTrue($this->conn->query($query));
    }

    //Tổng tiền giỏ hàng
    public function testCalculateTotal()
    {
        // Giả lập dữ liệu giỏ hàng
        $cartItems = [
            ['price' => 100000, 'quantity' => 2],
            ['price' => 150000, 'quantity' => 1]
        ];

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $this->assertEquals(350000, $total);
    }


    // Kiểm tra login chưa mà mua hàng?
    public function testCheckoutRedirect()
    {
        $_SESSION['soluong'] = 2;
        $_SESSION['ten'] = 'Test User';

        $checkoutPage = isset($_SESSION['ten']) ? 'checkout-address.php' : 'registration.php';

        $this->assertEquals('checkout-address.php', $checkoutPage);
    }

    public function testCheckoutRedirect2()
    {
        $_SESSION['soluong'] = 3;
        $_SESSION['ten'] = '';

        $checkoutPage = isset($_SESSION['ten']) ? 'checkout-address.php' : 'registration.php';

        $this->assertEquals('checkout-address.php', $checkoutPage);
    }

    public function testEmptyCartRedirectToHome()
    {
        // Giả lập giỏ hàng trống
        $cartItems = []; // Giỏ hàng không có sản phẩm

        // Giả lập hành động nhấn vào giỏ hàng trống
        $redirectPage = empty($cartItems) ? 'index.php' : 'cart.php'; // Nếu giỏ hàng trống, chuyển hướng về trang chủ

        // Kiểm tra kết quả
        $this->assertEquals('index.php', $redirectPage, "Giỏ hàng trống nhưng không chuyển hướng về trang chủ.");
    }

    protected function tearDown(): void
    {
        $this->conn = null;
    }
}