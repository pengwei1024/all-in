<?php
/*
Template Name: about_page
*/
?>
<?php get_header(); ?>
    <div class="content-wrap-left">
        <div class="content-box" style="padding: 15px">
            <style type="text/css">
                div.blog_about_title{
                    color: #080;
                    font-weight:bold;
                    font-size:15px;
                }
                div.blog_about_content{
                    margin:10px 0 0 20px;
                }
                div.blog_about_content p{
                    text-indent:1em;
                    line-height:25px;
                }
                div.blog_about_content div{
                    margin:5px 0;
                }
            </style>
            <div class="blog_about_title">
                <img src="<?php bloginfo('template_directory'); ?>/images/circled.jpg"/>关于博主</div>
            <div class="blog_about_content">
                <p>博主是华东交通大学软件工程一名大四的学生，关注并热爱着互联网，熟悉Android开发和Web编程。
                    文采不佳，不擅长表达，不喜欢聚光灯，不喜欢吹牛，不喜欢无序的做事方式，希望在互联网领域赢得自己的精彩，
                    建立博客的目的是为了分享生活和一些个人技术的经验。</p>
                <p>在此向华东交大的学弟学妹推荐<a href="http://hr.ecjtu.org/hr/" target="_black">
                        计算机紧急响应组（CERT）</a>，交大实力最强的IT技术社团欢迎你的加入。<img src="http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/0b/tootha_thumb.gif"/></p>
                <img src="<?php bloginfo('template_directory'); ?>/images/cert-wangjian.png"/>
            </div>
            <div class="blog_about_title" style="margin:50px 0 0 0;">
                <img src="<?php bloginfo('template_directory'); ?>/images/circled.jpg"/>
                关于信仰</div>
            <div class="blog_about_content  poetry">
                <style type="text/css">
                    .poetry p{
                        text-align:center;
                    }
                </style>
                <p>我不去想是否能够成功,</p>
                <p>既然选择了远方,</p>
                <p>便只顾风雨兼程. </p>
                <p>&nbsp;</p>
                <p>我不去想能否赢得爱情,</p>
                <p>既然钟情于玫瑰 ,</p>
                <p>就勇敢地吐露真诚.</p>
                <p>&nbsp;</p>
                <p>我不去想身后会不会袭来寒风冷雨, </p>
                <p>既然目标是地平线,</p>
                <p>留给世界的只能是背影.</p>
                <p>&nbsp;</p>
                <p>我不去想未来是平坦还是泥泞, </p>
                <p>只要热爱生命,</p>
                <p>一切，都在意料之中.</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>

            </div>

            <div class="blog_about_title">
                <img src="<?php bloginfo('template_directory'); ?>/images/circled.jpg"/>
                联系方式</div>
            <div class="blog_about_content">
                <div>Email ：<a href='http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=pengwei1024@gmail.com' target="_black">pengwei1024@gmail.com</a></div>
                <div>github ：<a href='https://github.com/pengwei1024' target="_black">https://github.com/pengwei1024</a></div>
                <div>QQ :<a href="http://wpa.qq.com/msgrd?v=3&uin=495610489&site=pw.ecjtu.org&menu=yes" target="_black">
                        <img src='<?php bloginfo('template_directory'); ?>/images/contacts.gif'/></a> </div>
            </div>

            <div id="comment">
                <?php comments_template(); ?>
            </div>
        </div>
    </div>
    <div class="content-wrap-right hidden-sm">
        <div>
            <?php get_sidebar(); ?>
        </div>
    </div>
    <div class="clear"></div>
<?php get_footer(); ?>