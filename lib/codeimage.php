<?php
require_once('codestring.php');
function varifyImage($type=1,$length=4){
	if(!isset($_SESSION)){
		session_start();
	}
	$wid=100;
	$hei=40;
	$image=imagecreate($wid, $hei);
	$color=imagecolorallocate($image, 255, 255, 255);
	imagefilledrectangle($image, 1, 1, $wid-2, $hei-2, $color);
	$fontfiles=array('BUXTONSKETCH.TTF','CONSOLA.TTF','CONSOLAB.TTF','CONSOLAI.TTF','CONSOLAZ.TTF','SIMHEI.TTF','SIMKAI.TTF','PRINT.TTF');
	$chars=codestring($type,$length);
	$session_name="varify";
	$_SESSION[$session_name]=$chars;
	for($i=0;$i<$length;$i++){
		$size=mt_rand(16, 24);
		$angle=mt_rand(-15, 15);
		$x=5+$i*$size;
		$y=mt_rand(18,34);
		$color=imagecolorallocate($image, mt_rand(50, 100), mt_rand(80, 150), mt_rand(100, 150));
		$font='../fonts/'.$fontfiles[mt_rand(0, count($fontfiles)-1)];
		$text=$chars[$i];
		imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
	}
	for($i=0;$i<50;$i++){
		imagesetpixel($image, mt_rand(0, $wid), mt_rand(0, $hei-1), imagecolorallocate($image,mt_rand(100, 175),mt_rand(175, 250),mt_rand(150, 250)));
	}
	for($i=0;$i<10;$i++){
		imageline($image, mt_rand(0, $wid/2), mt_rand(0, $hei), mt_rand($wid/2,$wid-2), mt_rand(0,$hei), imagecolorallocate($image,mt_rand(100, 175),mt_rand(175, 250),mt_rand(150, 250)));
	}
	header("content-type:image/jpeg");
	imagejpeg($image);
	imagedestroy($image);	
}	
//varifyImage(1,4);
?>