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
		<title>深白的个人博客</title>
	</head>
	<body>
<script type="text/javascript"src="/public/js/home/member/loginView.js"></script>
<link rel="stylesheet" type="text/css" href="/public/css/home/member/loginView.css">
<form name="login" id="login">
	<div class="login-tips-container">
		<div class="login-tips">
			<a href="http://dev.goodtime.com"><img src="/public/images/login-logo.png" alt=""></a>
			<span>欢迎登陆</span>
		</div>
	</div>
	<div class="login-wrap">
		<div class="login-container">
			<div class="login-box">
				<p>
					<label for="username" class="label-control">用户名：</label>
					<input type="text" class="text-control" name="username" id="username" placeholder="请输入用户名"/>
				</p>
				<p>
					<label for="password" class="label-control">密码：</label>
					<input type="password" class="text-control" name="password" id="password" placeholder="请输入密码"/>
				</p>
				<p class="verify_code">
					<label for="verify_code" class="label-control">验证码：</label>
					<input type="text" class="text-control" name="verify_code" id="verify_code" style="width:140px;"/>
					<img src="<?php echo U('member/getValidCode');?>" >
				</p>
				<p>
					<span >
						<input type="checkbox" name="save_password" id="save_password" /><label for="save_password">记住密码</label>
					</span>
					<span style="margin-left:20px;"><a href="#">忘记密码？</a></span>
					<span style="margin-left:20px;"><a href="#">免费注册</a></span>
				</p>
				<p class="btn-container">
					<a href = "javascript:;" class="login-botton" id="submit"/>登陆</a>
					<span class="error-tips"></span>
				</p>
			</div>
		</div>
	</div>
</form>
<!-- 站点地图 -->
<link rel="stylesheet" type="text/css" href="/public/css/home/common/footer.css">
<div class = "footer-wrap">
	<div class="footer-container">
		<div class="footer-info left-float">
			<div class="footer-logo">
				<a href="">
					<img src="/public/images/ft-logo.jpg" alt="">
				</a>
			</div>
			<p>让你的身体和心灵都来一次彻底的旅行吧！</p>
		</div>
		<div class="footer-nav right-float">
			<div class="footer-share">
				<ul>
					<li class="share-sina"><a href=""></a></li>
					<li class="share-weixin"><a href=""></a></li>
					<li class="share-eamil"><a href=""></a></li>
				</ul>
			</div>
			<div class="footer-link">
				<a href="">我的微博</a>
				<a href="">站长统计</a>
				<a href="">广告合作</a>
				<a href="">给我留言</a>
			</div>
			<p>Copyright 2016 conact me:huzikan@163.com</p>
		</div>
	</div>
</div>
</body>
</html>