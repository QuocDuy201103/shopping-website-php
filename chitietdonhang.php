<?php
session_start();
$pageTitle = "TÀI KHOẢN CỦA TÔI | LEVENTS - Chính hãng Việt Nam";
function customPageHeader()
{ ?>
    <title>$pageTitle</title>
<?php }
include 'config.php';
include 'header.php';
?>
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 20px;">
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="page-title">Chi tiết và lịch sử đơn hàng</h2>
            </div>
            <!-- ACCOUNT-INFO-TEXT START -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="width: 100%">

                <div class="panel-body order-history">
                    <?php
                    // if (isset($_GET['maDonHang'])) {
                    //     $maDH = $_GET['maDonHang'];
                    // }
                    // $queryCTDH = mysqli_query($conn, "SELECT * FROM tbl_donhang, tbl_chitietdonhang WHERE tbl_donhang.maDonHang = tbl_chitietdonhang.maDonHang AND tbl_donhang.maDonHang = '$maDH' ");
                    // $resultCTDH = mysqli_fetch_array($queryCTDH);
                    if (isset($_GET['maDonHang']) && !empty($_GET['maDonHang'])) {
                        $encodedMaDH = $_GET['maDonHang'];
                        $maDH = base64_decode($encodedMaDH);

                        // Kiểm tra xem giải mã có thành công và giá trị có hợp lệ không
                        if ($maDH === false || empty($maDH)) {
                            echo "<script>window.location = '404.php'</script>";
                        } else {
                            // Sử dụng prepared statement để truy vấn an toàn
                            $query = "SELECT * FROM tbl_donhang 
                                     INNER JOIN tbl_chitietdonhang 
                                     ON tbl_donhang.maDonHang = tbl_chitietdonhang.maDonHang 
                                     WHERE tbl_donhang.maDonHang = ?";

                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("s", $maDH); // "s" nếu maDonHang là chuỗi, "i" nếu là số
                            $stmt->execute();
                            $queryCTDH = $stmt->get_result();

                            // Kiểm tra kết quả
                            if ($queryCTDH && $queryCTDH->num_rows > 0) {
                                $resultCTDH = $queryCTDH->fetch_array();
                                // Tiếp tục xử lý với $resultCTDH
                            } else {
                                echo "<script>window.location = '404.php'</script>";
                            }
                        }
                    } else {
                        echo "<script>window.location = '404.php'</script>";
                    }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data" name="formUser"
                        onsubmit="return validationForm()">
                        <!--enctype để có thể thêm hình ảnh -->
                        <table class="table-order" style="width: 100%;">
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct">Mã đơn hàng: </label>
                                </td>
                                <td>
                                    <h5 style="font-size: 16px;"><?php echo $resultCTDH['maDonHang'] ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct">Tên người nhận:</label>
                                </td>
                                <td>
                                    <h5 style="font-size: 16px;"><?php echo $resultCTDH['tenNguoiNhan'] ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct">Số điện thoại: </label>
                                </td>
                                <td>
                                    <h5 style="font-size: 16px;">0<?php echo $resultCTDH['sdtKH'] ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct">Địa chỉ giao: </label>
                                </td>
                                <td>
                                    <h5 style="font-size: 16px;"><?php echo $resultCTDH['diachi'] ?></h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct">Giá trị đơn hàng: </label>
                                </td>
                                <td>
                                    <span
                                        style="font-size: 16px;"><?php echo number_format($resultCTDH['tongTienDH']) ?>
                                        VNĐ</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct"> Trạng thái đơn hàng: </label>
                                </td>
                                <td>
                                    <span style="font-size: 16px;"><?php echo $resultCTDH['trangThaiDH'] ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="tabLabel">
                                    <label class="labelAddProduct">Ghi chú: </label>
                                </td>
                                <td>
                                    <span
                                        style="font-size: 16px;"><?php echo $resultCTDH['ghiChuCuaKhachhang'] ?></span>
                                </td>
                            </tr>
                            <tr>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ảnh</th>
                                                <th>Mã sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Size</th>

                                                <th>Số lượng SP</th>
                                                <th>Đơn giá</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $queryTemp = mysqli_query($conn, "SELECT *,sum(`soLuongSP`) FROM `tbl_chitietdonhang` WHERE `maDonHang`='$maDH' and `soLuongSP`>0 GROUP BY `maSanPham`");

                                            $i = 0;
                                            while ($resultData = mysqli_fetch_array($queryTemp)) {
                                                $i++;
                                                ?>
                                                <tr class="gradeX">
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="admin/pages/uploads/<?php echo $resultData['hinhAnhSP']; ?>"
                                                            width="150"></td>
                                                    <td><?php echo $resultData['maSanPham']; ?></td>
                                                    <td><?php echo $resultData['tenSanPham']; ?></td>
                                                    <td><?php echo $resultData['sizeSanPham']; ?></td>
                                                    <td><?php echo $resultData['sum(`soLuongSP`)']; ?></td>
                                                    <td><?php echo number_format($resultData['giaSanPham']); ?> VNĐ</td>
                                                    <?php
                                                    $thanhtien = $resultData['sum(`soLuongSP`)'] * $resultData['giaSanPham'];
                                                    ?>
                                                    <td><?php echo number_format($thanhtien); ?> VNĐ</td>
                                                    <?php
                                            }
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

            </div>
            <!-- ACCOUNT-INFO-TEXT END -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BACK TO HOME START -->
                <div class="home-link-menu">
                    <ul>
                        <li><a href="my-account.php"><i class="fa fa-chevron-left"></i> TRỞ LẠI</a></li>
                    </ul>
                </div>
                <!-- BACK TO HOME END -->
            </div>
        </div>
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
<?php
include 'footer.php';
?>
<!-- JS 
        ===============================================-->
<!-- jquery js -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>

<!-- fancybox js -->
<script src="js/jquery.fancybox.js"></script>

<!-- bxslider js -->
<script src="js/jquery.bxslider.min.js"></script>

<!-- meanmenu js -->
<script src="js/jquery.meanmenu.js"></script>

<!-- owl carousel js -->
<script src="js/owl.carousel.min.js"></script>

<!-- nivo slider js -->
<script src="js/jquery.nivo.slider.js"></script>

<!-- jqueryui js -->
<script src="js/jqueryui.js"></script>

<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>

<!-- wow js -->
<script src="js/wow.js"></script>
<script>
    new WOW().init();
</script>

<!-- main js -->
<script src="js/main.js"></script>
</body>


</html>