<?php

function checkadmin($sql){
	return fetchone($sql);
}
function checklogined(){
	if(isset($_SESSION['adminname']) == FALSE && isset($_COOKIE['adminname'])== FALSE){
		header('location:../adminlogin.php');
	}
}
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['adminname'])){
		setcookie("adminname","",time()-1,'/');
	}
	session_destroy();
	header('location:../adminlogin.php');
}
function addadmin(){
	$arr=$_POST;
	if(isset($_POST))$arr['password']=md5($_POST['password']);
	if(insert('mall_admin',$arr)){
		$mes="<span>添加成功！</span><br /><a href='addadmin.php'>继续添加</a>|<a href='listadmin.php'>查看管理员</a>";
	}else{
		$mes="<span>添加失败！</span><br /><a href='addadmin.php'>重新添加</a>";
	}
	return $mes;
}
function getalladmin(){
	$sql="select id,username,email from mall_admin";
	$rows=fetchall($sql);
	return $rows;
}
function editadmin($id){
	$sql="select *from mall_admin where id={$id}";
	$row=fetchone($sql);
	$str= "<form action='adminaction.php?act=submit&table=mall_admin&id={$row['id']}' method='post'>";
	$str=$str. "<table width='70%' bgcolor='#ccc' align='center'>";
	$str=$str. "<tr><td width='20%'><input  name='username' type='text' value='{$row['username']}' /></td><td width='40%'><input  name='password'  type='text' value='{$row['password']}'</td><td width='20%'><input type='text' name='email' value='{$row['email']}'</td><td width='20%'><button type='submit'>修改</td></tr>";
	$str=$str. "</form>";
	$str=$str. "</table>";	
	return $str;
}
?>