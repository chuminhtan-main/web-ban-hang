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
            $ket_qua_kiem_tra = $this->KiemTraTaiKhoanTonTai($ten_dang_nhap,$mat_khau_nhap);

            //NẾU TÀI KHOẢN TỒN TẠI THÌ ..........
            if ($ket_qua_kiem_tra == 1){
                echo "Tài Khoản Tồn Tại ! Đăng Nhập Thành Công";
            }
            else{
                echo "Tài Khoản Không Tồn Tại ! Đăng Nhập Thất Bại";
            }
                
        }

        //HÀM KIỂM TRA TÀI KHOẢN CÓ TỒN TẠI HAY KHÔNG
        public function KiemTraTaiKhoanTonTai($ten_dang_nhap, $mat_khau_nhap){

            $tai_khoan = $this->md_TaiKhoan->LayThongTinTaiKhoan($ten_dang_nhap);

            // NẾU TÀI KHOẢN NÀY TỒN TẠI THÌ KIỂM TRA MẬT KHẨU
            if($tai_khoan != null){

                // NẾU MẬT KHẨU TỒN TẠI THÌ RETURN 1
                if  (password_verify($mat_khau_nhap, $tai_khoan["MAT_KHAU"]) ) {
                    return 1;
                }
            }
                // NẾU TÀI KHOẢN KHONG TỒN TẠI HOẶC MẬT KHẨU KHÔNG ĐÚNG THÌ RETURN 0
               return 0;
        }

        // CÀI ĐẶT TÀI KHOẢN
        public function ThongTinTaiKhoan(){
            $this->CreateView("view_TaiKhoan",
            [
                "page"=>"page_ThongTinTaiKhoan",
            ]);
        }
    }
?>