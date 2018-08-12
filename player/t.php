<?php
/**
 * Created by PhpStorm.
 * User: M&F
 * Date: 2017-11-15
 * Time: 18:16
 */

$type = @$_GET['type'] ? $_GET['type'] : '';
$token = @$_GET['token'] ? $_GET['token'] : '';
$name = @$_GET['name'] ? $_GET['name'] : 'name';
$js = @$_GET['js'] ? $_GET['js'] : '0';

?>
<ul class="dslist-group">
    <li class="dslist-group-item"><a onclick="window.parent.location.href='/player.html?type=<?php echo $type;?>&name=<?php echo $name;?>&token=<?php echo $token;?>&js=<?php echo $js;?>'" href="">不能播放</a> </li>
    <li class="dslist-group-item"><a onclick="window.parent.location.href='http://tv.2naive.cn'" href="">电视直播</a> </li>
    <li class="dslist-group-item"><a onclick="window.parent.location.href='http://music.2naive.cn'" href="">在线音乐</a> </li>
</ul>
<style>
    iframe{
        padding: 0;
        border: none;
    }
    body,html{
        background:url(images/daohang_bg.png) left top repeat;
        font-family: "Segoe UI", "Lucida Grande", Helvetica, Arial, "Microsoft YaHei", FreeSans, Arimo, "Droid Sans","wenquanyi micro hei","Hiragino Sans GB", "Hiragino Sans GB W3", Arial, sans-serif;
    }
    a:hover{
        text-decoration: none;
        color: #FF0000;
    }
    .dslist-group-item{
        word-break :keep-all;
        overflow: hidden;
        padding: 6px 0px;
        text-overflow: ellipsis;
        white-space: nowrap;
        float: left;
    }
    .dslist-group-item img{
        margin-bottom: 3px;
    }
    .dslist-group{
        margin-top: 5px;
        margin-left: 4px;
        padding-left: 0;
    }
    .dslist-group .on a{
        background-color: #F34868 !important;
        color: #FFF;
    }
    .dslist-group-item:last-child{
        border-radius: 0px;
    }
    .dslist-group-item a{
        background-color: #e6e6e6;
        border-color: #e6e6e6;
        color: #444444;
        margin: 3px;
        padding: 5px 12px 5px 10px;
        text-decoration: none;
    }
    .dslist-group-item a:hover {
        color: #444444;
        background-color: #c7c7c7;
        border-color: #c7c7c7;
    }
</style>
