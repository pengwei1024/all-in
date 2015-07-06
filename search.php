<?php get_header(); ?>

    <div class="content-wrap-left">
        <div class="content-box">
            <h2 class="search"><?php echo $s.' 的搜索结果'; ?></h2>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('./template/article-item' ); ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="page-nav"><?php par_pageNav(9); ?></div>
        </div>
    </div>
    <div class="content-wrap-right">
        <div>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>