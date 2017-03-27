<?php
	require_once '../include.php';
	connect();

	checklogined();	

	$rows=getallclassify();
//	print_r($rows);
	if(!$rows){
		alertmes('没有相应分类，请先添加分类', 'addclassify.php');
	}
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
					<td>商品分类</td>
					<td>
						<select name="c_id">
							<?php foreach($rows as $row){?>
								<option value="<?php echo $row['id'];?>"><?php echo $row['c_name'];?></option>	
							<?php }?>
						</select>
						<!--<input  type="text" name="c_name" placeholder="" />-->
						<!--分类名称-->
					</td>
				</tr>	
				<tr>
					<td>商品货号</td>
					<td>
						<input  type="text" name="g_sn" placeholder="商品货号" />
					</td>
				</tr>	
				<tr>
					<td>商品数量</td>
					<td>
						<input  type="text" name="g_num" placeholder="商品数量" />
					</td>
				</tr>
				<tr>
					<td>商品市场价</td>
					<td>
						<input  type="text" name="m_price" placeholder="商品市场价" />
					</td>
				</tr>	
				<tr>
					<td>商品网站价</td>
					<td>
						<input  type="text" name="i_price" placeholder="商品网站价" />
					</td>
				</tr>
				<tr>
					<td>商品图片</td>
					<td>
						<!--<input  type="text" name="i_price" placeholder="商品网站价" />-->
						请选择文件上传<br /><input type="file"  name="myfile[]" accept="image/gif,image/jpg,image/jpeg,image/png,image/gif"/>
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