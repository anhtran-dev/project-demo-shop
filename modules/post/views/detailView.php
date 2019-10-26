<?php get_header();?>

<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        
        <div class="main-content">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title"><?php echo $post_detail['title']; ?></h3>
                </div>
                <div class="section-detail">
                    <span class="create-date"><?php echo date('d/m/Y',$post_detail['created_date']); ?></span>
                    <div class="detail">
                        <?php echo $post_detail['content']; ?>
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone-wp">
                        <div class="g-plusone" data-size="medium"></div>
                    </div>
                    <div class="fb-comments" id="fb-comment" data-href="" data-numposts="5"></div>
                </div>
            </div>
            <!--end-->
            <div class="section" id="list-related-wp">
                <div class="section-head clearfix">
                    <h5 class="titlerelate">Bài viết liên quan</h5>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        foreach($list_post_relate as $item){
                            ?>
                        <li class="fl-left">
                            <a href="<?php echo $item['detail']; ?>" title="" class="thumb">
                                <img src="<?php echo $item['thumb']; ?>" alt="">
                            </a>
                            <div class="info">
                                <a href="<?php echo $item['detail']; ?>" title="" class="title-post"><?php echo $item['title']; ?></a>
                                <span class="create-date"><?php echo date('d/m/Y',$item['created_date']); ?></span>
                                
                            </div>
                        </li>
                        <?php
                        }
                        ?>
                        
                        
                        
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php get_footer();?>

