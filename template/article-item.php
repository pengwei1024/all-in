<?php //文章列表Item ?>

<img src="<?php bloginfo('template_directory'); ?>/images/newsLine.gif" style="width: 100%"/>
<div class="article-item">
    <h2><a href="<?php the_permalink() ?>"><?php the_title_attribute(); ?></a></h2>

    <div class="article-info">
        <div class="float-left">
            <?php the_category(', '); ?>
            &nbsp;|&nbsp;<?php the_time('Y年m月d日'); ?>
            &nbsp;|&nbsp;<?php the_tags('<span class="tag">', ', ', '</span>'); ?></div>
        <div class="float-right">
            <em class="article-page-view">
                <?php echo getPostViews(get_the_ID()); ?>
            </em>
            <a href="<?php the_permalink(); ?>#comment" class="article-comment" target="_blank">
                <?php comments_number('0', '1', '%'); ?>
            </a>
            <a href="http://v.t.sina.com.cn/share/share.php?url=<?php
            the_permalink(); ?>&appkey=1874498659&title=<?php
            echo  mb_strimwidth(strip_tags(apply_filters('the_content',
               $post->post_content)), 0, 200, "…");?> ——来自@<?php bloginfo('name'); ?>"
               target="_blank" class="article-share hidden-sm">分享</a>
        </div>
    </div>
    <?php
    $fmimg = get_post_meta($post->ID, "fmimg_value", true);
    $cti = catch_that_image();
    if($fmimg) {
        $showimg = str_replace("ecjtu.org","apkfuns.com",$fmimg);
    } else {
        $showimg = $cti;
    };
    ?>
    <img src="<?php echo trim($showimg); ?>" class="article_thumbnail img-responsive" title="<?php the_title_attribute(); ?>"
        alt="<?php the_title_attribute(); ?>"/>

    <div class="article-description">
        <?php echo trim(mb_strimwidth(strip_tags(apply_filters('the_content',
            $post->post_content)), 0, 200, "……")) ?>&nbsp;&nbsp;&nbsp;
        <a href="<?php the_permalink() ?>" class="read_article">全文></a>
    </div>

</div>

