<?php 
	require_once '../include.php';
	checklogined();
	connect();
	$table="mall_admin";
	$type="tinyint(3) unsigned";
//	auto_increment($table, $type);
	
	$sql="select * from mall_admin";
	$num=getresultnum($sql);	
	$pagesize=2;
	$page=0;
	$pagenum=ceil($num/$pagesize);
	if(isset($_REQUEST['page']))$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
	if($page<1 || $page == null ||!is_numeric($page)){
		$page=1;
	}
	if($page>$pagenum)$page=$pagenum;
	$offset=($page-1)*$pagesize;
	$sql="select * from mall_admin limit {$offset},{$pagesize}";
	$rows=fetchall($sql);
	if(!$rows){
		alertmes('没有管理员，请添加', 'addadmin.php');
		exit;
	}
	
?>
<!DOCTYPE  html>
<html>
	<head>
		<style type="text/css">
			th{
				background-color: #ccc;
				font-size: 20px;
				font-weight: 800;
			}
			a{
				background-color: #ccc;
				display: inline-block;
				width: 20%;	
				text-align: center;					
			}
			.page a{
				display:inline;
				width: 15%;
			}
			td{
				text-align: left;
			}
			.modify{
				text-align: center;
			}

			.allmodify{
				float: right;
				background-color:#00FFFF;
				cursor: pointer;
				border: 2px solid #ccc;
			}
			.new_id{
				text-align: center;
				background-color:#A6C8FF;			
			}
			.new_id a{
				width: 100%;
				color: red;
			}
			#add{
				float: right;
				border: 1px solid red;
				margin-right: 100px;
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<h1>管理员列表<span><a id='add' href="addadmin.php">添加</a></span></h1>
		<form action="adminaction.php" method="post">
			<table width="100%" border="1" align="center">
				<tr><td class='new_id'><a href="../lib/alterdb.php?table=<?php echo $table;?>&type=<?php echo $type;?>">重新编号</a></td></tr>
				<tr>
					<th width="20%">编号</th><th width="20%"> 管理员名称</th><th width="20%"> 管理员邮箱</th><th width="60%">操作</th>
				</tr>
				<?php foreach($rows as $row){?>
				<tr>
					<td><input type="checkbox" /><?php echo $row['id'];?></td>
					<td><?php echo $row['username'];?></td>
					<td><?php echo $row['email'];?></td>
					<td class="modify">
						<a href="adminaction.php?act=deleteadmin&id=<?php echo $row['id'];?>">删除</a>
						<a href="adminaction.php?act=editadmin&id=<?php echo $row['id'];?>">修改</a>
					</td>
				</tr>
				<?php }?>
				<tr>
					<td colspan="4" class="page"><?php echo showpage($page,$pagenum);?><a class="allmodify">批量修改</a></td>
				</tr>
			</table>
		</form>
	</body>
</html>