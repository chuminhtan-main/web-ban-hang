<?php
    $_SESSION['cart'][$id]['sl'] =0;
    class ctrl_ThanhToan extends Controller{ 
        private $ctrl_TrangChu;
        private $md_SanPham;

        public function __construct()
        {
            $this->ctrl_TrangChu = $this->CreateController("ctrl_TrangChu");
            $this->md_SanPham = $this->CreateModel("model_SanPham");
        }

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
                <th>Số Lượng</th>
                <th>Đơn Giá</th>
                <th>Thành Tiền</th>
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
                    <td>" . $so_luong. "</td>
                    <td>" . $don_gia."</td>
                    <td>" .$thanh_tien. "</td>          
                </tr> 
                    ";
                }

            }
            $tong_tien = number_format($tong_tien, 0, '', '.');
            $output .= "</table></div>";

            $this->CreateView("view_User",
            [
                "page"=>"page_GioHang",
                "id"=>"NONE",
                "dsSanPhamGioHang"=>$output,
                "tong_tien"=>$tong_tien
            ]);
        }

        public function hello($id){
            echo "hello ".$id;
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
                $id = $_POST["san_pham_can_them"];
                $_SESSION['cart'][$id]['sl'] =1;
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

    }
}
?>