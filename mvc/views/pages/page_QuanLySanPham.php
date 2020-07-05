<!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
<div class="row ket-qua justify-content-between">

  <!-- THÔNG BÁO KẾT QUẢ Thêm Mới-->
  <?php if (isset($data["kqThem"])) {

    if ($data["kqThem"] == 'true') {
      echo
        "<script>
            $(document).ready(function() {
              alert('Thêm Mới Thành Công');
              window.location.replace('/doan/QuanLySanPham');
            });
            </script>";
    } else {

      if (isset($data["kqUploadThem"])) {
        "<script>
        $(document).ready(function() {
          alert('Ảnh đã tồn tại. Thêm mới bất bại');
          window.location.replace('/doan/QuanLySanPham');
        });
        </script>";
      } else {
        echo
          "<script>
    $(document).ready(function() {
      alert('Cập Nhật Không Thành Công');
      window.location.replace('/doan/QuanLySanPham');
    });
    </script>";
      }
    }
  }
  ?>

  <!-- THÔNG BÁO KẾT QUẢ CẬP NHẬT-->
  <?php if (isset($data["kqCapNhat"])) {

      if ($data["kqCapNhat"] == 'true') {
        echo
          "<script>
            $(document).ready(function() {
              alert('Cập Nhật Thành Công');
              window.location.replace('/doan/QuanLySanPham');
            });
            </script>";
      } else {

        if (isset($data["kqUploadCapNhat"])) {
          echo
          "<script>
          $(document).ready(function() {
            alert('Ảnh đã tồn tại. Cập Nhật Thất Bại');
            window.location.replace('/doan/QuanLySanPham');
          });
          </script>";
        } else {
          echo
            "<script>
      $(document).ready(function() {
        alert('Cập Nhật Không Thành Công');
        window.location.replace('/doan/QuanLySanPham');
      });
      </script>";
        }
      }
  } ?>

  <!-- THÔNG BÁO KẾT QUẢ XÓA-->
  <?php if (isset($data["kqXoa"])) {
    if ($data["kqXoa"] == 'true')
      if ($data["kqXoa"] == 'true') {
        echo
          "<script>
            $(document).ready(function() {
              alert('XóaThành Công');
              window.location.replace('/doan/QuanLySanPham');
            });
            </script>";
      } else {
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

  <!-- THÔNG BÁO KẾT QUẢ THAY ĐỔI TRẠNG THÁI-->
  <?php if (isset($data["kqThayDoiTrangThai"])) {

if ($data["kqThayDoiTrangThai"] == 'true') {
  echo
    "<script>
      $(document).ready(function() {
        alert('Đổi trạng thái sản phẩm thành công');
        window.location.replace('/doan/QuanLySanPham');
      });
      </script>";
} else {

  if (isset($data["kqUploadCapNhat"])) {
    echo
    "<script>
    $(document).ready(function() {
      alert('Đổi trạng thái sản phẩm không thành công');
      window.location.replace('/doan/QuanLySanPham');
    });
    </script>";
  } 
}
} ?>

<!--DIV ROW -->
<div class="container-fluid">
<div class="row justify-content-between">
  <!--  FORM THÊM -->
  <div class="col-md-5">
    <h4 class="title">Thêm sản phẩm</h4>
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
      <div class="input-group form-row">
        <div class="form-group col-md-12">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="input-them"  accept="image/gif, image/jpeg, image/png" aria-describedby="inputGroupFileAddon01" name="file-anh">
            <label class="custom-file-label" for="inputGroupFile01">Chọn Ảnh</label>
          </div>
        </div>
      </div>

      <!-- PICTURE UPLOAD -->
      <div class="form-group">
            <label for="anh-upload">Ảnh sản phẩm</label>
            <div class="show-img-upload">
              <img id="img-upload-them-sp" src=""  class="img-upload">

            </div>
      </div>
      <!-- BUTTON SUBMIT -->
      <div class="form-row">
        <div class="form-group col-md-3  justify-content-between">
          <button type="submit" class="btn btn-primary">Tạo Mới</button>
        </div>
      </div>
    </form>
  </div>


  <!-- FORM CẬP NHẬT -->
  <?php
  if (isset($data["sp"])) { ?>
    <div class="col-md-5">
      <h4 class="title">Cập Nhật</h4>
      <form method="POST" action="/doan/QuanLySanPham/CapNhatSanPham/<?php echo $data["sp"]["MA_SP"] ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="ten-san-pham">Tên Sản Phẩm</label>
          <input type="text" class="form-control" placeholder="Tên Sản Phẩm" required name="ten-san-pham" value="<?php echo $data["sp"]["TEN_SP"] ?>">
        </div>

        <div class="form-group row">
          <!-- Hãng sản xuất -->
          <div class="col-md-4">
            <label for="hang-sx">Hãng Sản Xuất</label>
            <select class="form-control" name="hang-sx">

              <?php if (isset($data["dshangsx"])) {

                foreach ($data["dshangsx"] as $value) {

                  if ($value["MA_HANG"] == $data["sp"]["MA_HANG"]) {
              ?>
                    <option value="<?php echo $value['MA_HANG'] ?>" selected><?php echo $value['TEN_HANG'] ?></option>
                  <?php
                  } else {
                  ?>
                    <option value="<?php echo $value['MA_HANG'] ?>"><?php echo $value['TEN_HANG'] ?></option>
              <?php }
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
                  if ($value["MA_RAM"] == $data["sp"]["MA_RAM"]) {
              ?>
                    <option value="<?php echo $value['MA_RAM'] ?>" selected><?php echo $value['BO_NHO'] . " GB" ?></option>
                  <?php } else { ?>
                    <option value="<?php echo $value['MA_RAM'] ?>"><?php echo $value['BO_NHO'] . " GB" ?></option>
              <?php    }
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

                  if ($value["MA_CPU"] == $data["sp"]["MA_CPU"]) {
              ?>
                    <option value="<?php echo $value['MA_CPU'] ?>" selected><?php echo $value['TEN_CPU'] ?></option>
                  <?php
                  } else {
                  ?>
                    <option value="<?php echo $value['MA_CPU'] ?>"><?php echo $value['TEN_CPU'] ?></option>

              <?php }
                }
              }
              ?>
            </select>
          </div>
        </div>

        <!-- GÍA TIỀN -->
        <div class="form-group">
          <label for="gia-tien">Giá Sản Phẩm</label>
          <input type="number" class="form-control" placeholder="Giá Sản Phẩm" required name="gia-tien" min="1000" style="color: #007BFF;font-weight: bold;" value=<?php echo $data["sp"]["GIA_TIEN"] ?>>
        </div>

        <!-- THÔNG TIN SP -->
        <div class="form-group">
          <label for="thon-tin-sp">Thông Tin Sản Phẩm (Mỗi Thông Tin Phân Cách Bởi Dấu ;)</label>
          <textarea class="form-control" rows="10" name="thong-tin-sp" required><?php echo $data["sp"]["MO_TA"] ?></textarea>
        </div>

        <!-- UPLOAD -->
        <div class="input-group form-row">
          <div class="form-group col-md-12">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="input-cap-nhat" accept="image/gif, image/jpeg, image/png" aria-describedby="inputGroupFileAddon01" name="file-anh">
              <label class="custom-file-label" for="file-name">Chọn Ảnh</label>
            </div>
          </div>
        </div>


                <!-- PICTURE UPLOAD -->
                <div class="form-group">
            <label for="anh-upload">Ảnh sản phẩm</label>
            <div class="show-img-upload">
              <img id="img-upload-cap-nhat-sp" src="/doan/<?php echo $data["sp"]["SRC_IMG"] ?>"  class="img-upload">
            </div>
      </div>
        <!-- input hidden Lưu đường dẫn ảnh -->
          <input type="hidden" value="<?php echo $data["sp"]["SRC_IMG"] ?>" name="img">

          <!-- BUTTON SUBMIT -->
          <div class="form-row">
              <button type="submit" class="btn btn-primary">Cập Nhật</button>
          </div>


      </form>
    </div>
  <?php
  }
  ?>
</div>
</div>

<div class="container-fluid">
  <!-- 
  DANH SÁCH SẢN PHẨM
  Table chứa class table-danh-sach-->
  <h4 class="title">Danh Sách Sản Phẩm</h4>
  <div class="row">
    <div class="col-md-12" id="danh-sach-san-pham">
    </div>
  </div>
</div>

<!-- AJAX CHO BẢNG DANH SÁCH -->

<?php echo "
    <script>
    $(document).ready(function() {
      load_data_san_pham();

        $(document).on('click','.btn-xoaSanPham',function() {
            var r = confirm('Bạn muốn xóa người dùng ?');
            if (r == false) {} else
                window.location.replace($(this).val());
        });

        $(document).on('click', '.btn-ngung-ban', function(){
          var r = confirm('Bạn muốn ngừng bán sản phẩm này ?');
          if( r== true){
            window.location.replace($(this).val());
          }
        });

        $(document).on('click', '.btn-mo-ban', function(){
          var r = confirm('Bạn muốn mở bán sản phẩm này ?');
          if( r== true){
            window.location.replace($(this).val());
          }
        });


        function load_data_san_pham(page) {
            $.ajax({
                url: '/doan/QuanLySanPham/AjaxLayDsSanPham/5',
                method: 'POST',
                data: {
                    page_san_pham: page
                },
                cache: false,
                success: function(data) {
                    $('#danh-sach-san-pham').html(data);
                }
            });
        };

        $(document).on('click', '.page-link-san-pham', function() {
          var page = $(this).attr('id');
          load_data_san_pham(page);
        });

        $('#input-them').on('change',function(){
          //get the file name
          var fileName = $(this).val();
          //replace the 'Ảnh sản phẩm' label
          $(this).next('.custom-file-label').html(fileName);
          $('#img-upload-them-sp').attr('src', URL.createObjectURL(event.target.files[0]));
      });

      $('#input-cap-nhat').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the 'Choose a file' label
        $(this).next('.custom-file-label').html(fileName);
        //hiển thị hình
        $('#img-upload-cap-nhat-sp').attr('src', URL.createObjectURL(event.target.files[0]));
    })
});
</script>";
?>