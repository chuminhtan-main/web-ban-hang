<?php
class ctrl_QuanLySanPham extends Controller
{
    protected $md_SanPham;
    protected $md_Hang;
    protected $md_CPU;
    protected $md_RAM;

    public function __construct()
    {
        $this->md_SanPham = $this->CreateModel("model_SanPham");
        $this->md_Hang = $this->CreateModel("model_HangSanXuat");
        $this->md_CPU = $this->CreateModel("model_CPU");
        $this->md_RAM = $this->CreateModel("model_RAM");
    }
    public function show()
    {
        $this->CreateView("view_Admin", [
            "page" => "page_QuanLySanPham",
            "dshangsx" => $this->md_Hang->LayDsHangSX(),
            "dsCPU" => $this->md_CPU->LayDsCPU(),
            "dsRAM" => $this->md_RAM->LayDsRAM(),
            "id" => "sanPham"
        ]);
    }

    //HÀM THÊM 1 SẢN PHẨM
    public function ThemSanPham()
    {
        //get dữ liệu từ form
        $ten = $_POST["ten-san-pham"];
        $hang = $_POST["hang-sx"];
        $cpu = $_POST["ram"];
        $ram = $_POST["cpu"];
        $moTa = $_POST["thong-tin-sp"];
        $giaTien = $_POST["gia-tien"];
        $file = $_FILES['file-anh'];

        /**
         * XỬ LÝ ẢNH
         */
        $thu_muc_dich = "public/images/laptop/";
        $file_dich = $thu_muc_dich . basename($file['name']);
        $upload_thanh_cong = 1;
        $kieu_file = strtolower(pathinfo($file_dich, PATHINFO_EXTENSION));

        //Kiểm tra có phải file hình hay không
        if (isset($_POST['file-anh'])) {

            $kiem_tra = getimagesize($file["tmp_name"]);

            if ($kiem_tra == false) {

                $upload_thanh_cong = 0;
            }
        }

        //kiểm tra file đã tồn tại chưa
        if (file_exists($file_dich)) {
            $upload_thanh_cong = 0;
        }

        //Kiểm tra một số định dạng
        if ($kieu_file != "jpg" && $kieu_file != "png" && $kieu_file != "jpeg" && $kieu_file != "gif") {
            $upload_thanh_cong = 0;
        }

        if ($upload_thanh_cong == 1) {

            if (move_uploaded_file($file["tmp_name"], $file_dich) == false) {
                $upload_thanh_cong = 0;
            }
        }

        // Nếu upload thành công thì ghi vào cơ sở dữ liệu 
        if ($upload_thanh_cong == 1) {

            $this->CreateView(
                "view_Admin",
                [
                    "page" => "page_QuanLySanPham",
                    "kqThem" => $this->md_SanPham->ThemSanPham($cpu, $ram, $hang, $ten, $giaTien, $file_dich, $moTa),
                ]
            );
        } else {

            $this->CreateView(
                "view_Admin",
                [
                    "page" => "page_QuanLySanPham",
                    "kqThem" => "false"
                ]
            );
        }
    }

    //AJAX LẤY DANH SÁCH SẢN PHẨM
    public function AjaxLayDsSanPham($soBanGhiMoiTrang){
        
        $trang = '';

        //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

        if (isset($_POST["page_san_pham"])) {
            $trang = $_POST["page_san_pham"];
        } else {
            $trang = 1;
        }

        $dsSanPham = $this->md_SanPham->LayDsSanPham($trang, $soBanGhiMoiTrang);
        
        
    }
}
