<?php
session_start();
$pageTitle = "TÀI KHOẢN CỦA TÔI | LEVENTS - Chính hãng Việt Nam";
function customPageHeader()
{ ?>
	<title>$pageTitle</title>
<?php }
include 'config.php';
include 'header.php';

// Số bản ghi trên mỗi trang
$records_per_page = 5;

// Lấy trang hiện tại từ URL, đảm bảo không nhỏ hơn 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;

// Tính offset, đảm bảo không âm
$offset = max(0, ($page - 1) * $records_per_page);
?>

<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 20px;"></div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="page-title">Chi tiết và lịch sử đơn hàng</h2>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" style="width: 100%">
				<?php
				if (isset($_SESSION['ten'])) {
					$ten = $_SESSION['ten'];

					$khachhang = mysqli_query($conn, "SELECT `maKhachHang`,`tenDangNhap` FROM `tbl_khachhang` WHERE `tenDangNhap`='$ten' ");
					$khachhangArr = mysqli_fetch_assoc($khachhang);
					$maKH = $khachhangArr['maKhachHang'];

					// Đếm tổng số đơn hàng
					$total_records_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM tbl_donhang WHERE maKhachHang = '$maKH'");
					$total_records = mysqli_fetch_assoc($total_records_query)['total'];

					// Tính tổng số trang
					$total_pages = ceil($total_records / $records_per_page);

					// Giới hạn trang tối đa
					$page = min($page, max(1, $total_pages));

					// Lấy dữ liệu cho trang hiện tại
					$chitietdh = mysqli_query($conn, "SELECT * FROM tbl_donhang WHERE maKhachHang = '$maKH' LIMIT $offset, $records_per_page");

					if (!$chitietdh) {
						die("Query failed: " . mysqli_error($conn));
					}
					?>
					<div>
						<div class="table-responsive" style="margin-top: 2%">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>STT</th>
										<th>Mã đơn hàng</th>
										<th>Ngày lập đơn hàng</th>
										<th>Tổng tiền đơn hàng</th>
										<th>Trạng thái đơn hàng</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = $offset;
									while ($resultDH = mysqli_fetch_array($chitietdh)) {
										$i++;
										// Mã hóa maDonHang bằng base64
										$encodedMaDonHang = base64_encode($resultDH['maDonHang']);
										?>
										<tr class="odd gradeX">
											<td><?php echo $i; ?></td>
											<td><?php echo $resultDH['maDonHang']; ?></td> <!-- Hiển thị mã gốc nếu muốn -->
											<td><?php echo $resultDH['ngayLapDH']; ?></td>
											<td><?php echo number_format($resultDH['tongTienDH']); ?> VNĐ</td>
											<td><?php echo $resultDH['trangThaiDH']; ?></td>
											<td>
												<a
													href="chitietdonhang.php?maDonHang=<?php echo urlencode($encodedMaDonHang); ?>">
													<button type="button" class="btn btn-info" id="btnShow"
														style="height: 20%;width: 90%;">Xem chi tiết</button>
												</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

							<!-- Phân trang -->
							<?php if ($total_pages > 1) { ?>
								<nav aria-label="Page navigation">
									<ul class="pagination">
										<li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
											<a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
												<span aria-hidden="true">«</span>
											</a>
										</li>

										<?php
										for ($i = 1; $i <= $total_pages; $i++) {
											$active = $page == $i ? 'active' : '';
											?>
											<li class="page-item <?php echo $active; ?>">
												<a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
											</li>
										<?php } ?>

										<li class="page-item <?php echo $page >= $total_pages ? 'disabled' : ''; ?>">
											<a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
												<span aria-hidden="true">»</span>
											</a>
										</li>
									</ul>
								</nav>
							<?php } ?>
						</div>
					</div>
					<?php
				} else {
					echo "Chưa có đơn hàng!";
				}
				?>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="home-link-menu">
					<ul>
						<li><a href="my-account.php"><i class="fa fa-chevron-left"></i> TRỞ LẠI</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->

<?php include 'footer.php'; ?>

<!-- JS -->
<script language="javascript" type="text/javascript">
	function popitup(url) {
		newwindow = window.open(url, 'name', 'height=600,width=800');
		if (window.focus) {
			newwindow.focus()
		}
		return false;
	}
</script>

<script src="js/vendor/jquery-1.11.3.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nivo.slider.js"></script>
<script src="js/jqueryui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.js"></script>
<script>
	new WOW().init();
</script>
<script src="js/main.js"></script>
</body>

</html>