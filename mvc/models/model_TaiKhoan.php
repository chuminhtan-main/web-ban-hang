<?php
class model_TaiKhoan extends DBConnect
{
    // HÀM LẤY THÔNG TIN NGƯỜI DÙNG BẰNG TÊN DĂNG NHẬP
    public function LayThongTinTaiKhoan($ten_dang_nhap)
    {
        $sql= "SELECT * FROM nguoi_dung WHERE TEN_DANG_NHAP = '$ten_dang_nhap'";

        $thong_tin = array();
        $result = $this->conn->query($sql);

        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $thong_tin = $row;
            }
        }
        return $thong_tin;
    }

       //THÊM NGƯỜI DÙNG
       public function ThemNguoiDung($ten, $email, $dienThoai, $diaChi, $tenDangNhap, $matKhau)
       {
   
           $sql = "INSERT INTO nguoi_dung (TEN_ND,EMAIL,SDT,DIA_CHI,LOAI_ND,TEN_DANG_NHAP,MAT_KHAU) 
               VALUES ('$ten','$email','$dienThoai','$diaChi',2,'$tenDangNhap','$matKhau')";
   
           $kq = mysqli_query($this->conn, $sql);
           return json_encode($kq);
       }
}
