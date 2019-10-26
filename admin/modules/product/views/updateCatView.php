<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật danh mục sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="title">Tên danh mục</label>
                        <input type="text" name="title" id="title" value="<?php echo $product_cat['cat_title']; ?>">
                        <?php echo form_error('title'); ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        
                        <button type="submit" name="btn_update" id="btn_update">Cập nhật</button>
                        <?php echo form_notifi('update'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>

