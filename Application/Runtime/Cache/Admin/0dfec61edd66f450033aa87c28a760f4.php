<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
	<head>
		<meta charset="utf-8" />
		<title>登录后台</title>

	
	</head>


        <body>
		<form method="post" action="<?php echo U('Login/checkLogin');?>">
		   <p>用户名：<input type="text" name="username"/></p>
		   <p>密    码：<input type="text" name="password"/></p>
		   <p><input type="submit" value="登录"/></p>
		</form>	
							
        </body>

</html>