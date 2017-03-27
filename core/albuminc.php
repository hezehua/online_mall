<?php

function addalbum($arr){
	if(insert('user_album',$arr)){
		$mes="<span>图片添加成功！</span><br /><a href='addgoods.php'>继续添加</a>|<a href='listgoods.php'>查看商品</a>";
	}else{
		$mes="<span>图片添加失败！</span><br /><a href='addgoods.php'>重新添加</a>";
	}
	return $mes;
}
function getallalbum(){
	$sql="select id,username,email from user_album";
	$rows=fetchall($sql);
	return $rows;
}
function editalbum($id){
	$sql="select *from user_album where id={$id}";
	$row=fetchone($sql);
	$str= "<form action='adminaction.php?act=submit&table=user_album&id={$row['id']}' method='post'>";
	$str=$str. "<table width='70%' bgcolor='#ccc' align='center'>";
	$str=$str. "<tr><td width='20%'><input  name='username' type='text' value='{$row['username']}' /></td><td width='40%'><input  name='password'  type='text' value='{$row['password']}'</td><td width='20%'><input type='text' name='email' value='{$row['email']}'</td><td width='20%'><button type='submit'>修改</td></tr>";
	$str=$str. "</form>";
	$str=$str. "</table>";	
	return $str;
}
function getimgbyid($pid){
	$sql="select * from user_album where pid={$pid}";
	$rows=fetchall($sql);
	return $rows;
}

function dowatertext($id,$text){
	$sql="select * from user_album where pid='{$id}'";
	$row=fetchone($sql);
	$path=$row['album_path'];
	$path=watertext($path,$text);
	return $path;
}

function dowaterpic($id){
	$sql="select * from user_album where pid='{$id}'";
	$row=fetchone($sql);
	$path=$row['album_path'];
	$srcfile='../img/head.jpg';
	$path=waterpic($path, $srcfile);
	return $path;
}
?>