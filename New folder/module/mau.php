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
$mau=new MAU();
$sm=postIndex('sm');
$ma=postIndex('ma');
$ten=postIndex('ten');

if($sm=="") header("Location:../");
else if($sm=="Thêm") 
{
	if($ma!="" && $ten!="")
		$mau->them($ma,$ten,$gt);
	?><script>window.close();</script> <?php
}
else if($sm=="Xoá") 
{
	$mau->xoa($ma);
	header("Location:../admin/danhmuc.php");
}
else if($sm=="Sửa") 
{
	
	header("Location:../admin/danhmuc.php");
}
?>