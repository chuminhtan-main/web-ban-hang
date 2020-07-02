<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/doan/public/css/style_Admin.css">
    <title>Admin</title>
    <script src="/doan/public/js/jquery.js"></script>   

</head>

<body>
    <div class="container-fluid">
        <!-- nav -->
        <div class="row text-light ">
            <div class="col-md-10">
                <!-- menu -->
                <ul class="nav nav-pills nav-fill">
                    <!-- người dùng -->
                    <li  class="nav-item">
                        <a class="nav-link title <?php 
                            if($data["id"] == "nguoiDung")
                                echo "active";

                        ?>" href="/doan/QuanLyNguoiDung">Người Dùng</a>
                    </li>
                    <!-- sản phẩm -->
                    <li id="san-pham" class="nav-item">
                        <a class="nav-link title <?php 
                            if($data["id"]=="sanPham")
                                echo "active";

                        ?>" href="/doan/QuanLySanPham">Sản Phẩm</a>
                    </li>
                    <!-- hóa đơn -->
                    <li id="hoa-don" class="nav-item">
                        <a class="nav-link title <?php if($data["id"]=="hoaDon") echo "active"; ?>" href="#">Đơn Đặt Hàng</a>     
                    </li>
                      <!-- Hãng Sx -->
                     <li class="nav-item ">
                        <a class="nav-link title" href="/doan/HangSanXuat">Hãng SX</a>
                    </li>
                     <!-- cấu hình CPU -->
                    <li class="nav-item ">
                        <a class="nav-link title" href="/doan/CPU">Cấu Hình CPU</a>
                    </li>
                    <!-- cấu hình Ram -->
                    <li class="nav-item ">
                        <a class="nav-link title" href="/doan/RAM">Cấu Hình RAM</a>
                    </li>
                </ul>
            </div>

            <!-- Đăng Xuất Đăng Nhập -->
            <div id="thong-tin-dang-nhap" class="col-md-2">
                <a id="btn-dang-xuat" href="">Đăng Xuất</a>
                <div id="ten-dang-nhap">Tên Đăng Nhập</div>
            </div>
        </div>

        <!-- page -->
        <div id="page-admin" class="row">
            <div class="col-md-12">
                <!-- KHU VỰC ĐỔ PAGE VÀO -->
                <?php
                    require_once "./mvc/views/pages/".$data["page"].".php";
                ?>
            </div>
        </div>
    </div>
</body>
</html>