<?php 
	require_once '../include.php';

	checklogined();	

	connect();
	$table="mall_goods";
	$type="int(10) unsigned";
	$where="";
	if(isset($_REQUEST['keywords'])){
		$keywords=$_REQUEST['keywords']?$_REQUEST['keywords']:"";
		$where=$keywords?"where g_name like '%{$keywords}%'":"";
	}
	$orderby="";
	if(isset($_REQUEST['order'])){
		$order=$_REQUEST['order'];
		$orderby="order by {$order}";
	}
	$sql="select * from {$table} {$where} {$orderby}";
//	echo $sql;
//	exit;
	$num=getresultnum($sql);
	$pagesize=5;
	$page=0;
	$pagenum=ceil($num/$pagesize);
	if(isset($_REQUEST['page']))$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if($page<1 || $page == null ||!is_numeric($page)){
		$page=1;
	}
	if($page>$pagenum)$page=$pagenum;
	$offset=($page-1)*$pagesize;
	$sql="select * from {$table} {$where} {$orderby} limit {$offset},{$pagesize}";
	$rows=fetchall($sql);
	if(!$rows && !$where){
		alertmes('没有商品，请添加', 'addgoods.php');
		exit;
	}
	if(!$rows && $where){
		alertmes('没有改类商品', 'listgoods.php');
	}
?>
<!DOCTYPE  html>
<html>
	<head>
		<style type="text/css">
			*{
				font-size: 16px;
				text-decoration: none;
			}
			th{
				background-color: #ccc;
				font-size: 20px;
				font-weight: 800;
			}
			.modify a{
				border: 1px solid red;
				display: block;
				width: 100px;	
				margin: 10px 40px;
				text-align: center;					
			}
			.page a{
				display:inline;
				width: 10%;
			}
			td{
				text-align: left;
				height: 30px;
			}
			.modify{
				text-align: center;
			}
			.alldelete,.allmodify{
				float: right;
				background-color:#00FFFF;
				cursor: pointer;
				border: 2px solid #ccc;
				color: red;
			}
			.new_id{
				text-align: center;
				background-color:#A6C8FF;			
			}
			.new_id a{
				width: 100%;
				color: red;
			}
			.imagesort a{
				display: block;
				width: 100px;
				text-align: center;
				line-height: 50px;
				border: 1px solid red;
				margin:0 auto;
			}
			input[class='search']{
			
				width: 60%;
			}
			#desc{
				/*position: relative;*/
				display: inline-block;
				width: 220px;		
				overflow: hidden;
				height: 40px;
			}
			#textarea{		
				width: 600px;
				line-height: 40px;	
				/*font-size: 30px;*/	
				word-wrap:break-word ;	
				border: 1px solid black;	
				background-color: #FFF;	
					
			}
			#desc:hover{
				overflow:visible;				
			}
			#desc:hover #textarea{
				position: relative;	
				left: -300px;
			/*	line-height: 20px;	*/	
			}
			#add{
				text-decoration: none;
				text-align: center;
				width: 100px;
				border: 1px solid red;
				float: right;
				margin-right: 100px;
				background-color: #ccc;
			}
			img{
				margin-left:10px ;
			}
			/*span{http://127.0.0.1/admin/listgoods.php
				font-size: 10px;
				
				disabled="disabled"
			}*/
		</style>
		<script type="text/javascript">
			function search(){
				if(event.keyCode == 13){
					var val=document.getElementsByClassName('search')[0].value;
					alert('11111');
					window.location='listgoods.php?keywords='+val;
				}
				var search=document.getElementById('search');
				search.onclick=function(){
					var val=document.getElementsByClassName('search')[0].value;
					window.location='listgoods.php?keywords='+val;
				}
			}
			function change(val){
				window.location='listgoods.php?order='+val;
			}
			window.onload=search;
		</script>
	</head>
	<body>
		<h1>商品列表<span><a id="add" href="addgoods.php">添加</a></span></h1>
		<form action="adminaction.php" method="post">
			<table width="100%" border="1" align="center">
				<tr>
					<td></td>
					<td class='new_id'><a href="../lib/alterdb.php?table=<?php echo $table;?>&type=<?php echo $type;?>">重新编号</a></td>
					
					<td colspan="2">				
						<input type="text" class="search" onkeypress="search()"/>
						<button id="search" type="button">搜索</button>
					</td>
				</tr>
				<tr>
					<th width="5%">序号</th><th width="5%">ID</th><th width="10%">名称</th><th width="60%">图片</th><th>操作</th>
				</tr>
				<?php 
					$i=0;
					foreach($rows as $row){
//						connect();
						$sql="select * from user_album where pid='{$row['id']}'";
//						echo $sql;
						$albumpath=fetchall($sql);	
//						print_r($goods);
//						$albumpath					
						$i++;
				?>
				<tr>
					<td><input type="checkbox" /><?php echo $i;?></td>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['g_name'];?></td>				
					<td id="image">
						<?php foreach($albumpath as $path){
							$imagepath=explode('/', $path['album_path']);
							if(in_array('upload', $imagepath)){
								echo "<img src='{$path['album_path']}'>";
								echo $path['album_path'];
							}
							
						}?>				
					</td>
					<td class="modify">			
						<a href="adminaction.php?act=watertext&id=<?php echo $row['id'];?>">添加文字水印</a>	
						<a href="adminaction.php?act=waterpic&id=<?php echo $row['id'];?>">添加图片水印</a>			
						<a href="showgoodsimage.php?id=<?php echo $row['id'];?>">编辑</a>
					</td>
				</tr>
				<?php }?>
				<tr>
					<td colspan="10" class="page">
						<?php echo showpage($page,$pagenum);?>
					</td>
				</tr>
				<tr>
					<td colspan="10" height="50px" class="imagesort">
						<a href="../lib/alterdb.php?table=user_album&type=<?php echo $type;?>" >图片重新编号</a>		
					</td>
				</tr>
			</table>
		</form>
		
	</body>
</html>