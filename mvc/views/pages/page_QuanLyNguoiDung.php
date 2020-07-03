<!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
<div class="row ket-qua justify-content-between">

  <!-- Thông báo kết quả Thêm Mới-->
  <?php if (isset($data["kq"])) {

    if ($data["kq"] == 'true'){
      echo 
            "<script>
            $(document).ready(function() {
              alert('Thêm Mới Thành Công');
              window.location.replace('/doan/QuanLyNguoiDung');
            });
            </script>";
    }
    else{
      echo 
      "<script>
      $(document).ready(function() {
        alert('Thêm Mới Không Thành Công');
        window.location.replace('/doan/QuanLyNguoiDung');
      });
      </script>";
    }
  } 
?>

  <!-- Thông báo kết quả CẬP NHẬT-->
  <?php if (isset($data["kqCapNhat"])) {
    if ($data["kqCapNhat"] == 'true')
    if ($data["kqCapNhat"] == 'true'){
      echo 
            "<script>
            $(document).ready(function() {
              alert('Cập Nhật Thành Công');
              window.location.replace('/doan/QuanLyNguoiDung');
            });
            </script>";
    }
    else{
      echo 
      "<script>
      $(document).ready(function() {
        alert('Cập Nhật Không Thành Công');
        window.location.replace('/doan/QuanLyNguoiDung');
      });
      </script>";
    }
  } ?>

    <!-- Thông báo kết quả XÓA-->
    <?php if (isset($data["kqXoa"])) {
    if ($data["kqXoa"] == 'true')
    if ($data["kqXoa"] == 'true'){
      echo 
            "<script>
            $(document).ready(function() {
              alert('XóaThành Công');
              window.location.replace('/doan/QuanLyNguoiDung');
            });
            </script>";
    }
    else{
      echo 
      "<script>
      $(document).ready(function() {
        alert('Xóa Không Thành Công');
        window.location.replace('/doan/QuanLyNguoiDung');
      });
      </script>";
    }
  } ?>
</div>

<div class="row justify-content-between">
  <!--Form Thêm Người Dùng - Chỉ hiển thị khi có người dùng chỉnh sửa-->
  <div class="col-md-5">
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
          <label for="loai-nguoi-dung">Loại</label>
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

    </form>
  </div>


  <!-- Form Sửa Người Dùng -->
  <?php
  if (isset($data["thongTinNguoiDung"])) {
  ?>

    <div class="col-md-5">
      <h4 class="title">Sửa Thông Tin</h4>
      <form id="them-nguoi-dung" action="/doan/QuanLyNguoiDung/CapNhatNguoiDung/<?php echo $data["thongTinNguoiDung"]['MA_ND']; ?>" method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="ten">Họ Và Tên</label>
            <input type="text" class="form-control" placeholder="Họ Tên" name="ten" required value="<?php echo $data["thongTinNguoiDung"]['TEN_ND']; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="input-email">Email</label>
            <input type="email" class="form-control" id="input-email" placeholder="Email" name="email" required value="<?php echo $data["thongTinNguoiDung"]['EMAIL']; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="input-sdt">Điện Thoại</label>
            <input type="text" class="form-control" id="input-sdt" placeholder="Số Điện Thoại" name="dien-thoai" required value="<?php echo $data["thongTinNguoiDung"]['SDT']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="input-dia-chi">Địa Chỉ</label>
          <input type="text" class="form-control" id="input-dia-chi" placeholder="1234 Trần Hưng Đạo" name="dia-chi" required value="<?php echo $data["thongTinNguoiDung"]['DIA_CHI']; ?>">
        </div>

        <div class="form-row">
          <div class="form-group col-md-2">
            <label for="loai-nguoi-dung">Loại</label>
            <select class="custom-select" name="loai-nguoi-dung" disabled>
              <!-- option 1 -->
              <option value='1' <?php
                                if ($data["thongTinNguoiDung"]['LOAI_ND'] == 1) {
                                  echo "selected";
                                }
                                ?>>Nhân Viên</option>

              <!-- option 2 -->
              <option value='2' <?php
                                if ($data["thongTinNguoiDung"]['LOAI_ND'] == 2) {
                                  echo "selected";
                                }
                                ?>>Khách Hàng</option>
            </select>
          </div>
          <div class="form-group col-md-5">
            <label for="inputZip">Tên Đăng Nhập</label>
            <input type="text" class="form-control" id="input-ten-dang-nhap" name="ten-dang-nhap" required disabled>
          </div>
          <div class="form-group col-md-5">
            <label for="inputZip">Mật Khẩu</label>
            <input type="password" class="form-control" id="input-mat-khau" name="mat-khau" disabled>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-3">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
          </div>
        </div>
      </form>
    </div>

  <?php
  }
  ?>


</div>
<!-- 
  DANH SÁCH NHÂN VIÊN
  Thẻ h4 chứa class title
  Table chứa class table-danh-sach
-->
<h4 class="title">Danh Sách Nhân Viên</h4>
<div class="row">
  <div class="col-md-12" id="danh-sach-nhan-vien">
    

  </div>
</div>

<!-- 
  DANH SÁCH KHÁCH HÀNG
  Thẻ h4 chứa class title
  Table chứa class table-danh-sach
-->
<h4 class="title">Danh Sách Khách Hàng</h4>
<div class="row">
  <div class="col-md-12" id="danh-sach-khach-hang">

  </div>


</div>
<div class="row">
<div id="pagination-data">

</div>
<?php echo "
    <script>
    $(document).ready(function() {
        load_data_nhan_vien();
        load_data_khach_hang();

        $(document).on('click','.btn-xoaNguoiDung',function() {
            var r = confirm('Bạn muốn xóa người dùng ?');
            if (r == false) {} else
                window.location.replace($(this).val());
        });

        function load_data_nhan_vien(page) {
            $.ajax({
                url: '/doan/QuanLyNguoiDung/AjaxLayDsNhanVien/5',
                method: 'POST',
                data: {
                    page_nhan_vien: page
                },
                cache: false,
                success: function(data) {
                    $('#danh-sach-nhan-vien').html(data);
                }
            });
        };


        function load_data_khach_hang(page){
          $(this).find('#page').addClass('active');
              $.ajax({
                  url: '/doan/QuanLyNguoiDung/AjaxLayDsKhachHang/5',
                  method: 'POST',
                  data: {
                      page_khach_hang: page
                  },
                  cache: false,
                  success: function(data) {
                      $('#danh-sach-khach-hang').html(data);
                  }
              });
          }


        $(document).on('click', '.page-link-nhan-vien', function() {
          var page = $(this).attr('id');
          load_data_nhan_vien(page);
        });


        $(document).on('click', '.page-link-khach-hang', function() {
          var page = $(this).attr('id');
          load_data_khach_hang(page);
         });

    });
</script>
";
?>
