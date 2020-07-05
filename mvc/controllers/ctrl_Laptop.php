<?php 
    class ctrl_Laptop extends Controller{

        public function show(){
            $this->CreateView("view_User",
            [
                "page"=>"page_Laptop",
                "id"=>"tab-laptop"
            ]);
        }
    }
?>