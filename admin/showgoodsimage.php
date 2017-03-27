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
		$ids[]=$one['id'];
		$imgs[]=$one['album_path'];
	}
	$imgnum=count($imgs)/2;
//	explode($delimiter, $string)
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
			.bigimg{
				/*border: 1px solid red;*/
				float: left;
				margin-top: 20px;
			}
			img[class='deleteicon']{
				/*display: block;*/
				cursor:pointer;
				/*position: relative;*/
				/*top: -150px;*/
				float: right;
				display: none;
			}
			.bigimg:hover  img[class='deleteicon']{
				/*border: 1px solid #000;*/
				display: block;
			}
			.smallimage{
				clear: both;
				display: block;
				float: left;
			}
			#alldelete{
				margin: 0 20px;
			}
		</style>
		<script type="text/javascript">
			addeventonload(click_return);
			addeventonload(deleteimg);
			function addeventonload(func){
				oldonload=window.onload;
				if(typeof window.onload !='function'){
					window.onload=func;
				}else{
					window.onload=function(){
						oldonload();
						func();
					}
				}
			}
			
			function click_return(){
				var button=document.getElementsByTagName('button');
				button[0].onclick=function(){
					window.location.href='listgoodsimage.php';
				}
			}
			function addimg(){
				var addimg=document.getElementById('addimg');
				addimg.onclick=function(){
										
				}
			}
			function deleteimg(){
				var del=document.getElementsByClassName('deleteicon');
				var path=document.getElementsByName('delete');
//				alert(path[0].nodeName);
				for(var i=0;i<del.length;i++){
					(function(e){
						del[e].onclick=function(){
//							alert(""+e+path[e].value);
	//						window.location="showgoodsimage.php?path";
	//						alert(this.parentNode.nextSibling.nextSibling.nodeName);
							this.parentNode.nextSibling.nextSibling.remove(this);
							this.parentNode.remove(this);
						}
					})(i);
				}
				
			}
		</script>
	</head>
	<body>
		<h1><button type="button">返回</button></h1>
		<form action="adminaction.php?act=addgoodsimage&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
			<table width="100%" border="1" cellpadding="10" cellspacing="0"  align="center">
				<caption>查看图片</caption>				
				<tr>
					<td class="show">图片数量</td>
					<td>
						<?php echo $imgnum;?>
					</td>
				</tr>
				<tr>
					<td class="show">历史图片</td>
					<td>
						<?php foreach ($rows as $row) {
							$path=explode("/",$row['album_path']);
//							print_r($path);
							if(in_array('upload', $path) ){
								echo "<div class='bigimg'>
								<input type='hidden' name='delete'value='{$row['id']}' />
								<img src='{$row['album_path']}'/>
								<img class='deleteicon' src='images/delete.PNG' />
								</div><br />";
							}
//							else{
//								echo "<img src='{$row['album_path']}' class='smallimage'/>";
//							}	
							
																					
						}?>
						
					</td>
				</tr>
				<tr>
					<td class="show">新增图片</td>
					<td></td>
				</tr>
				<tr>
					<td id="desc" class="show">图片操作</td>									
					<td>
						<input type="file"  class="uploadimage" name="myfile[]" accept="image/gif,image/jpg,image/jpeg,image/png,image/gif"/>
						<button id="addimg">添加图片</button>
						<button type="button" id="alldelete">全部删除</button>
					</td>
				</tr>	
				<tr>
					<td id="desc" class="show">保存修改</td>									
					<td><button id="ensure">确定</button> </td>
				</tr>			
			</table>
		</form>
	</body>
</html>