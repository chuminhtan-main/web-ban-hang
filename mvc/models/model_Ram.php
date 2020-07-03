<?php
class model_Ram extends DBConnect{
    public function ThemRAM($RAM){
        $sql = "INSERT INTO ram (BO_NHO) VALUES('$RAM')";
        
        $kq = mysqli_query($this->conn, $sql);
        
        return json_encode($kq);
    }
    public function LayDsRAM(){

        $sql = "SELECT * FROM ram";

        $result = $this->conn->query($sql);

        $arr = array();

        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
                $arr[] = $row;
            }
        }
        return $arr;
    }
    //LẤY MỘT HÃNG SẢN XUẤT BẰNG MÃ 
    public function LayThongTinRAM($maRAM)
    {

        $sql = "SELECT * FROM ram WHERE MA_RAM = $maRAM";

        $result = $this->conn->query($sql);

        $RAM = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $RAM = $row;
            }
            return $RAM;
        }
    }
     //CẬP NHẬT 
    public function CapNhatRAM($maRAM,$ten){

        $sql = "UPDATE ram SET 
        MA_RAM='$maRAM',
        BO_NHO='$ten' 
        WHERE MA_RAM=$maRAM";
        $kq = mysqli_query($this->conn, $sql);
        return $kq;
    }

    //XÓA
    public function XoaRAM($maRAM){

        $sql = "DELETE FROM RAM WHERE MA_RAM=$maRAM";
        $kq = mysqli_query($this->conn,$sql);
        return $kq;
    }
    // AJAX: LẤY DS HANG SAN XUAT
    public function AjaxLayDsRAM($trang, $soBanGhiMoiTrang){
        // bản ghi mỗi trang
        $output='';
        
        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM ram LIMIT $batDau, $soBanGhiMoiTrang";

        $result = mysqli_query($this->conn,$query);

        $output .= "
            <table class='table-danh-sach'>
                <tr>
                    <th>STT</th>
                    <th>Mã RAM</th>
                    <th>Tên Bộ nhớ</th>
                    <th>Thao Tác</th>
                </tr>
        ";

        $stt = 1;
        while( $row = mysqli_fetch_array( $result ) ){

            $output .= "
            <tr>
                <td>".$stt."</td>
                <td>".$row["MA_RAM"]."</td>
                <td>".$row["BO_NHO"]."</td>
                <td>
                    <a href='/doan/RAM/LayThongTinRAM/".$row['MA_RAM']."' class='badge badge-warning btn-thao-tac'>Chỉnh Sửa</a>
                    <button class='btn-dark btn-xoaRAM' value='/doan/RAM/XoaRAM/".$row['MA_RAM']."'>Xóa</button>
                </td>
            </tr>
            ";
            $stt++;
        }
            $output .= "</table><br/><nav><br/><ul class='pagination'>";

            $page_result = mysqli_query($this->conn, "SELECT * FROM ram");     
       
            $tongSoBanGhi = mysqli_num_rows($page_result);

            $tongSoTrang = ceil( $tongSoBanGhi/ $soBanGhiMoiTrang);

            // nhân viên thì gắn class .page-link-nhan-vien
            for($i = 1; $i <= $tongSoTrang ; $i++){
                
                    if( $trang == $i )
                        $output .= "<li class='page-item'><a class='page-link page-link-RAM' style='background-color:#0069D9; color:white ' id='".$i."'>".$i."</a></li>";
                    else
                        $output .= "<li class='page-item'><a class='page-link page-link-RAM'  id='".$i."'>".$i."</a></li>";
            } 
            return $output;
        }
    
}
?>