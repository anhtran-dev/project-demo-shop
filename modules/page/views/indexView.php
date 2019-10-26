<?php get_header();?>
<div id="main-content-wp" class="page">
    <div class="wp-inner">
        <div id="content">
            <div class="section-head">
                <h1 class="title"><?php echo $page['page_title']; ?></h1>
            </div>
            <div class="section-detail">
                <?php echo $page['page_content']; ?>
            </div>
        </div>
        </div>
    </div>
</div>
<?php get_footer();?>