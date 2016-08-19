<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- Bootstrap -->
		<link href="/public/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/public/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/public/css/home/common/header.css">
		<title>登陆测试</title>
	</head>
	<body>
    <style>
		.content-banner{
			width: 100%;
			padding-top: 50px;
			border-top: 1px solid rgb(240, 242, 225);;
			clear: both;
		}

		.content-wrap {
			margin: 10px auto;
			width: 1200px;
			overflow: hidden;
			background-color: #fff;
		}

		.left-ad-wrap {
			width: 170px;
			height:460px;
			float: left;
		}

		.hot-laber{
			margin: 0 20px;
			height: 110px;
			border-bottom: 1px solid rgb(221, 221, 221);
		}
	
		.hot-laber h4{
			font-weight: bold;
			font-size: 18px;
			text-align: center;
			margin-top: 0;
		}

		.hot-laber p{
			clear: both;
			height: 20px;
		}

		.hot-laber p a:hover{
			text-decoration: none;
			color: red;
		}

		.category-wrap {
			overflow: hidden;
		}

		.category-wrap h5{
			text-align: center;
			font-size: 16px;
			font-weight: bold;
			margin: 5px 0 5px 0;
		}
			
		.category-wrap ul{
			list-style-type:none;
			padding-left: 0;
		}
	
		.category-wrap ul li {
			height: 35px;
			font-size: 16px;
			line-height: 35px;
			padding-left: 20px;
			position: relative;
		}
		
		.category-wrap ul li a {
			display: inline-block;
			width: 100px;
			height: 20px;
			text-decoration: none;
		}
	
		.category-cur{
			background-color: #e44715;
		}
	
		.category-cur a {
			color: #fff;
		}

		.category-wrap ul span {
			height: 20px;
			padding-left:10px; 
		}

		.category-wrap ul li .category-icon {
			width: 20px;
			height: 20px;
			display: inline-block;
			vertical-align: middle;
			background-image: url('/public/images/category-icon.png');
		}

		.category-wrap ul li .cursor-icon{
			width: 12px;
			height: 15px;
			position: absolute;
			top:13px;
			right: 5px;
		}

		.em-icon1 {
			background-position: 0 0; 
		}
		
		.em-icon2 {
			background-position: 0 -35px; 
		}

		.em-icon3 {
			background-position: 0 -70px; 
		}

		.em-icon4 {
			background-position: 0 -102px;
		}

		.em-icon5 {
			background-position: 0 -137px; 
		}

		.em-icon6 {
			background-position: 0 -168px; 
		}

		.em-icon7 {
			background-position: 0 -204px; 
		}

		.em-icon8 {
			background-position: 0 -238px; 
		}

		.em-icon9 {
			background-position: 0 -272px; 
		}

		.center-ad-wrap {
			width: 820px;
			height:460px;
			float: left;
			margin-left: 10px;
			overflow: hidden;
			position: relative;
		}

		.right-ad-wrap {
			width: 190px;
			height:460px;
			float: left;
			margin-left: 10px;
		}
		.top-ad-content {
			height: 220px;
			background-image: url('/public/images/ad_top.jpg');
		}

		.bottom-ad-content {
			height: 220px;
			margin-top: 20px;
			background-image: url('/public/images/ad_bottom.jpg');
		}
		
		.display-wrap{
			overflow: hidden;
			clear: both;
		}

		.display-wrap h2 {
			margin-top: 20px;
			margin-left: 10px;
		}

		.display-wrap ul {
			padding: 0 0 2px 2px;
			margin-bottom: 0;
			overflow: hidden;
		}

		.display-wrap ul li{
			position: relative;
			width: 280px;
			height: 369px;
			float: left;
			margin: 20px 18px 0 0;
			box-shadow: 1px 1px 1px rgba(0,0,0,0.2);
		}

		.display-wrap .product-top a{
			display: block;
			width: 280px;
			height: 280px;
		}
		
		.display-wrap .product-bottom {
			margin-top: 20px;
			padding: 0 20px;
		}

		.display-wrap .product-price {
			font-size: 18px;
			line-height: 25px;
			color: #666;
		}

		.product-bottom a {
			text-decoration: none;
			display: block;
			width: 60px;
			height: 25px;
			line-height: 25px;
			text-align: center;
			background-color: #ff0000;
			font-size: 16px;
			float: right;
			color: #fff;
			border-radius: 5px;
		}

		.product-bottom p {
			margin-top: 15px;
		}

		.display-wrap ul .product-banner {
			width: 580px;
			height: 369px;
			overflow: hidden;
			margin: 20px 18px 0 0;
		};

		.product-bannner a {
			display: block;
			width: 586px;
			height: 369px;
		}

		.product-selected {
			outline:red 2px solid;
		}

		.product_icon {
			width: 55px;
			height: 41px;
			position: absolute;
			left: 20px;
		}

		.ad-slideBox ul li{
			display: block;
			position: relative;
			float: left;
			margin-right: -100%;
		}

		.ad-slideBox ul li a{
			display: block;
			width: 100%;
			height: 100%;
		}

		.flex-control-nav {
			position: absolute;
			left: 50%;
			bottom: 8px;
			width:200px;
			margin-left: -50px;
			overflow: hidden;
			z-index: 9999;
			text-align: center;
		}

		.flex-control-nav li {
			float: left;
			margin-left: 13px;
		}

		.flex-control-nav a{
			display: block;
			width: 11px;
			height: 11px;
			border-radius: 50%;
			background-color: rgba(102,102,102,0.9);
		}
 
		.flex-control-btn{
			position: absolute;
			top: 50%;
			width: 100%;
			z-index: 100;
			display: none;
		}

		.left-btn{
			float: left;
			width: 73px;
			height: 65px;
			background-image: url('/public/images/flex-btn-icon.png');
			background-position: 0 0;
			margin-left: 80px;
			margin-top: -32px;
			opacity: 0.5;
		}
		
		.right-btn{
			float: right;
			width: 73px;
			height: 65px;
			background-image: url('/public/images/flex-btn-icon.png');
			background-position: 0 -68px;
			margin-right: 80px;
			margin-top: -32px;
			opacity: 0.5;
		}

		a.flex-control-cur{
			background-color:rgba(228,71,21,0.9); 
		}
    </style>
