<?php
	require_once '../include.php';
	connect();
	checklogined();	
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
	}
	$sql="select * from shop_user where id={$id}";
	$row=fetchone($sql);
	if(!$row){
		alertmes('无该商品，请重新选择', 'listgoods.php');
	}
//	print_r($row);exit;
//	$sql="select * from mall_classify";
//	$rows=fetchall($sql);
//	$classify="";
//	foreach($rows as $one){
//		if($one['id'] == $row['c_id'])$classify=$one['c_name'];		
//	}	
//	$sql="select * from user_album where pid={$row['id']}";
//	$rows=fetchall($sql);
//	$imgs=array();
//	foreach($rows as $one){
//		$imgs[]=$one['album_path'];
//	}
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
					window.location.href='listuser.php';
				}
			}
		</script>
	</head>
	<body>
		<h1><button type="button">返回</button></h1>
		<form action="adminaction.php?act=addgoods" method="post" enctype="multipart/form-data">
			<table width="100%" border="1" cellpadding="10" cellspacing="0"  align="center">
				<caption>查看用户</caption>
				<tr>
					<td class="show">用户名</td>
					<td>
						<?php echo $row['username'];?>
					</td>
				</tr>	
				<tr>
					<td class="show">用户密码</td>
					<td>
						<?php echo $row['password'];?>						
					</td>
				</tr>
				<tr>
					<td class="show">用户性别</td>
					<td>
						<?php echo $row['sex'];?>
					</td>
				</tr>	
				<tr>
					<td class="show">用户邮箱</td>
					<td>
						<?php echo $row['email'];?>
					</td>
				</tr>
				<tr>
					<td class="show">用户头像</td>
					<td>						
						<img src="<?php echo $row['face'];?>" />								
					</td>
				</tr>	
				<tr>
					<td class="show">注册时间</td>
					<td>
						<?php echo @date('Y-m-d/h:i:s a',$row['regtime']);?>
					</td>
				</tr>
				<tr>
					<td class="show">是否激活</td>
					<td>
						<?php echo $row['activeflag']?'已激活':'未激活';?>
					</td>
				</tr>			
			</table>
		</form>
	</body>
</html>