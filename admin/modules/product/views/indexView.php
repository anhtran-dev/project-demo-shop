<?php get_header(); ?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Danh sách sản phẩm</h3>
                    <a href="?mod=product&controller=index&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="?mod=product&controller=index&action=index">Tất cả <span class="count">(<?php echo $num_product; ?>)</span> sản phẩm</a> </li>
<!--                            <li class="publish"><a href="">Đã đăng <span class="count">(51)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt<span class="count">(0)</span> </a></li>-->

                        </ul>
                        <form method="POST" class="form-s fl-right">
                            <input type="text" name="search" id="s">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                <!--<option value="1">Duyệt sản phẩm</option>-->
                                <option value="delete">Xóa sản phẩm</option>
                            </select>

                            <input type="submit" name="btn_action" value="Áp dụng">
                            <?php echo form_error('action'); ?>
                            <?php echo form_notifi('delete'); ?>
                            <?php
                            if (!empty($list_product)) {
                                ?>
                                <div class="table-responsive">
                                    <table class="table list-table-wp">
                                        <thead>
                                            <tr>
                                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                                <td><span class="thead-text">STT</span></td>
                                                <td><span class="thead-text">Mã sản phẩm</span></td>
                                                <td><span class="thead-text">Hình ảnh</span></td>
                                                <td><span class="thead-text">Tên sản phẩm</span></td>
                                                <td><span class="thead-text">Giá</span></td>
                                                <td><span class="thead-text">Số lượng</span></td>
                                                <td><span class="thead-text">Danh mục</span></td>
                                                <td><span class="thead-text">Thời gian</span></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $temp = $start;
                                            foreach ($list_product_by_page as $item) {
                                                $temp++;
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="checkItem" class="checkItem" value="<?php echo $item['id']; ?>"></td>
                                                    <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                                    <td><span class="tbody-text"><?php echo $item['code']; ?></h3></span>
                                                    <td>
                                                        <div class="tbody-thumb">
                                                            <img src="<?php echo $item['thumb']; ?>" alt="">
                                                        </div>
                                                    </td>
                                                    <td class="clearfix">
                                                        <div class="tb-title fl-left">
                                                            <a href="" title=""><?php echo $item['product_title']; ?></a>
                                                        </div>
                                                        <ul class="list-operation fl-right">
                                                            <li><a href="<?php echo $item['update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                            <li><a href="<?php echo $item['delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="tbody-text"><?php echo currency_format($item['price']); ?></span></td>
                                                    <td><span class="tbody-text"><?php echo $item['qty']; ?></span></td>
                                                    <td><span class="tbody-text"><?php
                                                            foreach ($info_cat as $cat) {
                                                                if ($cat['id'] == $item['cat_id']) {
                                                                    echo $cat['cat_title'];
                                                                    break;
                                                                }
                                                            }
                                                            ?></span></td>              
                                                    

                                                    <td><span class="tbody-text"><?php echo date("d/m/Y", $item['created_date']); ?></span></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>



                                        </tbody>

                                    </table>
                                </div>
                            </form>
                        </div>
                        <?php
                    } else {
                        ?>
                        <p>Không tồn tại dữ liệu sản phẩm !!</p>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">

                    <?php echo get_paging($num_page, $page, "?mod=product&action=index"); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>