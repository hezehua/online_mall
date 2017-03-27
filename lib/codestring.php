<?php
function codestring($type=1,$length=4){
	if($type == 1){
		$chars=join("",range(0, 9));
	}elseif($type == 2){
		$chars=join("", array_merge(range('a', 'z'),range('A', 'Z')));
	}elseif($type == 3){
		$chars=join("", array_merge(range('a', 'z'),range('A', 'Z'),range(0, 9)));
	}
	if($length > strlen($chars)){
		echo "字符长度不够！。。。";
	}
	$chars = str_shuffle($chars);
	return substr($chars,0, $length);
}

function getuniname(){
	return md5(uniqid(microtime(true),true));
	//microtime() 当前 Unix 时间戳和微秒数
	//uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID
}
function getext($filename){
	$ext=explode('.', $filename);
	return strtolower(end($ext));
	//end() 函数将数组内部指针指向最后一个元素
}
?>