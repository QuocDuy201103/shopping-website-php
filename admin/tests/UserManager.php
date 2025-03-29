<?php
require_once 'database.php';
?>
<?php
class UserManager
{
    protected $db;

    // Constructor để khởi tạo đối tượng UserManager với đối tượng db
    public function __construct($db)
    {
        $this->db = new Database();
    }

    // Phương thức changeStatusUser để thay đổi trạng thái của người dùng (Active <-> Inactive)
    public function changeStatusUser($name)
		{

			$queryActive = "UPDATE tbl_quantri SET trangThai = 'Active' WHERE tenDangNhap = '$name' ";
			$queryInactive = "UPDATE tbl_quantri SET trangThai = 'Inactive' WHERE tenDangNhap = '$name' ";
			$querySelect = "SELECT * FROM tbl_quantri WHERE tenDangNhap = '$name' ";

			$resultSelect = $this->db->select($querySelect);
			$value = $resultSelect->fetch_assoc();
			// Nếu người dùng Active thì Update status inactive và ngược lại
			if ($value['trangThai'] == 'Active')
			{
				
				$resultUpdate = $this->db->update($queryInactive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
			else if ($value['trangThai'] == 'Inactive')
			{
				
				$resultUpdate = $this->db->update($queryActive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Mở khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Mở khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
		}

        public function insert_user($data)
		{
			$tenDangNhap = mysqli_real_escape_string($this->db->link, $data['tenDangNhap']);
			$matKhau = mysqli_real_escape_string($this->db->link, $data['matKhau']);
			$tenNguoiQuanTri = mysqli_real_escape_string($this->db->link, $data['tenNguoiQuanTri']);
			$thuDienTuQT = mysqli_real_escape_string($this->db->link, $data['thuDienTuQT']);
			$maVaiTro = mysqli_real_escape_string($this->db->link, $data['maVaiTro']);
			if ($tenDangNhap == "" || $matKhau == "" || $tenNguoiQuanTri == "" || $thuDienTuQT == ""|| $maVaiTro == "" )
			{
				$alert = "<div class= 'alert alert-danger'>Không được để trống!</div>";
				return $alert;
			}
			else
			{
				$queryTemp = "SELECT * FROM tbl_quantri ";
				$temp = $this->db->select($queryTemp);
				$resultTemp = $temp->fetch_assoc();
				if ($resultTemp['tenDangNhap'] == $tenDangNhap) {
					$alert = "<div class= 'alert alert-danger'>Tên đăng nhập đã tồn tại trong CSDL, mời nhập lại!</div>";
					return $alert;
				}
				else
				{
					$matKhau = md5($matKhau);
					$query = "INSERT INTO tbl_quantri(tenDangNhap, matKhau, tenNguoiQuanTri, thuDienTuQT, maVaiTro) 
					VALUES('$tenDangNhap', '$matKhau', '$tenNguoiQuanTri', '$thuDienTuQT', '$maVaiTro') ";
					$result = $this->db->insert($query);
					if ($result)
					{
						$alert = "<div class= 'alert alert-success'>Thêm người dùng thành công!</div>";
						return $alert;
					}
					else
					{
						$alert = "<div class= 'alert alert-danger'>Thêm người dùng không thành công!</div>";
						return $alert;
					}
				}		
			}
		}

		public function changeStatusCustomer($id)
		{

			$queryActive = "UPDATE tbl_khachhang SET trangThai = 'Active' WHERE maKhachHang = '$id' ";
			$queryInactive = "UPDATE tbl_khachhang SET trangThai = 'Inactive' WHERE maKhachHang = '$id' ";
			$querySelect = "SELECT * FROM tbl_khachhang WHERE maKhachHang = '$id' ";

			$resultSelect = $this->db->select($querySelect);
			$value = $resultSelect->fetch_assoc();
			// Nếu người dùng Active thì Update status inactive và ngược lại
			if ($value['trangThai'] == 'Active')
			{
				
				$resultUpdate = $this->db->update($queryInactive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
			else if ($value['trangThai'] == 'Inactive')
			{
				
				$resultUpdate = $this->db->update($queryActive);

				if ($resultUpdate)
				{
					$alert = "<div class= 'alert alert-success'>Mở khóa người dùng thành công!</div>";
					return $alert;
				}
				else
				{
					$alert = "<div class= 'alert alert-danger'>Mở khóa người dùng không thành công!</div>";
					return $alert;
				}
			}
		}

}
