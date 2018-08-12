<!DOCTYPE html>
<html lang="zh" class="no-js">
<head>
	<meta charset="UTF-8" />
	<title>视频资源搜索</title>
	<meta name="keywords" content="视频资源搜索,电视,在线观看,VIP视频,小视频,会员,电视剧,视频搜索" />
	<meta name="description" content="简单搜索 - 全球最大的在线电影资源搜索观看网站" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<!--<link href='http://fonts.useso.com/css?family=Raleway:100,700,800' rel='stylesheet' type='text/css'>-->
	<link rel="stylesheet" type="text/css" href="/cs/fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="/cs/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/cs/css/demo.css" />
	<link rel="stylesheet" type="text/css" href="/cs/css/component.css" />
	<?php
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
	?>
	<!--[if IE]>
	<script src="/html5shiv.js"></script>
	<![endif]-->
</head>
<body>
<div class="container">
	<aside class="sidebar clearfix">
		<nav> 
			<a href="/news.html" target="_blank" title="最新视频">最新</a>
			<a href="http://tb.2naive.cn" target="_blank" title="淘宝优惠券">福利</a>
			<a href="/indexN.html" target="_blank" title="视频资源在线观看">更新</a>
			<a href="http://meting.2naive.cn" target="_blank" title="在线音乐">音乐</a>
		</nav>
	</aside>
	<div id="morphsearch" class="morphsearch">
			<form  class="morphsearch-form" action="./search.html" method="post" >
				<input	class="morphsearch-input" type="text"  name="wd" placeholder="搜索,从此开始..." required="required"/>
				<button <?php
						if(isMobile()){
							require_once 'tb/curl.php';
							echo ' id="btn" data-clipboard-text="'.Gettkl($tkl).'"';}
						?> class="morphsearch-submit">Search</button>
			</form>
		<div class="morphsearch-content">
			<div class="dummy-column">
				<h2>搜索速度较慢，请耐心等待结果...</h2>
				<!--<h2>站内导航</h2>-->
				<a class="dummy-media-object" href="/indexN.html" target="_blank">
					<h3>视频列表</h3>
				</a>
				<a class="dummy-media-object" href="/vip.html" target="_blank">
					<h3>VIP视频</h3>
				</a>
				<a class="dummy-media-object" href="/news.html" target="_blank">
					<h3>最近更新</h3>
				</a>
				<a class="dummy-media-object" href="http://tb.2naive.cn" target="_blank">
					<h3>福利放送</h3>
				</a>
				<a class="dummy-media-object" href="http://tv.2naive.cn" target="_blank">
					<h3>电视台</h3>
				</a>
				<a class="dummy-media-object" href="http://music.2naive.cn" target="_blank">
					<h3>米听音乐</h3>
				</a>
			</div>
			<div class="dummy-column">
				<h2>友情链接</h2>
				<a class="dummy-media-object" href="http://tb.2naive.cn" target="_blank">
					<h3>爆款秒杀</h3>
				</a>
				<a class="dummy-media-object" href="http://ss.2naive.cn" target="_blank">
					<h3>科学上网</h3>
				</a>
				<a class="dummy-media-object" href="http://kd2h.com" target="_blank">
					<h3>KD2H</h3>
				</a>
			</div>
			<div class="dummy-column">
				<h2>关于我们</h2>
				<a class="dummy-media-object" href="/us.html" target="_blank">
					<h3>关于本站</h3>
				</a>
				<a class="dummy-media-object" href="/disclaimer.html" target="_blank">
					<h3>免责声明</h3>
				</a>
				<a class="dummy-media-object" href="/gbook.html" target="_blank">
					<h3>意见反馈</h3>
				</a>
			</div>
		</div><!-- /morphsearch-content -->
		<span class="morphsearch-close"></span>
	</div><!-- /morphsearch -->
	<header class="codrops-header">
		<h1>资源搬运<span>搜索速度较慢,请耐心等待结果</span></h1>
	</header>
	<div class="overlay"></div>
</div><!-- /container -->
<script src="/cs/js/classie.js"></script>
<script>
	(function() {
		var morphSearch = document.getElementById( 'morphsearch' ),
			input = morphSearch.querySelector( 'input.morphsearch-input' ),
			ctrlClose = morphSearch.querySelector( 'span.morphsearch-close' ),
			isOpen = isAnimating = false,
		// show/hide search area
			toggleSearch = function(evt) {
				// return if open and the input gets focused
				if( evt.type.toLowerCase() === 'focus' && isOpen ) return false;

				var offsets = morphsearch.getBoundingClientRect();
				if( isOpen ) {
					classie.remove( morphSearch, 'open' );

					// trick to hide input text once the search overlay closes
					// todo: hardcoded times, should be done after transition ends
					if( input.value !== '' ) {
						setTimeout(function() {
							classie.add( morphSearch, 'hideInput' );
							setTimeout(function() {
								classie.remove( morphSearch, 'hideInput' );
								input.value = '';
							}, 300 );
						}, 500);
					}

					input.blur();
				}
				else {
					classie.add( morphSearch, 'open' );
				}
				isOpen = !isOpen;
			};

		// events
		input.addEventListener( 'focus', toggleSearch );
		ctrlClose.addEventListener( 'click', toggleSearch );
		// esc key closes search overlay
		// keyboard navigation events
		document.addEventListener( 'keydown', function( ev ) {
			var keyCode = ev.keyCode || ev.which;
			if( keyCode === 27 && isOpen ) {
				toggleSearch(ev);
			}
		} );
	})();
</script>
<script>
	var _hmt = _hmt || [];
	(function() {
		var hm = document.createElement("script");
		hm.src = "https://hm.baidu.com/hm.js?6ce53f2478182524725633e27b314bcd";
		var s = document.getElementsByTagName("script")[0];
		s.parentNode.insertBefore(hm, s);
	})();
	<?php
		if(isMobile()){
			echo 'var btn = document.getElementById(\'btn\');
		var clipboard = new Clipboard(btn);
		clipboard.on(\'success\', function(e) {
		});
		clipboard.on(\'error\', function(e) {
		});';
		}
	?>
</script>
</body>
</html>