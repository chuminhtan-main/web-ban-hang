<?php
class model_NguoiDung extends DBConnect
{

    //THÊM NGƯỜI DÙNG
    public function ThemNguoiDung($ten, $email, $dienThoai, $diaChi, $loai, $tenDangNhap, $matKhau)
    {

        $sql = "INSERT INTO nguoi_dung (TEN_ND,EMAIL,SDT,DIA_CHI,LOAI_ND,TEN_DANG_NHAP,MAT_KHAU) 
            VALUES ('$ten','$email','$dienThoai','$diaChi','$loai','$tenDangNhap','$matKhau')";

        $kq = mysqli_query($this->conn, $sql);
        return json_encode($kq);
    }

    // LẤY DANH SÁCH NHÂN VIÊN
    public function LayDsNguoiDung($loaiNguoiDung)
    {

        $sql = "SELECT * FROM nguoi_dung WHERE loai_nd=$loaiNguoiDung";

        $result = $this->conn->query($sql);

        $arr = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $arr[] = $row;
            }
        }
        return $arr;
    }

    //LẤY MỘT NGƯỜI DÙNG BẰNG MÃ 
    public function LayThongTinNguoiDung($maNguoiDung)
    {

        $sql = "SELECT * FROM nguoi_dung WHERE ma_nd = $maNguoiDung";

        $result = $this->conn->query($sql);

        $nguoiDung = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $nguoiDung = $row;
            }
            return $nguoiDung;
        }
    }

    //CẬP NHẬT MỘT NGƯỜI DÙNG BẰNG MÃ
    public function CapNhatNguoiDung($maNguoiDung,$ten,$email,$dienThoai,$diaChi){

        $sql = "UPDATE nguoi_dung SET 
        TEN_ND = '$ten', 
        EMAIL = '$email',
        SDT = '$dienThoai' 
        WHERE MA_ND = $maNguoiDung";
        $kq = mysqli_query($this->conn, $sql);
        return $kq;
    }

    //XÓA MỘT NGƯỜI DÙNG BẰNG MÃ
    public function XoaNguoiDung($maNguoiDung){

        $sql = "DELETE FROM nguoi_dung WHERE MA_ND = $maNguoiDung";
        $kq = mysqli_query($this->conn,$sql);
        return $kq;
    }

    // AJAX: LẤY DS NHÂN VIÊN
    public function AjaxLayDsNhanVien($trang, $soBanGhiMoiTrang){
        // bản ghi mỗi trang
        $output='';
        
        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM nguoi_dung WHERE LOAI_ND = 1 LIMIT $batDau, $soBanGhiMoiTrang";

        $result = mysqli_query($this->conn,$query);

        $output .= "
            <table class='table-danh-sach'>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Loại</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Thao Tác</th>
                </tr>
        ";

        $stt = 1;
        while( $row = mysqli_fetch_array( $result ) ){

            $loaiNguoiDung = ($row["LOAI_ND"] == 1) ? 'Nhân Viên' : 'Khách Hàng';

            $output .= "
            <tr>
                <td>".$stt."</td>
                <td>".$row["MA_ND"]."</td>
                <td>".$row["TEN_ND"]."</td>
                <td>".$row["EMAIL"]."</td>
                <td>".$row["SDT"]."</td>
                <td>".$row["DIA_CHI"]."</td>
                <td>".$loaiNguoiDung."</td>
                <td>".$row["TEN_DANG_NHAP"]."</td>
                <td><a href='/doan/QuanLyNguoiDung/LayThongTinNguoiDung/".$row['MA_ND']."' class='badge badge-warning btn-thao-tac'>Chỉnh Sửa</a>
                <button class='btn-dark btn-xoaNguoiDung' value='/doan/QuanLyNguoiDung/XoaNguoiDung/".$row['MA_ND']."'>Xóa</button>
            </tr>
            ";
            $stt++;
        }
            $output .= "</table><br/><nav><br/><ul class='pagination'>";

            $page_result = mysqli_query($this->conn, "SELECT * FROM nguoi_dung WHERE LOAI_ND = 1");     
       
            $tongSoBanGhi = mysqli_num_rows($page_result);

            $tongSoTrang = ceil( $tongSoBanGhi/ $soBanGhiMoiTrang);

            // nhân viên thì gắn class .page-link-nhan-vien
            for($i = 1; $i <= $tongSoTrang ; $i++){
                
                    if( $trang == $i )
                        $output .= "<li class='page-item'><a class='page-link page-link-nhan-vien' style='background-color:#0069D9; color:white ' id='".$i."'>".$i."</a></li>";
                    else
                        $output .= "<li class='page-item'><a class='page-link page-link-nhan-vien'  id='".$i."'>".$i."</a></li>";
            } 
            return $output;
        }

         // AJAX: LẤY DS KHÁCH HÀNG
    public function AjaxLayDsKhachhang($trang, $soBanGhiMoiTrang){

        // bản ghi mỗi trang
        $output='';
        
        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM nguoi_dung WHERE LOAI_ND = 2 LIMIT $batDau, $soBanGhiMoiTrang";

        $result = mysqli_query($this->conn,$query);

        $output .= "
            <table class='table-danh-sach'>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Loại</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Thao Tác</th>
                </tr>
        ";

        $stt = 1;
        while( $row = mysqli_fetch_array( $result ) ){

            $output .= "
            <tr>
                <td>".$stt."</td>
                <td>".$row["MA_ND"]."</td>
                <td>".$row["TEN_ND"]."</td>
                <td>".$row["EMAIL"]."</td>
                <td>".$row["SDT"]."</td>
                <td>".$row["DIA_CHI"]."</td>
                <td>Khách Hàng</td>
                <td>".$row["TEN_DANG_NHAP"]."</td>
                <td><a href='/doan/QuanLyNguoiDung/LayThongTinNguoiDung/".$row['MA_ND']."' class='badge badge-warning btn-thao-tac'>Chỉnh Sửa</a>
                <button class='btn-dark btn-xoaNguoiDung' value='/doan/QuanLyNguoiDung/XoaNguoiDung/".$row['MA_ND']."'>Xóa</button>
            </tr>
            ";
            $stt++;
        }
            $output .= "</table><br/><nav><br/><ul class='pagination'>";

            $page_result = mysqli_query($this->conn, "SELECT * FROM nguoi_dung WHERE LOAI_ND = 1");     
       
            $tongSoBanGhi = mysqli_num_rows($page_result);

            $tongSoTrang = ceil( $tongSoBanGhi/ $soBanGhiMoiTrang);

            //khách hàng thì gắn class .page-link-khach-hang
                for($i = 1; $i <= $tongSoTrang ; $i++){
                
                    if( $trang == $i )
                        $output .= "<li class='page-item'><a class='page-link page-link-khach-hang' style='background-color:#0069D9; color:white ' id='".$i."'>".$i."</a></li>";
                    else
                        $output .= "<li class='page-item'><a class='page-link page-link-khach-hang'  id='".$i."'>".$i."</a></li>";
                }

            return $output;
        }

    }
