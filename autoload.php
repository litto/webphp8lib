<?php
	date_default_timezone_set("Asia/Calcutta");
	define("CONST_BASEDIR",dirname(__FILE__));
	define('CONST_LIBRARY_FOLDER',CONST_BASEDIR.'/libs');
	$_SESSION['CONST_BASEDIR']=CONST_BASEDIR;
error_reporting(E_ALL & ~ E_NOTICE);
spl_autoload_register(function ($class_name) {
    include 'libs/'.$class_name . '.php';
});
?>