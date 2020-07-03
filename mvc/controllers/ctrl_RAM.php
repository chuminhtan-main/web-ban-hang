<?php
    class ctrl_RAM extends Controller{
        protected $m_RAM;
        
        public function __construct() {       
            $this->m_RAM = $this->CreateModel("model_Ram");
        }
        
        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_RAM",
                "dsRAM"=> $this->m_RAM->LayDsRAM()
                ]);
        }
        
        //HÀM LẤY THÔNG TIN NHẬP
        public function ThemRAM(){       
            //1 Get dữ liệu
            $tenRAM = $_POST["RAM"];           
            //2 Goị Model để thêm dữ liệu vào database
            $kq = $this->m_RAM->ThemRAM($tenRAM);
            
            $this->CreateView("view_Admin", [
                "page"=>"page_RAM",
                "kq"=>$kq
            ]);
        }
        //HÀM LẤY MỘT NGƯỜI DÙNG BẤT KỲ HIỂN THỊ LÊN FORM SỬA THÔNG TIN
        public function LayThongTinRAM($maRAM)
        {

            $this->CreateView("view_Admin", [
                "page" => "page_RAM",                
                "dsRAM"=> $this->m_RAM->LayDsRAM(),
                "ThongTinRAM" => $this->m_RAM->LayThongTinRAM($maRAM),
                //Lấy danh sách mới    
                "dsRAM"=> $this->m_RAM->LayDsRAM(),
            ]);
        }
         //HÀM CẬP NHẬT THÔNG TIN 
        public function CapNhatRAM($maRAM)
        {
            //1. get dữ liệu từ form
            $ten = $_POST["RAM"];

            //2. Cập Nhật Vào DB và Thông báo
            $this->CreateView("view_Admin", [
                "page" => "page_RAM",
                // cập nhật người dùng
                "kqCapNhat" => $this->m_RAM->CapNhatRAM($maRAM, $ten),
                //Lấy danh sách mới    
                "dsRAM"=> $this->m_RAM->LayDsRAM()
            ]);
        }
        //HÀM XÓA NGƯỜI DÙNG
        public function XoaRAM($maRAM)
        {
            $this->CreateView("view_Admin", [
                "page" => "page_RAM",
                // cập nhật 
                "kqXoa" => $this->m_RAM->XoaRAM($maRAM),
                //Lấy danh sách mới    
                "dsRAM"=> $this->m_RAM->LayDsRAM()
            ]);
        }
        //AJAX :Lấy DS Nhân Viên
        public function AjaxLayDsRAM($soBanGhiMoiTrang)
        {

            $trang = '';

            //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

            if (isset($_POST["page_RAM"])) {
                $trang = $_POST["page_RAM"];
            } else {
                $trang = 1;
            }

            $output = $this->m_RAM->AjaxLayDsRAM($trang, $soBanGhiMoiTrang);
            echo $output;
        }
    }
?>