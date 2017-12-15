<?php
session_start();
include_once "../config/config.php";
include_once "module/functions.php";
function loadClass($c)
{
	include "classes/$c.class.php";	
}
spl_autoload_register("loadClass");
	$_SESSION['ten']=" ";
	$_SESSION['giohang']=array();
	$_SESSION['trangthai']=false;
header("Location:../");
?>