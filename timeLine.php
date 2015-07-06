<?php
/*
Template Name: time_line
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/timeline.css"/>
<div class="content">
    <iframe src="<?php bloginfo('template_directory'); ?>/template/Timeline/index.html" width="100%"
            height="700px" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowtransparency="yes">
    </iframe>
    <div id="comment">
        <?php comments_template(); ?>
    </div>
</div>
<?php get_footer(); ?>