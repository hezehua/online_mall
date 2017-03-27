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
				display: inline-block;
				width: 50px;	
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
			/*span{http://127.0.0.1/admin/listgoods.php
				font-size: 10px;
				
				disabled="disabled"
			}*/
		</style>
		<script type="text/javascript">
			function search(){
				if(event.keyCode == 13){
					var val=document.getElementsByClassName('search')[0].value;
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
						时间				
						<select name="timesort" onchange="change(this.value)">
							<option value="111">默认排序</option>
							<option value="pubtime">按发布时间排序</option>
							<option value="updatetime">按更新时间排序</option>
						</select>
					</td>
					<td colspan="2">	
						价格				
						<select name="goodssort" onchange="change(this.value)">
							<option value="m_price" >默认排序</option>
							<option value="m_price">按从高到低排序</option>
							<option value="i_price">按从低到高排序</option>
						</select>
					</td>
					<td colspan="3"></td>
					<td colspan="1">				
						<input type="text" class="search" onkeypress="search()"/>
						<button id="search" type="button">搜索</button>
					</td>
				</tr>
				<tr>
					<th width="5%">序号</th><th width="7%">ID</th><th width="10%">名称</th><th width="7%">分类</th><th width="7%"> 货号</th><th width="7%">数量</th><th width="7%">市场价</th><th width="5%">网站价</th><th width="26%">描述</th><th>操作</th>
				</tr>
				<?php 
					$i=0;
					foreach($rows as $row){
						$i++;
				?>
				<tr>
					<td><input type="checkbox" /><?php echo $i;?></td>
					<td><?php echo $row['id'];?></td>
					<td><?php echo $row['g_name'];?></td>
					<td><?php 
							$ids[]=$row['id'];
							$sql="select c_name from mall_classify where id={$row['c_id']}";
							$one=fetchone($sql);
							echo $one['c_name'];
						?>
					</td>
					<td><?php echo $row['g_sn'];?></td>
					<td><?php echo $row['g_num'];?></td>
					<td><?php echo $row['m_price'];?></td>
					<td><?php echo $row['i_price'];?></td>
					<td id="desc">
						<div id="textarea" disabled="disabled">
							<?php echo $row['g_desc'];?>
						</div>									
					</td>
					<td class="modify">
						<a href="adminaction.php?act=deletegoods&id=<?php echo $row['id'];?>">删除</a>
						<a href="adminaction.php?act=editgoods&id=<?php echo $row['id'];?>">修改</a>
						<a href="showgoods.php?id=<?php echo $row['id'];?>">详情</a>
					</td>
				</tr>
				<?php }?>
				<tr>
					<td colspan="10" class="page">
						<?php echo showpage($page,$pagenum);?>
						<input type="hidden" name="ids" value="{$ids}"/>
						<a href="#" class="allmodify">批量删除</a><!--adminaction.php?act=deletemoregoods-->
						<a  href="#" class="alldelete">批量修改</a><!--adminaction.php?act=editmoregoods-->
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