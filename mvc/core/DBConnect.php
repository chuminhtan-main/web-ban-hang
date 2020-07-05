<?php
    class DBConnect{
        public $conn;
        public $serverName = "localhost";
        public $userName = "root";
        public $password = "";
        
        public function __construct(){
            $dbName = "webbanhang";
            //KHỞI TẠO KẾT NỐI
            $this->conn = mysqli_connect($this->serverName, $this->userName, $this->password,$dbName);
            
            
            mysqli_query($this->conn,"SET NAMES 'utf8'");//HIỂN THỊ DỮ LIỆU BẰNG TIẾNG VIỆT
        }
    }
?>