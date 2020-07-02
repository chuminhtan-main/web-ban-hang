<!-- Controller :Admin-->
<?php
    class ctrl_Admin extends Controller{
        private $dsNguoiDung; 
        public function show(){

            $this->CreateView("view_Admin",[
                "page"=>"page_QuanLyNguoiDung"
            ]);
        }
        
        public function LayDsNguoiDung(){
            //model
            $nguoiDung = $this->CreateModel("NguoiDungModel");
            //view
            $this->CreateView("view_Admin",
            [
            "page"=>"QuanLyNguoiDungPage",
            "dsNguoiDung"=>$nguoiDung->LayDsNguoiDung()
            ]);
        }
    }
?>