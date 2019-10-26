<?php get_header(); ?>

<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Danh sách danh mục</h3>
                    <a href="?mod=product&controller=productCat&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php
                    if (!empty($list_cat)) {
                        ?>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>

                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên danh mục sản phẩm</span></td>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp = 0;
                                    foreach ($list_cat as $item) {
                                        $temp ++;
                                        ?>
                                        <tr>

                                            <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $item['cat_title']; ?></a>
                                                </div> 
                                                <ul class="list-operation fl-right">
                                                    <li><a href="<?php echo $item['url_update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $item['url_delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>


                            </table>
                        </div>
                        <?php
                    } else {
                        ?>
                        <p>Không có dữ liệu danh mục sản phẩm</p>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">

                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
