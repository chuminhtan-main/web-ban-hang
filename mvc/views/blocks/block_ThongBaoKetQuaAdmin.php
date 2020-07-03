<!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
<div class="row ket-qua justify-content-between">

  <!-- Thông báo kết quả Thêm Mới-->
  <?php if (isset($data["kqThem"])) {

    if ($data["kqThem"] == 'true'){
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