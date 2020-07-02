<?php
class model_CPU extends DBConnect{
    public function ThemCPU($CPU){
        $sql = "INSERT INTO cpu (TEN_CPU) VALUES('$CPU')";
        
        $kq = mysqli_query($this->conn, $sql);
        
        return json_encode($kq);
    }
    public function LayDsCPU(){

        $sql = "SELECT * FROM cpu";

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