<?php
class ctrl_Laptop extends Controller
{

    private $ctrl_TrangChu;
    private $ctrl_QuanLySanPham;
    private $md_SanPham;
    public function __construct()
    {

        $this->ctrl_TrangChu = $this->CreateController("ctrl_TrangChu");
        $this->ctrl_QuanLySanPham = $this->CreateController("ctrl_QuanLySanPham");
        $this->md_SanPham =  $this->CreateModel("model_SanPham");
    }
    public function show()
    {
        $loged = false;
        if( isset($_SESSION['loged']) && $_SESSION['loged'] == true){
            $loged = true;
        }
        $this->CreateView(
            "view_User",
            [
                "page" => "page_Laptop",
                "slide" => $this->ctrl_TrangChu->TaoSlide(),
                "id" => "tab-laptop",
                "loged"=>$loged
            ]
        );
    }

    public function LayTatCaSanPham()
    {
    }

    // AJAX HÀM AJAX HIỂN THỊ DANH SÁCH SP
    public function AjaxHienThiTatCaSanPham($soBanGhiMoiTrang )
    {
        $trang = '';
        $output = '';

        //giá trị $_POST["page"] được gửi từ hàm = function load_data_nhan_vien(page) Jquery

        if (isset($_POST["page_san_pham"])) {
            $trang = $_POST["page_san_pham"];
        } else {
            $trang = 1;
        }

        $ds = $this->md_SanPham->LayDsSanPham($trang, $soBanGhiMoiTrang);

        $ds = $this->ctrl_QuanLySanPham->LayThongTinhChiTietSanPham($ds);
        $size = sizeof($ds);

        $output = "<div class='row'>";

        for ($i = 0; $i < $size; $i++) {
            $sp = new dto_SanPham();
            $sp = $ds[$i];

            $gia = number_format($sp->getGia(), 0, '', '.');

            $thong_tin = $this->ctrl_TrangChu->CatChuoiThongTin($sp->getMo_ta());
            $output .= "
            <div class='col-sm-3 san-pham-noi-bat'>
            <a href='#' class='taga-sp'>
                <p class='img-san-pham'><img src='/doan/" . $sp->getSrc_img() . "' alt='' class=''></p>
                <p class='badge label'>NEW</p>
                <div class='caption'>
                    <h3 class='h3'>" . $sp->getTen_sp() . "</h3>        
                    <p class='ram'>CPU " . $sp->getModel_cpu()["TEN_CPU"] . " | RAM " . $sp->getModel_ram()['BO_NHO'] . "GB</p>
                </div>
                <div class='gia'>
                    <strong>" . $gia . "</strong>
                </div>
            </a>
            <figure class='bginfo'>" . $thong_tin . "</figure>
            <button id='".$sp->getMa_sp()."' class='btn btn-danger btn-chon-mua' value ='/doan/ThanhToan/ThemVaoGioHang/".$sp->getMa_sp()."' style='display:block; margin: 0 auto;'>Chọn Mua</button>
        </div>
            ";
        }

        $output .= "</div><div class='row'>";
        //LẤY SỐ TRANG
        $soTrang = $this->md_SanPham->LaySoLuongTrang($trang, $soBanGhiMoiTrang);

        //GẮN CLASS .page-link-san-pham
        for ($i = 1; $i <= $soTrang; $i++) {

            if ($trang == $i)
                $output .= "<li class='page-item'><a class='page-link page-link-san-pham' style='background-color:#0069D9; color:white ' id='" . $i . "'>" . $i . "</a></li>";
            else
                $output .= "<li class='page-item'><a class='page-link page-link-san-pham'  id='" . $i . "'>" . $i . "</a></li>";
        }

        $output .= "</div";
        echo $output;
    }
}
