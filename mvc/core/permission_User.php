<?php
if (isset($_SESSION['loged']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: /doan/TaiKhoan/DangNhap');
}
?>