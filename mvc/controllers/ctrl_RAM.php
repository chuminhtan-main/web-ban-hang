<?php
    class ctrl_RAM extends Controller{
        protected $m_RAM;
        
        public function __construct() {       
            $this->m_RAM = $this->CreateModel("model_Ram");
        }
        
        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_RAM",
                "dsRAM"=> $this->m_RAM->LayDsRAM()
                ]);
        }
        
        //HÀM LẤY THÔNG TIN NHẬP
        public function ThemRAM(){       
            //1 Get dữ liệu
            $tenRAM = $_POST["RAM"];           
            //2 Goị Model để thêm dữ liệu vào database
            $kq = $this->m_RAM->ThemRAM($tenRAM);
            
            $this->CreateView("view_Admin", [
                "page"=>"page_RAM",
                "kq"=>$kq
            ]);
        }
    }
?>