<?php
session_start();
include_once 'classes/product.php';
include_once 'admin/helpers/format.php';
?>

<?php
if (!isset($_GET['maSanPham']) || $_GET['maSanPham'] == '') {
    echo "<script>window.location = '404.php'</script>";
} else {
    $idSanPham = $_GET['maSanPham'];

    $fm = new Format();
    $prod = new product();
    $prodList = $prod->getproductbyId($idSanPham);

    // Kiểm tra xem sản phẩm có tồn tại không
    if ($prodList && $prodList->num_rows > 0) {
        $resultProd = $prodList->fetch_assoc();
    } else {
        echo "<script>window.location = '404.php'</script>";
    }
}
?>

<?php
$pageTitle = $resultProd['tenSanPham'] . " | LEVENTS - Chính hãng Việt Nam";
function customPageHeader()
{ ?>
    <title><?php global $pageTitle;
    echo $pageTitle; ?></title>
<?php }
include 'header.php';
?>

<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 20px;"></div>

        <div class="row">
            <div class="col-lg-12 col-md-9 col-sm-9 col-xs-12">
                <!-- SINGLE-PRODUCT-DESCRIPTION START -->
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                        <div class="single-product-view">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="thumbnail_1">
                                    <div class="single-product-image">
                                        <img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>"
                                            alt="single-product-image" />
                                        <a class="fancybox"
                                            href="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>"
                                            data-fancybox-group="gallery">
                                            <span class="btn large-btn">Phóng to <i
                                                    class="fa fa-search-plus"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                        <div class="single-product-descirption">
                            <h2 name="m"><?php echo $resultProd['tenSanPham']; ?></h2>
                            <div class="single-product-review-box">
                                <div class="rating-box">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-empty"></i>
                                </div>
                            </div>
                            <div class="single-product-price">
                                <h2><?php echo number_format($resultProd['giaSanPham']); ?> VNĐ</h2>
                            </div>
                            <div class="single-product-desc">
                                <p><?php echo $resultProd['mieuTaSanPham']; ?></p>
                                <div class="product-in-stock">
                                    <p><?php if ($resultProd['trangThaiSanPham'] == '1')
                                        echo 'Tình trạng sản phẩm:' ?>
                                        <?php if ($resultProd['soLuongSanPham'] > 0)
                                        echo ' <span style="color: green;">Còn hàng</span>';
                                    else if ($resultProd['soLuongSanPham'] <= 0)
                                        echo ' <span style="color: red;">Hết hàng</span>'; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="single-product-add-cart">
                                <div class="single-product-size">
                                    <div name="product-size" id="product-size">
                                        <div value="<?php echo $resultProd["sizeSanPham"]; ?>"><span>Size: </span>
                                            <?php echo $resultProd["sizeSanPham"]; ?></div>
                                    </div>
                                </div>
                                <form method="post" action="add_cart.php?id=<?php echo $resultProd['maSanPham']; ?>">
                                    <div class="single-product-quantity">
                                        <?php
                                        $masp = $resultProd['maSanPham'];
                                        if ($resultProd['soLuongSanPham'] > 0) {
                                            echo '<p class="small-title">Số lượng:</p>
                                                  <div class="cart-quantity">
                                                  <div class="cart-plus-minus-button single-qty-btn">
                                                  <input class="cart-plus-minus sing-pro-qty" type="number" name="qtybutton" value="1" readonly>
                                                  </div>
                                                  </div>';
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if ($resultProd['soLuongSanPham'] > 0) {
                                        echo '<input type="submit" name="add_to_cart" class="add-cart-text" value="Thêm vào giỏ hàng" title="Add to cart">';
                                    } else {
                                        echo '<input type="submit" disabled name="add_to_cart" class="add-cart-text" value="Sản Phẩm Hết">';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- SINGLE-PRODUCT-DESCRIPTION END -->
            </div>
        </div>
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->

<?php
include 'footer.php';
?>

<!-- JS -->
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nivo.slider.js"></script>
<script src="js/jqueryui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.js"></script>
<script>new WOW().init();</script>
<script src="js/main.js"></script>
</body>

</html>