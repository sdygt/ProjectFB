<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<!-- login&index page -->
<html>
<head>
	<meta charset="UTF-8">
	<title>校科协脸谱|后台管理|登录</title>
</head>
<body>
	<form method="POST" action="<?php echo U('Index/handleLogin');?>">
		<p>
			<span>用户名：　</span>
			<input type="text" name="name" id="name" required='required'/>
		</p>

		<p>
			<span>密码：　　</span>
			<input type="password" name="password" id="password" required='required'/>
		</p>

		<input type="submit" value="登录" />
	</form>
</body>
</html>