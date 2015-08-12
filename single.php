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
                <h2><?php the_title_attribute(); ?></h2>
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
                    <div><?php previous_post_link('%link','上一篇:&nbsp;<span>%title</span>') ?></div>
                    <div><?php next_post_link('%link','下一篇:&nbsp;<span>%title</span>') ?></div>
                </div>
            <?php get_template_part('./template/singleRecommend'); ?>
                <!--分享框-->
                <div class="bdsharebuttonbox" style="margin: 10px 0;float: left">
                    <a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                <div class="comment_box" id="comment">
                    <?php comments_template(); ?>
                </div>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </article>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>