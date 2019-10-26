<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar();?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Thêm trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data" action="">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php set_value('title'); ?>">
                        <?php echo form_error('title'); ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="detail">Chi tiết trang</label>
                        <textarea name="detail" id="detail" class="ckeditor"><?php set_value('detail'); ?></textarea>
                        <?php echo form_error('detail'); ?>
                        
                        
                        <button type="submit" name="btn_add_page" id="btn_add_page">Thêm trang mới</button>
                        <?php echo form_notifi('add_page'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>