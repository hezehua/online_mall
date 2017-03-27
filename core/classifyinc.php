<?php
function addclassify(){
	$arr=$_POST;
	if(insert('mall_classify', $arr)){
		$mes="<span>添加成功! </span><br /><a href='addclassify.php'>继续添加</a><a href='listclassify.php'>查看分类</a>";
	}else{
		$mes="<span>添加失败！</span><br /><a href='addclassify.php'>重新添加</a>";
	}
	return $mes;
}	

function editclassify($id){
	$sql="select * from mall_classify where id={$id}";
	$row=fetchone($sql);
	$str= "<form action='adminaction.php?act=submit&table=mall_classify&id={$row['id']}' method='post'>";
	$str=$str. "<table width='70%' bgcolor='#ccc' align='center'>";
	$str=$str. "<tr><td width='20%'><input  name='c_name' type='text' value='{$row['c_name']}' /></td><tr><td><button type='submit'>修改</td></tr>";
	$str=$str. "</form>";
	$str=$str. "</table>";	
	return $str;
}

function getallclassify(){
	$sql="select id,c_name from mall_classify";
	$rows=fetchall($sql);
	return $rows;
}
function deleteclassify($where){
	$url='listclassify.php';
	$id=explode('=', $where);
	$id=end($id);
	$mes=delete('mall_classify',$where);
	if(!$mes){
		$mes="删除分类出错";
		alertmes($mes, $url);
	}
	$where="c_id={$id}";
	$mes=deletegoods($where);
	if(!$mes){
		$mes="删除商品出错";
		alertmes($mes, $url);
	}
}
function getclassifybyid($id){
	$sql="select * from mall_classify where id={$id}";
	$row=fetchone($sql);
	return $row;
}
?>