<?php get_header(); ?>
<div id="main-content-wp" class="cart-page">

    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <?php
            if (!empty($list_item_cart)) {
                ?>
                <div class="section-detail table-responsive">
                    <form method="POST" action="?mod=cart&action=update">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_item_cart as $item) {
                                    ?>
                                    <tr>
                                        <td><?php echo $item['code']; ?></td>
                                        <td>
                                            <a href="<?php echo $item['url_detail']; ?>" title="" class="thumb">
                                                <img src="<?php echo $item['thumb']; ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $item['url_detail']; ?>" title="" class="name-product"><?php echo $item['product_title']; ?></a>
                                        </td>
                                        <td class="price"><?php echo currency_format($item['price']); ?></td>
                                        <td>
                                            <input type="number" name="qty[<?php echo $item['id']; ?>]" min="1" max="5" value="<?php echo $item['qty']; ?>" class="num-order">
                                        </td>

                                        <td class="sub-total"><?php echo currency_format($item['sub_total']); ?></td>
                                        <td>
                                            <a href="<?php echo $item['delete']; ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p class="title-price fl-right">Tổng tiền: <span id="total-price"><?php echo currency_format($total); ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <input type="submit" name="btn_update_cart" title="" id="update-cart" value="Cập nhật giỏ hàng" />
                                                <a href="?mod=checkout&action=index" title="" id="order-now">Đặt hàng</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p>Nhấn vào <strong>"Cập nhật giỏ hàng"</strong> để cập nhật lại số lượng giỏ hàng</p>
                    <a href="?" title="" id="buy-more">Mua tiếp</a><br/>
                    <a href="?mod=cart&action=delete" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <p class="cart-empty">Không tồn tại sản phẩm trong giỏ hàng !!</p>
            <?php
        }
        ?>


    </div>
</div>
<?php get_footer(); ?>

