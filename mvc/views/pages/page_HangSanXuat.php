<!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
<div class="row ket-qua justify-content-between">

  <!-- Thông báo kết quả Thêm Mới-->
  <?php if (isset($data["kqThem"])) {

    if ($data["kqThem"] == 'true') {
      echo
        "<script>
        $(document).ready(function() {
          window.location.replace('/doan/HangSanXuat');
          alert('Thêm Mới Thành Công');
        });
        </script>";
    } else {
      echo
        "<script>
  $(document).ready(function() {
    window.location.replace('/doan/HangSanXuat');
    alert('Thêm Mới Không Thành Công');
  });
  </script>";
    }
  }
  ?>

  <!-- Thông báo kết quả CẬP NHẬT-->
  <?php if (isset($data["kqCapNhat"])) {
    if ($data["kqCapNhat"] == 'true')
      if ($data["kqCapNhat"] == 'true') {
        echo
          "<script>
        $(document).ready(function() {
          window.location.replace('/doan/HangSanXuat');
          alert('Cập Nhật Thành Công');
        });
        </script>";
      } else {
        echo
          "<script>
  $(document).ready(function() {
    window.location.replace('/doan/HangSanXuat');
    alert('Cập Nhật Không Thành Công');
  });
  </script>";
      }
  } ?>

  <!-- Thông báo kết quả XÓA-->
  <?php if (isset($data["kqXoa"])) {
    if ($data["kqXoa"] == 'true')
      if ($data["kqXoa"] == 'true') {
        echo
          "<script>
        $(document).ready(function() {
          window.location.replace('/doan/HangSanXuat');
          alert('Xóa Thành Công');
        });
        </script>";
      } else {
        echo
          "<script>
  $(document).ready(function() {
    window.location.replace('/doan/HangSanXuat');
    alert('Xóa Không Thành Công');
  });
  </script>";
      }
  } ?>
</div>


<!-- DIV FORM -->
<div class="container-fluid">
  <div class="row justify-content-between">
    <!-- FORM THÊM HÃNG SẢN XUẤT -->
    <div class="col-md-5">
      <h4 class="title">Cập Nhật Thông Tin</h4>
      <form action="/doan/HangSanXuat/ThemHang" method="post">
        <div class="form-group">
          <label for="ten-hang">Tên Hãng Sản Xuất</label>
          <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên Hãng Sản Xuất" name="ten-hang" required>
        </div>

        <button type="submit" class="btn btn-primary">Tạo Mới</button>
      </form>
    </div>

    <!-- FORM CẬP NHẬT HÃNG SX -->
    <?php
    if (isset($data["ThongTinHang"])) {
    ?>
      <div class="col-md-5">
        <h4 class="title">Cập Nhật Thông Tin</h4>
        <form id="them-hang" action="/doan/HangSanXuat/CapNhatHang/<?php echo $data["ThongTinHang"]['MA_HANG']; ?>" method="post">
          <div class="form-group">
            <label for="ten-hang">Tên Hãng Sản Xuất</label>
            <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên Hãng Sản Xuất" name="ten-hang" required value="<?php echo $data["ThongTinHang"]['TEN_HANG']; ?>">
          </div>
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
      </div>
    <?php } ?>
  </div>
</div>


<!-- DANH SÁCH SẢN PHẨM -->
<div class="container-fluid">
  <h4 class="title">Danh Sách Hãng Sản Xuất</h4>
  <div class="row">
    <div class="col-md-12" id="danh-sach-hang">
    </div>
  </div>
</div>


<!-- SCRIPT -->
<?php echo "
    <script>
    $(document).ready(function() {
        load_data_hang_sx();
        load_data_hang_sx();

        $(document).on('click','.btn-xoaHang',function() {
            var r = confirm('Bạn có chắc muốn xóa hãng sản xuất này ?');
            if (r == false) {
            } else
                window.location.replace($(this).val());
        });

        function load_data_hang_sx(page) {
            $.ajax({
                url: '/doan/HangSanXuat/AjaxLayDsHang/5',
                method: 'POST',
                data: {
                    page_HangSanXuat: page
                },
                cache: false,
                success: function(data) {
                    $('#danh-sach-hang').html(data);
                }
            });
        };

        $(document).on('click', '.page-link-hang', function() {
          var page = $(this).attr('id');
          load_data_hang_sx(page);
        });

    });
</script>
";
?>