<link rel="stylesheet" type="text/css" href="/public/css/home/common/header_nav.css">
<div class="top-wrap">
    <div class="site-top">
        <div class="logo-container">
            <a class="site-link" href='http://www.zbj.com'>
                <img src="/public/images/goodtime_logo.png">
            </a>
            <span class="site-desc">带给您不一样的美好生活</span>
        </div>
        <div class="sitemap-container">
            <?php if(($_user['uid']) > "0"): ?><span class="left-float">欢迎您，<?php echo ($_user['username']); ?></span><?php endif; ?>
            <ul>
                <?php if(($_user['uid']) > "0"): ?><li><a class="split" href="<?php echo U('member/loginOut');?>">退出</a></li>
                    <li><a class="split" href="">个人中心</a></li>
                <?php else: ?>
                	<li><a class="split" href="<?php echo U('member/loginView');?>">登陆</a></li>
                	<li><a class="split" href="">注册</a></li><?php endif; ?>
                <li><a href="">帮助中心</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="header-nav-wrap">
    <div class="nav-container">
        <div class="nav-logo">
            <a class="nav-link" href="http://www.zbj.com">
                <img src="/public/images/nav_logo.png">
            </a>
        </div>
        <div class="header-nav">
            <ul>
                <li><a class="header-nav-cur" href="">首页</a></li>
                <li><a href="">绿色花园</a></li>
                <li><a href="">蓝色海洋</a></li>
                <li><a href="">我的账户</a></li>
                <li><a href="">帮助中心</a></li>
            </ul>
        </div>
    </div>
