<?php get_header(); ?>
<div id="main-content-wp" class="update-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            
            <h3 id="index" class="">Cập nhật thông tin tài khoản quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
       <?php get_sidebar('user'); ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="fullname">Tên hiển thị</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo $info_user['fullname']; ?>">
                        <?php echo form_error('fullname') ?>
                        <label for="phone_number">Số điện thoại</label>
                        <input type="tel" name="phone_number" id="phone_number" value="<?php echo $info_user['phone_number']; ?>">
                        <?php echo form_error('phone_number') ?>
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $info_user['address']; ?></textarea>
                        <?php echo form_error('address') ?>
                        <button type="submit" name="btn_update_user" id="btn_update_user">Cập nhật</button>
                        <?php echo form_notifi('update') ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>