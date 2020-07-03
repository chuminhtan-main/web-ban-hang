<?php
    class ctrl_CPU extends Controller{
        protected $m_CPU;
        
        public function __construct() {       
            $this->m_CPU = $this->CreateModel("model_CPU");
        }
        
        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_CPU",
                "dsCPU"=> $this->m_CPU->LayDsCPU()
                ]);
        }
        
        //HÀM LẤY THÔNG TIN NHẬP
        public function ThemCPU(){       
            //1 Get dữ liệu
            $tenCPU = $_POST["CPU"];           
            //2 Goị Model để thêm dữ liệu vào database
            $kq = $this->m_CPU->ThemCPU($tenCPU);
            
            $this->CreateView("view_Admin", [
                "page"=>"page_CPU",
                "kq"=>$kq
            ]);
        }
    }
?>