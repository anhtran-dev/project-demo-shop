<?php get_header();?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" id="title">
                        <?php echo form_error('title'); ?>
                        <label>Hình ảnh đại diện bài viết</label>
                        <div id="uploadFile">
                            <input type="file" name="thumb_title" id="">
                        </div>
                        <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug">
                        <label for="desc">Mô tả ngắn</label>
                        <input type="text" name="desc" id="desc">
                        <label for="detail">Nội dung bài viết</label>
                        <textarea name="detail" id="detail" class="ckeditor"></textarea>
                        <?php echo form_error('detail'); ?>
                        
                        
                        <label>Danh mục cha</label>
                        <select name="parent_cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php 
                            foreach ($list_post_cat as $item){
                                ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['title']; ?></option>
                            <?php
                            }
                            ?>
                            
                        </select>
                        <?php echo form_error('parent_cat'); ?>
                        <button type="submit" name="btn_add_post" id="btn_add_post">Thêm mới bài viết</button>
                        <?php echo form_notifi('add_post') ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
