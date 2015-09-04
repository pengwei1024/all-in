<?php
/*
Template Name: friend-link
*/
?>
<?php get_header(); ?>
<div class="content" id="friends_link_page">
    <style type="text/css">
        #friends_link_page h2 {
            text-align: center;
            padding-top: 20px;
        }

        #friends_link_page ul li {
            display: inline-block;
            background: #F2F2F2;
            width: 23%;
            margin: 20px 5px 0;
            cursor: pointer;
            height: 100px;
            vertical-align: top;
        }

        #friends_link_page ul li:hover {
            background: #E6E6E6;
        }

        #friends_link_page ul li img.favicons {
            margin: 10px 5px 0 10px;
            position: relative;
            top: 3px;
        }

        #friends_link_page ul li a {
            font-weight: 800;
            color: #333;
        }

        #friends_link_page ul li .title {
            display: block;
            margin: 8px 10px;
            font-size: 10px;
        }

        .content-box {
            padding: 0 0 30px 30px;
        }

        .content-box a {
            color: #667ebd;
        }
    </style>
    <?php
    /**
     * 默认菜单样式
     * @param $theme
     * @param $name
     * @param null $walker
     */
    function nav_menu($theme, $name, $walker = null)
    {
        if ($walker == null) {
            $walker = new Custom_Walker_Nav_Menu();
        }
        $errorUrl = get_stylesheet_directory_uri() . "/images/default_favicons.png";
        wp_nav_menu(array(
            'theme_location' => $theme,
            'container' => 'div',
            'container_class' => 'content-box',
            'fallback_cb' => 'wp_page_menu',
            'items_wrap' => '<h2><strong>' . $name . '</strong></h2><ul>%3$s</ul>',
            'echo' => true,
            'before' => '<img class="favicons" onerror="this.src=\'' . $errorUrl . '\'"/>',
            'after' => '<span class="title">舞影凌风</span>',
            'walker' => $walker,
        ));
    }
    nav_menu('friend-link', '友情链接');
    nav_menu('blog_suggest', '推荐博客', new ignore_Walker_Nav_Menu());
    ?>
    <div class="content-box">
        <h2>
            <strong>推荐服务器</strong>
        </h2>
        <p style="margin-top: 20px;line-height: 28px;">
            有兴趣自己搭建自己服务器的推荐购买美团云。博主已使用一年多，性能靠谱，价钱也不算贵，客服比阿里云要好。<br/>
            <a href="https://mos.meituan.com/doc/about/knowus" target="_blank">了解美团云:https://mos.meituan.com/doc/about/knowus</a><br/>
            <a href="https://mos.meituan.com/r/70c0c4ae31"
               target="_blank">推荐购买链接:https://mos.meituan.com/r/70c0c4ae31</a>
        </p>

    </div>
    <?php comments_template(); ?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>
<script type="text/javascript">
    $(function () {
        $("#friends_link_page ul li").each(function () {
            var a = find($(this), "a");
            var url = a.attr("href");
            find($(this), ".favicons").attr('src', "http://www.google.com/s2/favicons?domain=" + url);
            find($(this), ".title").html(a.attr('title'));
            $(this).attr('title', a.attr('title'));
            $(this).click(function () {
                window.open(url)
            })
        })
        function find(parent, className) {
            return parent.find(className).eq(0);
        }
    })
</script>