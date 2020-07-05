
<?php 
    class ctrl_TaiKhoan extends Controller{
        private $md_TaiKhoan;

        public function __construct()
        {   
            $this->md_TaiKhoan = $this->CreateModel("model_TaiKhoan");
        }
        // TRANG HIỂN THỊ TẠO TÀI KHOẢN
        public function TaoTaiKhoan(){
            $this->CreateView("view_TaiKhoan",
            [
                "page"=>"page_TaoTaiKhoan"
            ]);
        }

        //THEM TAI KHOAN VAO DB
        public function ThemTaiKhoan(){
                //1.get dữ liệu từ form
                $ten = $_POST["ten"];
                $email = $_POST["email"];
                $dienThoai = $_POST["dien-thoai"];
                $diaChi = $_POST["dia-chi"];
                $tenDangNhap = $_POST["ten-dang-nhap"];
                $matKhau = $_POST["mat-khau"];
                $matKhau =  password_hash($matKhau, PASSWORD_DEFAULT);
                    $this->CreateView("view_User",[
                "page"=>"page_TrangChu",
                "kqThem"=>$this->md_TaiKhoan->ThemNguoiDung($ten, $email, $dienThoai, $diaChi, $tenDangNhap, $matKhau),
            ]);
        }

        // TRANG HIỂN THỊ ĐĂNG NHẬP
        public function DangNhap(){
            $this->CreateView("view_TaiKhoan",
            [
                "page"=>"page_DangNhap"
            ]);
        }

        // HÀM XỬ LÝ ĐĂNG NHẬP 
        public function XuLyDangNhap(){

            //LẤY THÔNG TIN NHẬP
            $ten_dang_nhap = $_POST["ten-dang-nhap"];
            $mat_khau_nhap = $_POST["mat-khau"];

            // KIỂM TRA TÀI KHOẢN NHẬP VÀO CÓ TỒN TẠI KHÔNG
            $tai_khoan = $this->KiemTraTaiKhoanTonTai($ten_dang_nhap,$mat_khau_nhap);
            
            // NẾU TÀI KHOẢN NÀY TỒN TẠI THÌ KIỂM TRA MẬT KHẨU
            if($tai_khoan != null){

                // NẾU MẬT KHẨU TỒN TẠI THÌ RETURN 1
                if  (password_verify($mat_khau_nhap, $tai_khoan["MAT_KHAU"]) ) {
                        $_SESSION['permision'] = $tai_khoan["LOAI_ND"];
                        $_SESSION['user_id'] = $tai_khoan["MA_ND"];
                        $_SESSION['user_name'] = $tai_khoan["TEN_ND"];
                        $_SESSION['loged'] = true;

                        if($tai_khoan["LOAI_ND"] == 1){
                            $this->CreateView("view_Admin",[
                                "page"=>"page_QuanLyNguoiDung",
                            ]);
                        }
                        else{
                            $this->CreateView("view_User",[
                                "page"=>"page_TrangChu",
                                "chuyen_huong"=>'true'
                            ]);
                        }
                }
            }
            //NẾU TÀI KHOẢN TỒN TẠI THÌ ..........
            else{
                echo "Tài Khoản Không Tồn Tại ! Đăng Nhập Thất Bại";
            }
                
        }

        //HÀM KIỂM TRA TÀI KHOẢN CÓ TỒN TẠI HAY KHÔNG
        public function KiemTraTaiKhoanTonTai($ten_dang_nhap, $mat_khau_nhap){

            $tai_khoan = $this->md_TaiKhoan->LayThongTinTaiKhoan($ten_dang_nhap);

                // NẾU TÀI KHOẢN KHONG TỒN TẠI HOẶC MẬT KHẨU KHÔNG ĐÚNG THÌ RETURN 0
               return $tai_khoan;
        }

        // CÀI ĐẶT TÀI KHOẢN
        public function ThongTinTaiKhoan(){
            $this->CreateView("view_TaiKhoan",
            [
                "page"=>"page_ThongTinTaiKhoan",
            ]);
        }

            //dang xuat
    public function DangXuat(){
        session_destroy();

        $this->CreateView("view_User",[
            "page"=>"page_TrangChu",
            "chuyen_huong"=>'true'
        ]);
    }


    }
?>