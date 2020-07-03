<!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
<div class="row ket-qua justify-content-between">

  <!-- Thông báo kết quả Thêm Mới-->
  <?php if (isset($data["kqThem"])) {

    if ($data["kqThem"] == 'true'){
      echo 
            "<script>
            $(document).ready(function() {
              alert('Thêm Mới Thành Công');
              window.location.replace('/doan/QuanLySanPham');
            });
            </script>";
    }
    else{
      echo 
      "<script>
      $(document).ready(function() {
        alert('Thêm Mới Không Thành Công');
        window.location.replace('/doan/QuanLySanPham');
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
              window.location.replace('/doan/QuanLySanPham');
            });
            </script>";
    }
    else{
      echo 
      "<script>
      $(document).ready(function() {
        alert('Cập Nhật Không Thành Công');
        window.location.replace('/doan/QuanLySanPham');
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
              window.location.replace('/doan/QuanLySanPham');
            });
            </script>";
    }
    else{
      echo 
      "<script>
      $(document).ready(function() {
        alert('Xóa Không Thành Công');
        window.location.replace('/doan/QuanLySanPham');
      });
      </script>";
    }
  } ?>
</div>

<!-- MAIN -->
<h4 class="title">Thêm sản phẩm</h4>
<div class="row justify-content-between">
    <div class="col-md-5">
        <form method="POST" action="/doan/QuanLySanPham/ThemSanPham" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ten-san-pham">Tên Sản Phẩm</label>
                <input type="text" class="form-control" placeholder="Tên Sản Phẩm" required name="ten-san-pham">
            </div>

            <div class="form-group row">
                <!-- Hãng sản xuất -->
                <div class="col-md-4">
                    <label for="hang-sx">Hãng Sản Xuất</label>
                    <select class="form-control" name="hang-sx">
                        <?php
                        if (isset($data["dshangsx"])) {
                            foreach ($data["dshangsx"] as $value) {
                        ?>
                                <option value="<?php echo $value['MA_HANG'] ?>"><?php echo $value['TEN_HANG'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- RAM -->
                <div class="col-md-4">
                    <label for="ram">Bộ Nhớ Ram</label>
                    <select class="form-control" name="ram">
                        <?php
                        if (isset($data["dsRAM"])) {
                            foreach ($data["dsRAM"] as $value) {
                        ?>
                                <option value="<?php echo $value['MA_RAM'] ?>"><?php echo $value['BO_NHO'] . " GB" ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- CPU -->
                <div class="col-md-4">
                    <label for="cpu">Bộ Xử Lý</label>
                    <select class="form-control" name="cpu">
                        <?php
                        if (isset($data["dsCPU"])) {
                            foreach ($data["dsCPU"] as $value) {
                        ?>
                                <option value="<?php echo $value['MA_CPU'] ?>"><?php echo $value['TEN_CPU'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- GÍA TIỀN -->
            <div class="form-group">
                <label for="gia-tien">Giá Sản Phẩm</label>
                <input type="number" class="form-control" placeholder="Giá Sản Phẩm" required name="gia-tien" min="1000" style="color: #007BFF;font-weight: bold;">
            </div>

            <!-- THÔNG TIN SP -->
            <div class="form-group">
                <label for="thon-tin-sp">Thông Tin Sản Phẩm</label>
                <textarea class="form-control" rows="10" name="thong-tin-sp" required></textarea>
            </div>

            <!-- UPLOAD -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Ảnh Sản Phẩm</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file-anh" required>
                    <label class="custom-file-label" for="file-anh">Chọn File Ảnh</label>
                </div>
            </div>

            <!-- BUTTON SUBMIT -->
            <button type="submit" class="btn btn-primary">Thêm Mới</button>
        </form>
    </div>



    <!-- 
  DANH SÁCH SẢN PHẨM
  Thẻ h4 chứa class title
  Table chứa class table-danh-sach
-->
<h4 class="title">Danh Sách SẢN PHẨM</h4>
<div class="row">
  <div class="col-md-12" id="danh-sach-san-pham">
    

  </div>
</div>
</div>

<a href="/doan/QuanLySanPham/AjaxLayDsSanPham/5">click me</a>


<!-- AJAX CHO BẢNG DANH SÁCH -->
<?php echo "
    <script>
    $(document).ready(function() {

        $(document).on('click','.btn-xoaNguoiDung',function() {
            var r = confirm('Bạn muốn xóa người dùng ?');
            if (r == false) {} else
                window.location.replace($(this).val());
        });

        function load_data_san_pham(page) {
            $.ajax({
                url: '/doan/QuanLyNguoiDung/AjaxLayDsSanPham/5',
                method: 'POST',
                data: {
                    page_san_pham: page
                },
                cache: false,
                success: function(data) {
                    $('#danh-sach-san_pham').html(data);
                }
            });
        };

        $(document).on('click', '.page-link-san_pham', function() {
          var page = $(this).attr('id');
          load_data_san_pham(page);
        });


    });
</script>
";
?>