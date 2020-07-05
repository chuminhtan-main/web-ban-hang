<?php
class App
{
    protected $controller = "ctrl_TrangChu";
    protected $action = "show";
    protected $params = [];

    function __construct()
    {
        $arr = $this->UrlProcess();
        $arr[0] = "ctrl_".$arr[0];
        // //xuất thông tin url nhận được
        // echo "<b>URL</b> = ";
        // print_r($arr);

        if ($this->UrlProcess() != null) {

            //xu ly controller
            if (file_exists("./mvc/controllers/".$arr[0].".php")) {

                $this->controller = $arr[0];

                //xu ly action
                if(isset($arr[1])){
                        $this->action = $arr[1];
                }

                unset($arr[0]);
                unset($arr[1]);

                //xu ly params
                $this->params = isset($arr) ? array_values($arr) : [];
            }
        }
        
        //xuất thông tin url ra màn hình
        // echo "<br/>"."<b>Controller</b> = ".$this->controller."<br/>";
        // echo "<b>Function: </b>".$this->action."<br/>";
        // echo "<b>Parameter</b>: ";
        // print_r($this->params);
        // echo "<br/><br/>";

        //nhúng file controller
        require_once "./mvc/controllers/" . $this->controller.".php";
        
        //gán cho controller là 1 đối tượng đã khởi do chính nó khởi tạo
        $this->controller = new $this->controller;
        // print_r($_SESSION['cart']);
        // echo "<br/>SoLuong ".sizeof($_SESSION['cart']);
        //gọi file + hàm + truyền tham số
        call_user_func_array([$this->controller, $this->action], $this->params);
        
        
    }

    //HÀM CẮT URL
    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        } else
            return null;
    }
}
