<?php
    class ctrl_QuanLySanPham extends Controller{

        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_QuanLySanPham",
                "id"=>"sanPham"
                ]);
        }
    }
?>