</div>
<div class = "content-wrap">
	<div class = "left-ad-wrap">
		<div class="hot-laber">
			<h4>热门标签</h4>
			<p>
				<span class="left-float">
					<a href="">名字定制</a>
				</span>
				<span class="right-float">
					<a href="">价格合理</a>
				</span>
			</p>
			<p>
				<span class="left-float">
					<a href="">定情戒指</a>
				</span>
				<span class="right-float">
					<a href="">巧克力花</a>
				</span>
			</p>
			<p>
				<span class="left-float">
					<a href="">手链手镯</a>
				</span>
				<span class="right-float">
					<a href="">创意心意</a>
				</span>
			</p>
		</div>
		<div class="category-wrap">
			<h5>全部礼物</h5>
			<ul>
				<li>
					<p>
						<em class="category-icon em-icon1"></em>
						<span><a href="">时尚饰品</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon2"></em>
						<span><a href="">围巾配饰</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon3"></em>
						<span><a href="">创意摆件</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon4"></em>
						<span><a href="">布艺家纺</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon5"></em>
						<span><a href="">巧克力花</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon6"></em>
						<span><a href="">家居日用</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon7"></em>
						<span><a href="">数码办公</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon8"></em>
						<span><a href="">照片印刷</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
				<li>
					<p>
						<em class="category-icon em-icon9"></em>
						<span><a href="">服装内衣</a><img class="cursor-icon" src="/public/images/category-cursor-icon.png"></span>
					</p>
				</li>
			</ul>
		</div>
	</div>
	<div class = "center-ad-wrap">
		<div class="ad-slideBox">
	  		<ul class="items">
	    		<li>
	    			<a href="http://www.baidu.com/">
	    			<img src="/public/images/looper-banner1.jpg"></a>
	    		</li>
				<li>
	    			<a href="http://www.baidu.com/">
	    			<img src="/public/images/looper-banner2.jpg"></a>
	    		</li>
				<li>
	    			<a href="http://www.baidu.com/">
	    			<img src="/public/images/looper-banner3.jpg"></a>
	    		</li>
				<li>
	    			<a href="http://www.baidu.com/">
	    			<img src="/public/images/looper-banner4.jpg"></a>
	    		</li>
	  		</ul>
	  		<ol class="flex-control-nav">
	  			<li><a href="javascript:;"></a></li>
	  			<li><a href="javascript:;"></a></li>
	  			<li><a href="javascript:;"></a></li>
	  			<li><a href="javascript:;"></a></li>
	  		</ol>
	  		<div class="flex-control-btn">
	  			<span class="left-btn"></span>
	  			<span class="right-btn"></span>
	  		</div>
		</div>
	</div>
	<div class = "right-ad-wrap">
		<div class="top-ad-content"></div>
		<div class="bottom-ad-content"></div>
	</div>
	<div class="content-banner"><img src="/public/images/content_banner.png" alt=""></div>
	<!-- 内容展示区 -->
	<div class="display-wrap">
		<h2>创意礼品</h2>
		<ul>
			<li class="product-banner">
				<span class="product_icon"><img src="/public/images/product_icon.png" alt=""></span>		
				<a href="http://www.baidu.com">
					<img src="/public/images/product_banner.jpg" alt="">
				</a>
			</li>
			<li>
				<div class="product-top">
					<a class="image-link" href="http://www.baidu.com">
						<img src="/public/images/product_1.jpg" alt="">
					</a>
				</div>
				<div class="product-bottom">
					<span class="product-price">￥108.88</span>
					<a href="">去看看</a>
					<p>猴年吉祥 925银红绳手链  本命年饰品礼物</p>
				</div>
			</li>
			<li>
				<span class="product_icon"><img src="/public/images/product_icon.png" alt=""></span>
				<div class="product-top">
					<a class="image-link" href="http://www.baidu.com">
						<img src="/public/images/product_1.jpg" alt="">
					</a>
				</div>
				<div class="product-bottom">
					<span class="product-price">￥108.88</span>
					<a href="">去看看</a>
					<p>猴年吉祥 925银红绳手链  本命年饰品礼物</p>
				</div>
			</li>
			<li>
				<div class="product-top">
					<a class="image-link" href="http://www.baidu.com">
						<img src="/public/images/product_1.jpg" alt="">
					</a>
				</div>
				<div class="product-bottom">
					<span class="product-price">￥108.88</span>
					<a href="">去看看</a>
					<p>猴年吉祥 925银红绳手链  本命年饰品礼物</p>
				</div>
			</li>
			<li>
				<div class="product-top">
					<a class="image-link" href="http://www.baidu.com">
						<img src="/public/images/product_1.jpg" alt="">
					</a>
				</div>
				<div class="product-bottom">
					<span class="product-price">￥108.88</span>
					<a href="">去看看</a>
					<p>猴年吉祥 925银红绳手链  本命年饰品礼物</p>
				</div>
			</li>
			<li>
				<span class="product_icon"><img src="/public/images/product_icon.png" alt=""></span>
				<div class="product-top">
					<a class="image-link" href="http://www.baidu.com">
						<img src="/public/images/product_1.jpg" alt="">
					</a>
				</div>
				<div class="product-bottom">
					<span class="product-price">￥108.88</span>
					<a href="">去看看</a>
					<p>猴年吉祥 925银红绳手链  本命年饰品礼物</p>
				</div>
			</li>
			<li>
				<div class="product-top">
					<a class="image-link" href="http://www.baidu.com">
						<img src="/public/images/product_1.jpg" alt="">
					</a>
				</div>
				<div class="product-bottom">
					<span class="product-price">￥108.88</span>
					<a href="">去看看</a>
					<p>猴年吉祥 925银红绳手链  本命年饰品礼物</p>
				</div>
			</li>			
		</ul>
	</div>
