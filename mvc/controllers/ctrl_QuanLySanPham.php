
<?php

class ctrl_QuanLySanPham extends Controller
{
    protected $md_SanPham;
    protected $md_Hang;
    protected $md_CPU;
    protected $md_RAM;

    //THÔNG TIN THƯ MỤC GỐC HIỂN THỊ ẢNH
    protected $root_folder_img = "/doan/";

    public function __construct()
    {
        $this->md_SanPham = $this->CreateModel("model_SanPham");
        $this->md_Hang = $this->CreateModel("model_HangSanXuat");
        $this->md_CPU = $this->CreateModel("model_CPU");
        $this->md_RAM = $this->CreateModel("model_RAM");
    }
    public function show()
    {

        include("./mvc/core/permission_Admin.php");
        $this->CreateView("view_Admin", [
            "page" => "page_QuanLySanPham",
            "id" => "tab-san-pham",
            "dshangsx" => $this->md_Hang->LayDsHangSX(),
            "dsCPU" => $this->md_CPU->LayDsCPU(),
            "dsRAM" => $this->md_RAM->LayDsRAM()
        ]);
    }

    //HÀM THÊM 1 SẢN PHẨM
    public function ThemSanPham()
    {
        //get dữ liệu từ form
        $ten = $_POST["ten-san-pham"];
        $hang = $_POST["hang-sx"];
        $cpu = $_POST["cpu"];
        $ram = $_POST["ram"];
        $moTa = $_POST["thong-tin-sp"];
        $giaTien = $_POST["gia-tien"];
        $file = $_FILES['file-anh'];
        
        echo "<br/>Tên: ".$ten;
        echo "<br/>Hãng: ".$hang;
        echo "<br/>cpu: ".$cpu;
        echo "<br/>ram: ".$ram;
        echo "<br/>mô tả: ".$moTa;
        echo "<br/>giá: ".$giaTien;
        /**
         * XỬ LÝ ẢNH
         */
        $thu_muc_dich = "public/images/laptop/";
        $file_dich = $thu_muc_dich . basename($file['name']);
        $upload_thanh_cong = $this->KiemTraUpLoad($file, $thu_muc_dich);

            // Nếu upload thành công thì ghi vào cơ sở dữ liệu 
            if ($upload_thanh_cong == 1) {

                $kqThem = $this->md_SanPham->ThemSanPham($cpu, $ram, $hang, $ten, $giaTien, $file_dich, $moTa);
                if($kqThem == 'true'){
                    
                    (move_uploaded_file($file["tmp_name"], $file_dich) == false);              
                }

                echo "KQ Thêm: ".$kqThem."<br/>";

                if ($kqThem != null) {
                    $this->CreateView(
                        "view_Admin",
                        [
                            "page" => "page_QuanLySanPham",
                            "id" => "tab-san-pham",
                            "kqThem" => $kqThem
                        ]
                    );
                }
            }
            
            else{
            $this->CreateView(
                "view_Admin",
                [
                    "page" => "page_QuanLySanPham",
                    "id" => "tab-san-pham",
                    "kqThem" => "false",
                    "kqUploadThem"=>"false"
                ]
            );
        }
    }


