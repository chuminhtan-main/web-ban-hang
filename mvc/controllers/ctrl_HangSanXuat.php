<?php
    class ctrl_HangSanXuat extends Controller{
        protected $model_Hang;
        
        public function __construct() {       
            $this->model_Hang = $this->CreateModel("model_HangSanXuat");
        }
        
        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_HangSanXuat",
                "id"=>"hangsx",
                "dshangsx"=> $this->model_Hang->LayDsHangSX()
                ]);
        }
        
        public function abc(){
            echo "Ham abc";
        }
        
        //HÀM LẤY THÔNG TIN NHẬP
        public function ThemHang(){       
            //1 Get dữ liệu
            $tenHang = $_POST["ten-hang"];           
            //2 Goị Model để thêm dữ liệu vào database
            $kq = $this->model_Hang->ThemHang($tenHang);
            
            $this->CreateView("view_Admin", [
                "page"=>"page_HangSanXuat",
                "kq"=>$kq
            ]);
        }
    }
?>

