<?php

include_once 'admin/lib/database.php';
include_once 'admin/helpers/format.php';
?>



<?php
class product
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function show_product()
	{
		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY maSanPham ASC"; //DESC: mới nhất lên đầu
		$result = $this->db->select($query);
		return $result;
	}

	// public function show_productbyCat($idLoai)
	// {
	// 	$sanPhamTungTrang = 9; //Sản phẩm từng trang

	// 	if (!isset($_GET['trang'])) {
	// 		$trang = 1;
	// 	} else {
	// 		$trang = $_GET['trang'];
	// 	}
	// 	$tungTrang = ($trang - 1) * $sanPhamTungTrang; //Vị trí bắt đầu $trang

	// 	$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY maSanPham ASC LIMIT $tungTrang, $sanPhamTungTrang "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách

	// 	if (isset($_GET['size'])) {
	// 		$sizeSP = $_GET['size'];
	// 		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' AND sizeSanPham = '$sizeSP' ORDER BY maSanPham ASC LIMIT $tungTrang, $sanPhamTungTrang";
	// 	}

	// 	$result = $this->db->select($query);
	// 	return $result;


	// }
	public function show_productbyCat($idLoai, $sort = 'asc')
	{
		$sanPhamTungTrang = 9; // Sản phẩm từng trang
		// Lấy trang hiện tại từ URL, mặc định là 1
		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tungTrang = ($trang - 1) * $sanPhamTungTrang; // Vị trí bắt đầu của trang
		// Xác định thứ tự sắp xếp theo giá
		$sortOrder = ($sort === 'desc') ? 'DESC' : 'ASC';
		// Query cơ bản: Lấy sản phẩm theo loại, trạng thái, và sắp xếp theo giá
		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham 
              WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai 
              AND tbl_sanpham.maLoai = '$idLoai' 
              AND tbl_sanpham.trangThaiSanPham = '1' 
              ORDER BY tbl_sanpham.giaSanPham $sortOrder 
              LIMIT $tungTrang, $sanPhamTungTrang";
		// Nếu có lọc theo size (sizeSanPham)
		if (isset($_GET['size'])) {
			$sizeSP = $_GET['size'];
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham 
                  WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai 
                  AND tbl_sanpham.maLoai = '$idLoai' 
                  AND tbl_sanpham.trangThaiSanPham = '1' 
                  AND tbl_sanpham.sizeSanPham = '$sizeSP' 
                  ORDER BY tbl_sanpham.giaSanPham $sortOrder 
                  LIMIT $tungTrang, $sanPhamTungTrang";
		}
		$result = $this->db->select($query);
		return $result;
	}
	public function getAllProductbyCatSort($idLoai, $sortOption = 'asc') // Dùng cho phân trang và sắp xếp
	{
		// Xác định hướng sắp xếp
		$orderByPrice = ($sortOption === 'desc') ? 'DESC' : 'ASC';

		// Câu truy vấn mặc định
		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham 
				  WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai 
				  AND tbl_sanpham.maLoai = '$idLoai' 
				  AND tbl_sanpham.trangThaiSanPham = '1' 
				  ORDER BY tbl_sanpham.giaSanPham $orderByPrice"; // Sắp xếp theo giá

		// Nếu có kích thước sản phẩm được chỉ định
		if (isset($_GET['size'])) {
			$sizeSP = $_GET['size'];
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham 
					  WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai 
					  AND tbl_sanpham.maLoai = '$idLoai' 
					  AND tbl_sanpham.trangThaiSanPham = '1' 
					  AND tbl_sanpham.sizeSanPham = '$sizeSP' 
					  ORDER BY tbl_sanpham.giaSanPham $orderByPrice"; // Sắp xếp theo giá
		}

		$result = $this->db->select($query);
		return $result;
	}


	public function getAllProductbyCat($idLoai) //Dùng cho phân trang
	{
		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' ORDER BY maSanPham ASC "; //DESC: sản phẩm mới nhất sẽ lên đầu danh sách

		if (isset($_GET['size'])) {
			$sizeSP = $_GET['size'];
			$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.maLoai = '$idLoai' AND tbl_sanpham.trangThaiSanPham = '1' AND sizeSanPham = '$sizeSP' ORDER BY maSanPham ASC ";
		}
		$result = $this->db->select($query);
		return $result;
	}

	// public function show_productLimit10Asc()
	// {
	// 	$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY maSanPham ASC LIMIT 10"; //DESC: mới nhất lên đầu
	// 	$result = $this->db->select($query);
	// 	return $result;
	// }
	public function show_productLimit10Asc()
	{
		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY RAND() LIMIT 20";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_productLimit5() //FRONT-END
	{
		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai ORDER BY maSanPham DESC LIMIT 5";
		$result = $this->db->select($query);
		return $result;
	}

	public function count_product()
	{
		$query = "SELECT SUM(soLuongSanPham) AS soluongprod FROM tbl_sanpham";
		$result = $this->db->select($query);
		return $result;
	}


	public function getproductbyId($id)
	{ //Dùng để sửa
		$query = "SELECT * FROM tbl_sanpham WHERE maSanPham = '$id' ";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_search_result($nameSearch)// Show product ,có tìm kiếm theo tên, kết quả tìm kiếm phân trang
	{
		//Phân trang
		$sanPhamTungTrang = 8; //Sản phẩm từng trang

		if (!isset($_GET['trang'])) {
			$trang = 1;
		} else {
			$trang = $_GET['trang'];
		}
		$tungTrang = ($trang - 1) * $sanPhamTungTrang; //Vị trí bắt đầu $trang

		//Search và show

		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' 
					AND tbl_sanpham.tenSanPham LIKE '%$nameSearch%'

					ORDER BY maSanPham DESC LIMIT $tungTrang, $sanPhamTungTrang "; // Khác biệt với getAllProduct


		$result = $this->db->select($query);
		return $result;
	}

	public function getAllProductSearch($nameSearch) //Dùng cho phân trang,...
	{

		$query = "SELECT * FROM tbl_sanpham, tbl_loaisanpham WHERE tbl_sanpham.maLoai = tbl_loaisanpham.maLoai AND tbl_sanpham.trangThaiSanPham = '1' 
					AND tbl_sanpham.tenSanPham LIKE '%$nameSearch%' ORDER BY maSanPham DESC ";


		$result = $this->db->select($query);
		return $result;
	}



}

?>