<?php
class model_HangSanXuat extends DBConnect{
    
    //HÀM THÊM HÃNG SẢN XUẤT VÀO CSDL
    public function ThemHang($tenHang){
        $sql = "INSERT INTO hang_sx (TEN_HANG) VALUES('$tenHang')";
        
        $kq = mysqli_query($this->conn, $sql);
        
        return json_encode($kq);
    }
            
}
?>