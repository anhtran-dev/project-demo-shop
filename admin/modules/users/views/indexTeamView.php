<?php get_header(); ?>
<div id="main-content-wp" class="list-account-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Danh sách thành viên</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><p>Tất cả <span class="count">(<?php echo count($list_user); ?>)</span> thành viên quản trị</p> </li>
<!--                            <li class="publish"><a href="">Đã đăng <span class="count">(5)</span></a> |</li>
                            <li class="pending"><a href="">Chờ xét duyệt <span class="count">(5)</span></a></li>
                            <li class="trash"><a href="">Thùng rác <span class="count">(0)</span></a></li>-->
                        </ul>
                        <form method="POST" action="" class="form-s fl-right">
                            <input type="text" name="search_user" id="search_user">
                            <input type="submit" name="btn_search" value="Tìm kiếm">
                            <?php echo form_notifi('search'); ?>
                        </form>
                    </div>
                    <div class="actions">
                        <form method="POST" action="" class="form-actions">
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                
                                <option value="delete">Xóa</option>
                            </select>
                            <input type="submit" name="btn_action" value="Áp dụng">
                            <?php echo form_notifi('actions'); ?>
                            <?php echo form_notifi('check'); ?>
                            <?php echo form_notifi('delete'); ?>


                            <div class="table-responsive">

                                <table class="table list-table-wp">
                                    <thead>
                                        <tr>
                                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                            <td>STT</td>
                                            <td>ID</td>
                                            <td>Họ và tên</td>
                                            <td>Tên đăng nhập</td>
                                            <td>Email</td>

                                            <td>Thao tác</td>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $temp = 0;
                                        
                                        foreach ($list_user as $user) {
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="checkItem[]" id="check" value="<?php echo $user['user_id']; ?>"></td>
                                                <td><?php echo $temp++; ?></td>
                                                <td><?php echo $user['user_id']; ?></td>
                                                <td><?php echo $user['fullname']; ?></td>
                                                <td><?php echo $user['username']; ?></td>
                                                <td><?php echo $user['email']; ?></td>
                                                <td>
                                                    <a href="<?php echo $user['update_user']; ?>">Update |</a>
                                                    <a href="<?php echo $user['delete_user']; ?>">Delete </a>
                                                </td>
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
                    <?php echo get_paging($num_page, $page, "?mod=users&controller=team&action=index"); ?>
                </div>
            </div>
            <!--end-->
            <a href="?mod=users&controller=team&action=reg" class="add_user">Thêm tài khoản mới</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>

