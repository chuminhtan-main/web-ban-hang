<?php
    class ctrl_LienHe extends Controller{

        public function show(){
            $loged = false;
            if( isset($_SESSION['loged']) && $_SESSION['loged'] == true){
                $loged = true;
            }
            $this->CreateView("view_User",
            [
                "page"=>"page_LienHe",
                "id"=>"tab-lien-he",
                "loged"=>$loged
            ]
            );
        }
    }
?>