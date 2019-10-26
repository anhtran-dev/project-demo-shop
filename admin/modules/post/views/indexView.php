<?php get_header(); ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Danh sách bài viết</h3>
                    <a href="?mod=post&controller=index&action=addPost" title="" id="add-new" class="fl-left">Thêm mới bài viết</a>
                </div>
            </div>
            <?php
            if (!empty($list_post)) {
                ?>
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                <li class="all"><a href="">Tất cả <span class="count">(<?php echo count($list_post); ?>)</span></a> |</li>
                                <li class="publish"><a href="">Đã đăng <span class="count">(<?php echo $num_post_active; ?>)</span></a> |</li>
                                <li class="pending"><a href="">Chờ xét duyệt <span class="count">(<?php echo $num_post_wait_approval; ?>)</span></a></li>
                                <li class="trash"><a href="">Thùng rác <span class="count">(0)</span></a></li>
                            </ul>
                            <form method="POST" class="form-s fl-right">
                                <input type="text" name="search" id="search">
                                <input type="submit" name="btn_search" value="Tìm kiếm">
                            </form>
                        </div>

                        <div class="actions">
                            <form method="POST" action="" class="form-actions">
                                <select name="actions">
                                    <option value="">Tác vụ</option>
                                    <option value="delete">Xóa bài viết</option>
                                    <option value="">Duyệt bài viết</option>
                                </select>
                                <input type="submit" name="btn_action" value="Áp dụng">
                                <?php echo form_error('action'); ?>
                                <?php echo form_notifi('delete'); ?>
                                <div class="table-responsive">
                                    <table class="table list-table-wp">
                                        <thead>
                                            <tr>
                                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                                <td><span class="thead-text">STT</span></td>
                                                <td><span class="thead-text">Tiêu đề</span></td>
                                                <td><span class="thead-text">Danh mục</span></td>
                                                <td><span class="thead-text">Trạng thái</span></td>
                                                <td><span class="thead-text">Người tạo</span></td>
                                                <td><span class="thead-text">Thời gian</span></td>
                                                <td><span class="thead-text">Thao tác</span></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $temp = $start;

                                            foreach ($list_post_by_page as $post) {
                                                $temp++;
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="checkItem" class="checkItem" value="<?php echo $post['id']; ?>"></td>
                                                    <td><span class="tbody-text"><?php echo $temp; ?></h3></span>
                                                    <td class="clearfix">
                                                        <div class="tb-title fl-left">
                                                            <a href="" title=""><?php echo $post['title']; ?></a>
                                                        </div>
                                                        <ul class="list-operation fl-right">
                                                            <li><a href="<?php echo $post['update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                            <li><a href="<?php echo $post['delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </td>
                                                    <td><span class="tbody-text"><?php
                                                            foreach ($info_cat as $cat) {
                                                                if ($cat['id'] == $post['post_cat_id']) {
                                                                    echo $cat['title'];
                                                                    break;
                                                                }
                                                            }
                                                            ?></span></td>

                                                    <td><span class="tbody-text"><?php echo show_status($post['status']); ?></span></td>
                                                    <td><span class="tbody-text"><?php echo 'Admin'; ?></span></td>
                                                    <td><span class="tbody-text"><?php echo date("d/m/Y", $post['created_date']); ?></span></td>
                                                    <td><span class="tbody-text"><a href="<?php echo $post['active']; ?>">Duyệt</a></span></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--paging-->
                <div class="section" id="paging-wp">
                    <div class="section-detail clearfix">
                        <?php echo get_paging($num_page, $page, "?mod=post&controller=index&action=index"); ?>

                    </div>
                </div>
                <!--end-->
                <?php
            } else {
                ?>
                <p>Không có dữ liệu bài viết trong hệ thống !!</p>
                <?php
            }
            ?>


        </div>
    </div>
</div>
<?php get_footer(); ?>


