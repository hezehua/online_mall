<?php
function addgoods(){
	$arr=$_POST;
	$arr['pubtime']=time();
	$infos=biuldinfo();
	$filepath[]=$filename=uploadfile($infos,'../upload');//上传到该路径
	$dst_w=50;
	$dst_h=50;
	$path='../resize_image_50';
	if(file_exists($filename))$filepath[]=thumb($filename,$dst_w,$dst_h,$path);
	else{
		echo "文件不存在"."<a href='addgoods.php'>重新添加</a>";
		exit;
	}
	$res=insert('mall_goods', $arr);
	$pid=getinsertid();
	if($res && $pid){
		foreach($filepath as $uploadfile){			
			$blum['pid']=$pid;
			$blum['album_path']=$uploadfile;
			$mes=addalbum($blum);
		}
//		$mes="<span>添加成功! </span><br /><a href='addgoods.php'>继续添加</a><a href='listgoods.php'>查看商品</a>";
	}else{
		unlink($filepath);
		$mes="<span>添加失败！</span><br /><a href='addgoods.php'>重新添加</a>";
	}
	return $mes;
}	

function editgoods($id){
	$sql="select * from mall_goods where id={$id}";
	$row=fetchone($sql);
	$sql="select * from mall_classify where id={$row['c_id']}";
	$one=fetchone($sql);
	$sql="select * from mall_classify";
	$rows=fetchall($sql);
	
	$select="<select name='c_id'>";
	$option="";
	$is="";
	foreach($rows as $arow){
		if($one['id'] == $arow['id'])$is="selected";
		$option=$option."<option value='{$arow['id']}' {$is}>{$arow['c_name']}</option>";
		$is="";
	}	 
	$select=$select.$option."</select>";
	$str="<button><a href='listgoods.php'>返回</a></button>";
	$str=$str."<form action='adminaction.php?act=submit&table=mall_goods&id={$row['id']}' method='post'>";
	$str=$str. "<table width='100%' bgcolor='#ccc' align='center' border='1px'>";
	$str=$str. "<tr><th width='20%'>名称</th><td><input  name='g_name' type='text' value='{$row['g_name']}' /></td></tr>";
	$str=$str. "<tr><th>分类</th><td>{$select}</td></tr>";
	$str=$str. "<tr><th>货号</th><td><input  name='g_sn' type='text' value='{$row['g_sn']}' /></td></tr>";
	$str=$str. "<tr><th>数量</th><td><input  name='g_num' type='text' value='{$row['g_num']}' /></td></tr>";
	$str=$str. "<tr><th>市场价</th><td><input  name='m_price' type='text' value='{$row['m_price']}' /></td></tr>";
	$str=$str. "<tr><th>网购价</th><td><input  name='i_price' type='text' value='{$row['i_price']}' /></td></tr>";
	$str=$str. "<tr id='desc'><th>描述</th><td><textarea name='g_desc' id='text'>{$row['g_desc']}</textarea></td></tr>";
	$str=$str. "<tr><td colspan='2'><button type='submit'>修改</td></tr>";
	$str=$str. "</table>";
	$str=$str. "</form>";	
	return $str;
}

function getallgoods(){
	$sql="select * from mall_goods";
	$rows=fetchall($sql);
	return $rows;
}

function deletegoods($where){
	$url='listgoods.php';
	$id=explode('=', $where);
	$id=end($id);
	$mes=delete('mall_goods',$where);
	if(!$mes){
		$mes="删除商品出错";
		alertmes($mes, $url);
	}
	$where="pid={$id}";
	$mes=delete('user_album',$where);
	if(!$mes){
		$mes="删除图片出错";
		alertmes($mes, $url);
	}
	return $mes;
}
function getgoodsbyid($id){
	$sql="select * from mall_goods where id={$id}";
	$rows=fetchall($sql);
	return $rows;
}
function getgoodsbycid($cid){
	$sql="select * from mall_goods where c_id={$cid} limit 4";
	$rows=fetchall($sql);
	return $rows;
}
function getsmallgoodsbycid($cid){
	$sql="select * from mall_goods where c_id={$cid} limit 4,4";
	$rows=fetchall($sql);
	return $rows;
}
?>