    //AJAX LẤY DANH SÁCH SẢN PHẨM
    public function AjaxLayDsSanPham($soBanGhiMoiTrang)
    {

        $trang = '';
        $output = '';

        //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

        if (isset($_POST["page_san_pham"])) {
            $trang = $_POST["page_san_pham"];
        } else {
            $trang = 1;
        }

        $dsSanPham = $this->md_SanPham->LayDsSanPham($trang,$soBanGhiMoiTrang);

        $size = sizeof($dsSanPham);

        //TẠO BẢNG DỮ LIỆU
        $output .=
            "
            <div class='chua-bang-danh-sach'>
            <table class='table-danh-sach'>
        <colgroup>
        <col span='1'style='width: 5%;'>
        <col span='1'style='width: 5%;'>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 5%;'>
        <col span='1'style='width: 5%;'>
      </colgroup>
            <tr>
                <th>STT</th>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Hãng SX</th>
                <th>CPU</th>
                <th>RAM</th>
                <th>Giá</th>
                <th>Mô Tả</th>
                <th>Trạng Thái</th>
                <th style='width: 100px;'>Thao Tác</th>
            </tr>
    ";

        //LẤY THÔNG TIN CHI TIẾT HÃNG - RAM - CPU cho laptop
        $dsSanPham = $this->LayThongTinhChiTietSanPham($dsSanPham);

        for ($i = 0; $i < $size; $i++) {
            //LẤY THÔNG TIN CỦA HÃNG - CPU - RAM THEO MÃ VÀ CHO VÀO ĐỐI TƯỢNG SẢN PHẨM
            // $dsSanPham[$i]->setModel_cpu($this->md_CPU->LayThongTinCPU($dsSanPham[$i]->getMa_cpu()));
            // $dsSanPham[$i]->setModel_ram($this->md_RAM->LayThongTinRAM($dsSanPham[$i]->getMa_ram()));
            // $dsSanPham[$i]->setModel_hang($this->md_Hang->LayThongTinHang($dsSanPham[$i]->getMa_hang()));

            $sp = new dto_SanPham();
            $sp = $dsSanPham[$i];

            //THÊM TỪNG DÒNG VÀO BẢNG
            $tt = '';
            $btn_trang_thai = '';
            if ($sp->getTrang_thai() == 1) {
                $tt = "Mở Bán";
                $btn_trang_thai = "<button type='button' class='btn-ngung-ban btn-danger' value='/doan/QuanLySanPham/ThayDoiTrangThaiSanPham/".$sp->getMa_sp()."/0'>Ngừng Bán</button>";
            } else {
                $tt = 'Ngừng Bán';
                $btn_trang_thai = "<button type='button' class='btn-mo-ban btn-success' value='/doan/QuanLySanPham/ThayDoiTrangThaiSanPham/".$sp->getMa_sp()."/1'>Mở Bán</button>";
            }

            $output .= "
            <tr>
            <td>" . ($i + 1) . "</td>
            <td>" . $sp->getMa_sp() . "</td>
            <td>" . $sp->getTen_sp() . "</td>
            <td>" . $sp->getModel_hang()['TEN_HANG'] . "</td>
            <td>" . $sp->getModel_cpu()['TEN_CPU'] . "</td>
            <td>" . $sp->getModel_ram()['BO_NHO'] . "GB</td>
            <td>" . $sp->getGia() . "</td>
            <td>" . $sp->getMo_ta() . "</td>
            <td>" . $tt. "</td>
            <td>
                <a href='/doan/QuanLySanPham/LayThongTinSanPham/" . $sp->getMa_sp() . "' class='badge badge-warning btn-thao-tac'>Chỉnh Sửa</a>
                <button class='btn-dark btn-xoa' value='/doan/QuanLySanPham/XoaSanPham" . $sp->getMa_sp() . "'>Xóa</button>"
                .$btn_trang_thai."</td>
            
        </tr>         
            ";
        }

        //KẾT THÚC BẢNG
        $output .= "</table></div><br/><nav><br/><ul class='pagination'>";

        //LẤY SỐ TRANG
        $soTrang = $this->md_SanPham->LaySoLuongTrang($trang, $soBanGhiMoiTrang);

        //GẮN CLASS .page-link-san-pham
        for ($i = 1; $i <= $soTrang; $i++) {

            if ($trang == $i)
                $output .= "<li class='page-item'><a class='page-link page-link-san-pham' style='background-color:#0069D9; color:white ' id='" . $i . "'>" . $i . "</a></li>";
            else
                $output .= "<li class='page-item'><a class='page-link page-link-san-pham'  id='" . $i . "'>" . $i . "</a></li>";
            }
        echo $output;
    }

    // HÀM LẤY THÔNG TIN CHI TIẾT ĐỐI TƯỢNG TRONG TỪNG SẢN PHẨM
    public function LayThongTinhChiTietSanPham($dsSanPham){
        $size = sizeof($dsSanPham);
        for ($i = 0; $i < $size; $i++) {
            //LẤY THÔNG TIN CỦA HÃNG - CPU - RAM THEO MÃ VÀ CHO VÀO ĐỐI TƯỢNG SẢN PHẨM
            $dsSanPham[$i]->setModel_cpu($this->md_CPU->LayThongTinCPU($dsSanPham[$i]->getMa_cpu()));
            $dsSanPham[$i]->setModel_ram($this->md_RAM->LayThongTinRAM($dsSanPham[$i]->getMa_ram()));
            $dsSanPham[$i]->setModel_hang($this->md_Hang->LayThongTinHang($dsSanPham[$i]->getMa_hang()));
        }
        return $dsSanPham;
    }

