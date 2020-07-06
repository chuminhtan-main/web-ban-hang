<?php
    class ctrl_ThanhToan extends Controller{ 
        private $ctrl_TrangChu;
        private $md_SanPham;

        public function __construct()
        {
            $this->ctrl_TrangChu = $this->CreateController("ctrl_TrangChu");
            $this->md_SanPham = $this->CreateModel("model_SanPham");
        }

        // XEM GIỎ HÀNG
        public function GioHang(){
            $dsGioHang = $_SESSION['cart'];
            $dsSanPham = array();
            if( isset($dsGioHang)){
                foreach($dsGioHang as $id=>$sl){
                    if($id != ""){
                        $dsSanPham[] = $this->md_SanPham-> LayThongTinSanPham($id);
                    }        
                }
            }

            $_SESSION['san_pham_dat_hang'] = $dsSanPham;

            $output = "
            <div class='bang-gia-tien'>
            <table class='table-danh-sach'>
            <colgroup>
            <col span='1'style='width: 5%;'>
            <col span='1'style='width: 5%;'>
            <col span='1'style='width: 10%;'>
            <col span='1'style='width: 10%;'>
            <col span='1'style='width: 10%;'>
            <col span='1'style='width: 10%;'>
            </colgroup>
            <tr>
                <th>STT</th>
                <th>Mã SP</th>
                <th>Tên SP</th>
                <th>Đơn Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
                <th>Thao Tác</th>
            </tr>
            ";

            $size = sizeof($dsSanPham);
            $tong_tien = 0;
            for( $i = 0; $i < $size; $i++){

                $sp = $dsSanPham[$i];

                if($sp["MA_SP"] != ""){
                    $so_luong = $dsGioHang[ $dsSanPham[$i]["MA_SP"] ]['sl'];
                    $don_gia = $sp["GIA_TIEN"];
                    $thanh_tien = $so_luong * $don_gia;
                    $tong_tien += $thanh_tien;
                    $output .= "
                    <tr>
                    <td>" . ($i + 1) . "</td>
                    <td>" . $sp["MA_SP"] . "</td>
                    <td>" . $sp["TEN_SP"] . "</td>
                    <td>" . $don_gia."</td>
                    <td>".$so_luong."</td>
                    <td>" .$thanh_tien. "</td>        
                    <td><a href='/doan/ThanhToan/XoaSanPham'>Xóa</a></td>        
                </tr> 
                    ";
                }

            }
            $tong_tien = number_format($tong_tien, 0, '', '.');
            $output .= "</table></div>";

            $loged = false;
            if( isset($_SESSION['loged']) && $_SESSION['loged'] == true){
                $loged = true;
            }
            $this->CreateView("view_User",
            [
                "page"=>"page_GioHang",
                "id"=>"NONE",
                "dsSanPhamGioHang"=>$output,
                "co-san-pham"=>'true',
                "tong_tien"=>$tong_tien,
                "loged"=>$loged
            ]);
        }

        //HÀM THÊM VÀO GIỎ HÀNG
        public function ThemVaoGioHang($id){

        if( isset($_SESSION['cart'])){

            if( isset($_SESSION['cart'][$id]) ){
                    $_SESSION['cart'][$id]['sl'] += 1;
            }
            else{
                $_SESSION['cart'][$id]['sl'] = 1;
            }
                 
            $this->CreateView(
                "view_User",
                [
                    "page" => "page_Laptop",
                    "slide" => $this->ctrl_TrangChu->TaoSlide(),
                    "id" => "tab-laptop",
                ]
            );
            exit();
        }
        else{
                if( isset($_POST["san_pham_can_them"])){
                    $id = $_POST["san_pham_can_them"];
                    $_SESSION['cart'][$id]['sl'] =1;
                }
                $this->CreateView(
                    "view_User",
                    [
                        "page" => "page_Laptop",
                        "slide" => $this->ctrl_TrangChu->TaoSlide(),
                        "id" => "tab-laptop"
                    ]
                );
                exit();
        }
    }

    //HÀM ĐẶT HÀNG
    public function DatHang(){
        include("./mvc/core/permission_User.php");

        if( isset($_SESSION['san_pham_dat_hang'])){
            print_r($_SESSION['san_pham_dat_hang']);
        }
    }
}
?>