<?php
class model_CPU extends DBConnect{
    public function ThemCPU($CPU){
        $sql = "INSERT INTO cpu (TEN_CPU) VALUES('$CPU')";
        
        $kq = mysqli_query($this->conn, $sql);
        
        return json_encode($kq);
    }
    public function LayDsCPU(){

        $sql = "SELECT * FROM cpu";

        $result = $this->conn->query($sql);

        $arr = array();

        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
                $arr[] = $row;
            }
        }
        return $arr;
    }
    //LẤY MỘT CPU BẰNG MÃ 
    public function LayThongTinCPU($maCPU)
    {

        $sql = "SELECT * FROM cpu WHERE MA_CPU = $maCPU";

        $result = $this->conn->query($sql);

        $CPU = array();

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $CPU = $row;
            }
            return $CPU;
        }
    }
     //CẬP NHẬT 
    public function CapNhatCPU($maCPU,$ten){

        $sql = "UPDATE cpu SET 
        MA_CPU='$maCPU',
        TEN_CPU='$ten' 
        WHERE MA_CPU=$maCPU";
        $kq = mysqli_query($this->conn, $sql);
        return $kq;
    }

    //XÓA
    public function XoaCPU($maCPU){

        $sql = "DELETE FROM cpu WHERE MA_CPU=$maCPU";
        $kq = mysqli_query($this->conn,$sql);
        return $kq;
    }
    // AJAX: LẤY DS CPU
    public function AjaxLayDsCPU($trang, $soBanGhiMoiTrang){
        // bản ghi mỗi trang
        $output='';
        
        $batDau = ($trang - 1) * $soBanGhiMoiTrang;
        
        $query = "SELECT * FROM cpu ORDER BY MA_CPU DESC LIMIT $batDau, $soBanGhiMoiTrang";

        $result = mysqli_query($this->conn,$query);

        $output .= "
        <div class='chua-bang-danh-sach'>
            <table class='table-danh-sach'>
        <colgroup>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 10%;'>
        <col span='1'style='width: 70%;'>
        <col span='1'style='width: 10%;'>
      </colgroup>
                <tr>
                    <th>STT</th>
                    <th>Mã CPU</th>
                    <th>Tên CPU</th>
                    <th>Thao Tác</th>
                </tr>
        ";

        $stt = 1;
        while( $row = mysqli_fetch_array( $result ) ){

            $output .= "
            <tr>
                <td>".$stt."</td>
                <td>".$row["MA_CPU"]."</td>
                <td>".$row["TEN_CPU"]."</td>
                <td>
                    <a href='/doan/CPU/LayThongTinCPU/".$row['MA_CPU']."' class='badge badge-warning btn-thao-tac'>Chỉnh Sửa</a>
                    <button class='btn-dark btn-xoa btn-xoaCPU' value='/doan/CPU/XoaCPU/".$row['MA_CPU']."'>Xóa</button>
                </td>
            </tr>
            ";
            $stt++;
        }
            $output .= "</table></div><br/><nav><br/><ul class='pagination'>";

            $page_result = mysqli_query($this->conn, "SELECT * FROM cpu");     
       
            $tongSoBanGhi = mysqli_num_rows($page_result);

            $tongSoTrang = ceil( $tongSoBanGhi/ $soBanGhiMoiTrang);

            // nhân viên thì gắn class .page-link-nhan-vien
            for($i = 1; $i <= $tongSoTrang ; $i++){
                
                    if( $trang == $i )
                        $output .= "<li class='page-item'><a class='page-link page-link-CPU' style='background-color:#0069D9; color:white ' id='".$i."'>".$i."</a></li>";
                    else
                        $output .= "<li class='page-item'><a class='page-link page-link-CPU'  id='".$i."'>".$i."</a></li>";
            } 
            return $output;
        }
    
}
?>