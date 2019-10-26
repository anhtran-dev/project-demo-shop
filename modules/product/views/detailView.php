<?php get_header(); ?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="main-content">
            <div class="wp-inner">
                <div class="section" id="detail-product-wp">
                    <h3 class="product-name"><?php echo $item['product_title']; ?></h3>
                    <div class="section-detail clearfix">

                        <div class="thumb-wp fl-left">
                            <a href="" title="" id="main-thumb">
                                <img id="" src="<?php echo $item['thumb']; ?>"/>
                            </a>
                            <div id="list-thumb">
                                <img id="" src="<?php echo $item['thumb']; ?>" />
                                </a>


                            </div>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="<?php echo $item['thumb']; ?>" alt="">
                        </div>
                        <div class="info fl-right">
                            <p class="price"><?php echo currency_format($item['price']); ?></p>
                            <div class="desc">
                                <h2>Thông số kĩ thuật</h2>
                                <?php echo $item['parameter']; ?>
                            </div>
                            <div class="num-product">
                                <span class="title">Sản phẩm: </span>
                                <?php
                                if ($item['qty'] > 0) {
                                    ?>
                                    <span class="status">Còn hàng</span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="status">Tạm hết hàng</span>
                                    <?php
                                }
                                ?>

                            </div>

                            <a href="<?php echo $item['add_cart']; ?>" title="Thêm giỏ hàng" class="buy_now">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                        <?php echo $item['product_detail']; ?>
                    </div>
                </div>
                <div class="section" id="same-category-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm tương tự</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            <?php
                            foreach ($list_product_same as $item) {
                                ?>
                                <li class="animated">
                                    <a href="<?php echo $item['detail']; ?>" title="" class="thumb">
                                        <img class="animated" src="<?php echo $item['thumb']; ?>">
                                    </a>
                                    <a href="<?php echo $item['detail']; ?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']); ?></span>

                                    </div>


                                </li>
                                <?php
                            }
                            ?>




                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
