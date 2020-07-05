<?php
    class ctrl_LienHe extends Controller{

        public function show(){
            $this->CreateView("view_User",
            [
                "page"=>"page_LienHe",
                "id"=>"tab-lien-he"
            ]
            );
        }
    }
?>