<?php
session_start();
include_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Kiểm tra và lấy dữ liệu đầu vào
    $id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
    $qty = isset($_POST['qtybutton']) ? (int)$_POST['qtybutton'] : 0;
    $sId = session_id();

    // Lấy thông tin sản phẩm từ database
    $product = mysqli_query($conn, "SELECT * FROM `tbl_sanpham` WHERE `maSanPham`='$id'");
    
    if (!$product || mysqli_num_rows($product) == 0) {
        echo "<script>alert('Sản phẩm không tồn tại!');
              window.location = 'single-product.php?maSanPham=$id';</script>";
        exit;
    }

    $row = mysqli_fetch_assoc($product);
    $slspHienCo = (int)$row['soLuongSanPham'];

    // Kiểm tra số lượng hiện tại trong giỏ hàng của sản phẩm này
    $cart_check = mysqli_query($conn, "
        SELECT SUM(soLuongSanPham) as total_in_cart 
        FROM tbl_giohang 
        WHERE maSanPham='$id' AND sessionID='$sId'
    ");
    $cart_row = mysqli_fetch_assoc($cart_check);
    $current_in_cart = $cart_row['total_in_cart'] ? (int)$cart_row['total_in_cart'] : 0;

    // Tính tổng số lượng (đã có trong giỏ + số lượng mới)
    $total_qty = $current_in_cart + $qty;

    // Kiểm tra số lượng
    if ($qty <= 0) {
        echo "<script>alert('Vui lòng nhập số lượng hợp lệ!');
              window.location = 'single-product.php?maSanPham=$id';</script>";
    } elseif ($total_qty > $slspHienCo) {
        $available = $slspHienCo - $current_in_cart;
        if ($available <= 0) {
            echo "<script>alert('Sản phẩm đã hết hàng trong kho!');
                  window.location = 'single-product.php?maSanPham=$id';</script>";
        } else {
            echo "<script>alert('Số lượng vượt quá tồn kho! Hiện chỉ có thể thêm tối đa $available sản phẩm.');
                  window.location = 'single-product.php?maSanPham=$id';</script>";
        }
    } else {
        // Lấy các thông tin còn lại của sản phẩm
        $maLoai = $row['maLoai'];
        $tenSanPham = $row['tenSanPham'];
        $size = $row['sizeSanPham'];
        $mieuTaSanPham = $row['mieuTaSanPham'];
        $giaSanPham = $row['giaSanPham'];
        $hinhAnhSanPham = $row['hinhAnhSanPham'];

        // Thêm vào giỏ hàng
        $insert = mysqli_query($conn, "
            INSERT INTO `tbl_giohang`(
                `id_giohang`,
                `maSanPham`,
                `soLuongSanPham`,
                `sessionID`,
                `maLoai`,
                `tenSanPham`,
                `sizeSanPham`,
                `mieuTaSanPham`,
                `giaSanPham`,
                `hinhAnhSanPham`
            ) VALUES (
                NULL,
                '" . mysqli_real_escape_string($conn, $id) . "',
                '" . mysqli_real_escape_string($conn, $qty) . "',
                '" . mysqli_real_escape_string($conn, $sId) . "',
                '" . mysqli_real_escape_string($conn, $maLoai) . "',
                '" . mysqli_real_escape_string($conn, $tenSanPham) . "',
                '" . mysqli_real_escape_string($conn, $size) . "',
                '" . mysqli_real_escape_string($conn, $mieuTaSanPham) . "',
                '" . mysqli_real_escape_string($conn, $giaSanPham) . "',
                '" . mysqli_real_escape_string($conn, $hinhAnhSanPham) . "'
            )");

        if ($insert) {
            header("location:cart.php");
            exit;
        } else {
            echo "<script>alert('Có lỗi xảy ra khi thêm vào giỏ hàng!');
                  window.location = 'single-product.php?maSanPham=$id';</script>";
        }
    }
}

mysqli_close($conn);
?>