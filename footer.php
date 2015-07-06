</section>
<footer id="footer">
    <div>
        Power By WordPress&nbsp;&&nbsp;all-in</br>
        CopyRight © 2013 - 2015 舞影凌风 All Rights Reserved.
    </div>
</footer>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/nav.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/slideout.min.js"></script>
<script>
    var slideout = new Slideout({
        'panel': document.getElementById('panel'),
        'menu': document.getElementById('menu'),
        'padding': 256,
        'tolerance': 70
    });
    $("#responsive_menu").click(function(){
        slideout.toggle();
    });
    $(".responsive_header>span").click(function(){
        if(slideout.isOpen()){
            slideout.close();
        }else{
            location.href="<?php echo get_option('home'); ?>";
        }
    })
    window.onresize = function(){
        if(slideout.isOpen()){
            slideout.close();
        }
    }
</script>
<div class="back-to-top"></div>
<script type="text/javascript">
    $(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $(".back-to-top").fadeIn(800);
            } else {
                $(".back-to-top").fadeOut(800);
            }
        });
        $(".back-to-top").click(function () {
            $('body,html').animate({scrollTop: 0}, 600);
            return false;
        });
        $("#search_box>button").click(function () {
            startSearch();
        });

        //按Enter键进行搜索
        $(document).keypress(function(e){
            if(e.which == 13){
                startSearch();
            }
        });
        function trim(str) {
        　　     return str.replace(/(^\s*)|(\s*$)/g, "");
        }
        /**
         * 开始查询
         */
        function startSearch(){
            var key = $("#search_box>input").val();
            if (trim(key) != '') {
                location.href = '<?php bloginfo('url'); ?>/?s=' + trim(key);
            }
        }
    })
</script>
</main>
</body>
</html>
<!--
/**
 * 　　　　　　　　┏┓　　　┏┓
 * 　　　　　　　┏┛┻━━━┛┻┓
 * 　　　　　　　┃　　　　　　　┃ 　
 * 　　　　　　　┃　　　━　　　┃
 * 　　　　　　　┃　＞　　　＜　┃
 * 　　　　　　　┃　　　　　　　┃
 * 　　　　　　　┃...　⌒　...  ┃
 * 　　　　　　　┃　　　　　　　┃
 * 　　　　　　　┗━┓　　　┏━┛
 * 　　　　　　　　　┃　　　┃　Code is far away from bug with the animal protecting　　　　
 * 　　　　　　　　　┃　　　┃    神兽护体,代码无bug
 * 　　　　　　　　　┃　　　┃　　　　　　　　　　　
 * 　　　　　　　　　┃　　　┃  　　　　　　
 * 　　　　　　　　　┃　　　┃
 * 　　　　　　　　　┃　　　┃　　　　　　　　　　　
 * 　　　　　　　　　┃　　　┗━━━┓
 * 　　　　　　　　　┃　　　　　　　┣┓
 * 　　　　　　　　　┃　　　　　　　┏┛
 * 　　　　　　　　　┗┓┓┏━┳┓┏┛
 * 　　　　　　　　　　┃┫┫　┃┫┫
 * 　　　　　　　　　　┗┻┛　┗┻┛
 */
-->