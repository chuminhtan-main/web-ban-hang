 <!-- KHU VỰC THÔNG BÁO KẾT QUẢ -->
 <div class="row ket-qua justify-content-between">

 <!-- chuyen huong -->
 <?php if (isset($data["chuyen_huong"])) {

if ($data["chuyen_huong"] == 'true') {
  echo
    "<script>
      $(document).ready(function() {
          window.location.replace('/doan/TrangChu');
      });
      </script>";
}
 }
?>
<!-- Thông báo kết quả Thêm Mới-->
<?php if (isset($data["kqThem"])) {

  if ($data["kqThem"] == 'true') {
    echo
      "<script>
        $(document).ready(function() {
            alert('Thêm Mới Thành Công');
            window.location.replace('/doan/TrangChu');
        });
        </script>";
  } else {
    echo
      "<script>
        $(document).ready(function() {
         alert('Thêm Mới Không Thành Công');
         window.location.replace('/doan/TrangChu');
  });
  </script>";
  }
}
?>

<!-- KHU VỰC SLIDE QUẢNG CÁO -->
    <?php
    require_once "./mvc/views/blocks/block_banner_slide.php";
    ?>

    <!-- KHU VỰC SẢN PHẨM MỚI -->

    <div class="container">
        <div class="row">
            <h4 class="title">Sản Phẩm Mới</h4>
        </div>
        <div class="row">

        <?php 
            if( isset( $data["dsSanPhamMoi"]) ){
                echo $data["dsSanPhamMoi"];
            }
        ?>
        </div>
    </div>
    <!--END sản phẩm mới-->

    <!-- script -->
    <?php echo "
    <script>

    $(document).ready(function() {

        $(document).on('click', '.btn-chon-mua', function() {
            var id = $(this).attr('id');
            window.location.replace($(this).val());
            alert('Thêm vào giỏ hàng thành công');
        });

    });

    </script>
    ";

    ?>