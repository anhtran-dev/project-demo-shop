
<?php get_header(); ?>
<div id="main-content-wp" class="reg-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            
            <h3 id="index" class="">Thêm thành viên quản trị</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user'); ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div id="form-reg">
                        <form action="" method="POST">
                            <label for="fullname">Họ và tên</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Họ và tên" value="<?php echo set_value('fullname'); ?>">
                            <?php echo form_error('fullname'); ?>
                            <label for="username">Tên đăng nhập</label>
                            <input type="text" name="username" id="username" placeholder="username" value="<?php echo set_value('username') ?>">
                            <?php echo form_error('username'); ?>

                            <label for="password">Mật khẩu</label>
                            <input type="password" name="password" id="password" placeholder="password">
                            <?php echo form_error('password'); ?>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="email" value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email'); ?>



                            <input type="submit" name="btn_reg" id="btn_reg" value="Đăng kí">
                            <?php echo form_error('account'); ?>
                            <?php echo form_notifi('account'); ?>

                            <a href="?mod=users&controller=team&action=index" class="">Quay lại </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>>
</div>

<?php get_footer(); ?>