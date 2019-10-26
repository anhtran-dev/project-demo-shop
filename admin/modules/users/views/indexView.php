<?php get_header(); ?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            
            <h3 id="index" class="">Thông tin tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php get_sidebar('user'); ?>
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    
                    <form method="POST">
                        <label for="display-name" >Tên hiển thị</label>
                        <input type="text" name="display-name" id="display-name" value="<?php echo $info_user['fullname']; ?>" readonly="readonly">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" value="<?php echo $info_user['username']; ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_user['email']; ?>" readonly="readonly">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $info_user['phone_number']; ?>" readonly="readonly">
                        <label for="address">Địa chỉ</label>
                        <textarea type="text" name="address" id="address" value="" readonly="readonly"><?php echo $info_user['address']; ?></textarea>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>