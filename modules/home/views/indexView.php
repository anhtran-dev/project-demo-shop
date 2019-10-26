<?php get_header(); ?>
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>

                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        foreach ($list_product_feature as $item) {
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
            <!--end-->
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $cat_phone['cat_title']; ?></h3>
                    <a href="<?php echo $cat_phone['see_all']; ?>" class="fl-right">Xem tất cả sản phẩm điện thoại</a>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        foreach ($list_product_phone as $item) {
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
            <!--end-->
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $cat_laptop['cat_title']; ?></h3>
                    <a href="<?php echo $cat_laptop['see_all']; ?>" class="see-all fl-right">Xem tất cả sản phẩm laptop</a>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        foreach ($list_product_laptop as $item) {
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
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $cat_tablet['cat_title']; ?></h3>
                    <a href="<?php echo $cat_tablet['see_all']; ?>" class="see-all fl-right">Xem tất cả sản phẩm tablet</a>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        foreach ($list_product_tablet as $item) {
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
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        <li>
                            <a href="?mod=product&action=index&cat_id=1" title="">Điện thoại</a>

                        </li>
                        <li>
                            <a href="?mod=product&action=index&cat_id=2" title="">Laptop</a>
                        </li>
                        <li>
                            <a href="?mod=product&action=index&cat_id=3" title="">Phụ kiện</a>
                        </li>

                        <li>
                            <a href="?mod=product&action=index&cat_id=4" title="">Đồng hồ</a>
                        </li>
                        <li>
                            <a href="?mod=product&action=index&cat_id=5" title="">Tablet</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        foreach ($list_product_selling as $item) {
                            ?>
                            <li class="clearfix">
                                <a href="<?php echo $item['detail']; ?>" title="" class="thumb fl-left">
                                    <img class="animated" src="<?php echo $item['thumb'] ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="<?php echo $item['detail']; ?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']); ?></span>
                                        <!--<span class="old">7.190.000đ</span>-->
                                    </div>

                                </div>
                            </li>
                            <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

