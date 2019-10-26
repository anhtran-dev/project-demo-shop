<?php get_header(); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">

        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>

                        <a href="#" title=""></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"></h3> 
                </div>
                <?php
                if (!empty($list_product)) {
                    ?>
                    <p class="num-product">Có tất cả (<?php echo count($list_product); ?>) sản phẩm hiện có trong hệ thống</p>
                    <div class="filter-wp fl-right">
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                
                            </form>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php
                            foreach ($list_product as $item) {
                                ?>
                                <li class="animated">
                                    <a href="<?php echo $item['detail']; ?>" title="" class="thumb text-center">
                                        <img class="animated" src="<?php echo $item['thumb']; ?>">
                                    </a>
                                    <a href="<?php echo $item['detail']; ?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                    <div class="price">
                                        <span class="new animated "><?php echo currency_format($item['price']); ?></span>

                                    </div>
                                    <div class="promo">
                                        <p> Cơ hội trúng 200 học bổng tổng trị giá đến 2 tỷ đồng.</p>
                                    </div>

                                </li>
                                <?php
                            }
                            ?>


                        </ul>
                    </div>
                </div>
                
            </div>
            <?php get_sidebar(); ?>
            <?php
        }
        ?>


        <!------>

    </div>
</div>
<?php get_footer(); ?>


