<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <!--<script src="jsloading.js"> </script>-->
    <meta name="keywords" content="视频资源搜索 -全球最大的在线电影资源网站" />
    <meta name="description" content="视频资源搜索 -全球最大的在线电影资源网站" />
    <?php
    //接收POST
    $tp = @$_POST['type'] ? $_POST['type'] : '1';
    $WD = @$_POST['wd'] ? $_POST['wd'] : '请在上方输入视频名称';
    $WD_ys = $WD;
    function isMobile(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB")
            || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS") || strpos($agent,"iPad")){
            return true;
        }else{
            return false;
        }
    }
    if(isMobile()){
        echo '<script src="tb/style/clipboard.min.js"></script>';
    }
    //统计搜索信息
    function tj($WD_ys){
        require './conn.php';
        function getAd($ip=""){
            $res = @file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip);
            $jsonMatches = array();
            preg_match('#\{.+?(\{.+?\})\}#', $res, $jsonMatches);
            $json = json_decode($jsonMatches[1], true);
            return $json;
        }
        $user_IP = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
        $user_IP = ($user_IP) ? $user_IP : $_SERVER["REMOTE_ADDR"];
        $ip_ad = getAd($user_IP);
        reset($ip_ad);
        foreach ($ip_ad as $key=>$value)
        {
            if($key == "country"){
                $value1 = $value;
            }elseif($key == "region") {
                $value2 = $value;
            }elseif($key == "city") {
                $value3 = $value;
            }
        }
        $ip_ad_t = $value1." ".$value2." ".$value3;
        $time = date('H');
        mysql_query("INSERT INTO search (content,ip,ip_ad,date,date_time) VALUES ('$WD_ys','$user_IP','$ip_ad_t',NOW(),'$time')");
        mysql_close();
    }
    if ($WD=="请在上方输入视频名称") {
        header("Location: ./index_e.html");
        exit;
    }elseif($WD=="电视台"){
        tj($WD_ys);
        header("Location: http://tv.2naive.cn");
        exit;
    }elseif($WD=="优惠券"){
        tj($WD_ys);
        header("Location: http://tb.2naive.cn");
        exit;
    }elseif($WD=="最新视频"||$WD=="最近更新"){
        tj($WD_ys);
        header("Location: ./news.html");
        exit;
    }elseif(strstr($WD,"孟峰")){
        tj($WD_ys);
        header("Location: ./bye.html");
        exit;
    }
    //侵权删除代码 -- 2naive.cn
    /*if ($WD=="悟空传") {
        header("Location: ./bye.html");
        exit;
    }*/
    //判断是否为网址
    function is_url($str){
        return preg_match("/^[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\’:+!]*([^<>\"])*$/", $str);
    }
    if (is_url($WD)||preg_match('/(http:\/\/)|(https:\/\/)/i', $WD)) {
        tj($WD_ys);
        /*if(strstr($WD,"baidu.com")){
            header("Location: ./player.html?type=32&name=百度网盘视频&token=".$WD);
        }else{
            header("Location: ./player.html?type=3&name=网址视频&token=".$WD);
        }*/
        header("Location: ./player/?type=3&name=网址视频&token=".$WD);
        exit;
    }
    /*if (preg_match('/(http:\/\/)|(https:\/\/)/i', $WD)) {
        header("Location: ./player.php?type=3&name=网址视频&token=".$WD);
        exit;
    }*/
    echo "<title>".$WD." - 在线视频搜索</title>";
    flush();
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./zxds.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./search-form.css">
    <link rel="stylesheet" type="text/css" href="./search.css" />
    <style>a:visited {color: #FF0000}  /* 已访问的链接 */</style>
    <script src="./bdzz.js"></script>
</head>
<body>
<?php
flush();
/*if($tp=="2"){
//获取源地址   电视台搜索暂时取消
    function _url(){
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_TIMEOUT,3);
         curl_setopt($ch, CURLOPT_URL,"http://tv.empire.net.cn/");
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt( $ch, CURLOPT_HEADER, 0 );
         curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
         curl_setopt( $ch, CURLOPT_POSTFIELDS,thanks);
         $contents = curl_exec( $ch );
         curl_close( $ch );
         return $contents;
     }
     $regex1="/tvlist.*?<div class=\"downdiv\">/ism";//内容正则
     if(preg_match_all($regex1,_url(), $matches)){
         $URL = str_replace("\"><div class=\"downdiv\">", "", $matches[0][0]);
     }
 }elseif($tp=="1"){
     $URL = @$_POST['url'] ? $_POST['url'] : '';
 }*/
if(isMobile()){
    require_once 'tb/curl.php';
    echo "<div class=\"search_box\">
    <form action=\"./search.html\" method=\"post\"  >
        <input type=\"hidden\" name=\"type\" value=\"2\" >
        <button   id=\"btn\" class=\"btn\"  data-clipboard-text=\"qoB2hg752s\" onclick=\"return frm_onsubmit();\">搜索</button>
        <div class=\"search_fl\">
            <input  type=\"text\"  name=\"wd\" id=\"wd\" class=\"search_txt\" onBlur=\"if(this.value==''){ this.value='".$WD."';this.style.color='#000';}\" onFocus=\"if(this.value=='".$WD."'){this.value='';this.style.color='';}\" value=\"".$WD."\">
        </div>
    </form> 
</div>";}  //Gettkl($tkl)
else{
    echo "<div class=\"search_box\">
    <form action=\"./search.html\" method=\"post\"  >
        <input type=\"hidden\" name=\"type\" value=\"2\" >
        <button  class=\"btn\"  onclick=\"return frm_onsubmit();\">搜索</button>
        <div class=\"search_fl\">
            <input  type=\"text\"  name=\"wd\" id=\"wd\" class=\"search_txt\" onBlur=\"if(this.value==''){ this.value='".$WD."';this.style.color='#000';}\" onFocus=\"if(this.value=='".$WD."'){this.value='';this.style.color='';}\" value=\"".$WD."\">
        </div>
    </form>
</div>";
}
flush();
?>

<div id="content" class="xing_vb">
    <?php
    //Video
    /**
     * 发送post请求
     */
    flush();
    //为了方便用户  暂时替换搜索词
   /*if(strstr($WD,"卑鄙的我")||strstr($WD,"小黄人")){
        $WD = str_replace( "卑鄙的我", "神偷奶爸", $WD);
        $WD = str_replace( "小黄人", "神偷奶爸", $WD);
    }*/
    flush();
    $flag1 = "0"; //最大资源 zuidazy.com   //分类播放
    $flag11 = "0"; //131资源 //直接网址播放    http://www.131zy.com/
    $flag2 = "0";//TV数据 TV.txt
    $flag3 = "0";//33uudy.com   //特定网址播放
    //$flag4 = "0";//备用   131zy.com    www.cziyuan.cc      m.968sg.cn  类型11  diaosizy.com 类型11  http://www.caijizy.com/   yszydg.com 类型11
    //http://www.yunboziyuan.com/ R级资源 类型11
    function postData($data,$url,$type,$md5,$name){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT,5);  //5秒超时
        curl_setopt($ch,CURLOPT_URL,$url."index.php?m=vod-search");
        curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        //curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
        curl_setopt($ch, CURLOPT_COOKIEJAR, $GLOBALS['cookie_file']); // 存放Cookie信息的文件名称
        curl_setopt($ch, CURLOPT_COOKIEFILE,$GLOBALS ['cookie_file']); // 读取上面所储存的Cookie信息
        curl_setopt($ch, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
        curl_setopt($ch,CURLOPT_AUTOREFERER,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $return0 = curl_exec($ch);
        if(curl_errno($ch)){
            echo curl_error($ch);
        }
        $return1 = str_replace("<span class=\"xing_vb4\"><a href=\"/?m=vod-detail-id-", "<span class=\"xing_vb4\"><a  href=\"/item.html?type=".$type."&name=".$name."&list=".$md5."&token=", $return0);
        $return2 = str_replace("target=\"_blank\"", "", $return1);
        $return3 = str_replace("<span>当前位置</span>", "", $return2);
        $return4 = str_replace("» ", "在线视频", $return3);
        $return5 = str_replace("<li><span class=\"xing_vb1\">影片名称</span><span class=\"xing_vb2\">影片类别</span><span class=\"xing_vb3\">更新时间</span></li>", "", $return4);
        $return6 = str_replace("<ul> </ul>", "", $return5);
        $return7 = str_replace("[email&#160;protected]</a><script data-cfhash='f9e31' type=\"text/javascript\">", "", $return6);
        curl_close($ch);
        return $return7;
    }
    //echo postData("wd=".$WD);
    echo "<div class=\"";
    $regex1="/container.*?both;\">/ism";//内容正则
    flush();
    //最大资源网  类型标识 1
    if($tp!="190"&&preg_match_all($regex1,postData("wd=".$WD,"http://zuidazy.net/","1",$URL,$WD), $matches)){
        //echo $matches[0][0];
        $st = "<span class=\"\">&nbsp;0&nbsp;</span>条</dd>";
        $st2 = $matches[0][0];
        $pos = strstr($st2, $st);
        if($pos!=""){
            //echo "\"><div id=\"header\" class=\"status3xx\"><h2>在线视频搜索结果</h2></div>";
            //echo "没有搜索结果";
            $flag1 = "0";
        }elseif($pos==""&&$flag2=="0"){
            echo "\"><div id=\"header\" class=\"status3xx\"><h2>\"".$WD."\" 视频搜索结果</h2></div><div class=\"";
            $flag1 = "1";
            echo  $st2;
            echo "</ul>";
        }
    }elseif($tp!="190"){
        echo "\"><div id=\"header\" class=\"status3xx\"><h2>\"".$WD."\" 视频搜索结果</h2></div>";
        echo '视频源 1 出现故障，正在修复，请刷新重试...<br>';
        $flag1 = "1";
    }
    flush();
    //33uu资源   类型标识 2  http://www.156zy.com/
    //echo postData("wd=".$WD,"https://33uuzy.com/","2",$URL,$WD);
    if($tp!="190"&&preg_match_all($regex1,postData("wd=".$WD,"http://www.156zy.com/","2",$URL,$WD), $matches)){
        //echo $matches[0][0];
        $st = "<span class=\"\">&nbsp;0&nbsp;</span>条</dd>";
        $st2 = $matches[0][0];
        $pos = strstr($st2, $st);
        if($pos!=""){
            //echo "\"><div id=\"header\" class=\"status3xx\"><h2>在线视频搜索结果</h2></div>";
            //echo "没有搜索结果";
            $flag3= "0";
        }elseif($pos==""&&$flag1=="0"){
            echo "\"><div id=\"header\" class=\"status3xx\"><h2>\"".$WD."\" 视频搜索结果</h2></div><div class=\"";
            $flag3 = "1";
            echo  $st2;
            echo "</ul>";
        }elseif($pos==""&&$flag1=="1"&&$flag2=="0"){
            echo "<div class=\"";
            $flag3 = "1";
            echo  $st2;
            echo "</ul>";
        }
    }elseif($tp!="190"){
        echo '视频源 2 出现故障，正在修复，请刷新重试...<br>';
    }
    flush();
    //diaosi资源   类型标识 11
    /*$js = rand(1,2);
    if($js%2 == 0){
        $urlpost = "http://www.yszydg.com/"; //110
        $typepost = 110;
    }else{
        $urlpost = "http://www.yszydg.com/"; //110
        $typepost = 110;
    }*/
    if($tp!="190"&&preg_match_all($regex1,postData("wd=".$WD,"http://www.yszydg.com/","110",$URL,$WD), $matches)){
        //echo $matches[0][0];
        $st = "<span class=\"\">&nbsp;0&nbsp;</span>条</dd>";
        $st2 = $matches[0][0];
        $pos = strstr($st2, $st);
        if($pos!=""){
            //echo "\"><div id=\"header\" class=\"status3xx\"><h2>在线视频搜索结果</h2></div>";
            //echo "没有搜索结果";
            $flag11= "0";
        }elseif($pos==""&&$flag1=="0"&&$flag3=="0"){
            echo "\"><div id=\"header\" class=\"status3xx\"><h2>\"".$WD."\" 视频搜索结果</h2></div><div class=\"";
            $flag11 = "1";
            echo  $st2;
            echo "</ul>";
        }elseif($pos==""&&($flag1=="1"||$flag3=="1")&&$flag2=="0"){
            echo "<div class=\"";
            $flag11 = "1";
            echo  $st2;
            echo "</ul>";
        }
    }elseif($tp!="190"){
        echo '视频源 3 出现故障，正在修复，请刷新重试...<br>';
    }
    flush();
    //TV 暂时取消电视台搜索功能
    //电视搜索时 词义转化
   /* if(strstr($WD,"央视")||strstr($WD,"cctv")||strstr($WD,"CCTV")||strstr($WD,"中央电视台")){
        $WD = str_replace( "央视", "中央", $WD);
        $WD = str_replace( "cctv", "中央", $WD);
        $WD = str_replace( "CCTV", "中央", $WD);
        $WD = str_replace( "中央电视台", "中央", $WD);
    }
    $file_dir = "./TV.txt";
    $file = fopen($file_dir, "r");
    $i=0;
    while(!feof($file))
    {
        $str = fgets($file);
        if(strstr($str,$WD)&&($WD!="1")){
            $flag2 = "1";
            if($i==0&&$flag1=="0"&&$flag11=="0"&&$flag3=="0"){
                echo "\"><div id=\"header\" class=\"status3xx\"><h2>\"".$WD."\" TV搜索结果</h2></div><div class=\"xing_vb\"> ";
                $i++;
            }else if($i==0&&($flag1=="1"||$flag11=="1"||$flag3=="1")){
                echo "<div id=\"header_top\" class=\"status3xx\"><h2>\"".$WD."\" TV搜索结果</h2></div><div  class=\"xing_vb\"> ";
                echo "<script type=\"text/javascript\">document.getElementById('header').innerHTML = '<div id=\"header_top\" class=\"status3xx\"><h2>\"".$WD."\" 视频搜索结果<br>电视台搜索结果在最下方</h2></div>';</script>";
                $i++;
            }
            $arr = explode(",",$str);
            echo " <ul><li><span class=\"tt\"></span><span class=\"xing_vb4\"><a target='_self' href=\"./player_tv.php?act=play&type=19&name=".$WD."&token=".$arr[0]."\" >";
            echo $arr[1]."</a></span> <span class=\"xing_vb5\"> </span> <span class=\"xing_vb6\"> </span></li></ul>";
        }
    }*/
    if($flag2=="1"){
        echo "</div>";
    }
    // echo $flag1.$flag2.$flag3;
    if($flag2=="0"&&$flag1=="0"&&$flag3 == "0"&&$flag11 == "0"){
        if($i==0){
            if($tp=="190"){
                echo "\"></div><div id=\"header\" class=\"status3xx\"><h2>\"".$WD."\" 没有电视台搜索结果<br>请在上方搜索框重新搜索视频</h2></div>";
            }else{
                echo "\"></div><div id=\"header\" class=\"status3xx\"><h2>\"".$WD."\" 没有任何搜索结果<br>注意搜索词汇/标点是否正确</h2></div>
                <div id=\"tip\" style=\"width: 100%;z-index:200;text-align: center;position: relative; bottom: 0px;\">
    <div style=\"margin:0 auto;text-align: left;width: 300px\">
        <p style=\"color: #FF0000;font-weight: bold\">请注意：</p>
        <p style=\"color: #FF0000;font-weight: bold\">（1）搜索词可以少字不要多字，例如：战狼2，可以搜索'战狼'，会有更多结果</p>
        <p style=\"color: #FF0000;font-weight: bold\">（2）搜索词是否含有标点，标点是否正确</p>
        <p style=\"color: #FF0000;font-weight: bold\">（3）搜索词是否正确，例如：权力的游戏，不是'权利的游戏'</p>
    </div>
</div>";
            }
            $i++;
        }
    }
    flush();
    /*fclose($file);*/
    //暂时关闭ip统计
    tj($WD_ys);

    ?>
</div>
<?php include 'foot.html'?>
<?php
if(isMobile()){
    echo '<script>var btn = document.getElementById(\'btn\');
		var clipboard = new Clipboard(btn);
		clipboard.on(\'success\', function(e) {
		});
		clipboard.on(\'error\', function(e) {
		});</script>';
}
?>
</body>
</html>