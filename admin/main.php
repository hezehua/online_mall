<?php
	session_start();
	echo PHP_OS;
	echo PHP_VERSION;
	echo PHP_SAPI;
	echo $_SESSION['adminname'];
?>