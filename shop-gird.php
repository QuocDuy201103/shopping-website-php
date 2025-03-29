<?php
include_once 'classes/category.php';
include_once 'classes/product.php';
include_once 'admin/helpers/format.php';
?>

<?php
if (!isset($_GET['maLoai']) || $_GET['maLoai'] == '' || !is_numeric($_GET['maLoai']) || $_GET['maLoai'] > 30 || $_GET['maLoai'] < 0) {
    echo "<script>window.location = '404.php'</script>";
} else {
    $idLoai = $_GET['maLoai'];

    // Lấy tham số sort, mặc định là 'asc' nếu không có
    $sort = isset($_GET['sort']) && in_array($_GET['sort'], ['asc', 'desc']) ? $_GET['sort'] : 'asc';
    $prod = new product();
    $prodList = $prod->show_productbyCat($idLoai, $sort);
}

$fm = new Format();
$category = new category();
$catList = $category->getcatbyId($idLoai);
$resultCat = $catList->fetch_assoc();

$pageTitle = $resultCat['tenLoai'] . " | LEVENTS - Chính Hãng Việt Nam";
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- PRODUCT-LEFT-SIDEBAR START -->
                <div class="product-left-sidebar">
                    <h2 class="left-title pro-g-page-title">Mục lục</h2>
                    <!-- SINGLE SIDEBAR ENABLED FILTERS START -->
                    <div class="product-single-sidebar">
                        <span class="sidebar-title">LOẠI ĐÃ LỌC: </span>
                        <ul class="filtering-menu">
                            <li><?php echo $resultCat['tenLoai']; ?></li>
                        </ul>
                    </div>
                    <!-- SINGLE SIDEBAR ENABLED FILTERS END -->
                    <div class="sort-options">
                        <form method="GET" action="">
                            <input type="hidden" name="maLoai" value="<?php echo $idLoai; ?>">
                            <label for="sort">Sắp xếp theo giá:</label>
                            <select name="sort" id="sort" onchange="this.form.submit()">
                                <option value="asc" <?php echo $sort == 'asc' ? 'selected' : ''; ?>>Thấp đến cao</option>
                                <option value="desc" <?php echo $sort == 'desc' ? 'selected' : ''; ?>>Cao đến thấp
                                </option>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- PRODUCT-LEFT-SIDEBAR END -->
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="right-all-product">
                    <div class="product-category-title">
                        <h1><span class="cat-name"><?php echo $resultCat['tenLoai']; ?></span></h1>
                    </div>
                </div>
                <!-- ALL GATEGORY-PRODUCT START -->
                <div class="all-gategory-product">
                    <div class="row">
                        <ul class="gategory-product">
                            <?php
                            if ($prodList) {
                                while ($resultProd = $prodList->fetch_assoc()) {
                                    if ($resultProd['trangThaiSanPham'] == '1') {
                                        ?>
                                        <!-- SINGLE ITEM START -->
                                        <li class="gategory-product-list col-md-4 col-sm-6 col-xs-12">
                                            <div class="single-product-item">
                                                <div class="product-image">
                                                    <a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>">
                                                        <img src="admin/pages/uploads/<?php echo $resultProd['hinhAnhSanPham']; ?>"
                                                            alt="product-image" />
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <div class="customar-comments-box">
                                                        <div class="rating-box">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-empty"></i>
                                                        </div>
                                                    </div>
                                                    <a href="single-product.php?maSanPham=<?php echo $resultProd['maSanPham']; ?>">
                                                        <span style="text-transform: uppercase;">
                                                            <?php echo $fm->textShorten($resultProd['tenSanPham'], 30); ?>
                                                        </span>
                                                    </a>
                                                    <div class="price-box">
                                                        <span class="price"><?php echo number_format($resultProd['giaSanPham']); ?>
                                                            VNĐ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <!-- SINGLE ITEM END -->
                                        <?php
                                    }
                                }
                            } else {
                                echo "Không có sản phẩm nào!";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <!-- ALL GATEGORY-PRODUCT END -->

                <!-- PRODUCT-SHOOTING-RESULT START -->
                <div class="product-shooting-result product-shooting-result-border">
                    <div class="phanTrang">
                        <?php
                        $productAll = $prod->getAllProductbyCat($resultCat['maLoai']);
                        $productCount = mysqli_num_rows($productAll);
                        $productButton = ceil($productCount / 8);

                        if (!isset($_GET['trang'])) {
                            $trangHienTai = 1;
                        } else {
                            $trangHienTai = $_GET['trang'];
                        }

                        if (isset($_GET['size']) && !empty($_GET['size'])) {
                            $sizeSP = $_GET['size'];
                            if ($trangHienTai > 1 && $productButton > 1) {
                                echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&sort=' . $sort . '&trang=' . ($trangHienTai - 1) . '"><i class="fa fa-angle-double-left"></i> Trang trước</a>';
                            }
                            for ($i = 1; $i <= $productButton; $i++) {
                                if ($i == $trangHienTai) {
                                    echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&sort=' . $sort . '&trang=' . $i . '" style="background-color: rgb(174, 167, 174);">' . $i . '</a>';
                                } else {
                                    echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&sort=' . $sort . '&trang=' . $i . '">' . $i . '</a>';
                                }
                            }
                            if ($trangHienTai < $productButton && $productButton > 1) {
                                echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&size=' . $sizeSP . '&sort=' . $sort . '&trang=' . ($trangHienTai + 1) . '">Trang sau <i class="fa fa-angle-double-right"></i></a>';
                            }
                        } else {
                            if ($trangHienTai > 1 && $productButton > 1) {
                                echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&sort=' . $sort . '&trang=' . ($trangHienTai - 1) . '"><i class="fa fa-angle-double-left"></i> Trang trước</a>';
                            }
                            for ($i = 1; $i <= $productButton; $i++) {
                                if ($i == $trangHienTai) {
                                    echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&sort=' . $sort . '&trang=' . $i . '" style="background-color: rgb(174, 167, 174);">' . $i . '</a>';
                                } else {
                                    echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&sort=' . $sort . '&trang=' . $i . '">' . $i . '</a>';
                                }
                            }
                            if ($trangHienTai < $productButton && $productButton > 1) {
                                echo '<a href="?maLoai=' . $resultCat['maLoai'] . '&sort=' . $sort . '&trang=' . ($trangHienTai + 1) . '">Trang sau <i class="fa fa-angle-double-right"></i></a>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <!-- PRODUCT-SHOOTING-RESULT END -->
            </div>
        </div>
    </div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
<?php
include 'footer.php';
?>

<style type="text/css">
    .phanTrang a {
        text-decoration: none;
        cursor: pointer;
        color: black;
        float: left;
        padding: 5px 15px;
        border: 1px solid rgb(212, 205, 212);
        margin: 0px 2px 5px;
    }

    .phanTrang a:hover {
        background-color: rgb(174, 167, 174);
        transition: 500ms;
    }
</style>

<!-- JS 
===============================================-->
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