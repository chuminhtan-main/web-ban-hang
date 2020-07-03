<?php
    class ctrl_QuanLyNguoiDung extends Controller{       
       
        protected $md_nguoiDung;

        public function __construct(){
            $this->md_nguoiDung = $this->CreateModel("model_NguoiDung");
        }

        public function show(){
            $this->CreateView("view_Admin",[
                "page"=>"page_QuanLyNguoiDung",
                "id"=>"nguoiDung",
                "dsNhanVien"=> $this->md_nguoiDung->LayDsNguoiDung(1),
                "dsKhachHang"=>$this->md_nguoiDung->LayDsNguoiDung(2)
                ]);
        }

        // HÀM LẤY THÔNG TIN NGƯỜI DÙNG NHẬP
        public function ThemNguoiDung(){
            //1.get dữ liệu từ form
            $ten = $_POST["ten"];
            $email = $_POST["email"];
            $dienThoai = $_POST["dien-thoai"];
            $diaChi = $_POST["dia-chi"];
            $loai = $_POST["loai-nguoi-dung"];
            $tenDangNhap = $_POST["ten-dang-nhap"];
            $matKhau = $_POST["mat-khau"];
            $matKhau =  password_hash($matKhau, PASSWORD_DEFAULT);

            //2.ghi dữ liệu vào db
            $kq = $this->md_nguoiDung->ThemNguoidung($ten,$email,$dienThoai,$diaChi,$loai,$tenDangNhap,$matKhau);

            //3. Thong báo kết quả
            $this->CreateView("view_Admin",
            [
                "page"=>"page_QuanLyNguoiDung",
                "kq"=>$kq
            ] 
            );
        }
    }
?>