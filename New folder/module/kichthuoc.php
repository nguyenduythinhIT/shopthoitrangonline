<?php 
session_start();
include_once "functions.php";
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
$kichthuoc=new KICHTHUOC();
$sm=postIndex('sm');
$ma=postIndex('ma');
$ten=postIndex('ten');

if($sm=="") header("Location:../");
else if($sm=="Thêm") 
{
	if($ma!="" && $ten!="")
		$kichthuoc->them($ma,$ten,$gt);
	?><script>window.close();</script> <?php
}
else if($sm=="Xoá") 
{
	$kichthuoc->xoa($ma);
	header("Location:../admin/danhmuc.php");
}
else if($sm=="Sửa") 
{
	
	header("Location:../admin/danhmuc.php");
}
?>