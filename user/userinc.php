<?php
function checkuserlogined(){
	if(isset($_SESSION['username']) == FALSE && isset($_COOKIE['username'])== FALSE){
		header('location:../login.php');
	}
}
function userlogout(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE['username'])){
		setcookie("username","",time()-1,'/');
	}
	if(isset($_COOKIE['password'])){
		setcookie("password","",time()-1,'/');
	}
	session_destroy(); 
	header('location:../index.php');
}	
?>