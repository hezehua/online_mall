<?php
header("content-type:text/html;charset=utf-8");
define('ROOT', dirname(__FILE__));
if(!isset($_SESSION)){
	session_start();
}
date_default_timezone_set("ETC/GMT-8");
set_include_path(".".PATH_SEPARATOR.ROOT.'\lib'.PATH_SEPARATOR.ROOT.'\core'.PATH_SEPARATOR.ROOT.'\configs'.PATH_SEPARATOR.ROOT.'\user'.PATH_SEPARATOR.get_include_path());
require_once 'codestring.php';
require_once 'mysql.php';
require_once 'codeimage.php';
require_once 'common.php';
require_once 'page.php';
require_once 'uploadfunc.php';
require_once 'resizeimagefunc.php';
require_once 'config.php';
require_once 'admininc.php';
require_once 'classifyinc.php';
require_once 'watertext.php';
require_once 'waterpic.php';
require_once 'goodsinc.php';
require_once 'albuminc.php';
require_once 'userinc.php';
require_once 'common.php';
?>