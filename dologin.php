<?php
require_once 'include.php';

$username="";
$password="";
if(isset($_POST['username']))$username=addslashes($_POST['username']);//addslashes() 函数返回在预定义字符之前添加反斜杠的字符串
if(isset($_POST['password']))$password=($_POST['password']);
if($username && $password){
	connect();	
	$sql="select * from shop_user where username='{$username}' and password='{$password}'";
	$row=checkadmin($sql);
	if($row){
		if(isset($autoFlag))if($autoFlag){
			setcookie("username",$row['username'],time()+7*24*3600,'/');
			setcookie("password",$row['password'],time()+7*24*3600,'/');
		}
		$_SESSION['username']=$row['username'];
		$_SESSION['password']=$row['password'];
		alertmes('登陆成功', 'index.php');
	}
	else alertmes('登陆失败', 'login.php');	
}else{
	alertmes('验证码错误','login.php');
}
?>