<?php
    class ctrl_CPU extends Controller{
        protected $m_CPU;
        
        public function __construct() {       
            $this->m_CPU = $this->CreateModel("model_CPU");
        }
        
        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_CPU",
                "id"=>"tab-cau-hinh-cpu",
                "dsCPU"=> $this->m_CPU->LayDsCPU()
                ]);
        }
        
        //HÀM LẤY THÔNG TIN NHẬP
        public function ThemCPU(){       
            //1 Get dữ liệu
            $tenCPU = $_POST["CPU"];           
            //2 Goị Model để thêm dữ liệu vào database
            $kq = $this->m_CPU->ThemCPU($tenCPU);
            
            $this->CreateView("view_Admin", [
                "page"=>"page_CPU",
                "id"=>"tab-cau-hinh-cpu",
                "kq"=>$kq
            ]);
        }
        
        //HÀM LẤY MỘT NGƯỜI DÙNG BẤT KỲ HIỂN THỊ LÊN FORM SỬA THÔNG TIN
        public function LayThongTinCPU($maCPU)
        {

            $this->CreateView("view_Admin", [
                "page" => "page_CPU",    
                "id"=>"tab-cau-hinh-cpu",            
                "dsCPU"=> $this->m_CPU->LayDsCPU(),
                "ThongTinCPU" => $this->m_CPU->LayThongTinCPU($maCPU),
                //Lấy danh sách mới    
                "dsCPU"=> $this->m_CPU->LayDsCPU(),
            ]);
        }
         //HÀM CẬP NHẬT THÔNG TIN 
        public function CapNhatCPU($maCPU)
        {
            //1. get dữ liệu từ form
            $ten = $_POST["CPU"];

            //2. Cập Nhật Vào DB và Thông báo
            $this->CreateView("view_Admin", [
                "page" => "page_CPU",
                "id"=>"tab-cau-hinh-cpu",
                // cập nhật người dùng
                "kqCapNhat" => $this->m_CPU->CapNhatCPU($maCPU, $ten),
                //Lấy danh sách mới    
                "dsCPU"=> $this->m_CPU->LayDsCPU()
            ]);
        }
        //HÀM XÓA NGƯỜI DÙNG
        public function XoaCPU($maCPU)
        {
            $this->CreateView("view_Admin", [
                "page" => "page_CPU",
                "id"=>"tab-cau-hinh-cpu",
                // cập nhật 
                "kqXoa" => $this->m_CPU->XoaCPU($maCPU),
                //Lấy danh sách mới    
                "dsCPU"=> $this->m_CPU->LayDsCPU()
            ]);
        }
        //AJAX :Lấy DS Nhân Viên
        public function AjaxLayDsCPU($soBanGhiMoiTrang)
        {

            $trang = '';

            //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

            if (isset($_POST["page_CPU"])) {
                $trang = $_POST["page_CPU"];
            } else {
                $trang = 1;
            }

            $output = $this->m_CPU->AjaxLayDsCPU($trang, $soBanGhiMoiTrang);
            echo $output;
        }
    }
?>