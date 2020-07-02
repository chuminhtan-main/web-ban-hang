<?php
    class DBConnect{
        public $conn;
        protected $serverName = "localhost";
        protected $userName = "root";
        protected $password = "";
        protected $dbName = "webbanhang";
        
        public function __construct(){
            
            //KHỞI TẠO KẾT NỐI
            $this->conn = mysqli_connect($this->serverName, $this->userName, $this->password,$this->dbName);
            
            
            mysqli_query($this->conn,"SET NAMES 'utf8'");//HIỂN THỊ DỮ LIỆU BẰNG TIẾNG VIỆT
        }
    }
?>