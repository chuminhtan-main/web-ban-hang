<div class="container" >
    <div class="row"><h4 class="title">Giỏ Hàng</h4></div>
    <div class="row" style ="margin: 20px 0;">
        <?php
        if( isset($data["dsSanPhamGioHang"]))
            echo $data["dsSanPhamGioHang"];
        else
            echo "Giỏ Hàng Trồng";
        ?>

    </div>
    <div class="row tong-tien">
        <span class="col-md-3">Tổng Tiền :</span>
        <span class="col-md-3" style="color:brown;"><?php if( isset($data["tong_tien"])) echo $data["tong_tien"]."  đ"; ?></span>
    </div>
    <div class="row">
         <a href="#" class="badge badge-success dat-hang" >ĐẶT HÀNG</a>
    </div>
</div>