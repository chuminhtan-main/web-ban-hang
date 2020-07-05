    <!-- KHU VỰC SLIDE QUẢNG CÁO -->
    <?php
    require_once "./mvc/views/blocks/block_banner_slide.php";
    ?>

    <div class="container">

        <!-- THANH LỌC -->
        <div class="row">

        </div>

        <!-- KHUNG DANH SÁCH SẢN PHẨM -->
        <div class="row">
            <div id="tat-ca-san-pham">

            </div>
        </div>
    </div>
<a href="/doan/ThanhToan/TinhTongSoLuong">click</a>
    <!-- SCRIPT -->
    <?php echo "
    <script>

    $(document).ready(function() {

        load_data_san_pham();

        function load_data_san_pham(page) {
            $.ajax({
                url: '/doan/Laptop/AjaxHienThiTatCaSanPham/8',
                method: 'POST',
                data: {
                    page_san_pham: page
                },
                cache: false,
                success: function(data) {
                    $('#tat-ca-san-pham').html(data);
                }
            });
        };

        $(document).on('click', '.page-link-san-pham', function() {
            var page = $(this).attr('id');
            load_data_san_pham(page);
        });

        $(document).on('click', '.btn-chon-mua', function() {
            var id = $(this).attr('id');
            window.location.replace($(this).val());
            alert('Thêm vào giỏ hàng thành công');
        });

    });

    </script>
    ";

    ?>