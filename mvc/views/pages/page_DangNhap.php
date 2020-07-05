
<div class="row justify-content-center ">
    <!--Form Thêm Người Dùng - Chỉ hiển thị khi có người dùng chỉnh sửa-->
    <div class="col-md-4">

        <h4 class="title">Đăng Nhập</h4>

        <form action="/doan/TaiKhoan/XuLyDangNhap" method="POST">
            <!-- TÊN ĐĂNG NHẬP -->
            <div class="form-group">
                <label for="ten-dang-nhap">Tên Đăng Nhập</label>
                <input type="text" class="form-control" placeholder="Tên Đăng Nhập" name="ten-dang-nhap" required>
            </div>
            <!-- MẬT KHẨU -->
            <div class="form-group">
                <label for="mat-khau">Mật Khẩu</label>
                <input type="password" class="form-control" placeholder="Mật Khẩu" name="mat-khau" required>
            </div>
            <!-- BTN SUBMIT  -->
            <div class="form-row">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                </div>
            </div>
        </form>
    </div>
</div>