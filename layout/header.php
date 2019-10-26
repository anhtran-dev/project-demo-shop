<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/animate.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/delete.js" type="text/javascript"></script>
        <script src="public/js/filter-product.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">

                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?" title="">Trang chủ</a>
                                    </li>

                                    <li>
                                        <a href="?mod=post&action=index" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?mod=page&action=index&id=1" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?mod=page&action=index&id=2" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?page=home" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="search" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" name="btn_search" id="btn_search">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0985.841.460</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?mod=cart&action=index" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            $num_order = $_SESSION['cart']['info']['num_order'];
                                            if ($num_order > 0) {
                                                echo $num_order;
                                            }
                                        }
                                        ?>
                                    </span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <a href="?mod=cart&action=index"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                        <span id="num">
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                $num_order = $_SESSION['cart']['info']['num_order'];
                                                if ($num_order > 0) {
                                                    echo $num_order;
                                                }
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span>
                                                <?php
                                                if (isset($_SESSION['cart'])) {
                                                    echo count($_SESSION['cart']['buy']);
                                                } else {
                                                    echo 0;
                                                }
                                                ?>
                                            </span>sản phẩm trong giỏ hàng</p>

                                        <ul class="list-cart">
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart']['buy'] as $item) {
                                                    ?>
                                                    <li class="clearfix">
                                                        <a href="" title="" class="thumb fl-left">
                                                            <img src="<?php echo $item['thumb']; ?>" alt="">
                                                        </a>
                                                        <div class="info fl-right">
                                                            <a href="<?php echo $item['url_detail']; ?>" title="" class="product-name"><?php echo $item['product_title']; ?></a>
                                                            <p class="price"><?php echo currency_format($item['price']); ?></p>
                                                            <p class="qty">Số lượng: <span><?php echo $item['qty']; ?></span></p>
                                                        </div>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>


                                        </ul>
                                        <?php
                                        if (!empty($_SESSION['cart'])) {
                                            ?>
                                            <div class="total-price clearfix">
                                                <p class="title fl-left">Tổng tiền :</p>
                                                <p class="price fl-right">
                                                    <?php echo currency_format($_SESSION['cart']['info']['total']); ?>
                                                </p>
                                            </div>
                                            <div class="action-cart clearfix">
                                                
                                                <a href="?mod=checkout&action=index" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>