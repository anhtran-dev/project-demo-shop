<?php get_header(); ?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm mới</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form action="?mod=product&action=add" method="POST" enctype="multipart/form-data">
                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_name" id="product-name" value="<?php echo set_value('product_name'); ?>">
                        <?php echo form_error('product_name'); ?>
                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="product_code" id="product-code" value="<?php echo set_value('product_code'); ?>">
                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php echo set_value('price'); ?>">
                        <?php echo form_error('price'); ?>
                        <label for="qty">Nhập số lượng sản phẩm</label>
                        <input type="text" name="product_qty" id="qty" value="<?php echo set_value('product_qty'); ?>">
                        <?php echo form_error('qty'); ?>
                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="desc" id="desc"><?php echo set_value('desc'); ?></textarea>
                        <label for="detail">Chi tiết</label>
                        <textarea name="detail" id="detail" class="ckeditor"><?php echo set_value('detail'); ?></textarea>
                        <?php echo form_error('detail'); ?>
                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="thumb_product" id="upload-thumb">
<!--                            <input type="submit" name="btn_upload_thumb" value="Upload" id="btn-upload-thumb">-->
                            <?php echo form_notifi('upload_file'); ?>
                            <?php
                            if (!empty($upload_thumb)) {
                                ?>
                                <img src="<?php echo $upload_thumb; ?>">
                                <?php
                            }
                            ?>

                        </div>
                        <label>Danh mục sản phẩm</label>
                        <select name="parent_cat">
                            <option value="">-- Chọn danh mục --</option>
                            <?php
                            foreach ($list_cat as $item) {
                                ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['cat_title']; ?></option>
                                <?php
                            }
                            ?>


                        </select>
                        <?php echo form_error('parent_cat'); ?>
                        <button type="submit" name="btn_add_product" id="btn_add_product">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

