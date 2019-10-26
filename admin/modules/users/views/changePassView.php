<?php get_header(); ?>
<div id="main-content-wp" class="change-pass-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            
            <h3 id="index" class="">Thay đổi mật khẩu</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user'); ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="old_pass">Mật khẩu cũ</label>
                        <input type="password" name="old_pass" id="old_pass">
                        <?php echo form_error('old_pass'); ?>
                        <label for="new_pass">Mật khẩu mới</label>
                        <input type="password" name="new_password" id="new_pass">
                        <?php echo form_error('new_password'); ?>
                        <label for="confirm_pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm_pass" id="confirm_pass">
                        <?php echo form_error('confirm_pass'); ?>
                        <button type="submit" name="btn_change_pass" id="btn_change_pass">Cập nhật</button>
                        <?php echo form_notifi('change_pass'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>>
</div>

<?php get_footer(); ?>