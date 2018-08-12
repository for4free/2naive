<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="description" content="电视直播 - tv.2naive.cn"/>
    <meta name="robots" content="nofollow">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>电视直播 - tv.2naive.cn</title>
    <link href="./css/daohang.css" type="text/css" rel="stylesheet" />
    <style type='text/css'>
        li{
            width:300px!important;
        }
        #meerkat-wrap,#sitemix_pr_footer_js{
            display:none!important;}
    </style>
    <script type="text/javascript" src="ckplayer/ckplayer.js"></script>
</head>
<body>

<div class="list">
    <?php
    $agent = $_SERVER['HTTP_USER_AGENT'];
    if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){
        echo " <li>
        <span class=\"icon\">P</span>
        <a href=\"http://2naive.cn\" target=\"_blank\" class=\"text\">
            <h2>视频搜索</h2>
            <h3>全网视频搜索观看</h3>
        </a>
    </li>
    ";
    }else{
        echo " <li>
        <span class=\"icon\">P</span>
        <a href=\"http://2naive.cn\" target=\"_blank\" class=\"text\">
            <h2>视频搜索</h2>
            <h3>全网视频搜索观看</h3>
        </a>
    </li>
    <li>
        <span class=\"icon\">Y</span>
        <a href=\"http://tb.2naive.cn/\" target=\"_blank\" class=\"text\">
            <h2>优惠券</h2>
            <h3>每日更新淘宝优惠券</h3>
        </a>
    </li>
    <li>
        <span class=\"icon\">Q</span>
        <a href=\"http://music.2naive.cn/\" target=\"_blank\" class=\"text\">
            <h2>音乐站</h2>
            <h3>全网音乐播放下载</h3>
        </a>
    </li>";
    }
    ?>
</div>
<?php
function encode_pass($tex,$key,$type="encode"){
    $chrArr=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
        'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
        '0','1','2','3','4','5','6','7','8','9');
    if($type=="decode"){
        if(strlen($tex)<14)return false;
        $verity_str=substr($tex, 0,8);
        $tex=substr($tex, 8);
        if($verity_str!=substr(md5($tex),0,8)){
            //完整性验证失败
            return false;
        }
    }
    $key_b=$type=="decode"?substr($tex,0,6):$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62].$chrArr[rand()%62];
    $rand_key=$key_b.$key;
    $rand_key=md5($rand_key);
    $tex=$type=="decode"?base64_decode(substr($tex, 6)):$tex;
    $texlen=strlen($tex);
    $reslutstr="";
    for($i=0;$i<$texlen;$i++){
        $reslutstr.=$tex{$i}^$rand_key{$i%32};
    }
    if($type!="decode"){
        $reslutstr=trim($key_b.base64_encode($reslutstr),"==");
        $reslutstr=substr(md5($reslutstr), 0,8).$reslutstr;
    }
    return $reslutstr;
}
$url = @$_GET['key']?$_GET['key']:'http://rotation.vod.zlive.cc/channel/1546.m3u8';
$url = 'http://60.199.188.6/HLS/WG_ETTV-N/index.m3u8';

$id = @$_GET['id']?$_GET['id']:'0';
?>
<div align="center"style="width:100%" >
    <?php
    if($id == 0){
        echo "<div class=\"video\" style=\"width:80%;height: 60%;\"></div>";
        echo "<script type=\"text/javascript\">
        var videoObject = {
            container: '.video',//“#”代表容器的ID，“.”或“”代表容器的class
            variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
            autoplay:true,//自动播放
            live:true,
            video:'$url'//视频地址
        };
        var player=new ckplayer(videoObject);
    </script>";
    }elseif ($id == 3){
        echo '<iframe src="./dsxw.html" style="width:80%;height: 60%;"  frameborder="no" border="0" ></iframe>';
    }else{
        echo "<div class=\"video\" style=\"width:80%;height: 60%;\"></div>";
        if($url=="http://cg01.hrtn.net:9090/live/dfws.m3u8"){
            $url=22635;
        }
        $url ="http://199.83.51.194/media/videos/mp4/".$url.".mp4";
        echo "<script type=\"text/javascript\">
        var videoObject = {
            container: '.video',//“#”代表容器的ID，“.”或“”代表容器的class
            variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
            autoplay:true,//自动播放
            video:'$url'//视频地址
        };
        var player=new ckplayer(videoObject);
    </script>";
    }
    ?>
    <iframe src="t.php" style="width: 80%" frameborder="no" border="0" ></iframe>
</div>

<div class="footer">觉得还可以，收藏起来以备不时之需</div>
<script type="text/javascript" src="./bdtj.js"></script>
</body>
