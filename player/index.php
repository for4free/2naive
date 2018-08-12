<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="description" content="网络视频在线播放 - 2naive.cn"/>
    <meta name="robots" content="nofollow">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <?php
        $type = @$_GET['type'] ? $_GET['type'] : '';
        $token = @$_GET['token'] ? $_GET['token'] : '';
        $name = @$_GET['name'] ? $_GET['name'] : 'name';
        $js = @$_GET['js'] ? $_GET['js'] : '0';
        echo "<title>".$name." - 在线视频播放</title>";
    ?>
    <script type="text/javascript" src="ckplayer/ckplayer.js"></script>
    <link href="./css/daohang.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div align="center"style="width:100%" >
    <br>
    <?php
    if($token!=''){
        echo '<iframe scrolling="no" src="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js='.$js.'" style="width:80%;height: 60%;"  frameborder="no" border="0" ></iframe>';
         }else{
        echo "<div class=\"video\" style=\"width:80%;height: 50%;\"></div>";
        echo "<script type=\"text/javascript\">
        var videoObject = {
            container: '.video',//“#”代表容器的ID，“.”或“”代表容器的class
            variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
            autoplay:true,//自动播放
            live:true,
            video:'http://live-tx-hdl.huomaotv.cn/live/9gFWYZ24081.m3u8'//视频地址
        };
        var player=new ckplayer(videoObject);
    </script>";
    }
     ?>
        <!--<div align="center" class="changyan" id="SOHUCS" sid="<?php /*echo $token */?>"  style="width:80%;height:40%;"></div>-->
</div>


<script type="text/javascript" src="/bdtj.js"></script>
<!--<script type="text/javascript">
    (function(){
        var appid = 'cytqFot1a';
        var conf = 'prod_70eabcea2cea6779593d0d71b694888b';
        var width = window.innerWidth || document.documentElement.clientWidth;
        if (width < 960) {
            window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script
--><!--广告 mobile 顶部悬浮-->
<!--<script type="text/javascript">
    document.write('<a style="display:none!important" id="tanx-a-mm_51750280_39532463_176150095"></a>');
    tanx_s = document.createElement("script");
    tanx_s.type = "text/javascript";
    tanx_s.charset = "gbk";
    tanx_s.id = "tanx-s-mm_51750280_39532463_176150095";
    tanx_s.async = true;
    tanx_s.src = "http://p.tanx.com/ex?i=mm_51750280_39532463_176150095";
    tanx_h = document.getElementsByTagName("head")[0];
    if(tanx_h)tanx_h.insertBefore(tanx_s,tanx_h.firstChild);
</script>
<script type="text/javascript" src="/gg.js"></script>-->
    
</body>
