<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php if (is_single() || is_page() || is_archive() || is_search()) { ?><?php wp_title('', true); ?> - <?php }
        bloginfo('name'); ?><?php if (is_home()) { ?> - <?php bloginfo('description'); ?><?php } ?><?php if (is_paged()) { ?> - <?php printf(__('Page %1$s of %2$s', ''), intval(get_query_var('paged')), $wp_query->max_num_pages); ?><?php } ?></title>
    <?php if (is_home()) {
        $description = get_option('blog_description');
        $keywords = get_option('blog_keywords');
    }else if (is_single() || is_page()) {
        $description1 = $post->post_excerpt;
        $description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "…");
        $description = $description1 ? $description1 : $description2;
        $keywords = "";
        $tags = wp_get_post_tags($post->ID);
        foreach ($tags as $tag) {
            $keywords = $keywords . $tag->name . ", ";
        }
    }else if (is_category()) {
        $description = category_description();
        $current_category = single_cat_title("", false);
        $keywords = $current_category;
    }
    ?>
    <meta name="keywords" content="<?php echo trim($keywords) ?>"/>
    <meta name="description" content="<?php echo trim($description) ?>"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/phone.css"/>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/article-list.css"/>
    <?php wp_head(); ?>
    <!--百度统计-->
    <script>var _hmt=_hmt||[];(function(){var hm=document.createElement("script");hm.src="//hm.baidu.com/hm.js?9fae61f68debf50b1a31eefca8320005";var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(hm,s)})();</script>
</head>
<body>
<nav id="menu" class="visible-sm">
    <header>
        <?php
        wp_nav_menu(array(
            'theme_location'=>'header-menu',
            'container'=>'div',
            'fallback_cb' => 'wp_page_menu',
            'items_wrap'=>'<ul id="phone-nav">%3$s</ul>',
            'echo'=>true
        ));
        ?>
    </header>
</nav>
<main id="panel">
<?php get_template_part('./template/responsive_header'); ?>
<header id="header" class="hidden-sm">
    <div id="top-toolbar">
        <?php get_template_part('./template/header-top'); ?>
    </div>
    <div class="headerInner">
        <div class="logo">
            <a href="<?php echo get_option('home'); ?>">
                <img src="<?php bloginfo('template_directory'); ?>/images/logo-daodao.png"/>
            </a>
        </div>
        <h1 id="blog-name">
            <a href="<?php bloginfo('url'); ?>">
                <?php //bloginfo('name'); ?>
                <img src="<?php bloginfo('template_directory'); ?>/images/title.png"/>
            </a>
        </h1>
        <span id="motto">——&nbsp;<?php bloginfo('description'); ?></span>
        <?php
        wp_nav_menu(array(
            'theme_location'=>'header-menu',
            'container'=>'div',
            //'menu_class'=>'nav' ,
            //'menu_id'=>'nav' ,
            'fallback_cb' => 'wp_page_menu',
            'items_wrap'=>'<ul id="nav" class="nav">%3$s<div id="search_box"><input type="text"/><button></button></div></ul>',
            'echo'=>true
        ));
        ?>
    </div>
</header>
<section class="container">

