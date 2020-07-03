<?php
require_once "./mvc/models/dto/dto_SanPham.php";
class model_SanPham extends DBConnect
{

    //HÀM THÊM MỘT SẢN PHẨM
    public function ThemSanPham($CPU, $RAM, $hangsx, $ten, $price, $image, $mota)
    {

        $sql = "INSERT INTO san_pham (MA_CPU,MA_RAM,MA_HANG,TEN_SP,GIA_TIEN,TRANG_THAI,SRC_IMG,MO_TA) 
            VALUES ('$CPU','$RAM','$hangsx','$ten','$price','1','$image','$mota')";

        $kq = mysqli_query($this->conn, $sql);

        return json_encode($kq);
    }

    // HÀM LẤY DS SẢN PHẨM CÓ TRUYỀN THAM SỐ
    public function LayDsSanPham($trang, $soBanGhiMoiTrang)
    {   
        $sp = null;
        $dsSanPham = array();

        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM san_pham LIMIT $batDau, $soBanGhiMoiTrang";

        $result = mysqli_query($this->conn,$query);

        while( $row = mysqli_fetch_array( $result ) ){

            $sp = new dto_SanPham();
            $sp->setMa_sp( $row['MA_SP'] );
            $sp->setMa_cpu( $row['MA_CPU'] );
            $sp->setMa_ram( $row['MA_RAM'] );
            $sp->setMa_hang( $row['MA_HANG'] );
            $sp->setTen_sp( $row['TEN_SP'] );
            $sp->setGia( $row['GIA_TIEN'] );
            $sp->setTrang_thai( $row['TRANG_THAI'] );
            $sp->setSrc_img( $row['SRC_IMG'] );
            $sp->setMo_ta( $row['MO_TA'] );

            $dsSanPham[] = $sp;
        }

        return $dsSanPham;
    }

    //AJAX LẤY DS SẢN PHẨM
    public function AjaxLayDsSanPham($trang, $soBanGhiMoiTrang){
        // bản ghi mỗi trang
        $output='';
        
        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM san_pham LIMIT $batDau, $soBanGhiMoiTrang";

        $result = mysqli_query($this->conn,$query);

        $output .= "
            <table class='table-danh-sach'>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên SP</th>
                    <th></th>
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
}
