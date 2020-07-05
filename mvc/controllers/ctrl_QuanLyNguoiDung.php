<?php
class ctrl_QuanLyNguoiDung extends Controller
{

    protected $md_nguoiDung;

    public function __construct()
    {
        $this->md_nguoiDung = $this->CreateModel("model_NguoiDung");
    }

    public function show()
    {
        include("./mvc/core/permission_Admin.php");
        $this->CreateView("view_Admin", [
            "page" => "page_QuanLyNguoiDung",
            "id" => "tab-nguoi-dung",
            "dsNhanVien" => $this->md_nguoiDung->LayDsNguoiDung(1),
            "dsKhachHang" => $this->md_nguoiDung->LayDsNguoiDung(2)
        ]);
    }

    // HÀM LẤY THÔNG TIN NGƯỜI DÙNG NHẬP
    public function ThemNguoiDung()
    {
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
        $kq = $this->md_nguoiDung->ThemNguoidung($ten, $email, $dienThoai, $diaChi, $loai, $tenDangNhap, $matKhau);

        //3. Thong báo kết quả
        $this->CreateView(
            "view_Admin",
            [
                "page" => "page_QuanLyNguoiDung",
                "kqThem" => $kq,
                "id" => "tab-nguoi-dung",
                //Lấy danh sách mới    
                "dsNhanVien" => $this->md_nguoiDung->LayDsNguoiDung(1),
                "dsKhachHang" => $this->md_nguoiDung->LayDsNguoiDung(2)
            ]
        );
    }


    //HÀM LẤY MỘT NGƯỜI DÙNG BẤT KỲ HIỂN THỊ LÊN FORM SỬA THÔNG TIN
    public function LayThongTinNguoiDung($maNguoiDung)
    {

        $this->CreateView("view_Admin", [
            "page" => "page_QuanLyNguoiDung",
            "id" => "tab-nguoi-dung",
            "dsNhanVien" => $this->md_nguoiDung->LayDsNguoiDung(1),
            "dsKhachHang" => $this->md_nguoiDung->LayDsNguoiDung(2),
            "thongTinNguoiDung" => $this->md_nguoiDung->LayThongTinNguoiDung($maNguoiDung),
            //Lấy danh sách mới    
            "dsNhanVien" => $this->md_nguoiDung->LayDsNguoiDung(1),
            "dsKhachHang" => $this->md_nguoiDung->LayDsNguoiDung(2)
        ]);
    }

    //HÀM CẬP NHẬT THÔNG TIN (KHÔNG BAO GỒM MẬT KHẨU - MẬT KHẨU ĐỔI RIÊNG)
    public function CapNhatNguoiDung($maNguoiDung)
    {
        //1. get dữ liệu từ form
        $ten = $_POST["ten"];
        $email = $_POST["email"];
        $dienThoai = $_POST["dien-thoai"];
        $diaChi = $_POST["dia-chi"];

        //2. Cập Nhật Vào DB và Thông báo
        $this->CreateView("view_Admin", [
            "page" => "page_QuanLyNguoiDung",
            "id" => "tab-nguoi-dung",
            // cập nhật người dùng
            "kqCapNhat" => $this->md_nguoiDung->CapNhatNguoiDung($maNguoiDung, $ten, $email, $dienThoai, $diaChi),
            //Lấy danh sách mới    
            "dsNhanVien" => $this->md_nguoiDung->LayDsNguoiDung(1),
            "dsKhachHang" => $this->md_nguoiDung->LayDsNguoiDung(2)
        ]);
    }

    //HÀM XÓA NGƯỜI DÙNG
    public function XoaNguoiDung($maNguoiDung)
    {
        $this->CreateView("view_Admin", [
            "page" => "page_QuanLyNguoiDung",
            "id" => "tab-nguoi-dung",
            // cập nhật người dùng
            "kqXoa" => $this->md_nguoiDung->XoaNguoiDung($maNguoiDung),
            //Lấy danh sách mới    
            "dsNhanVien" => $this->md_nguoiDung->LayDsNguoiDung(1),
            "dsKhachHang" => $this->md_nguoiDung->LayDsNguoiDung(2),
        ]);
    }

    //AJAX :Lấy DS Nhân Viên
    public function AjaxLayDsNhanVien($soBanGhiMoiTrang)
    {

        $trang = '';

        //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

        if (isset($_POST["page_nhan_vien"])) {
            $trang = $_POST["page_nhan_vien"];
        } else {
            $trang = 1;
        }

        $output = $this->md_nguoiDung->AjaxLayDsNhanVien($trang, $soBanGhiMoiTrang);
        echo $output;
    }

    //AJAX :Lấy DS Khách hàng
    public function AjaxLayDsKhachHang($soBanGhiMoiTrang)
    {

        $trang = '';

        //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

        if (isset($_POST["page_khach_hang"])) {
            $trang = $_POST["page_khach_hang"];
        } else {
            $trang = 1;
        }

        $output = $this->md_nguoiDung->AjaxLayDsKhachHang($trang, $soBanGhiMoiTrang);
        echo $output;
    }
}
