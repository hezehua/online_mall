<?php	
	if(isset($_COOKIE['adminname'])){	
		header('location:admin/index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			form{
				display: block;
				width: 300px;
				height: auto;
				margin: 10px auto;
				/*border: 10px solid #CCC;*/
				border-radius: 3px 3px 5px #CCC;
			}
			img{
				display: block;
				width: 100px;
				height: 40px;
				margin: 10px;
				margin-left:80px;
				border:1px solid #CCC;
			}
			input{
				margin: 10px;
				
			}
			button{
				width: 100%;
				height: 40px;
				margin-left: -40px;
				background-color: #CCC;
				border: none;
				border: 1px solid #999;
				cursor: pointer;
			}
			button:hover{
				background-color: #000000;
				color: #FFF;
			}
			h1{
				width: 100%;				
				text-align: center;
				margin-top: 10%;
				margin-left: -30px;
			}
		</style>
	</head>
	<body>
		<h1>网站后台管理登录</h1>
		<form method="post" action="admin/dologin.php">
			用户名<input type="text"  name="username"/><br />
			密&nbsp;码<input type="password"  name="password"/><br />
			验证码<input type="text"  name="varify"/>
			<img src="../online_mall/admin/getvarify.php" />
			一周内自动登录<input type="checkbox"  name="autoFlag" value="1"/><br /><br />
			<button type="submit" >提交</button>
		</form>
	</body>
</html>
