<?php

function checkuser($sql){
	return fetchone($sql);
}

function adduser(){
	$reg="0";
	if(isset($_POST['enpwd'])){
		$reg='1';
		unset($_POST['enpwd']);
	}
	$arr=$_POST;
	$infos=biuldinfo();
	$filename=uploadfile($infos,'../userface');//上传到该路径
	$arr['face']=$filename;
	$arr['regtime']=time();
	$name=$arr['username'];
	$sql="select * from shop_user where username={$name}";
	if(fetchone($sql))$is=fetchone($sql);
	if(isset($is)){
		$mes="用户已存在";
		if($reg)alertmes($mes, "../register.php");
		else alertmes($mes, 'adduser.php');
	}
	$sex=$arr['sex'];
	if($sex == 0)$arr['sex']='男';
	if($sex == 1)$arr['sex']='女';
	if($sex == 2)$arr['sex']='保密';
	
//	print_r($_POST);
	$res=insert('shop_user', $arr);
//	exit;
	$mes="";
	if($res){
		if($reg=="1"){
			echo "<script>alert('注册成功，请登录');window.location='../login.php'</script>";
		}else $mes="<span>添加成功! </span><br /><a href='adduser.php'>继续添加</a><a href='listuser.php'>查看用户</a>";
	}else{
		if($reg=="1"){
			echo "<script>alert('注册失败，请重新注册');window.location='../register.php'</script>";
		}else $mes="<span>添加失败！</span><br /><a href='adduser.php'>重新添加</a>";
	}
	return $mes;
}	

function getalluser(){
	$sql="select id,username,email from mall_admin";
	$rows=fetchall($sql);
	return $rows;
}
function edituser($id){
	$sql="select * from shop_user where id={$id}";
//	echo $sql;
	$row=fetchone($sql);
	$str= "<form action='adminaction.php?act=submit&table=shop_user&id={$row['id']}' method='post'>";
	$str=$str. "<table width='70%' bgcolor='#ccc' align='center' border='1'>";
	$str=$str. "<tr><td>用户名</td><td><input  name='username' type='text' value='{$row['username']}' /></td></tr>";
	$str=$str. "<tr><td>密码</td><td><input  name='password'  type='text' value='{$row['password']}'/></td></tr>";
//	$str=$str. "<tr><td>头像</td><td><input  name='password'  type='text' value='{$row['password']}'/></td></tr>";
	$str=$str. "<tr><td>性别</td>
				<td id='sex'>
				<input  name='sex' value='男' type='radio' ".(($row['sex']=='男')?"checked='checked'":"")."/>男
				<input  name='sex'  value='女' type='radio' ".(($row['sex']=='女')?"checked='checked'":"")."/>女
				<input  name='sex'  value='保密' type='radio' ".(($row['sex']=='保密')?"checked='checked'":"")."/>保密
				</td>
				</tr>";
	$str=$str. "<tr><td>邮箱</td><td><input type='text' name='email' value='{$row['email']}'</td></tr>";
	$str=$str. "<tr><td><button type='submit'>修改</td></tr>";
	$str=$str. "</table><br />";	
	$str=$str. "</form>";
	return $str;
}
function deleteuser($table,$where){
	$sql="select * from {$table} where {$where}";
	$row=fetchone($sql);
	$facepath=$row['face'];
	if(!unlink($facepath)){
		alertmes('无法删除头像', 'listuser.php');
	}
	$mes=delete($table,$where);	
	if(!$mes){
		alertmes('删除出错', 'listuser.php');
	}
	return $mes;	
}
?>