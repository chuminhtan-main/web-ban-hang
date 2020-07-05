
<?php
class Controller{

    // HÀM KHỞI TẠO VÀ TRẢ VỀ MỘT MODEL
    public function CreateModel($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    // HÀM KHỞI TẠO VÀ TRẢ VỀ MỘT VIEW
    public function CreateView($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

        // HÀM KHỞI TẠO VÀ TRẢ VỀ MỘT CONTROLLER
        public function CreateController($controller){
            require_once "./mvc/controllers/".$controller.".php";
            return new $controller;
        }
}
?>