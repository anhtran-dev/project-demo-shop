<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar();?>
        <div id="content" class="fl-right">      
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Chỉnh sửa thông tin trang</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data" action="">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title" value="<?php echo $page['page_title']; ?>">
                        <?php echo form_error('title'); ?>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="detail">Chi tiết trang</label>
                        <textarea name="detail" id="detail" class="ckeditor"><?php echo $page['page_content']; ?></textarea>
                        <?php echo form_error('detail'); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload_thumb">
                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn_upload_thumb">
                            <?php echo form_error('file'); ?>
                            
                            <?php echo form_notifi('upload_file'); ?>
                            <img src="<?php echo $upload_file; ?>">
                        </div>
                        <button type="submit" name="btn_update" id="btn_add_page">Cập nhật</button>
                        <?php echo form_notifi('update'); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
