<?php get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/single.css"/>
    <div class="content-box">
        <?php if(is_user_logged_in()){ ?>
            <a class="edit_btn" href="<?php bloginfo('url'); ?>/wp-admin/post.php?post=<?php
            echo get_the_ID() ?>&action=edit">编辑</a>
        <?php } ?>
        <article>
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                <?php setPostViews(get_the_ID()); ?>
                <h2 class="title"><?php the_title_attribute(); ?></h2>
                <div class="article-info">
                    <span>
                        阅读:&nbsp;<?php echo getPostViews(get_the_ID()); ?>
                    </span>
                    <a href="<?php the_permalink(); ?>#comment">
                        评论:&nbsp;<?php comments_number('0', '1', '%'); ?>
                    </a>
                    <span>日期:&nbsp;<?php the_time('Y-m-d'); ?></span>
                </div>
                <div class="article_content">
                    <?php the_content(); ?>
                </div>
                <div class="navigation">
                    <div><?php previous_post_link('%link','<b>上一篇:</b><span>%title</span>') ?></div>
                    <div><?php next_post_link('%link','<b>下一篇:</b><span>%title</span>') ?></div>
             </div>
            <?php get_template_part('./template/singleRecommend'); ?>
            <?php get_template_part('./template/share'); ?>
               <?php comments_template(); ?>
                </div>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </article>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>