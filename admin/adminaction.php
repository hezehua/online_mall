<?php
require_once '../include.php';

$act="";
$mes="";
if(isset($_REQUEST['act']))$act=$_REQUEST['act'];
if($act == 'logout'){
	logout();
}elseif($act == 'addadmin'){
	connect();
	$mes=addadmin();
}elseif($act == 'editadmin'){
	connect();
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$mes=editadmin($id);
	}
}elseif($act == 'deleteadmin'){
	connect();
	if(isset($_REQUEST['id']))$where='id='.$_REQUEST['id'];
	$mes=delete('mall_admin',$where);
	if($mes)alertmes('删除成功', 'listadmin.php');
}elseif($act == 'submit'){
	connect();
	$arr=$_POST;
	if(isset($_REQUEST['table']))$table=$_REQUEST['table'];
	if(isset($_REQUEST['id']))$id=$_REQUEST['id'];
	$id="id={$id}";
	$result=update($table, $arr,$id);
	if($table == 'mall_admin'){
		if($result)alertmes('修改成功', 'listadmin.php');
		header('location:listadmin.php');
	}
	if($table == 'mall_classify'){
		if($result)alertmes('修改成功', 'listclassify.php');
		else header('location:listclassify.php');
	}
	if($table == 'mall_goods'){
		if($result)alertmes('修改成功', 'listgoods.php');
		else header('location:listgoods.php');
	}
	if($table == 'shop_user'){
		if($result)alertmes('修改成功', 'listuser.php');
		else header('location:listuser.php');
	}
}elseif($act == 'addclassify'){
	connect();
	$mes=addclassify();
}elseif($act == 'deleteclassify'){
	connect();
	$where='id=';
	if(isset($_REQUEST['id']))$where=$where.$_REQUEST['id'];
	deleteclassify($where);
	alertmes('删除成功', 'listclassify.php');
}elseif($act == 'editclassify'){
	connect();
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$mes=editclassify($id);
	}
}elseif($act == 'addgoods'){
	connect();
	$mes=addgoods();
}elseif($act == 'deletegoods'){
	connect();
	$where='id=';
	if(isset($_REQUEST['id']))$where=$where.$_REQUEST['id'];
	deletegoods($where);
	alertmes('删除成功', 'listgoods.php');
}elseif($act == 'editgoods'){
	connect();
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$mes=editgoods($id);
	}	
}elseif($act == 'show'){
	connect();
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$mes=editgoods($id);
	}
}elseif($act == 'adduser'){
	connect();
	$mes=adduser();
}elseif($act == 'deleteuser'){
	connect();
	$where="";
	if(isset($_REQUEST['id']))$where=$where.'id='.$_REQUEST['id'];	
	$mes=deleteuser('shop_user',$where);	
	if($mes)alertmes('删除成功', 'listuser.php');
}elseif($act == 'edituser'){
	connect();
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$mes=edituser($id);
	}
}elseif($act == 'watertext'){	
	connect();
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$text='1111111111';
		$mes=dowatertext($id,$text);
	}
	if(isset($mes))header('location:listgoodsimage.php');
}elseif($act == 'waterpic'){
	connect();
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		$mes=dowaterpic($id);
	}
	if(isset($mes))header('location:listgoodsimage.php');
}


?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			input{
				display: inline-block;
				width: 100%;
			}
			#text{			
				width: 99%;	
				height: 400px;	
			}
			*{
				font-size: 20px;
			}
			#desc{
				height: 100px;
			}
			a{
				text-decoration: none;
			}
			#sex input{
				width: 5%;
			}
		</style>
	</head>
	<body>
		<?php echo $mes;?>
	</body>
</html>