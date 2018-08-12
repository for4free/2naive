<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <!--<script src="jsloading.js"> </script>-->
    <?php
    $tp = @$_GET['list'] ? $_GET['list'] : '0';
    $token = @$_GET['token'] ? $_GET['token'] : '0';
    $type = @$_GET['type'] ? $_GET['type'] : '1';
    $name = @$_GET['name'] ? $_GET['name'] : 'name';
    echo "<title>".$name." - 在线视频详情</title>";
    flush();
    ?>
    <meta name="keywords" content="视频资源搜索 -全球最大的在线电影资源网站" />
    <meta name="description" content="视频资源搜索 -全球最大的在线电影资源网站" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./zxds.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./search-form.css">
    <link rel="stylesheet" type="text/css" href="./search.css" />
    <script src="./bdzz.js"></script>
    <style>a:visited {color: #FF0000}  /* 已访问的链接 */</style>
</head>
<body>
<?php
flush();
echo "<div class=\"search_box\">
    <form action=\"./search.html\" method=\"post\"  >
        <input type=\"hidden\" name=\"type\" value=\"1\" >
        <input type=\"hidden\" name=\"url\" value=\"".$tp."\"> 
        <button  class=\"btn\" onclick=\"return frm_onsubmit();\">搜索</button>
        <div class=\"search_fl\">
            <input  type=\"text\"  name=\"wd\" id=\"wd\" class=\"search_txt\" onBlur=\"if(this.value==''){ this.value='".$name."';this.style.color='#000';}\" onFocus=\"if(this.value=='".$name."'){this.value='';this.style.color='';}\" value=\"".$name."\">
       </div>
    </form>
</div>
<div id=\"header\" class=\"status3xx\">
    <h2>\"".$name."\" 播放源</h2>
</div>";
flush();
?>
<div id="content" >
    <?php
    function _url($url,$t,$name){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT,5);
        curl_setopt( $ch, CURLOPT_HEADER, 0 );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS,thanks);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        $contents = curl_exec( $ch );
        curl_close( $ch );
        if($t == "1"){
            $page_content1 = str_replace("checked=\"\"", "", $contents);
            $page_content2 = str_replace("\"  />", "\">", $page_content1);
            $page_content31 = str_replace("<input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\"", "<input type=\"hidden\" name=\"checkbox\" value=\"checkbox\"", $page_content2);
            $page_content311 = str_replace("\">全选", "\">", $page_content31);
            $page_content32 = str_replace("<input type=\"button\" name=\"Submit\" value=\"复制链接\" class=\"copy1\"/>", "", $page_content311);
            $page_content33 = str_replace("<input class=\"copy2\" type=\"button\" name=\"Submit\" ", "<input class=\"copy2\" type=\"hidden\" name=\"Submit\" ", $page_content32);
            $page_content3 = str_replace("<input type=\"button\"", "<input type=\"hidden\"", $page_content33);
            $page_content4 = str_replace("<h3>播放类型", "<h3  align='center'>播放源", $page_content3);
            $page_content5 = str_replace("<li>", "<li style='white-space: nowrap;list-style-type:none;width:80%;line-height:10vh;height:10vh;background:#cfe7fa;border:0vw solid #cfe7fa;text-align: left;margin: 0 auto;margin-top: 6px;padding:0 0;font-size: 2.5vw;'>", $page_content4);
            $page_content6 = str_replace("</li>", "</span></a></li>", $page_content5);
            // $page_content7=preg_replace('^11111111111111111',"播放",$page_content6);
            $page_content7 = preg_replace('/([$])(.*?)([<"].*>)/','$1$3',$page_content6);
            $page_content8 = str_replace("$", " 播放", $page_content7);
            $page_content81 = str_replace("div>-", "div>", $page_content8);
            $page_content9 = str_replace("<h3>下载类型", "<h3 align='center'>数据源", $page_content81);
            $page_content101 = str_replace("<input type=\"checkbox\" name=\"copy_sel\" value=\"", "<span style='padding-left: 1.5vw;'><a  target=\"view_window\" href=\"./player/?type=21&name=".$name."&token=", $page_content9);
            $page_content111 = str_replace("备注：如有地址错误，请点击→ ", "", $page_content101);
            $page_content11 = str_replace("←向我们报错！我们将在第一时间处理！谢谢！", "", $page_content111);
            $page_content0 = str_replace("我要报错", "", $page_content11);
        }elseif($t == "11"){
            $page_content1 = str_replace("checked=\"\"", "", $contents);
            $page_content2 = str_replace("\"  />", "\">", $page_content1);
            $page_content31 = str_replace("<input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\" onclick=\"checkAll('copy_sel',this.checked)\">全选", "", $page_content2);
            $page_content3 = str_replace("<input type=\"button\" name=\"Submit\" value=\"直接复制链接\" onclick=\"copy('copy_sel')\" />", "", $page_content31);
            $page_content4 = str_replace("<h3>来源", "<h3  align='center'>播放源", $page_content3);
            $page_content5 = str_replace("<li>", "<li style='white-space: nowrap;list-style-type:none;width:80%;line-height:10vh;height:10vh;background:#cfe7fa;border:0vw solid #cfe7fa;text-align: left;margin: 0 auto;margin-top: 6px;padding:0 0;font-size: 2.5vw;'>", $page_content4);
            $page_content6 = str_replace("</li>", "</span></a></li>", $page_content5);
            // $page_content7=preg_replace('^11111111111111111',"播放",$page_content6);
            $page_content7 = preg_replace('/([$])(.*?)([<"].*>)/','$1$3',$page_content6);
            $page_content8 = str_replace("$", "播放", $page_content7);
            $page_content81 = str_replace("div>-", "div>", $page_content8);
            $page_content82 = str_replace("<font color=red>", "", $page_content81);
            $page_content9 = str_replace("<h3>下载类型", "<h3 align='center'>数据源", $page_content82);
            $page_content0 = str_replace("<input type=\"checkbox\" name=\"copy_sel\" value=\"", "<span style='padding-left: 1.5vw;'><a  target=\"view_window\" href=\"./player/?type=11&name=".$name."&token=", $page_content9);
        }elseif($t == "110"){
            $page_content1 = str_replace("checked=\"\"", "", $contents);
            $page_content2 = str_replace("\"  />", "\">", $page_content1);
            $page_content3 = str_replace("<input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\" onclick=\"checkAll('copy_sel',this.checked)\">全选", "", $page_content2);
            $page_content31 = str_replace("<input type=\"button\" name=\"Submit\" value=\"直接复制链接\" onclick=\"copy('copy_sel')\" />", "", $page_content3);
            $page_content4 = str_replace("<h3>播放类型", "<h3  align='center'>播放源", $page_content31);
            $page_content5 = str_replace("<li>", "<li style='white-space: nowrap;list-style-type:none;width:80%;line-height:10vh;height:10vh;background:#cfe7fa;border:0vw solid #cfe7fa;text-align: left;margin: 0 auto;margin-top: 6px;padding:0 0;font-size: 2.5vw;'>", $page_content4);
            $page_content6 = str_replace("</li>", "</span></a></li>", $page_content5);
            // $page_content7=preg_replace('^11111111111111111',"播放",$page_content6);
            $page_content7 = preg_replace('/([$])(.*?)([<"].*>)/','$1$3',$page_content6);
            $page_content8 = str_replace("$", "播放", $page_content7);
            $page_content81 = str_replace("div>-", "div>", $page_content8);
            $page_content9 = str_replace("<h3>下载类型", "<h3 align='center'>数据源", $page_content81);
            $page_content0 = str_replace("<input type=\"checkbox\" name=\"copy_sel\" value=\"", "<span style='padding-left: 1.5vw;'><a  target=\"view_window\" href=\"./player/?type=11&name=".$name."&token=", $page_content9);
        }elseif($t="2"){
            $page_content1 = str_replace("checked=\"\"", "", $contents);
            $page_content2 = str_replace("\"  />", "\">", $page_content1);
            $page_content3 = str_replace("<input type=\"checkbox\" name=\"checkbox\" value=\"checkbox\" onclick=\"checkAll('copy_sel',this.checked)\">全选", "", $page_content2);
            $page_content32 = str_replace("<input type=\"button\" name=\"Submit\" value=\"直接复制链接\" onclick=\"copy('copy_sel')\" />", "", $page_content3);
            $page_content33 = str_replace("<h3>来源：33uu</h3> ", "<h3  align='center'>播放源：互联网</h3>", $page_content32);
            $page_content4 = str_replace("<h3>播放类型", "<h3  align='center'>播放源", $page_content33);
            $page_content5 = str_replace("<li>", "<li style='white-space: nowrap;list-style-type:none;width:80%;line-height:10vh;height:10vh;background:#cfe7fa;border:0vw solid #cfe7fa;text-align: left;margin: 0 auto;margin-top: 6px;padding:0 0;font-size: 2.5vw;'>", $page_content4);
            $page_content6 = str_replace("</li>", "</span></a></li>", $page_content5);
            // $page_content7=preg_replace('^11111111111111111',"播放",$page_content6);
            $page_content7 = preg_replace('/([$])(.*?)([<"].*>)/','$1$3',$page_content6);
            $page_content8 = str_replace("$", "播放", $page_content7);
            $page_content0 = str_replace("<input type=\"checkbox\" name=\"copy_sel\" value=\"", "<span style='padding-left: 1.5vw;'><a  target=\"view_window\" href=\"./player/?type=22&name=".$name."&token=", $page_content8);
        }
        //$page_content1 = str_replace("<input type=\"checkbox\" name=\"copy_sel\" value", "<a target=\"_blank\" href", $page_content0);
        return $page_content0;
    }
    flush();
    if($type=="1"){
        $pageURL="http://zuidazy.net/?m=vod-detail-id-".$token;
        $regex1="/<strong>影片.*?<div class=\"foot\">/ism";//内容正则
    }else if($type == "2"){
        $pageURL="http://156zy.com/?m=vod-detail-id-".$token;
        $regex1="/<strong>复制.*?<div class=\"foot\">/ism";//内容正则
    }else if($type == "110"){
        $pageURL="http://www.yszydg.com/?m=vod-detail-id-".$token;
        $regex1="/<strong>影片.*?<div class=\"foot\">/ism";//内容正则
    }else if($type == "11"){
        $pageURL="http://www.131zy.com/?m=vod-detail-id-".$token;
        $regex1="/<strong>复制.*?<div class=\"foot\">/ism";//内容正则
    }
    if(preg_match_all($regex1,_url($pageURL,$type,$name), $matches)){
        echo $matches[0][0];
    }else{
        echo '视频源出现故障，正在修复，请刷新重试...';
    }
    flush();
    ?>
</div>
</div>
<?php include 'foot.html'?>
</body>
</html>

