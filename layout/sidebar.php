
<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                <li>
                    <a href="?mod=product&action=index&cat_id=1" title="">Điện thoại</a>

                </li>
                <li>
                    <a href="?mod=product&action=index&cat_id=2" title="">Laptop</a>
                </li>
                <li>
                    <a href="?mod=product&action=index&cat_id=3" title="">Phụ kiện</a>
                </li>

                <li>
                    <a href="?mod=product&action=index&cat_id=4" title="">Đồng hồ</a>
                </li>
                <li>
                    <a href="?mod=product&action=index&cat_id=5" title="">Tablet</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <?php 
            if($cat_id == 1){
                get_brand_menu('phone'); 
            }
            if($cat_id == 2){
                get_brand_menu('laptop'); 
            }
            if($cat_id == 4){
                get_brand_menu('watch'); 
            }
            if($cat_id == 5){
                get_brand_menu('tablet'); 
            }
            
            ?>
            <ul class="filter">
                <li class="title">Chọn mức giá: </li>
                <li>
                    <a href="" class="">Dưới 2 triệu</a>
                    <a href="">Từ 2 - 5 triệu</a>
                    <a href="">Từ 5 - 8 triệu</a>
                    <a href="">Từ 8 - 14 triệu</a>
                    <a href="">Trên 14 triệu</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>