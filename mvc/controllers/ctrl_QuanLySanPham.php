<?php
    class ctrl_QuanLySanPham extends Controller{  
        protected $md_SanPham;
        protected $md_Hang;
        protected $md_CPU;
        protected $md_RAM;

        public function __construct(){
            $this->md_SanPham = $this->CreateModel("model_SanPham");
            $this->md_Hang = $this->CreateModel("model_HangSanXuat");
            $this->md_CPU = $this->CreateModel("model_CPU");
            $this->md_RAM = $this->CreateModel("model_RAM");
        } 
        public function show(){
            $this->CreateView("view_Admin",[
            "page"=>"page_QuanLySanPham",
            "dssanpham"=>$this->md_SanPham->LayDsSanPham(),
            "dshangsx"=> $this->md_Hang->LayDsHangSX(),
                "dsCPU"=>$this->md_CPU->LayDsCPU(),
                "dsRAM"=>$this->md_RAM->LayDsRAM(),
            "id"=>"sanPham"
            ]);
        }
         public function ThemSanPham(){
            //1.get dữ liệu từ form
            $ten = $_POST["productName"];
            $hangsx = $_POST["hangsx"];
            $CPU = $_POST["CPU"];
            $RAM = $_POST["RAM"];
            $mota = $_POST["mo-ta"];
            $price = $_POST["price"];
            $trangthai = $_POST["trangthai"];
            
            
            echo $ten."<br/>";
            echo $hangsx."<br/>";
            echo $CPU."<br/>";
            echo $RAM."<br/>";
            echo $mota."<br/>";
            echo $price."<br/>";
            echo $trangthai."<br/>";
            
            if($_FILES['image']['name']!=""){
                $image= basename($_FILES['image']['name']);
                $target_file="/doan/public/images/laptop/".$image;
                
                //ham nay khong chay
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
            }
            
            echo $image."<br/>";
            echo $target_file."<br/>";
//            $kq = $this->md_SanPham->ThemSanPham($CPU,$RAM,$hangsx,$ten,$price,$trangthai,$image,$mota);

                     
            //3. Thong báo kết quả
//            $this->CreateView("view_Admin",
//            [
//                "page"=>"page_QuanLySanPham",
//                "kq"=>$kq
//            ] 
//            );
        }
    }
?>