<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/doan/public/css/style_Admin.css">
    <link rel="stylesheet" type="text/css" href="/doan/public/libs/bootstrap.css">
    <script src="/doan/public/js/jquery.js"></script>
    <script src="/doan/public/js/bootstrap.js"></script>
    <title>Admin</title>
    
</head>

<body>
    <div class="container-fluid">
        <!-- nav -->
        <div class="row text-light ">
            <div class="col-md-10">
                <!-- menu -->
                <ul class="nav nav-pills nav-fill">
                    <!-- người dùng -->
                    <li id="tab-nguoi-dung" class="nav-item">
                        <a class="nav-link title <?php if ($data["id"] == "tab-nguoi-dung") echo "active"; ?>" href="/doan/QuanLyNguoiDung">Người Dùng</a>                       
                    </li>
                    <!-- sản phẩm -->
                    <li id="tab-san-pham" class="nav-item">
                        <a class="nav-link title <?php if ($data["id"] == "tab-san-pham") echo "active"; ?>" href="/doan/QuanLySanPham">Sản Phẩm</a>                                                                   
                    </li>
                    <!-- hóa đơn -->
                    <li id="tab-hoa-don" class="nav-item">
                        <a class="nav-link title <?php if ($data["id"] == "tap-hoa-don") echo "active"; ?>" href="#">Đơn Đặt Hàng</a>
                    </li>
                      <!-- Hãng Sx -->
                     <li id="tab-hang-san-xuat" class="nav-item ">
                        <a class="nav-link title <?php if ($data["id"] == "tab-hang-san-xuat") echo "active"; ?>" href="/doan/HangSanXuat">Hãng Sản Xuất</a>
                    </li>
                    <!-- cấu hình CPU -->
                    <li id= "tab-cau-hinh-cpu" class="nav-item ">
                        <a class="nav-link title  <?php if ($data["id"] == "tab-cau-hinh-cpu") echo "active"; ?>" href="/doan/CPU">Cấu Hình CPU</a>
                    </li>
                    <!-- cấu hình Ram -->
                    <li id="tab-cau-hinh-ram" class="nav-item ">
                        <a class="nav-link title <?php if ($data["id"] == "tab-cau-hinh-ram") echo "active"; ?>" href="/doan/RAM">Cấu Hình RAM</a>
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
                require_once "./mvc/views/pages/" . $data["page"] . ".php";
                ?>
            </div>
        </div>
    </div>
    <script>

</script>
</body>

</html>