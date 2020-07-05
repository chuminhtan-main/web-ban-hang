<header id="header" class="navbar-inverse">
        <div class="container">
            <div class="row">
                <div id="banner" class="col-md-2">
                    <!-- banner -->
                    <img src="/doan/public/images/banner/rsz-banner-yellow.png" alt="">
                </div>
                <!-- nav header -->
                <div class="col-md-6">
                    <ul id="nav-header" class="nav nav-tabs justify-content-center">
                        <li class="nav-item ">
                            <a href="/doan/TrangChu" class="nav-link <?php if ($data["id"] == "tab-trang-chu") echo "active"; ?>">
                                <img src="/doan/public/images/iconNav/home.png" alt="trangchu">
                                <p>TRANG CHỦ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/doan/Laptop" class="nav-link <?php if ($data["id"] == "tab-laptop") echo "active"; ?>">
                                <img src="/doan/public/images/iconNav/laptop.png" alt="laptop">
                                <p>LAPTOP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/doan/LienHe" class="nav-link tab-lien-he <?php if ($data["id"] == "tab-lien-he") echo "active"; ?>">
                                <img src="/doan/public/images/iconNav/lienhe.png" alt="lienhe">
                                <p>LIÊN HỆ</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- cart -->
                <div class="col-md-2" id="cart">
                    <button type="button" class="btn btn-primary btn-gio-hang" value="/doan/ThanhToan/GioHang">
						<img src="/doan/public/images/shopping/cart-white.png" alt="cart-white">
						Giỏ Hàng <span class="badge badge-light" id="so-luong-san-pham">0</span>
						<!-- <span class="sr-only">unread messages</span> -->
					  </button>
                </div>
                 <!-- Tài Khoản -->
                <div class="col-md-2" id="thong-tin-tai-khoan">
                    <!-- Tạo Tài Khoản -->
                    <div class="row">
                    <a href="/doan/TaiKhoan/TaoTaiKhoan" class="taga-tai-khoan taga-dang-ky">
                    <div class="row">
                         <i class = "icon-user-taotk col-md-3"></i>
                         <div class="col-md-9">
                         <span id="ten-nguoi-dung">Tạo Tài Khoản</span>
                         </div>
                        </div>
                    </a>
                    </div>


                    <div class="row">

                    <?php if(isset($data["da-dang-nhap"]) == false || $data["da-dang-nhap"] == 'false') { ?>
                    <!-- Đăng Nhập -->
                        <a href="/doan/TaiKhoan/DangNhap" class="taga-tai-khoan taga-dang-nhap">
                        <div class="row">
                            <i class = "icon-user col-md-3"></i>
                            <div class="col-md-9">
                            <span id="ten-nguoi-dung">Đăng Nhập</span>
                            <br/>
                            <span style="font-size:10px;">Tài Khoản</span>
                            </div>
                            </div>
                        </a>

                    <?php } else { ?>
                     <!-- Thông Tin Cá Nhân -->
                        <a href="/doan/TaiKhoan/ThongTinTaiKhoan" class="taga-tai-khoan taga-dang-nhap">
                        <div class="row">
                            <i class = "icon-user col-md-3"></i>
                            <div class="col-md-9">
                            <span id="ten-nguoi-dung">Tên Người Dùng</span>
                            <br/>
                            <span style="font-size:10px;">Tài Khoản</span>
                            </div>
                            </div>
                        </a>
                    <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- END banner-menu-giỏ hàng -->
    </header>
    <!-- END HEADER -->

    <!-- SCRIPT -->
    <?php echo "
    <script>
    $(document).ready(function() {


        $(document).on('click', '.btn-gio-hang', function(){
              window.location.replace($(this).val());
          });
    })
    </script>";
    ?>   