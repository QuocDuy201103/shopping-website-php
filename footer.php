<!-- FOOTER-TOP-AREA START -->
<section class="footer-top-area">
    <div class="container">
        <div class="footer-top-container">
            <div class="row equal-height"> <!-- Thêm lớp equal-height để đồng bộ chiều cao -->

                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <!-- FOOTER-TOP-RIGHT-1 START -->
                    <div class="footer-top-right-1">
                        <div class="row equal-height"> <!-- Thêm lớp equal-height cho các cột con -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <!-- STATICBLOCK START -->
                                <div class="staticblock">
                                    <h2>GIỚI THIỆU</h2>
                                    <p>LEVENTS - Chính hãng Việt Nam.</p>
                                    <p>Giờ mở cửa: 9h - 21h</p>
                                </div>
                                <!-- STATICBLOCK END -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <!-- STORE-INFORMATION START -->
                                <div class="Store-Information">
                                    <h2>THÔNG TIN CỬA HÀNG</h2>
                                    <ul>
                                        <li>
                                            <div class="info-lefticon">
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                            <div class="info-text">
                                                <p> An Dương Vương,Phường 3, Quận 5, TP HCM </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="info-lefticon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <div class="info-text call-lh">
                                                <p>HOTLINE : 0999777666</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="info-lefticon">
                                                <i class="fa fa-envelope-o"></i>
                                            </div>
                                            <div class="info-text">
                                                <p>Email : <a href="#"><i class="fa fa-angle-double-right"></i>
                                                        mwcstore@gmail.com</a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- STORE-INFORMATION END -->
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="fotter-menu-widget">
                                    <div class="single-f-widget">
                                        <h2>TÀI KHOẢN CỦA TÔI</h2>
                                        <ul>
                                            <li>
                                                <?php
                                                if (isset($_SESSION['ten'])) {
                                                    echo '<a href="my-account.php"><i class="fa fa-angle-double-right"></i>Tài khoản</a>';
                                                } else {
                                                    echo '<a href="registration.php"><i class="fa fa-angle-double-right"></i>Tài khoản</a>';
                                                }
                                                ?>
                                            </li>
                                            <li><a href="order_status.php"><i class="fa fa-angle-double-right"></i>Danh
                                                    sách đơn hàng</a></li>
                                            <li><a href="cart.php"><i class="fa fa-angle-double-right"></i>Giỏ hàng</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FOOTER-TOP-RIGHT-1 END -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FOOTER-TOP-AREA END -->