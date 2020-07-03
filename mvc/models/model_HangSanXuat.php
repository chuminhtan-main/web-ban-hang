<?php
class model_HangSanXuat extends DBConnect{
    
    //HÀM THÊM HÃNG SẢN XUẤT VÀO CSDL
    public function ThemHang($tenHang){
        $sql = "INSERT INTO hang_sx (TEN_HANG) VALUES('$tenHang')";
        
        $kq = mysqli_query($this->conn, $sql);
        
        return json_encode($kq);
    }
    public function LayDsHangSX(){

        $sql = "SELECT * FROM hang_sx";

        $result = $this->conn->query($sql);

        $arr = array();

        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
                $arr[] = $row;
            }
        }
        return $arr;
    }   
    //LẤY MỘT HÃNG SẢN XUẤT BẰNG MÃ 
    public function LayThongTinHang($mahang)
    {

        $sql = "SELECT * FROM hang_sx WHERE MA_HANG = $mahang";

        $result = $this->conn->query($sql);

        $hang = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $hang = $row;
            }
            return $hang;
        }
    }
     //CẬP NHẬT 
    public function CapNhatHang($mahang,$ten){

        $sql = "UPDATE hang_sx SET 
        MA_HANG='$mahang',
        TEN_HANG='$ten' 
        WHERE MA_HANG=$mahang";
        $kq = mysqli_query($this->conn, $sql);
        return $kq;
    }

    //XÓA
    public function XoaHang($mahang){

        $sql = "DELETE FROM hang_sx WHERE MA_HANG=$mahang";
        $kq = mysqli_query($this->conn,$sql);
        return $kq;
    }
    // AJAX: LẤY DS HANG SAN XUAT
    public function AjaxLayDsHang($trang, $soBanGhiMoiTrang){
        // bản ghi mỗi trang
        $output='';
        
        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM hang_sx LIMIT $batDau, $soBanGhiMoiTrang";

        $result = mysqli_query($this->conn,$query);

        $output .= "
            <table class='table-danh-sach'>
                <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên hãng sản xuất</th>
                    <th>Thao Tác</th>
                </tr>
        ";

        $stt = 1;
        while( $row = mysqli_fetch_array( $result ) ){

            $output .= "
            <tr>
                <td>".$stt."</td>
                <td>".$row["MA_HANG"]."</td>
                <td>".$row["TEN_HANG"]."</td>
                <td>
                    <a href='/doan/HangSanXuat/LayThongTinHang/".$row['MA_HANG']."' class='badge badge-warning btn-thao-tac'>Chỉnh Sửa</a>
                    <button class='btn-dark btn-xoaHang' value='/doan/HangSanXuat/XoaHang/".$row['MA_HANG']."'>Xóa</button>
                </td>
            </tr>
            ";
            $stt++;
        }
            $output .= "</table><br/><nav><br/><ul class='pagination'>";

            $page_result = mysqli_query($this->conn, "SELECT * FROM hang_sx");     
       
            $tongSoBanGhi = mysqli_num_rows($page_result);

            $tongSoTrang = ceil( $tongSoBanGhi/ $soBanGhiMoiTrang);

            // nhân viên thì gắn class .page-link-nhan-vien
            for($i = 1; $i <= $tongSoTrang ; $i++){
                
                    if( $trang == $i )
                        $output .= "<li class='page-item'><a class='page-link page-link-hang' style='background-color:#0069D9; color:white ' id='".$i."'>".$i."</a></li>";
                    else
                        $output .= "<li class='page-item'><a class='page-link page-link-hang'  id='".$i."'>".$i."</a></li>";
            } 
            return $output;
        }

}
?>