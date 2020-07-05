<div class="container" style="padding: 0 1px 0 14px;">
        <div class="row">
            <!-- slide quảng cáo -->
            <div id="slide-san-pham" class="carousel" data-ride="carousel">

            <?php 
                if( isset( $data["slide"]) ){
                    echo $data["slide"];
                }
            ?>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#slide-san-pham" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#slide-san-pham" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>