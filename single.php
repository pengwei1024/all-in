<?php get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/single.css"/>
    <div class="content-wrap-left">
        <div class="content-box content article-item">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php setPostViews(get_the_ID()); ?>
                    <?php if(is_user_logged_in()){ ?>
                        <a class="edit_btn" style="float: right;margin-top: 10px"  href="<?php bloginfo('url'); ?>/wp-admin/post.php?post=<?php echo get_the_ID() ?>&action=edit">编辑</a>
                    <?php } ?>
                    <h2 style="position: relative;top: 20px"><?php the_title_attribute(); ?></h2>
                    <div class="article-info" style="margin-top: 30px">
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
                    <br/>
                    <div class="article_content">
                        <?php the_content(); ?>
                    </div>

                    <div class="navigation">
                        <div><?php previous_post_link('%link','上一篇:&nbsp;<span>%title</span>') ?></div>
                        <div><?php next_post_link('%link','下一篇:&nbsp;<span>%title</span>') ?></div>
                    </div>

                    <!--分享框-->
                    <div class="bdsharebuttonbox" style="margin: 10px 0;float: right">
                        <a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
                    <div class="comment_box" id="comment">
                        <?php comments_template(); ?>
                    </div>
                <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="content-wrap-right hidden-sm">
        <div>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>