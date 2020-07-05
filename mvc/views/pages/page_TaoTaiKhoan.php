

<div class="row justify-content-between">
    <!--Form Thêm Người Dùng - Chỉ hiển thị khi có người dùng chỉnh sửa-->
    <div class="col-md-12">
      <h4 class="title">Thêm Người Dùng</h4>
      <form id="them-nguoi-dung" action="/doan/TaiKhoan/ThemTaiKhoan" method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="ten">Họ Và Tên</label>
            <input type="text" class="form-control" placeholder="Họ Tên" name="ten" required>
          </div>
          <div class="form-group col-md-4">
            <label for="input-email">Email</label>
            <input type="email" class="form-control" id="input-email" placeholder="Email" name="email" required>
          </div>
          <div class="form-group col-md-4">
            <label for="input-sdt">Điện Thoại</label>
            <input type="text" class="form-control" id="input-sdt" placeholder="Số Điện Thoại" name="dien-thoai" required>
          </div>
        </div>
        <div class="form-group">
          <label for="input-dia-chi">Địa Chỉ</label>
          <input type="text" class="form-control" id="input-dia-chi" placeholder="1234 Trần Hưng Đạo" name="dia-chi" required>
        </div>

        <div class="form-row">
          <div class="form-group col-md-5">
            <label for="inputZip">Tên Đăng Nhập</label>
            <input type="text" class="form-control" id="input-ten-dang-nhap" name="ten-dang-nhap">
          </div>
          <div class="form-group col-md-5">
            <label for="inputZip">Mật Khẩu</label>
            <input type="password" class="form-control" id="input-mat-khau" name="mat-khau">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-3">
            <button type="submit" class="btn btn-primary">Tạo Mới</button>
          </div>
        </div>

      </form>
    </div>