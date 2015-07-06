<?php
/**
 * Created by PhpStorm.
 * User: pengwei
 * Date: 2014/9/23
 * Time: 2:25
 */

/**
 * 获取站点友情链接
 * @return array
 */
function get_FriendLinks(){
    $linkStr=get_option("blog_friend_link");
    $pattern="#<friendlink.*url=[\"|\'](.*)[\"|\']>(.*)</friendlink>#iUs";
    preg_match_all($pattern,$linkStr,$res);
    $output=array();
    foreach($res[1] as $k=>$v){
        array_push($output,array('url'=>$res[1][$k],'name'=>$res[2][$k]));
    }
    return $output;
}

//<friendlink url="http://wei8888go.ecjtu.org/">舞影凌风</friendlink>

?>
<style type="text/css">
.links_list{
        padding: 10px 0;
    }
.links_list a{
    display: block;
    padding: 0 5px;
    line-height: 28px;
}
</style>
<div class="editorChoice content-box">
    <h4><strong>友情链接</strong></h4>
    <div class="links_list">
		<a href="http://blog.smalllever.com/" title="isayes" target="_blank">Isayes</a>
        <a href="http://ningdev.com" title="宁平平|NingDev" target="_blank">宁平平|NingDev</a>
        <a href="http://rightblog.sinaapp.com/" title="喻小右" target="_blank">喻小右</a>
        <a href="http://izsn.xyz" title="软件测试朱少宁" target="_blank">软件测试朱少宁</a>
        <a href="http://www.ecjtu.org" title="计算机紧急响应组" target="_blank">计算机紧急响应组</a>
        <a href="http://blog.csdn.net/luoshengyang" title="老罗的Android之旅" target="_blank">老罗的Android之旅</a>
        <a href="http://www.cnblogs.com/goodhacker/" title="Dock家园" target="_blank">Dock家园</a>
        <a href="http://drakeet.me/" title="drakeet" target="_blank">drakeet</a>
        <a href="http://fangjie.info/" title="方杰" target="_blank">方杰</a>
    </div>
</div>