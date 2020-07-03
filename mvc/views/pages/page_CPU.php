<?php
    require_once './mvc/views/blocks/block_ThongBaoKetQuaAdmin.php';
?>
<div class="row justify-content-between">
    <div class="col-md-5">        
    <form action="/doan/CPU/ThemCPU" method="post">
  <div class="form-group">
    <label for="CPU">Tên CPU</label>
    <input type="text" class="form-control" id="ten-hang-sx" placeholder="Tên CPU" name="CPU" required>
  </div>

  <button type="submit" class="btn btn-primary">Tạo Mới</button>
</form>
    </div>
    <!-- Form Sửa  -->  
   <?php
  if (isset($data["ThongTinCPU"])) {
  ?>
  <div class="col-md-5">
      <h4 class="tittle">Sửa thông tin</h4>
    <form id="them-CPU" action="/doan/CPU/CapNhatCPU/<?php echo $data["ThongTinCPU"]['MA_CPU']; ?>" method="post">
  <div class="form-group">
    <label for="CPU">CPU</label>
    <input type="text" class="form-control" id="ten-CPU" placeholder="Tên CPU" name="CPU" required value="<?php echo $data["ThongTinCPU"]['TEN_CPU']; ?>">
  </div>

  <button type="submit" class="btn btn-primary">Cập nhật</button>
  
</form>
</div>   
 <?php
  }
  ?>
</div>
<!-- Danh sách CPU -->
<h4 class="title">Danh Sách CPU</h4>
<div class="row col-md-5">
  <div class="col-md-12" id="danh-sach-CPU">
    
  </div>
</div>
<div class="row">
<div id="pagination-data">

</div>
</div>
 
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