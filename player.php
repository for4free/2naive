<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <!--<script src="jsloading.js"> </script>-->
    <?php
        $type = @$_GET['type'] ? $_GET['type'] : '';
        $token = @$_GET['token'] ? $_GET['token'] : '';
        $name = @$_GET['name'] ? $_GET['name'] : 'name';
        $js = @$_GET['js'] ? $_GET['js'] : '0';
        echo "<title>".$name." - 在线视频播放</title>";
    ?>
    <meta name="keywords" content="视频资源搜索 -全球最大的在线电影资源网站" />
    <meta name="description" content="视频资源搜索 -全球最大的在线电影资源网站" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./zxds.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./search-form.css">
    <script src="./bdzz.js"></script>
    <script type="text/javascript" src="/tv/ckplayer/ckplayer.js"></script>
    <style>
        body{background:#000000;}
    </style>
</head>
<body>
<div id="contentP">
    <div style="z-index:100;text-align: left;position: fixed; margin-top:10vh;">
                    <img src="logo.png" width="120"></div>
<?php
    if($type=="1"){
        include 'tip.html';
        echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;backgroung:#000\">";
        echo "<video width=\"100%\" height=\"98%\" src=\"http://acm.gg/live.m3u8?token=";
        echo $token;
        echo "\" controls=\"controls\" autoplay  poster=\"tip.html\">您的浏览器不支持 video 标签。</video></div>"; 
    }elseif($type=="19"){
        include 'tip_tv.html';
        echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;backgroung:#000\">";
        echo "<video width=\"100%\" height=\"98%\" src=\"http://tll888.w56.youdns.net/migu.php?id=";
        echo $token;
        echo "\" controls=\"controls\" autoplay  poster=\"tip.html\">您的浏览器不支持 video 标签。</video></div>";
    }else if($type=="2"){
        echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;backgroung:#000\">";
        echo "<iframe src=\"http://zy.512wx.com".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
        include 'tip2.html';
    }
    else if($type=="21"){
        echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
        if((strstr($token,".sohu.com")||strstr($token,".letv.com")||strstr($token,".qq.com")||strstr($token,".youku.com")
            ||strstr($token,".le.com")||strstr($token,".iqiyi.com")||strstr($token,".mgtv.com")||strstr($token,".tudou.com"))){
            //$js = rand(1,4);
            echo '<div style="z-index:300;text-align: right;position: fixed; margin-top:5vh;">
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=0"><button type="button">线路一</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=1"><button type="button">线路二</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=2"><button type="button">线路三</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=3"><button type="button">线路四</button></a></div>';
            //$js = 2;
            if($js%4 == 0){
                //石头云
                echo "<iframe src=\"http://player.jidiaose.com/supapi/iframe.php?v=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
                //http://www.brklc.cn/jx.php?url=   蘑菇云备用
            }elseif($js%4 == 1){
                echo "<iframe src=\"http://api.baiyug.cn/vip/index.php?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
            }elseif($js%4 == 2){
                echo "<iframe src=\"http://jx.okokjx.com/okokjx/?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
            }else{
                echo "<iframe src=\"http://zuida-jiexi.com/zuidazy/ty.php?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
            }
        }else if(strstr($token,".mp4")||strstr($token,".flv")||strstr($token,".m3u8")){
            echo "<div class=\"video\" align='center' style=\"position:absolute;width:100%;height:100%;top:0;bottom:0;;backgroung:#000\"></div>";
            echo "<script type=\"text/javascript\">
        var videoObject = {
            container: '.video',//“#”代表容器的ID，“.”或“”代表容器的class
            variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
            autoplay:true,//自动播放
            live:true, 
            video:'$token'//视频地址 
        };
        var player=new ckplayer(videoObject);
    </script>";
        }
        else if(strstr($token,".torrent")){
            echo "<br><br><br><br><br><div id='btxz' style='color:#FF0000;'>请复制下面网址，并用BT下载工具(如迅雷)下载文件<br><br>".$token."<br><br><br>谢谢使用 2naive.cn</div>";
        }else{/*http://zuida-jiexi.com/zuidazy/ty.php?url=*/
            echo " <iframe src=\"".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
            include 'tip2.html';
        }
    }
    else if($type=="11"){
        echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
        if((strstr($token,".sohu.com")||strstr($token,".letv.com")||strstr($token,".qq.com")||strstr($token,".youku.com")
                ||strstr($token,".le.com")||strstr($token,".iqiyi.com")||strstr($token,".mgtv.com")||strstr($token,".tudou.com"))){
            //$js = rand(1,4);
            echo '<div style="z-index:300;text-align: right;position: fixed; margin-top:5vh;">
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=0"><button type="button">线路一</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=1"><button type="button">线路二</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=2"><button type="button">线路三</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=3"><button type="button">线路四</button></a></div>';
            //$js = 2;
            if($js%4 == 0){
                //石头云
                echo "<iframe src=\"http://player.jidiaose.com/supapi/iframe.php?v=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
                //http://www.brklc.cn/jx.php?url=   蘑菇云备用
            }elseif($js%4 == 1){
                echo "<iframe src=\"http://api.baiyug.cn/vip/index.php?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
            }elseif($js%4 == 2){
                echo "<iframe src=\"http://jx.okokjx.com/okokjx/?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
            }else{
                echo "<iframe src=\"http://zuida-jiexi.com/zuidazy/ty.php?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
                include 'tip2.html';
            }
        }elseif(strstr($token,".mp4")||strstr($token,".m3u8")||strstr($token,".flv")){
            include 'tip.html';
            echo "<div class=\"video\" align='center' style=\"position:absolute;width:100%;height:100%;top:0;bottom:0;;backgroung:#000\"></div>";
            echo "<script type=\"text/javascript\">
        var videoObject = {
            container: '.video',//“#”代表容器的ID，“.”或“”代表容器的class
            variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
            autoplay:true,//自动播放
            live:true, 
            video:'$token'//视频地址 
        };
        var player=new ckplayer(videoObject);
    </script>";
        }else{
            echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
            echo " <iframe src=\"".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
            include 'tip2.html';
        }
    }
    else if($type=="22"){
        if(strstr($token,".mp4")||strstr($token,".m3u8")||strstr($token,".flv")){
            //include 'tip2.html';
            echo "<div class=\"video\" align='center' style=\"position:absolute;width:100%;height:100%;top:0;bottom:0;;backgroung:#000\"></div>";
            echo "<script type=\"text/javascript\">
        var videoObject = {
            container: '.video',//“#”代表容器的ID，“.”或“”代表容器的class
            variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
            autoplay:true,//自动播放
            live:true,
            video:'$token'//视频地址
        };
        var player=new ckplayer(videoObject);
    </script>";
        }else{
            echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
            echo " <iframe src=\"".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
            include 'tip2.html';
        }
        }
    else if($type=="3"){
        //$js = rand(1,30);
        echo '<div style="z-index:300;text-align: right;position: fixed; margin-top:5vh;">
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=0"><button type="button">线路一</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=1"><button type="button">线路二</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=2"><button type="button">线路三</button></a>
            <a href="/player.html?type='.$type.'&name='.$name.'&token='.$token.'&js=3"><button type="button">线路四</button></a></div>';
        //$js = 2;
        if($js%4 == 0){
            //石头云
            echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
            echo " <iframe src=\"http://player.jidiaose.com/supapi/iframe.php?v=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
            include 'tip3.html';
            //http://www.brklc.cn/jx.php?url=   蘑菇云备用
        }elseif($js%4 == 1){
            echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
            echo " <iframe src=\"http://api.baiyug.cn/vip/index.php?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
            include 'tip3.html';
        }elseif($js%4 == 2){
            echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
            echo " <iframe src=\"http://jx.okokjx.com/okokjx/?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
            include 'tip3.html';
        }else{
            echo "<div align='center' style=\"position:absolute;width:100%;top:0;bottom:0;;backgroung:#000\">";
            echo "<iframe src=\"http://zuida-jiexi.com/zuidazy/ty.php?url=".$token." \"id=\"iframepage\" name=\"iframepage\" frameBorder=0 scrolling=no width=\"100%\" height=\"98%\"  ></iframe></div>";
            include 'tip3.html';
        }
       }
?>
</div>
<script>
    setTimeout(function(){document.getElementById("tip").style.display="none";},3000);
    //多久被隐藏，单位毫秒
    $("#objid",document.frames('iframepage').document)
    $(document.getElementById('hdnasbzrm').contentWindow.document.body).html()
</script>
</body>
</html>
