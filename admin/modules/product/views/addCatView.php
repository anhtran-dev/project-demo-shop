<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title">
                        <?php echo form_error('title'); ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        
                        <button type="submit" name="btn_add_cat" id="btn_add_cat">Thêm mới</button>
                        <?php echo form_notifi('add_cat'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>

