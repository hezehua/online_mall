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
					window.location.href='listclassify.php';
				}
			}
		</script>
	</head>
	<body>
		<h1><button type="button">返回</button></h1>
		<form action="adminaction.php?act=addclassify" method="post">
			<table width="70%" border="1" cellpadding="10" cellspacing="0" bgcolor="#CCC" align="center">
				<caption>添加分类</caption>
				<tr>
					<td>分类名称</td>
					<td>
						<input  type="text" name="c_name" placeholder="分类名称" />
					</td>
				</tr>			
				<tr>
					<td>
						<input  type="submit" value="添加分类" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>