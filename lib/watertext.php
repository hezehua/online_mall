<?php
function watertext($filename,$text='hhhzua',$size=20,$angle=0,$font='simsun.ttc'){
//	$filename='../qqq.gif';
	$fileinfo=getimagesize($filename);
	$mime=$fileinfo['mime'];
	$createfunc=str_replace('/', 'createfrom', $mime);
	$outfunc=str_replace('/', null, $mime);
	$image=$createfunc($filename);
	$type=explode('/', $mime);
	$type=end($type);
//	$size=40;
//	$angle=0;
//	$x=$fileinfo['0']-140;
//	$y=$fileinfo['1']-230;
	$x=165;
	$y=25;//$size
	$color=imagecolorallocate($image, 0, 0, 0);
	$fontfile="../fonts/{$font}";
//	$text='何泽华';
//	print_r($fileinfo);
//	$image=iconv("UTF-8", "gb2312", $image);
	$type='content-type:image/'.$type;
//	header($type);
	imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
	$outfunc($image,$filename);//$filename
	imagedestroy($image);
	return $filename;
//	echo 'content-type:image/'.$type;
}
//watertext('title.png',"文化传媒");
?>