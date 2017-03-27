<?php
require_once '../include.php';
$act="";
$mes="";
if(isset($_REQUEST['act']))$act=$_REQUEST['act'];
if($act == 'logout'){
	userlogout();
}
?>