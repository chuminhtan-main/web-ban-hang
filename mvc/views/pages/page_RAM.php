<?php
    require_once './mvc/views/blocks/block_ThongBaoKetQuaAdmin.php';
?>
<div class="row justify-content-between">
    <div class="col-md-5">        
    <form action="/doan/RAM/ThemRAM" method="post">
  <div class="form-group">
    <label for="RAM">RAM</label>
    <input type="text" class="form-control" id="ten-RAM" placeholder="Dung lượng bộ nhớ..." name="RAM" required>
  </div>

  <button type="submit" class="btn btn-primary">Tạo Mới</button>  
</form>
    </div>
    <!-- Form Sửa  -->  
   <?php
  if (isset($data["ThongTinRAM"])) {
  ?>
  <div class="col-md-5">
      <h4 class="tittle">Sửa thông tin</h4>
    <form id="them-hang" action="/doan/RAM/CapNhatRAM/<?php echo $data["ThongTinRAM"]['MA_RAM']; ?>" method="post">
  <div class="form-group">
    <label for="RAM">RAM</label>
    <input type="text" class="form-control" id="ten-RAM" placeholder="Tên RAM" name="RAM" required value="<?php echo $data["ThongTinRAM"]['BO_NHO']; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Cập nhật</button>
  
</form>
</div>   
 <?php
  }
  ?>
</div>
<!-- Danh sách RAM -->
<h4 class="title">Danh Sách RAM</h4>
<div class="row col-md-5">
  <div class="col-md-12" id="danh-sach-RAM">
    
  </div>
</div>
<div class="row">
<div id="pagination-data">

</div>
</div>
 
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