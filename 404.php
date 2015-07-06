<?php get_header(); ?>
<link rel="stylesheet" type="text/css"  href="<?php bloginfo('template_directory'); ?>/css/page-404.css"/>
    <div class="content-wrap-left">
        <div class="content-box">
            <div class="page-404">
                <img src="<?php bloginfo('template_directory'); ?>/images/404.png"/>
                <h1>404 . Not Found</h1>
                <p>沒有找到你要的内容！</p>
                <a class="back-home" href="<?php bloginfo('url'); ?>">返回<?php bloginfo('name'); ?>首页</a>
            </div>
        </div>
    </div>
    <div class="content-wrap-right visible-sm">
        <div>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>