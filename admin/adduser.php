<?php
require_once '../include.php';
checklogined();	
?>
<!DOCTYPE  html>
<html>
	<head>
		<style type="text/css">
			caption{
				background-color: #ccc;
				font-size: 20px;
				font-weight: 800;
			}
		</style>
		<script type="text/javascript">
			window.onload=click_return;
			function click_return(){
				var button=document.getElementsByTagName('button');
				button[0].onclick=function(){
					window.location.href='listuser.php';
				}
			}
		</script>
	</head>
	<body>
		<h1><button type="button">返回</button></h1>
		<form action="adminaction.php?act=adduser" method="post" enctype="multipart/form-data">
			<table width="70%" border="1" cellpadding="10" cellspacing="0" bgcolor="#ccc" align="center">
				<caption>添加用户</caption>
				<tr>
					<td>名称</td>
					<td>
						<input  type="text" name="username" placeholder="用户名称" />
					</td>
				</tr>
				<tr>
					<td>密码</td>
					<td>
						<input  type="text" name="password" placeholder="用户密码" />
					</td>
				</tr>
				<tr>
					<td>邮箱</td>
					<td>
						<input  type="text" name="email" placeholder="用户邮箱" />
					</td>
				</tr>
				<tr>
					<td>性别</td>
					<td>
						<input  type="radio" name="sex" value="0" checked="checked"/>男
						<input  type="radio" name="sex" value="1"/>女
						<input  type="radio" name="sex" value="2"/>保密
					</td>
				</tr>
				<tr>
					<td>头像</td>
					<td>
						<input  type="file" name="face"/>
					</td>
				</tr>
				<tr>
					<td>
						<input  type="submit" value="添加用户" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>