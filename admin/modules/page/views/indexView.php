<?php get_header(); ?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">           
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Danh sách trang</h3>

                </div>
            </div>            
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><p>Tất cả <span class="count">(<?php echo count($list_page); ?>)</span> trang trong hệ thống</p> </li>

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
                                <option value="delete">Xóa</option>
                            </select>
                            <input type="submit" name="btn_action" value="Áp dụng">
                            <?php echo form_error('action'); ?>
                            <?php echo form_notifi('delete'); ?>
                            <div class="table-responsive">
                                <?php
                                if (!empty($list_page)) {
                                    ?>
                                    <table class="table list-table-wp">
                                        <thead>
                                            <tr>
                                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                                <td><span class="thead-text">STT</span></td>
                                                <td><span class="thead-text">Tiêu đề</span></td>

                                                <td><span class="thead-text">Người tạo</span></td>
                                                <td><span class="thead-text">Thời gian</span></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $temp = 0;
                                            foreach ($list_page as $page) {
                                                $temp ++;
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="checkItem[]" class="checkItem" value="<?php echo $page['page_id']; ?>"></td>
                                                    <td><span class="tbody-text"><?php echo $temp; ?></span></td>
                                                    <td class="clearfix">
                                                        <div class="tb-title fl-left">
                                                            <a href="" title=""><?php echo $page['page_title']; ?></a>
                                                        </div>
                                                        <ul class="list-operation fl-right">
                                                            <li><a href="<?php echo $page['update']; ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                                            <li><a href="<?php echo $page['delete']; ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </td>

                                                    <td><span class="tbody-text"><?php echo $creator_page['username'];?></span></td>
                                                    <td><span class="tbody-text"><?php echo date("d/m/Y",$page['created_date']);; ?></span></td>
                                                </tr
                                                <?php
                                            }
                                            ?>

                                        </tbody> 
                                    </table>
                                    <?php
                                } else {
                                    ?>
                                    <p> Dữ liệu rỗng </p>
                                    <?php
                                }
                                ?>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!--paging-->
            
            <!--end-->
        </div>
    </div>
</div>

<?php get_footer(); ?>
