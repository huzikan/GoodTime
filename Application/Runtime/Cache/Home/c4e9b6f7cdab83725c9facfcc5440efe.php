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
<script type="text/javascript"src="/public/js/home/member/loginview.js"></script>
<link rel="stylesheet" type="text/css" href="/public/css/home/member/loginview.css">
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