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
}
