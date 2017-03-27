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
					window.location.href='listadmin.php';
				}
			}
		</script>
	</head>
	<body>
		<h1><button type="button">返回</button></h1>
		<form action="adminaction.php?act=addadmin" method="post">
			<table width="70%" border="1" cellpadding="10" cellspacing="0" bgcolor="#CCC" align="center">
				<caption>添加管理员</caption>
				<tr>
					<td>管理员名称</td>
					<td>
						<input  type="text" name="username" placeholder="管理员名称" />
					</td>
				</tr>
				<tr>
					<td>管理员密码</td>
					<td>
						<input  type="text" name="password" placeholder="管理员密码" />
					</td>
				</tr>
				<tr>
					<td>管理员邮箱</td>
					<td>
						<input  type="text" name="email" placeholder="管理员邮箱" />
					</td>
				</tr>
				<tr>
					<td>
						<input  type="submit" value="添加管理员" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>