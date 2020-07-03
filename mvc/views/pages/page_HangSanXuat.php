<?php
    require_once './mvc/views/blocks/block_ThongBaoKetQuaAdmin.php';
?>
<div class="row justify-content-between">
   <div class="col-md-5">
    <form action="/doan/HangSanXuat/ThemHang" method="post">
  <div class="form-group">
    <label for="ten-hang">Tên Hãng Sản Xuất</label>
    <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên Hãng Sản Xuất" name="ten-hang" required>
  </div>

  <button type="submit" class="btn btn-primary">Tạo Mới</button>
  
</form>
</div>
    
 <!-- Form Sửa  -->  
   <?php
  if (isset($data["ThongTinHang"])) {
  ?>
  <div class="col-md-5">
      <h4 class="tittle">Sửa thông tin</h4>
    <form id="them-hang" action="/doan/HangSanXuat/CapNhatHang/<?php echo $data["ThongTinHang"]['MA_HANG']; ?>" method="post">
  <div class="form-group">
    <label for="ten-hang">Tên Hãng Sản Xuất</label>
    <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên Hãng Sản Xuất" name="ten-hang" required value="<?php echo $data["ThongTinHang"]['TEN_HANG']; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Cập nhật</button>
  
</form>
</div>   
 <?php
  }
  ?>
</div>

<!-- Danh sách hãng sx -->
<h4 class="title">Danh Sách Hãng Sản Xuất</h4>
<div class="row col-md-5">
  <div class="col-md-12" id="danh-sach-hang">
    
  </div>
</div>
<div class="row">
<div id="pagination-data">

</div>
</div>
  
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