<!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
<div class="row ket-qua justify-content-between">

  <!-- Thông báo kết quả Thêm Mới-->
  <?php if (isset($data["kqThem"])) {

    if ($data["kqThem"] == 'true') {
      echo
        "<script>
        $(document).ready(function() {
          window.location.replace('/doan/CPU');
          alert('Thêm Mới Thành Công');

        });
        </script>";
    } else {
      echo
        "<script>
  $(document).ready(function() {
    window.location.replace('/doan/CPU');
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
          window.location.replace('/doan/CPU');
          alert('Cập Nhật Thành Công');
        });
        </script>";
      } else {
        echo
          "<script>
  $(document).ready(function() {
    window.location.replace('/doan/CPU');
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
          window.location.replace('/doan/CPU');
          alert('Xóa Thành Công');
        });
        </script>";
      } else {
        echo
          "<script>
  $(document).ready(function() {
    window.location.replace('/doan/CPU');
    alert('Xóa Không Thành Công');
  });
  </script>";
      }
  } ?>
</div>

<!-- DIV FORM -->
<div class="container-fluid">
  <div class="row justify-content-between">
    <!-- FORM THÊM CPU -->
    <div class="col-md-5">
    <h4 class="title">Thêm Mới</h4>
      <form action="/doan/CPU/ThemCPU" method="post">
        <div class="form-group">
          <label for="CPU">Tên Bộ Xử Lý</label>
          <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên CPU" name="CPU" required>
        </div>

        <button type="submit" class="btn btn-primary">Tạo Mới</button>
      </form>
    </div>

    <!-- FORM CẬP NHẬT CPU  -->
    <?php
    if (isset($data["ThongTinCPU"])) {
    ?>
      <div class="col-md-5">
        <h4 class="title">Cập Nhật Thông Tin</h4>
        <form id="them-CPU" action="/doan/CPU/CapNhatCPU/<?php echo $data["ThongTinCPU"]['MA_CPU']; ?>" method="post">
          <div class="form-group">
            <label for="CPU">Tên Bộ Xử Lý</label>
            <input type="text" class="form-control" id="ten-CPU" placeholder="Tên CPU" name="CPU" required value="<?php echo $data["ThongTinCPU"]['TEN_CPU']; ?>">
          </div>

          <button type="submit" class="btn btn-primary">Cập nhật</button>

        </form>
      </div>
    <?php
    }
    ?>
  </div>
</div>


<!-- DANH SÁCH CPU -->
<div class="container-fluid">
  <h4 class="title">Danh Sách CPU</h4>
  <div class="row">
    <div class="col-md-12" id="danh-sach-CPU">

    </div>
  </div>
</div>


<!-- SCRIPT -->
<?php echo "
    <script>
    $(document).ready(function() {
        load_data_CPU();
        load_data_CPU();

        $(document).on('click','.btn-xoaCPU',function() {
            var r = confirm('Bạn có chắc muốn xóa CPU này ?');
            if (r == false) {
            } else
                window.location.replace($(this).val());
        });

        function load_data_CPU(page) {
            $.ajax({
                url: '/doan/CPU/AjaxLayDsCPU/5',
                method: 'POST',
                data: {
                    page_CPU: page
                },
                cache: false,
                success: function(data) {
                    $('#danh-sach-CPU').html(data);
                }
            });
        };

        $(document).on('click', '.page-link-CPU', function() {
          var page = $(this).attr('id');
          load_data_CPU(page);
        });

    });
</script>
";
?>