    //HÀM LẤY THÔNG TIN SẢN PHẨM
    public function LayThongTinSanPham($ma_sp)
    {

        $this->CreateView("view_Admin", [
            "page" => "page_QuanLySanPham",
            "id" => "tab-san-pham",
            "dshangsx" => $this->md_Hang->LayDsHangSX(),
            "dsCPU" => $this->md_CPU->LayDsCPU(),
            "dsRAM" => $this->md_RAM->LayDsRAM(),
            "sp" => $this->md_SanPham->LayThongTinSanPham($ma_sp)
        ]);
    }

    //HÀM CẬP NHẬT SẢN PHẨM
    public function CapNhatSanPham($ma_sp)
    {   
        $ten = $_POST["ten-san-pham"];
        $hang = $_POST["hang-sx"];
        $cpu = $_POST["cpu"];
        $ram = $_POST["ram"];
        $moTa = $_POST["thong-tin-sp"];
        $giaTien = $_POST["gia-tien"];
        $file_upload = $_FILES['file-anh'];
        $file_cap_nhat = $_POST["img"];
        $upload_thanh_cong = 1;
        
        if( $file_upload["name"] != ""){
            $thu_muc_dich = "public/images/laptop/";
            $upload_thanh_cong = $this->KiemTraUpLoad($file_upload, $thu_muc_dich);
            if($upload_thanh_cong == 1){
                $file_cap_nhat = $thu_muc_dich . basename($file_upload['name']);
            }
        }
        if ($upload_thanh_cong == 1) {

            $kqCapNhat = $this->md_SanPham->CapNhatSanPham($ma_sp,$cpu, $ram, $hang, $ten, $giaTien, $file_cap_nhat, $moTa);
            
            if($kqCapNhat == 'true' && $file_upload["name"] != ""){
                
                move_uploaded_file($file_upload["tmp_name"], $file_cap_nhat);              
            }

            if ($kqCapNhat != null) {
                $this->CreateView(
                    "view_Admin",
                    [
                        "page" => "page_QuanLySanPham",
                        "id" => "tab-san-pham",
                        "kqCapNhat" => $kqCapNhat
                    ]
                );
            }
        }
            else{
                $this->CreateView("view_Admin",
                [
                    "page"=>"page_QuanLySanPham",
                    "id" => "tab-san-pham",
                    "kqCapNhat"=>'false',
                    "kqUploadCapNhat"=>'false'
                ]);
            }
       
        
    }

        //HÀM KIỂM TRA ẢNH UPLOAD
        public function KiemTraUpLoad($file, $thu_muc_dich){

            $file_kiem_tra = $thu_muc_dich . basename($file['name']);
            $upload_thanh_cong = 1;
            $kieu_file = strtolower(pathinfo($file_kiem_tra, PATHINFO_EXTENSION));
    
                    //Kiểm tra có phải file hình hay không
                    if (isset($file)) {
    
                        $kiem_tra = getimagesize($file["tmp_name"]);
            
                        if ($kiem_tra == false) {
            
                            $upload_thanh_cong = 0;
                        }
                    }
            
                    //kiểm tra file đã tồn tại chưa
                    // if (file_exists($file_kiem_tra)) {
                    //     $upload_thanh_cong = 0;
                    // }
            
            
                    //Kiểm tra một số định dạng
                    if ($kieu_file != "jpg" && $kieu_file != "png" && $kieu_file != "jpeg" && $kieu_file != "gif") {
                        $upload_thanh_cong = 0;
                    }
               return $upload_thanh_cong; 
            
        }

    // HÀM THÀY ĐỔI TRẠNG THÁI SẢN PHẨM
    public function ThayDoiTrangThaiSanPham($ma_sp,$tt){
        $this->CreateView("view_Admin",
        [
            "page"=>"page_QuanLySanPham",
            "id" => "tab-san-pham",
            "kqThayDoiTrangThai"=>$this->md_SanPham->ThayDoiTrangThaiSanPham($ma_sp,$tt),
            "tt"=>$tt
        ]);
    }

}
