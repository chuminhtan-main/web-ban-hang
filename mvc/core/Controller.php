<!-- 
    CONTROLLER trong thư mục CORE chứa những hàm mà các file trong thư mục 
    controllers thường xuyên sử dụng và giống nhau.
 -->

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
}
?>