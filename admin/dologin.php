<?php
require_once '../include.php';
$username="";
$password="";
if(isset($_POST['username']))$username=addslashes($_POST['username']);//addslashes() 函数返回在预定义字符之前添加反斜杠的字符串
if(isset($_POST['password']))$password=md5($_POST['password']);
if(isset($_POST['varify']))$varify=$_POST['varify'];
if(isset($_SESSION['varify']))$varify_=$_SESSION['varify'];
if(isset($_POST['autoFlag']))$autoFlag=$_POST['autoFlag'];
if(isset($varify) && isset($varify_))
	if($varify == $varify_){		
		connect();
		$sql="select * from mall_admin where username='{$username}' and password='{$password}'";
		$row=checkadmin($sql);
		if($row){
			if(isset($autoFlag))if($autoFlag){
				setcookie("adminname",$row['username'],time()+7*24*3600,'/');
			}
			$_SESSION['adminname']=$row['username'];
			alertmes('登陆成功', '../admin/index.php');
		}
		else alertmes('登陆失败', '../adminlogin.php');	
	}else{
		alertmes('验证码错误','../adminlogin.php');
	}
else{
	alertmes('网站未正常开启','../adminlogin.php');		
}
?>