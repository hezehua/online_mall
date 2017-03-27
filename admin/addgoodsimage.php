<?php
	require_once '../include.php';
	connect();
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
			table{
				font-weight: bold;
			}
			input[type='submit']{
				display: inline-block;
				height: 30px;
				cursor: pointer;
			}
			#disc span{
				display: block;
				margin-bottom: 10px;
				float: left;
			}
			select{
				display: inline-block;
				width: 170px;
			}
			textarea{
				width: 900px;
				height: 60px;
				float: right;
			}
		</style>
		<script type="text/javascript">
			window.onload=click_return;
			function click_return(){
				var button=document.getElementsByTagName('button');
				button[0].onclick=function(){
					window.location.href='listgoods.php';
				}
			}
		</script>
	</head>
	<body>
		<h1><button type="button">返回</button></h1>
		<form action="adminaction.php?act=addgoods" method="post" enctype="multipart/form-data">
			<table width="70%" border="1" cellpadding="10" cellspacing="0" bgcolor="#CCC" align="center">
				<caption>添加商品</caption>
				<tr>
					<td>商品名称</td>
					<td>
						<input  type="text" name="g_name" placeholder="商品名称" />
					</td>
				</tr>					
				<tr>
					<td>商品图片</td>
					<td>
					
						
					</td>
				</tr>
				<tr>
					<td colspan="2" id="desc">
						<span>商品描述</span>					
						<textarea  name="g_desc" placeholder="商品描述"></textarea>
					</td>
				</tr>				
				<tr>
					<td colspan="2">
						<input  type="submit" value="添加商品" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>