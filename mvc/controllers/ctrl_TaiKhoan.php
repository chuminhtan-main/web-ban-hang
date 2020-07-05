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
            $loai = 0;
            // KIỂM TRA TÀI KHOẢN NHẬP VÀO CÓ TỒN TẠI KHÔNG
            $tai_khoan = $this->KiemTraTaiKhoanTonTai($ten_dang_nhap,$mat_khau_nhap);
            
            $ket_qua_kiem_tra = 0;
             if($tai_khoan != null){
                // NẾU MẬT KHẨU TỒN TẠI THÌ RETURN 1
                if  (password_verify($mat_khau_nhap, $tai_khoan["MAT_KHAU"]) ) {                   
                    $ket_qua_kiem_tra = 1;
                    $loai = $tai_khoan["LOAI_ND"];
                }
            }
            
            //NẾU TÀI KHOẢN TỒN TẠI THÌ ..........
            if ($ket_qua_kiem_tra == 1){
                
                //LA NHAN VIEN
                if($loai == 1){
                    
                }
                //LA KHACH HANG
                else if($loai == 2){
                    
                }
                echo "Tài Khoản Tồn Tại ! Đăng Nhập Thành Công";
                $_SESSION['username']=$ten_dang_nhap;
                $this->CreateView("view_User",
                [
                    "page"=>"page_TrangChu",
                    "da-dang-nhap"=>'true'
                ]);
            }
            else{
                echo "Tài Khoản Không Tồn Tại ! Đăng Nhập Thất Bại";
            }
                
        }

        //HÀM KIỂM TRA TÀI KHOẢN CÓ TỒN TẠI HAY KHÔNG
        public function KiemTraTaiKhoanTonTai($ten_dang_nhap, $mat_khau_nhap){

            $tai_khoan = $this->md_TaiKhoan->LayThongTinTaiKhoan($ten_dang_nhap);        
            return $tai_khoan;
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