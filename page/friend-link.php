<?php
/*
Template Name: friend-link
*/
?>
<?php get_header(); ?>
    <div class="content" id="friends_link_page">
        <style type="text/css">
            #friends_link_page h2{
                text-align: center;
                padding-top: 20px;
            }
            #friends_link_page ul li{
                display: inline-block;
                background: #F2F2F2;
                width: 23%;
                margin: 20px 5px 0;
                cursor: pointer;
                height: 100px;
                vertical-align:top;
            }
            #friends_link_page ul li:hover{
                background: #E6E6E6;
            }
            #friends_link_page ul li img.favicons{
                margin: 10px 5px 0 10px;
                position: relative;
                top: 3px;
            }
            #friends_link_page ul li a{
                font-weight: 800;
                color: #333;
            }
            #friends_link_page ul li .title{
                display: block;
                margin: 8px 10px;
                font-size: 10px;
            }
            .content-box{
                padding:0 0 30px 30px;
            }
        </style>
        <?php
        wp_nav_menu(array(
            'theme_location'=>'friend-link',
            'container'=>'div',
            'container_class'=>'content-box',
            'fallback_cb' => 'wp_page_menu',
            'items_wrap'=>'<h2><strong>友情链接</strong></h2><ul>%3$s</ul>',
            'echo'=>true,
            'before'=>'<img class="favicons" src="http://www.google.com/s2/favicons?domain=www.apkfuns.com"/>' ,
            'after'=>'<span class="title">舞影凌风</span>',
            'walker'=>new Custom_Walker_Nav_Menu(),
        ));
        ?>
        <?php
        wp_nav_menu(array(
            'theme_location'=>'blog_suggest',
            'container'=>'div',
            'container_class'=>'content-box',
            'fallback_cb' => 'wp_page_menu',
            'items_wrap'=>'<h2><strong>推荐博客</strong></h2><ul>%3$s</ul>',
            'echo'=>true,
            'before'=>'<img class="favicons" src="http://www.google.com/s2/favicons?domain=www.apkfuns.com"/>' ,
            'after'=>'<span class="title">舞影凌风</span>',
            'walker'=>new ignore_Walker_Nav_Menu(),
        ));
        ?>
        <?php comments_template(); ?>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>
<script type="text/javascript">
    $(function(){
        $("#friends_link_page ul li").each(function(){
            var a = find($(this),"a");
            var url = a.attr("href");
            find($(this),".favicons").attr('src',"http://www.google.com/s2/favicons?domain="+url);
            find($(this),".title").html(a.attr('title'));
            $(this).attr('title',a.attr('title'));
            $(this).click(function(){
                window.open(url)
            })
        })
        function find(parent, className){
            return parent.find(className).eq(0);
        }
    })
</script>