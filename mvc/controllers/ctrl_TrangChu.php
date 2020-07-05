<!-- TRANG CHỦ CONTROLLER-->

<?php

class ctrl_TrangChu extends Controller{

    private $md_SanPham;
    private $ctrl_SanPham;

    public function __construct()
    {
        $this->md_SanPham = $this->CreateModel("model_SanPham");
        $this->ctrl_SanPham = $this->CreateController("ctrl_QuanLySanPham");
    }

    function show(){
        $loged = false;
        if( isset($_SESSION['loged']) && $_SESSION['loged'] == true){
            $loged = true;
        }

        $this->CreateView("view_User",
        [
            "page"=>"page_TrangChu",
            "id"=>"tab-trang-chu",
            "slide"=>$this->TaoSlide(),
            "dsSanPhamMoi"=>$this->LayDsSanPhamMoi(),
            "loged"=>$loged
        ]);
    }

    //LẤY ẢNH HIỂN THỊ LÊN SLIDE
    public function TaoSlide(){
        $path = "public/images/slide-show/";
        $images = glob($path.'*.jpg');

        $size = sizeof($images);
        $output = "
            <ul class='carousel-indicators'>
        ";

        for( $i = 0 ; $i < $size; $i++ ){

            if( $i == 0){
                $output .= "<li data-slide-to='".$i."' class='active'></li>";
            }
            else{
                $output .= "<li data-slide-to='".$i."' ></li>";
            }
        }
        $output .= "</ul><br/><div class='carousel-inner slide'>";

        for( $i = 0 ; $i < $size; $i++){

            if( $i == 0){
                $output .= "                    
                <div class='carousel-item active'>
                    <img src='/doan/".$images[$i]."' alt='' class = 'active' width='100%' height='100%'>
                </div>";
            }
            else{
                $output .= "                    
                <div class='carousel-item'>
                    <img src='/doan/".$images[$i]."' alt='' width='100%' height='100%'>
                </div>";
            }
        }

        $output .= "</div>";
        return $output;
    }

    //LẤY DANH SÁCH SP MỚI
    function LayDsSanPhamMoi(){
        
        $soBanGhiMoiTrang = 8;

        //LẤY DS SẢN PHẨM - CHƯA CÓ THÔNG TIN CỦA HÃNG- RAM - CPU
        $ds= $this->md_SanPham->LayDsSanPhamDangMo(1,$soBanGhiMoiTrang);
        
        //LẤY THÔNG TIN HÃNG-RAM-CPU CHO TỪNG SP
        $ds = $this->ctrl_SanPham->LayThongTinhChiTietSanPham($ds);

        $size = sizeof($ds);

        $output = '';
        
        for( $i = 0; $i < $size; $i++){
            $sp = new dto_SanPham();
            $sp = $ds[$i];

            $gia = number_format($sp->getGia(), 0,'', '.');

            $thong_tin = $this->CatChuoiThongTin( $sp->getMo_ta() );
            $output .= "
            <div class='col-sm-3 san-pham-noi-bat'>
            <a href='#' class='taga-sp'>
                <p class='img-san-pham'><img src='/doan/".$sp->getSrc_img()."' alt='' class=''></p>
                <p class='badge label'>NEW</p>
                <div class='caption'>
                    <h3 class='h3'>".$sp->getTen_sp()."</h3>        
                    <p class='ram'>CPU ".$sp->getModel_cpu()["TEN_CPU"]." | RAM ".$sp->getModel_ram()['BO_NHO']."GB</p>
                </div>
                <div class='gia'>
                    <strong>".$gia."</strong>
                </div>
            </a>
            <figure class='bginfo'>".$thong_tin."</figure>
            <button value ='/doan/ThanhToan/ThemVaoGioHang/".$sp->getMa_sp()."' class='btn btn-danger btn-chon-mua' style='display:block; margin: 0 auto;'>Chọn Mua</button>
        </div>
            ";
        }

        return $output;
    }

    //HÀM CẮT CHUỖI 
    public function CatChuoiThongTin($chuoi){
        $arr = explode(';', $chuoi);
        
        $output ="";
        if($arr != null){

            $size = sizeof($arr);

            for( $i = 0; $i < $size; $i++ ){

                $output .= "<p>".$arr[$i]."</p>";

            }
        }
        return $output;
    }
}
?>