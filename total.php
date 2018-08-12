<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>网站统计</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
    <meta http-equiv="description" content="This is my page">
    <link href="mf_spcj/bootstrap.css" rel="stylesheet" media="screen">
    <style type="text/css">
        a:link{  text-decoration:none;  color: #000000;  }
        a:visited{  text-decoration:none;  }
        a:hover{  text-decoration:none;  color:#3299CC;  }
        a:active{  text-decoration:none;  }
        .search_box{width: 90%;margin:0 auto; max-width: 300px;border:1px solid #ccc; margin-top:20%;}
        .search_fl{overflow:hidden;}
        .search_txt{width:100%;border:0;height:26px;padding:2px 0 2px 5px;}
        .btn_s{background:#ccc;border:0;width:50px;height:30px;float:right;}
    </style>
</head>
<body>

<?php
$gjc = @$_GET['gjc'] ? $_GET['gjc'] : '***';
$type = @$_GET['type'] ? $_GET['type'] : '1';
$pass = @$_GET['pw'] ? $_GET['pw'] : '9988';
$ps = "mmmmmm";
if($pass == $ps || isset($_COOKIE['2naive'])){
    require_once "./conn.php";
    setcookie("2naive", "2naive", time()+60*30); //30分钟  一天 24*60*60
    $rsT = mysql_query("SELECT count( 1 ) AS counts  FROM search ");
    $rowT=mysql_fetch_object($rsT);
        if($type=="1"){
        //echo $gjc;
        if($gjc=="***"){
            $rs = mysql_query("SELECT * FROM search order by id desc limit 0,30");
        }else{
            $rs = mysql_query("SELECT * FROM search WHERE content LIKE '%$gjc%' order by id desc limit 0,30");
        }
    }elseif ($type=="2"){
        $rs = mysql_query("SELECT content, count( 1 ) AS counts FROM search GROUP BY content ORDER BY counts DESC LIMIT 0 , 30");
    }elseif ($type=="3"){
        $rs = mysql_query("SELECT ip_ad, count( 1 ) AS counts FROM search GROUP BY ip_ad ORDER BY counts DESC LIMIT 0 , 30");
    }elseif ($type=="4"){
        $rs = mysql_query("SELECT date_time, count( 1 ) AS counts FROM search GROUP BY date_time ORDER BY date_time LIMIT 0 , 30");
    }
    echo "<h1>搜 索 数 据 统 计</h1>
<div class=\"row\">
    <div class=\"span4\">
            <form name=\"input\" class=\"bs-docs-example form-inline\" action=\"./mf.mf\" method=\"get\">
            <div class=\"input-append\">
                <span class=\"\"></span>   <input class=\"span2\" id=\"appendedInputButton\" placeholder=\"根据关键词查询最近搜索信息\" name=\"gjc\" style=\"height:30px;width:185px;\" value=\"\" type=\"text\">
                <input type='hidden' name='type' value='1'>
                <button class=\"btn\" type=\"submit\" value=\"Submit\" >查询</button>
            </div>
        </form>
    </div><center>累计提供约 $rowT->counts 次搜索服务</center>
    <div class=\"btn-group\" style=\"margin-left:15px;\"><a class=\"btn btn\" href=\"./mf.mf?gjc=***&type=1\">最近</a><a class=\"btn btn\" href=\"./mf.mf?gjc=gjc&type=2\">关键词</a><a class=\"btn btn\" href=\"./mf.mf?gjc=gjc&type=3\">区域</a>
    <a class=\"btn btn\" href=\"./mf.mf?gjc=gjc&type=4\">时段</a><a target='_blank' class=\"btn btn\" href=\"/pony123/admin_reslib_zuida.php?ac=list&rid=&url=http://www.zuidazy.com/inc/ldg_sea.php#\">ZUIDA</a><a target='_blank' class=\"btn btn\" href=\"/pony123/admin_reslib_zuida.php?ac=list&rid=&url=http://www.33uudy.com/inc/seacmsapi.php#\">33UU</a></div></div>
 
<table class=\"table table-bordered table-striped\" >
    <colgroup>
        <col class=\"span1\">
        <col class=\"span7\">
    </colgroup>";
        if($type=="1"){
            echo "<thead><tr><th>源</th><th>关键词</th><th>访问区域</th><th>访问时间</th></tr></thead><tbody>";
        }elseif ($type=="2"){
            echo "<thead> <tr><th>关键词</th><th>热度</th></tr></thead><tbody>";
        }elseif ($type=="3"){
            echo "<thead><tr><th>区域</th><th>热度</th></tr></thead><tbody>";
        }elseif ($type=="4"){
            echo "<thead><tr><th>时段</th><th>热度</th></tr></thead><tbody>";
        }
    function getAd($ip=""){
        $res = @file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip=' . $ip);
        $jsonMatches = array();
        preg_match('#\{.+?(\{.+?\})\}#', $res, $jsonMatches);
        $json = json_decode($jsonMatches[1], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }
        return $json;
    }
    //判断是否为网址
    function is_url($str){
        return preg_match("/^[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\’:+!]*([^<>\"])*$/", $str);
    }
    //输出
    while($row=mysql_fetch_object($rs)){
        //echo "".$row->U_lon.",".$row->U_lat."";
        if($type=="1"){
            //判断是否为网址

            if (is_url($row->content)||preg_match('/(http:\/\/)|(https:\/\/)/i', $row->content)) {
                $row->content = "网址";
            }
            $flag = "新";
            if($row->flag == 0){
                $flag = "首";
            }elseif($row->flag == 2){
                $flag = "快";
            }
            echo "<tr><td>".$flag."</td><td>";
            echo $row->content."</td><td>";
            //var_dump($ipInfos);
            $data_t = getAd($row->ip);
            reset($data_t);
            echo $data_t["country"]." ".$data_t["region"]." ".$data_t["city"]." ".$data_t["isp"]."(".$data_t["ip"].")";
            echo "</td><td>".$row->date."</td></tr>";
        }elseif ($type=="2"){
            if (preg_match('/(http:\/\/)|(https:\/\/)/i', $row->content)) {
                $row->content = "网址";
            }
            echo "<tr><td>".$row->content."</td><td>";
            echo "".$row->counts." 次搜索</td></tr>";
        }elseif ($type=="3"){
            if($row->ip_ad==" "){
                echo "<tr><td>未知区域</td><td>";
            }else{
                echo "<tr><td>".$row->ip_ad."</td><td>";
            }
                echo "约占总数 ".round(($row->counts/$rowT->counts)*100)."%（".$row->counts." 次搜索）</td></tr>";
        }
        elseif ($type=="4"){
            $H = $row->date_time;
            $H2 = str_pad($H+1,2,"0",STR_PAD_LEFT);
            echo "<tr><td>".$H.":00 - ".$H2.":00</td><td>";
            echo "".round(($row->counts/$rowT->counts)*100)."%，共".$row->counts."次搜索</td></tr>";
        }
    }
    mysql_close();
    echo "</tbody>
</table>
<script src=\"mf_spcj/jquery.js\"></script>
<script src=\"mf_spcj/bootstrap.js\"></script>";
}else{
    echo "<div class=\"search_box\">
                <form action=\"./mf.mf\" method=\"get\"  >
                    <button  class=\"btn_s\" onclick=\"return frm_onsubmit();\">OK</button>
                    <div class=\"search_fl\">
                        <input  type=\"password\"  name=\"pw\" id=\"wd\" class=\"search_txt\" onBlur=\"if(this.value==''){ this.value='';this.style.color='#cfcdcd';}\" onFocus=\"if(this.value==''){this.value='';this.style.color='';}\" value=\"\">
                    </div>
                    谢绝访问！！！
                </form>
            </div>";
}
?>
</body>
</html>
