<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
    <?php
    echo "<title>视频资源在线搜索</title>";
    flush();
    //获取源地址
 /*   function _url(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"http://tv.empire.net.cn/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,4);
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS,thanks);
        $contents = curl_exec( $ch );
        curl_close( $ch );
        return $contents;
    }
    $regex1="/tvlist.*?<div class=\"downdiv\">/ism";//内容正则
    if(preg_match_all($regex1,_url(), $matches)){
        $page_content0 = str_replace("\"><div class=\"downdiv\">", "", $matches[0][0]);
    }*/

    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./zxds.css" type="text/css" />
    <script src="./bdzz.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./search-form.css">
    <style>
        .search_box{width: 90%;margin:0 auto; max-width: 450px;border:0px solid #ccc; margin-top:10vh;}
        .search_fl{overflow:hidden;}
        .search_txt{background-color: transparent;color:#000;width:100%;border: 1px;border-style: solid; border-color:#000;height:30px;padding:2px 0 2px 5px;}
        .btn{background:#C3DAF9;border-color:#000;width:80px;height:30px;float:right;}
    </style>
    <link rel="stylesheet" type="text/css" href="./normalize.css" />
    <link rel="stylesheet" type="text/css" href="./default.css">
    <link rel="stylesheet" type="text/css" href="./search-form.css">
</head>
<body>
<header class="htmleaf-header">
    <h1>视 频 资 源 在 线 搜 索<span>2naive.cn - 资源搬运工</span></h1>
</header>
<?php
echo "<div class=\"search_box\">
    <form action=\"./search.html\" method=\"post\"  >
        <input type=\"hidden\" name=\"type\" value=\"1\" >
        <input type=\"hidden\" name=\"url\" value=\"$page_content0\" />
        <button  class=\"btn\" onclick=\"return frm_onsubmit();\">搜索</button>
        <div class=\"search_fl\">
            <input required=\"required\" type=\"text\" name=\"wd\" id=\"wd\" class=\"search_txt\" placeholder=\"搜索,从此开始...\">
       </div>
    </form>
</div>";

?>
<div style="width: 100%;text-align: center;position:fixed; /*or前面的是absolute就可以用*/ bottom: 0px; ">
    请耐心等待搜索结果<br>
    <p style="color: #FF0000">本站不存储任何资源,只提供查询服务 - <a style="color: #FFFFFF" href="mailto:mfeng123@live.cn">联系</a></p>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?6ce53f2478182524725633e27b314bcd";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</div>
</body>
</html>
