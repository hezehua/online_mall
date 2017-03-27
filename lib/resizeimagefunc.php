<?php
//生成略缩图
function thumb($filename,$dst_w,$dst_h,$path='uploadimage'){	
	list($src_w,$src_h,$imagetype)=getimagesize($filename);
	$mime=image_type_to_mime_type($imagetype);
	// 取得 getimagesize，exif_read_data，exif_thumbnail，exif_imagetype 所返回的图像类型的 MIME 类型
//	$scale=0.1
	$createfunc=str_replace('/', 'createfrom', $mime);
	$outfunc=str_replace('/', "", $mime);
	
	$src_image=$createfunc($filename);	
//	$path='uploadimage';
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	if(strstr($filename, "/")){
		$file=explode('/', $filename);	
		$filename=end($file);
	}
	$filepath="{$path}/{$filename}";
//	$dst_w=ceil($src_w*$scale);
//	$dst_h=ceil($src_h*$scale);
	$dst_image=imagecreatetruecolor($dst_w,$dst_h);
	imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
//	header('content-type:image/jpeg');
	$outfunc($dst_image,$filepath);
	imagedestroy($src_image);
	imagedestroy($dst_image);
	//imagecreatefromjpeg() — 由文件或 URL 创建一个新图象。
	//list() 函数用数组中的元素为一组变量赋值
	//imagecreatetruecolor() — 新建一个真彩色图像
	//imagecopyresampled() — 重采样拷贝部分图像并调整大小
	//imagejpeg() 从 image 图像以 filename 为文件名创建一个 JPEG 图像
	return $filepath;
}
?>