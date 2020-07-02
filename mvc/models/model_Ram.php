<?php
class model_Ram extends DBConnect{
    public function ThemRAM($RAM){
        $sql = "INSERT INTO ram (BO_NHO) VALUES('$RAM')";
        
        $kq = mysqli_query($this->conn, $sql);
        
        return json_encode($kq);
    }
    public function LayDsRAM(){

        $sql = "SELECT * FROM ram";

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