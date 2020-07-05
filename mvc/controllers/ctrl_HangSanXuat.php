<?php
    class ctrl_HangSanXuat extends Controller{
        protected $model_Hang;
        
        public function __construct() {       
            $this->model_Hang = $this->CreateModel("model_HangSanXuat");
        }
        
        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_HangSanXuat",
                "id"=>"tab-hang-san-xuat",
                "dshangsx"=> $this->model_Hang->LayDsHangSX()
                ]);
        }
        
        public function abc(){
            echo "Ham abc";
        }
        
        //HÀM LẤY THÔNG TIN NHẬP
        public function ThemHang(){       
            //1 Get dữ liệu
            $tenHang = $_POST["ten-hang"];           
            //2 Goị Model để thêm dữ liệu vào database
            $kq = $this->model_Hang->ThemHang($tenHang);
            
            $this->CreateView("view_Admin", [
                "page"=>"page_HangSanXuat",
                "id"=>"tab-hang-san-xuat",
                "kqThem"=>$kq,
                "dshangsx"=> $this->model_Hang->LayDsHangSX()
            ]);
        }
        //HÀM LẤY MỘT NGƯỜI DÙNG BẤT KỲ HIỂN THỊ LÊN FORM SỬA THÔNG TIN
        public function LayThongTinHang($mahang)
        {

            $this->CreateView("view_Admin", [
                "page" => "page_HangSanXuat",
                "id"=>"tab-hang-san-xuat",
                "dshangsx"=> $this->model_Hang->LayDsHangSX(),
                "ThongTinHang" => $this->model_Hang->LayThongTinHang($mahang),
                //Lấy danh sách mới    
                "dshangsx"=> $this->model_Hang->LayDsHangSX(),
            ]);
        }
         //HÀM CẬP NHẬT THÔNG TIN 
        public function CapNhatHang($mahang)
        {
            //1. get dữ liệu từ form
            $ten = $_POST["ten-hang"];

            //2. Cập Nhật Vào DB và Thông báo
            $this->CreateView("view_Admin", [
                "page" => "page_HangSanXuat",
                "id"=>"tab-hang-san-xuat",
                // cập nhật người dùng
                "kqCapNhat" => $this->model_Hang->CapNhatHang($mahang, $ten),
                //Lấy danh sách mới    
                "dshangsx"=> $this->model_Hang->LayDsHangSX()
            ]);
        }
        //HÀM XÓA NGƯỜI DÙNG
        public function XoaHang($mahang)
        {
            $this->CreateView("view_Admin", [
                "page" => "page_HangSanXuat",
                "id"=>"tab-hang-san-xuat",
                // cập nhật 
                "kqXoa" => $this->model_Hang->XoaHang($mahang),
                //Lấy danh sách mới    
                "dshangsx"=> $this->model_Hang->LayDsHangSX()
            ]);
        }
        //AJAX :Lấy DS Nhân Viên
        public function AjaxLayDsHang($soBanGhiMoiTrang)
        {

            $trang = '';

            //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

            if (isset($_POST["page_HangSanXuat"])) {
                $trang = $_POST["page_HangSanXuat"];
            } else {
                $trang = 1;
            }

            $output = $this->model_Hang->AjaxLayDsHang($trang, $soBanGhiMoiTrang);
            echo $output;
        }
    }
?>

