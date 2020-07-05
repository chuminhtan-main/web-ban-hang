<!-- TRANG CHỦ CONTROLLER-->

<?php
class ctrl_TrangChu extends Controller{

    function show(){
        $this->CreateView("view_User",
        [
            "page"=>"page_TrangChu",
            "id"=>"tab-trang-chu",
            "da-dang-nhap"=>'false'
        ]);
    }

}
?>