</div>
<!-- 站点地图 -->
<link rel="stylesheet" type="text/css" href="/public/css/home/common/footer.css">
<div class = "footer-wrap">
	<div class="footer-container">
		<ul>
			<li>
				<a href="">
					<p class="footer-link footer-icon1"></p>
				</a>
				<p>中国领先</p>
				<p>私人定制商城</p>
			</li>
			<li>
				<a href="">
					<p class="footer-link footer-icon2"></p>
				</a>
				<p>100%专属定制</p>
				<p>独一无二为您定制</p>
			</li>
			<li>
				<a href="">
					<p class="footer-link footer-icon3"></p>
				</a>
				<p>100%</p>
				<p>正品保证</p>
			</li>
			<li>
				<a href="">
					<p class="footer-link footer-icon4"></p>
				</a>
				<p>30天</p>
				<p>退货保障</p>
			</li>
			<li>
				<a href="">
					<p class="footer-link footer-icon5"></p>
				</a>
				<p>24小时</p>
				<p>闪电发货</p>
			</li>
			<li>
				<a href="">
					<p class="footer-link footer-icon6"></p>
				</a>
				<p>精美保证</p>
				<p>让您眼前一亮</p>
			</li>
			<li>
				<a href="">
					<p class="footer-link footer-icon7"></p>
				</a>
				<p>200万用户</p>
				<p>口碑信赖</p>
			</li>					
			<li>
				<a href="">
					<p class="footer-link footer-icon8"></p>
				</a>
				<p>1250城市</p>
				<p>货到付款</p>
			</li>
		</ul>
		<div class="footer-content">
			<dd>
				<dt><a href="">商品分类</a></dt>
				<dt><a href="">移动站点</a></dt>
				<dt><a href="">商家登陆</a></dt>
				<dt><a href="">招聘英才</a></dt>
				<dt><a href="">联系我们</a></dt>
				<dt><a href="">关于我们</a></dt>
				<dt><a href="">帮助中心</a></dt>
				<dt><a href="">站点导航</a></dt>
			</dd>
			<p>Copyright © 2006-2016 goodtime.com 网上经营许可证号：渝B2-20140235</p>
		</div>
	</div>
