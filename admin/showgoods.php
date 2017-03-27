<?php
	require_once '../include.php';
	connect();
	checklogined();	
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
	}	
	$sql="select * from mall_goods where id={$id}";
	$row=fetchone($sql);
	if(!$row){
		alertmes('无该商品，请重新选择', 'listgoods.php');
	}
	$sql="select * from mall_classify";
	$rows=fetchall($sql);
	$classify="";
	foreach($rows as $one){
		if($one['id'] == $row['c_id'])$classify=$one['c_name'];		
	}	
	$sql="select * from user_album where pid={$row['id']}";
	$rows=fetchall($sql);
	$imgs=array();
	foreach($rows as $one){
		$imgs[]=$one['album_path'];
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
			.show{
				width: 20%;
				background-color: #ccc;
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
			<table width="100%" border="1" cellpadding="10" cellspacing="0"  align="center">
				<caption>查看商品</caption>
				<tr>
					<td class="show">商品名称</td>
					<td>
						<?php echo $row['g_name'];?>
					</td>
				</tr>	
				<tr>
					<td class="show">商品分类</td>
					<td><?php echo $classify;?></td>
				</tr>
				<tr>
					<td class="show">商品货号</td>
					<td>
						<?php echo $row['g_sn'];?>
					</td>
				</tr>	
				<tr>
					<td class="show">商品数量</td>
					<td>
						<?php echo $row['g_num'];?>
					</td>
				</tr>
				<tr>
					<td class="show">发布时间</td>
					<td>
						<?php echo @date('Y-m-d/h:i:s a',$row['pubtime']);?>
					</td>
				</tr>
				<tr>
					<td class="show">商品市场价</td>
					<td>
						<?php echo $row['m_price'];?>
					</td>
				</tr>	
				<tr>
					<td class="show">商品网站价</td>
					<td>
						<?php echo $row['i_price'];?>
					</td>
				</tr>
				<tr>
					<td class="show">商品图片</td>
					<td>
						<?php foreach ($imgs as $img) {?>
							<img src="<?php echo $img;?>" />		
						<?php }?>
						<!--<input  type="text" name="i_price" placeholder="商品网站价" />-->
						<!--请选择文件上传<br /><input type="file"  name="myfile[]" accept="image/gif,image/jpg,image/jpeg,image/png,image/gif"/>-->
					</td>
				</tr>
				<tr>
					<td id="desc" class="show">商品描述</td>									
					<td><?php echo $row['g_desc'];?></td>
				</tr>				
			</table>
		</form>
	</body>
</html>