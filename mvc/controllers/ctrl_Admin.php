<!-- Controller :Admin-->
<?php
    class ctrl_Admin extends Controller{
        private $dsNguoiDung; 
        public function show(){

            $this->CreateView("view_Admin",[
                "page"=>"page_QuanLyNguoiDung"
            ]);
        }
    
    }
?>