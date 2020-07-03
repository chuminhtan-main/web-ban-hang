<?php
class model_SanPham extends DBConnect{

    public function ThemSanPham($CPU,$RAM,$hangsx,$ten,$price,$trangthai,$image,$mota){
        
            $sql = "INSERT INTO san_pham (MA_CPU,MA_RAM,MA_HANG,TEN_SP,GIA_TIEN,TRANG_THAI,SRC_IMG,MO_TA) 
            VALUES ('$CPU','$RAM','$hangsx','$ten','$price','$trangthai','$image','$mota')";

            $kq = mysqli_query($this->conn,$sql);

            return json_encode($kq);
        }
    public function LayDsSanPham(){

        $sql = "SELECT * FROM san_pham";

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