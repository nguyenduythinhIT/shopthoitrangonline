<?php
session_start();
include_once "../config/config.php";
include_once "functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");

$sm=postIndex('sm');

print_r($_GET);
print_r($_POST);
$ds=explode(".",postIndex('chon'));
$masp=$_GET['p'];
$mau=$ds[0];
$kt=$ds[1];
$sl=postIndex('soluong');
$arr=array($masp,$mau,$kt,$sl);
$_SESSION['giohang'][]=$arr;
header('Location:../')
?>