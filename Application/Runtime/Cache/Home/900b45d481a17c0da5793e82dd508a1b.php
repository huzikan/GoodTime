<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>错误提示</title>
	</head>
	<style>
		.error-container {
			font-family: 'Microsoft Yahei','微软雅黑';
			width: 900px;
			height: 552px;
			position: relative;
			margin:  200px auto 0;
			background-image: url('/public/images/common-error.png');
		}
		.content-container {
			position: absolute;
			left: 5%;
			top: 35%;
			width: 450px;
			height: 80px;
		}
			
		.content-container em {
			float: left;
			width:40px;
			height: 40px;
			background: url('/public/images/error-tips.png');
		}

		.content-container p{
			float: left;
			width: 400px;
			line-height: 40px;
			font-size:20px;
			color: #2da1ca;
			font-weight: bold;
			margin-top: 0;
			margin-left: 10px;
			overflow: hidden;
			/*text-align: center;*/
		}
	
		.btn-container{
			width: 260px;
			height: 43px;
			position: absolute;
			left: 10%;
			bottom: 25%;
		}

		.btn-link {
			width: 117px;
			height: 43px;
			background-color: #2da1ca;
			display: inline-block;
			line-height: 43px;
			border-radius: 5px;
			margin-left: 10px;
			text-decoration: none;
			color: #f2fbff;
			font-size: 18px;
			text-align: center;
		}
	</style>
	<body>
		<div class="error-container">
			<div class="content-container">
				<em></em>
				<p><?php echo ($message); ?></p>
			</div>
			<div class="btn-container">
				<a class="btn-link" href="javascript:history.back(-1);">返回上一页</a>
				<a class="btn-link" href="<?php echo U('index/index');?>">返回首页</a>
			</div>
		</div>
	</body>
</html>