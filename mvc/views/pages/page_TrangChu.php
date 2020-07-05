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

    <a href="/doan/TrangChu/CatChuoi">Cat Chuoi</a>

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