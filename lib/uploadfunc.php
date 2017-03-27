<?php
//上传文件
//require_once '../lib/codestring.php';
//header("content-type:text/html;charset=utf-8");
function biuldinfo(){
	foreach($_FILES as $fileinfo){
		if(is_string($fileinfo['name'])){//单文件上传
			$infos[]=$fileinfo;
	//		print_r($fileinfo);
		}
		else{
			foreach ($fileinfo as $key_ => $value) {//多文件上传
				foreach($value as $key => $info){
					$infos[$key][$key_]=$info;
				}	
			} 
	//		var_dump($infos);
		}
	}
	if(isset($infos))return $infos;
}

function uploadfile($infos,$path="uploadimage",$maxsize=1048576,$allowext=array('jpg','jpeg','gif','png','bmp')){		
	if(!file_exists($path)){//file_exists() 函数检查文件或目录是否存在
		mkdir($path,0777,true);//mkdir() 函数创建目录	
	}	
	$str="";
	if(isset($infos))
	foreach($infos as $fileinfo){		
		$ext=getext($fileinfo['name']);
		$name=getuniname().'.'.$ext;	
		$destination=$path.'/'.$name;										
		if($fileinfo['error'] == UPLOAD_ERR_OK){
			if(!in_array($ext,$allowext)){
				//限制上传文件类型	
				echo "非法文件类型"."<br /><a href='../addgoods.php'>重新上传</a>";
				exit;
			}
			if($fileinfo['size'] > $maxsize){
				echo "文件超过2M无法上传"."<br /><a href='../addgoods.php'>重新上传</a>";
				exit;
			}
			$isimage=getimagesize($fileinfo['tmp_name']);//获取图片信息用以判断是否是真正图片
			if(!$isimage){
				echo "禁止上传假冒图片"."<br /><a href='../addgoods.php'>重新上传</a>";
				exit;
			}
			//文件是否是通过http-post方式上传的
			if(is_uploaded_file($fileinfo['tmp_name'])){
				if(move_uploaded_file($fileinfo['tmp_name'], $destination)){
					unset($fileinfo['tmp_name'],$fileinfo['error'],$fileinfo['size'],$fileinfo['type']);
					$mes=$path.'/'."{$name}";
				}else{
					$mes="文件上传失败"."<br /><a href='../addgoods.php'>重新上传</a>";
					exit($mes);
				}
			}else{
				$mes="文件不是以HTTP POST 方式上传的"."<br /><a href='../addgoods.php'>重新上传</a>";
				exit($mes);
			}
		}else{
			switch($fileinfo['error']){
				case UPLOAD_ERR_INI_SIZE:
					$mes="超过配置文件上传文件大小"."<br /><a href='../admin/addgoods.php'>重新上传</a>";
					exit($mes);
				case UPLOAD_ERR_FORM_SIZE:
					$mes="超过表单设置上传文件大小"."<br /><a href='../admin/addgoods.php'>重新上传</a>";
					exit($mes);
				case UPLOAD_ERR_PARTIAL:
					$mes="文件部分被上传"."<br /><a href='../admin/addgoods.php'>重新上传</a>";
					exit($mes);
				case UPLOAD_ERR_NO_FILE:
					$mes="没有文件被上传"."<br /><a href='../admin/addgoods.php'>重新上传</a>";
					exit($mes);
				case UPLOAD_ERR_NO_TMP_DIR:
					$mes="没有找到临时目录"."<br /><a href='../admin/addgoods.php'>重新上传</a>";
					exit($mes);
				case UPLOAD_ERR_CANT_WRITE:
					$mes="文件不可写"."<br /><a href='../admin/addgoods.php'>重新上传</a>";
					exit($mes);
				case UPLOAD_ERR_EXTENSION:
					$mes="PHP扩展程序中断了文件上传"."<br /><a href='../admin/addgoods.php'>重新上传</a>";
					exit($mes);
				default:$mes="上传出错"."<br /><a href='../admin/addgoods.php'>重新上传</a>";	
			}	
		}	
		if($str)$str=$str.','.$mes;
		else $str=$str.$mes;
	}
	return $str;
}

?>