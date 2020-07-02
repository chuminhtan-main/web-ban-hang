<?php
    class model_NguoiDung extends DBConnect{

        //THÊM NGƯỜI DÙNG
        public function ThemNguoiDung($ten,$email,$dienThoai,$diaChi,$loai,$tenDangNhap,$matKhau){

            $sql = "INSERT INTO nguoi_dung (TEN_ND,EMAIL,SDT,DIA_CHI,LOAI_ND,TEN_DANG_NHAP,MAT_KHAU) 
            VALUES ('$ten','$email','$dienThoai','$diaChi','$loai','$tenDangNhap','$matKhau')";

            $kq = mysqli_query($this->conn,$sql);

            return json_encode($kq);
        }

        // LẤY DANH SÁCH NHÂN VIÊN
        public function LayDsNguoiDung($loaiNguoiDung){

            $sql = "SELECT * FROM nguoi_dung WHERE loai_nd=$loaiNguoiDung";
            
            $result = $this->conn->query($sql);

            $arr = array();

            if($result->num_rows > 0){
                while($row = mysqli_fetch_array($result)){
                    $arr[] = $row;
                }
            }
            return $arr;
        }
    }
?>