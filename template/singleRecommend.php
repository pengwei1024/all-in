<?php
/**
 * Created by PhpStorm.
 * User: pengwei08
 * Date: 2015/8/11
 * Time: 19:25
 * 相关文章推荐
 */
?>
<style type="text/css">
    .related_about{
        border-bottom: 1px solid #ddd;
        margin-top: 30px;
    }
    .related_about span {
        border-bottom: 3px solid #32a5e7;
        color: #32a5e7;
        padding: 3px 10px;
        font-weight: bold;
        display: inline-block;
    }
    #tags_related{
        list-style-type: none;
        margin: 10px 0 10px 0;
    }
    #tags_related li a{
        color: #667ebd;
        line-height: 27px;
    }
</style>
<div class="related_about">
    <span>相关文章</span>
</div>
<ul id="tags_related">
    <?php
    global $post;
    $post_tags = wp_get_post_tags($post->ID);
    if ($post_tags) {
        foreach ($post_tags as $tag) {
            // 获取标签列表
            $tag_list[] .= $tag->term_id;
        }
        // 随机获取标签列表中的一个标签
        $post_tag = $tag_list[ mt_rand(0, count($tag_list) - 1) ];

        // 该方法使用 query_posts() 函数来调用相关文章，以下是参数列表
        $args = array(
            'tag__in' => array($post_tag),
            'category__not_in' => array(NULL),  // 不包括的分类ID
            'post__not_in' => array($post->ID),
            'showposts' => 6,                           // 显示相关文章数量
            'caller_get_posts' => 1
        );
        query_posts($args);

        if (have_posts()) {
            while (have_posts()) {
                the_post(); update_post_caches($posts); ?>
                <li><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                <?php
            }
        }
        else {
            echo '<li>暂无相关文章</li>';
        }
        wp_reset_query();
    }
    else {
        echo '<li>暂无相关文章</li>';
    }
    ?>
</ul>
