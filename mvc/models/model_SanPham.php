<?php
require_once "./mvc/models/dto/dto_SanPham.php";
class model_SanPham extends DBConnect
{

    //HÀM THÊM MỘT SẢN PHẨM
    public function ThemSanPham($ma_cpu, $ma_ram, $ma_hang, $ten, $gia, $src_img, $mo_ta)
    {
        echo $ma_cpu;
        echo $ma_ram;
        echo $ten;
        echo $gia;
        echo $src_img;
        echo $mo_ta;

        $sql = "INSERT INTO san_pham (
        MA_CPU,
        MA_RAM,
        MA_HANG,
        TEN_SP,
        GIA_TIEN,
        TRANG_THAI,
        SRC_IMG,
        MO_TA) 
        VALUES (
        $ma_cpu,
        $ma_ram,
        $ma_hang,
        '$ten',
        $gia,
        1,
        '$src_img',
        '$mo_ta')";

        $result = mysqli_query( $this->conn , $sql);
        
        if ( false===$result ) {
            printf("error: %s\n", mysqli_error($this->conn));
          }
          else {
            echo 'done.';
          }
        return json_encode($result);
    }

    // HÀM LẤY THÔNG TIN 1 SẢN PHẨM BẰNG MÃ{
        public function LayThongTinSanPham($maSanPham){

            $query = "SELECT * FROM san_pham WHERE MA_SP = $maSanPham";

            $result = $this->conn->query($query);

            $sp= array();

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $sp = $row;
                }
            }
            return $sp;
        }

    // HÀM LẤY DS SẢN PHẨM CÓ TRUYỀN THAM SỐ : CHO AJAX
    public function LayDsSanPham($trang, $soBanGhiMoiTrang)
    {   
        $sp = null;
        $dsSanPham = array();

        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM san_pham ORDER BY MA_SP DESC LIMIT $batDau, $soBanGhiMoiTrang";

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

    // HÀM ĐẾM SỐ LƯỢNG TRANG : CHO AJAX
    public function LaySoLuongTrang($trang, $soBanGhiMoiTrang){

        $page_result = mysqli_query($this->conn, "SELECT * FROM san_pham");     
       
        $tongSoBanGhi = mysqli_num_rows($page_result);

        $tongSoTrang = ceil( $tongSoBanGhi/ $soBanGhiMoiTrang);

        return $tongSoTrang;
    }


    //HÀM CẬP NHẬT SẢN PHẨM
    public function CapNhatSanPham($ma_sp,$ma_cpu, $ma_ram, $ma_hang, $ten, $gia, $src_img, $mo_ta)
    {
        echo $ma_cpu;
        echo $ma_ram;
        echo $ten;
        echo $gia;
        echo $src_img;
        echo $mo_ta;

        $sql = "UPDATE san_pham 
        SET 
        MA_CPU = $ma_cpu,
        MA_RAM = $ma_ram,
        MA_HANG = $ma_hang,
        TEN_SP = '$ten',
        GIA_TIEN = $gia,
        SRC_IMG = '$src_img',
        MO_TA = '$mo_ta' 
        WHERE
        MA_SP = $ma_sp";

        $result = mysqli_query( $this->conn , $sql);
        
        return json_encode($result);
    }

            //HÀM THAY ĐỔI TRẠNG THÁI SẢN PHẨM
            public function ThayDoiTrangThaiSanPham($ma_sp,$tt){

                $sql = "UPDATE san_pham SET TRANG_THAI = $tt WHERE MA_SP =$ma_sp";
    
                $result = mysqli_query($this->conn,$sql);
                return $result;
            }
}
