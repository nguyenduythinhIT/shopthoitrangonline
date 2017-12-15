<?php
session_start();
include_once "../config/config.php";
include_once "functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");

print_r($_POST);
$tk=new TAIKHOAN();
$mk1=postIndex('mk1');
$mk2=postIndex('mk2');
$tk->capnhat(postIndex('tk'),mahoa(postIndex('tk').$mk1),mahoa(postIndex('tk'),$mk2));
header("Location:../thongtin.php");
?>