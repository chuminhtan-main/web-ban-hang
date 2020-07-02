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
}
?>