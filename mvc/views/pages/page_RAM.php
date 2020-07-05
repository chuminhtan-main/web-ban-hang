<!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
<div class="row ket-qua justify-content-between">

  <!-- Thông báo kết quả Thêm Mới-->
  <?php if (isset($data["kqThem"])) {

    if ($data["kqThem"] == 'true') {
      echo
        "<script>
        $(document).ready(function() {
          window.location.replace('/doan/RAM');
          alert('Thêm Mới Thành Công');
        });
        </script>";
    } else {
      echo
        "<script>
  $(document).ready(function() {
    window.location.replace('/doan/RAM');
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
          window.location.replace('/doan/RAM');
          alert('Cập Nhật Thành Công');
        });
        </script>";
      } else {
        echo
          "<script>
  $(document).ready(function() {
    window.location.replace('/doan/RAM');
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
          window.location.replace('/doan/RAM');
          alert('Xóa Thành Công');
        });
        </script>";
      } else {
        echo
          "<script>
  $(document).ready(function() {
    window.location.replace('/doan/RAM');
    alert('Xóa Không Thành Công');
  });
  </script>";
      }
  } ?>
</div>

<!-- DIV FORM -->
<div class="container-fluid">
<div class="row justify-content-between">

<!-- FORM THÊM RAM -->
    <div class="col-md-5"> 
      <h4 class="title">Thêm Mới</h4>       
    <form action="/doan/RAM/ThemRAM" method="post">
  <div class="form-group">
    <label for="RAM">Dung Lượng Bộ Nhớ</label>
    <input type="text" class="form-control" id="ten-RAM" placeholder="Dung lượng bộ nhớ..." name="RAM" required>
  </div>
  <button type="submit" class="btn btn-primary">Tạo Mới</button>  
</form>
    </div>
    <!-- FORM CẬP NHẬT RAM -->  
   <?php
  if (isset($data["ThongTinRAM"])) {
  ?>
  <div class="col-md-5">
      <h4 class="title">Cập Nhật Thông Tin</h4>
    <form id="them-hang" action="/doan/RAM/CapNhatRAM/<?php echo $data["ThongTinRAM"]['MA_RAM']; ?>" method="post">
  <div class="form-group">
    <label for="RAM">Dung Lượng Bộ Nhớ</label>
    <input type="text" class="form-control" id="ten-RAM" placeholder="Tên RAM" name="RAM" required value="<?php echo $data["ThongTinRAM"]['BO_NHO']; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Cập nhật</button>
  
</form>
</div>   
 <?php } ?>
</div>
  </div>

  <!-- DANH SÁCH RAM -->
  <div class="container-fluid">
  <h4 class="title">Danh Sách RAM</h4>
  <div class="row">
    <div class="col-md-12" id="danh-sach-RAM">
    </div>
  </div>
</div>

<!-- SCRIPT -->
<?php echo "
    <script>
    $(document).ready(function() {
        load_data_RAM();
        load_data_RAM();

        $(document).on('click','.btn-xoaRAM',function() {
            var r = confirm('Bạn có chắc muốn xóa RAM này ?');
            if (r == false) {
            } else
                window.location.replace($(this).val());
        });

        function load_data_RAM(page) {
            $.ajax({
                url: '/doan/RAM/AjaxLayDsRAM/5',
                method: 'POST',
                data: {
                    page_RAM: page
                },
                cache: false,
                success: function(data) {
                    $('#danh-sach-RAM').html(data);
                }
            });
        };

        $(document).on('click', '.page-link-RAM', function() {
          var page = $(this).attr('id');
          load_data_RAM(page);
        });

    });
</script>
";
?>