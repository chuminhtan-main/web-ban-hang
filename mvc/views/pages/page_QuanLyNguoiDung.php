<h4 class="title">Thêm Người Dùng</h4>
<form id="them-nguoi-dung" action="/doan/QuanLyNguoiDung/ThemNguoiDung" method="POST">
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
    <div class="form-group col-md-2">
      <label for="loai-nguoi-dung">Loại Người Dùng</label>
      <select class="custom-select" name="loai-nguoi-dung">
        <option value="1">Nhân Viên</option>
        <option value="2">Khách Hàng</option>
      </select>
    </div>
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
  <?php if (isset($data["kq"])) {
    if ($data["kq"] == 'true')
      echo "Thành công";
    else
      echo "Không thành công";
  } ?>
</form>

<!-- 
  DANH SÁCH NHÂN VIÊN
  Thẻ h4 chứa class title
  Table chứa class table-danh-sach
-->
<h4 class="title">Danh Sách Nhân Viên</h4>
<div class="row">
  <div class="col-md-12">
    <table class="table-danh-sach">
      <tr>
        <th>STT</th>
        <th>Mã</th>
        <th>Họ Tên</th>
        <th>Email</th>
        <th>Điện Thoại</th>
        <th>Địa Chỉ</th>
        <th>Loại</th>
        <th>Tên Đăng Nhập</th>
        <th>Thao Tác</th>

      </tr>

      <?php
      if (isset($data["dsNhanVien"])) {
        // print_r($data["dsNguoiDung"]);
        $stt = 1;
        foreach ($data["dsNhanVien"] as $nguoiDung) {
      ?>
          <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $nguoiDung['MA_ND'] ?></td>
            <td><?php echo $nguoiDung['TEN_ND'] ?></td>
            <td><?php echo $nguoiDung['EMAIL'] ?></td>
            <td><?php echo $nguoiDung['SDT'] ?></td>
            <td><?php echo $nguoiDung['DIA_CHI'] ?></td>

            <td><?php
                if ($nguoiDung['LOAI_ND'] == 1) {
                  echo 'Nhân Viên';
                } else {
                  echo 'Khách Hàng';
                }
                ?></td>

            <td><?php echo $nguoiDung['TEN_DANG_NHAP'] ?></td>
            <td>
              <button type="button" class="btn btn-danger btn-thao-tac">Xóa</button>
              <button type="button" class="btn btn-warning btn-thao-tac">Chỉnh Sửa</button>
            </td>
          </tr>
      <?php
          $stt++;
        }
      }
      ?>
    </table>
  </div>
</div>


<!-- 
  DANH SÁCH KHÁCH HÀNG
  Thẻ h4 chứa class title
  Table chứa class table-danh-sach
-->
<h4 class="title">Danh Sách Khách Hàng</h4>
<div class="row">
  <div class="col-md-12">
    <table class="table-danh-sach">
      <tr>
        <th>STT</th>
        <th>Mã</th>
        <th>Họ Tên</th>
        <th>Email</th>
        <th>Điện Thoại</th>
        <th>Địa Chỉ</th>
        <th>Loại</th>
        <th>Tên Đăng Nhập</th>
        <th>Thao Tác</th>
      </tr>

      <?php
      if (isset($data["dsKhachHang"])) {
        $stt = 1;
        foreach ($data["dsKhachHang"] as $nguoiDung) {
      ?>
          <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $nguoiDung['MA_ND'] ?></td>
            <td><?php echo $nguoiDung['TEN_ND'] ?></td>
            <td><?php echo $nguoiDung['EMAIL'] ?></td>
            <td><?php echo $nguoiDung['SDT'] ?></td>
            <td><?php echo $nguoiDung['DIA_CHI'] ?></td>
            <td><?php
                if ($nguoiDung['LOAI_ND'] == 1) {
                  echo 'Nhân Viên';
                } else {
                  echo 'Khách Hàng';
                }
                ?></td>

            <td><?php echo $nguoiDung['TEN_DANG_NHAP'] ?></td>
            <td>
              <button type="button" class="btn btn-danger btn-thao-tac">Xóa</button>
              <button type="button" class="btn btn-warning btn-thao-tac">Chỉnh Sửa</button>
            </td>
          </tr>

      <?php
          $stt++;
        }
      }
      ?>
    </table>
  </div>
</div>