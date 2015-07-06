/**
 * Created by pengwei on 14-8-17.
 */

$(function(){
    //下拉菜单
    $(".nav li").hover(function(){
        $(this).find(".sub-menu").toggle(500);
    },function(){
        $(this).find(".sub-menu").toggle(300);
    });
    $(".nav li .sub-menu li").hover(function(){
        $(this).parent().parent().css("background","#ED5F30");
    },function(){
        $(this).parent().parent().css("background","#FF6F3D");
    });
})
