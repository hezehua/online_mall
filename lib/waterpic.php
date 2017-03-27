<?php
//	$srcfile='00.PNG';
//	$dstfile='logo.png';
//	waterpic($dstfile,$srcfile,40,25,0,0,100);
function waterpic($dstfile,$srcfile,$dst_x=0,$dst_y=0,$src_x=0,$src_y=0,$pct=50){
	$srcfileinfo=getimagesize($srcfile);
	$dstfileinfo=getimagesize($dstfile);

	$srcmime=$srcfileinfo['mime'];
	$mime=$dstmime=$dstfileinfo['mime'];
	$createsrcfunc=str_replace('/', 'createfrom', $srcmime);
	$createdstfunc=str_replace('/', 'createfrom', $dstmime);

	$outdst=str_replace('/', null, $dstmime);
	$type=explode('/', $mime);
	$type=end($type);
	$src_im=$createsrcfunc($srcfile);
	$dst_im=$createdstfunc($dstfile);
	$src_w=$srcfileinfo[0];
	$src_h=$srcfileinfo[1];
	imagecopymerge($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct);
	$type='content-type:image/'.$type;
	header($type);
	$outdst($dst_im,$dstfile);//$dstfile
	imagedestroy($dst_im);
	imagedestroy($src_im);
	return $dstfile;
	//imagecopymerge — 拷贝并合并图像的一部分	
}
?>