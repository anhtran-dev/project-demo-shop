<?php get_header(); ?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="?mod=post&action=index" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-left">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Tin tức công nghệ</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php
                        foreach ($list_post as $item) {
                            ?>
                            <li class="clearfix">
                                <a href="<?php echo $item['detail']; ?>" title="" class="thumb fl-left">
                                    <img src="<?php echo $item['thumb']; ?>" alt="">
                                </a>
                                <div class="info fl-right">
                                    <a href="<?php echo $item['detail']; ?>" title="" class="title"><?php echo $item['title']; ?></a>
                                    <span class="create-date"><?php echo date('d/m/Y - h:m:s', $item['created_date']); ?></span>
                                    <p class="desc"><?php echo $item['post_desc']; ?></p>
                                </div>
                            </li>
                            <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">

                    <?php
                    if ($total_row > $num_per_page) {
                        echo get_paging($num_page, $page, "?mod=post&action=index");
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="sidebar fl-right">

            <div class="section" id="banner-wp">
                <div class="section-detail">

                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