</div>
</body>
</html>
<script>
$(function(){
	$(".display-wrap li").mouseenter(function(e) {
        $(this).addClass("product-selected");
    }).mouseleave(function(e) {
        $(this).removeClass("product-selected");
    });

	$(".category-wrap li").mouseenter(function(e) {
        $(this).addClass("category-cur");
    }).mouseleave(function(e) {
        $(this).removeClass("category-cur");
    });

    //当前显示的第几张图，默认开始为0；
	var index = 0;
	//将焦点图储存为一个变量方便调用节省下载调用查询时间。
	var imgSrc = $(".ad-slideBox ul li"),
   		imgControl = $(".ad-slideBox ol li a"),
		len = imgSrc.length,//焦点图图片数量
		isAuto = true;
	
	//隐藏除第一张以外的所有图片
	imgSrc.eq(0).nextAll().css({"display":"none"});
	imgControl.eq(0).addClass("flex-control-cur");
	function showPics(showIndex, hideIndex){
		imgSrc.eq(hideIndex).fadeOut(1000).css({"z-index":"1"});
		imgControl.eq(hideIndex).removeClass("flex-control-cur");
		imgSrc.eq(showIndex).css({"z-index":"2"}).fadeIn(1000);
		imgControl.eq(showIndex).addClass("flex-control-cur");
	}

	function flexLeftSlider() {
		var hideIndex = index,
		showIndex = index - 1;

		showIndex = showIndex == -1 ? len - 1 : showIndex;
		showPics(showIndex, hideIndex);
		index--;
		//当前播放的索引值等于总图片数就重置为0，重新开始循环
		index = index == -1 ? len - 1 : index;
	}

	function flexRightSlider() {
		var hideIndex = index,
			showIndex = index + 1;
		showIndex = showIndex == len ? 0 : showIndex;  
		showPics(showIndex, hideIndex);
		index++;
		//当前播放的索引值等于总图片数就重置为0，重新开始循环
		index = index == len ? 0 : index;
	}

	var adBannerTimer = setInterval(flexRightSlider, 5000);
	//左边栏按钮
	$(".flex-control-btn .left-btn").bind('click', function(e){
		//清除自动定时器
		clearInterval(adBannerTimer);
		flexLeftSlider();
		adBannerTimer = setInterval(flexRightSlider, 5000);
	});

	//右边栏按钮
	$(".flex-control-btn .right-btn").bind('click', function(e){
		//清除自动定时器
		clearInterval(adBannerTimer);
		flexRightSlider();
		//恢复定时器
		adBannerTimer = setInterval(flexRightSlider, 5000);
	});

	//圆点导航单击事件
	$(".ad-slideBox ol li").click(function(){
		//清除自动定时器
		clearInterval(adBannerTimer);
		var hideIndex = index, 
			showIndex = $(this).index();
		showPics(showIndex, hideIndex);
		index = showIndex;
		//恢复定时器
		adBannerTimer = setInterval(flexRightSlider, 5000);
	});

	//显示跳转按钮
	$(".center-ad-wrap").mouseenter(function(e) {
        $(".center-ad-wrap").find(".flex-control-btn").fadeIn(200);
        $(".center-ad-wrap").find(".left-btn").animate({"marginLeft":"20px"}, 200);
        $(".center-ad-wrap").find(".right-btn").animate({"marginRight":"20px"}, 200);
    }).mouseleave(function(e) {
    	$(".center-ad-wrap").find(".flex-control-btn").fadeOut(200);
        $(".center-ad-wrap").find(".left-btn").animate({"marginLeft":"80px"}, 200);
        $(".center-ad-wrap").find(".right-btn").animate({"marginRight":"80px"}, 200);
    });

	$(".flex-control-btn span").mouseenter(function(e) {
		$(this).css({"opacity":"1"});
    }).mouseleave(function(e) {
 		$(this).css({"opacity":"0.5"});
    });
});
</script>