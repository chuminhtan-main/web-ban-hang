<?php
    class ctrl_ThanhToan extends Controller{

        public function GioHang(){
            $this->CreateView("view_User",
            [
                "page"=>"page_GioHang",
                "id"=>"NONE"
            ]);
        }
    }
?>