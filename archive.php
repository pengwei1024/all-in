<?php get_header(); ?>

    <div class="content-wrap-left">
        <div class="content-box">
            <h2 class="search"><?php single_cat_title(); ?></h2>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('./template/article-item' ); ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="page-nav"><?php par_pageNav(9); ?></div>
        </div>
    </div>
    <div class="content-wrap-right hidden-sm">
        <div>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>