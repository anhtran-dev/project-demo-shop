<?php get_header(); ?>

<div id="main-content-wp" class="list-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Danh sách danh mục </h3>
                    <a href="?mod=post&controller=postCat&action=addCat" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <?php
            
            if (!empty($list_post_cat)) {
                ?>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>

                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tiêu đề</span></td>
                                        <td><span class="thead-text">Trạng thái</span></td>

                                        <td><span class="thead-text">Thời gian</span></td>
                                        <td><span class="thead-text">Thao tác</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $temp= 0;
                                    foreach ($list_post_cat as $post_cat) {
                                        $temp++;
                                        ?>
                                        <tr>

                                            <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                            <td class="clearfix">
                                                <div class="tb-title fl-left">
                                                    <a href="" title=""><?php echo $post_cat['title']; ?></a>
                                                </div> 
                                                <ul class="list-operation fl-right">
                                                    <li><a href="<?php echo $post_cat['update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                    <li><a href="<?php echo $post_cat['delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </td>

                                            <td><span class="tbody-text"><?php echo show_status($post_cat['status']); ?></span></td>
                                            <td><span class="tbody-text"><?php echo date("d/m/Y",$post_cat['created_date']); ?></td>
                                            <td><span class="tbody-text"><a href="<?php echo $post_cat['active']; ?>">Duyệt</a></span></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <p>Không có danh mục bài viết nào trong hệ thống!!</p>
                <?php
            }
            ?>

            <!--paging-->
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">

                </div>
            </div>
            <!--end-->
        </div>
    </div>
</div>
<?php get_footer(); ?>