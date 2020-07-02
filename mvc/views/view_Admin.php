<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public\libs\bootstrap.css">
    <link rel="stylesheet" href="public\css\style_Admin.css">
    <script src="public/js/jquery.js"></script>
    <script src="public/js/bootstrap.js"></script>
    <title>Admin</title>
    <script>
        $(document).ready(function() {

            $(".title").click(function() {
                $('.active').removeClass('active');
                var txt = $(this).text();
                txt = txt.toUpperCase();
                txt = "QUẢN LÝ " + txt;
                $(this).addClass("active");
            })
        })
    </script>
</head>

<body>
    <div class="container">
        <!-- nav -->
        <div class="row text-light ">
            <div class="col-md-10">
                <!-- menu -->
                <ul class="nav nav-pills nav-fill">
                    <!-- người dùng -->
                    <li id="nguoi-dung" class="nav-item">
                        <a class="nav-link active title" href="#">Người Dùng</a>
                    </li>
                    <!-- sản phẩm -->
                    <li id="san-pham" class="nav-item">
                        <a class="nav-link title" href="#">Sản Phẩm</a>
                    </li>
                    <!-- hóa đơn -->
                    <li id="hoa-don" class="nav-item">
                        <a class="nav-link title" href="#">Đơn Đặt Hàng</a>
                    </li>
                    <!-- cấu hình sản phẩm -->
                    <li class="nav-item ">
                        <a class="nav-link title" href="#">Cấu Hình Sản Phẩm</a>
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