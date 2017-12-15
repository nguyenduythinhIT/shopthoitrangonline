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
if(isset($_GET['ma']))	$kichthuoc->xoa($_GET['ma']);
if(!$_SESSION['trangthai']) header("Location:../");
else if($sm=="Thêm") 
{
	if($ma!="" && $ten!="")
		$kichthuoc->them($ma,$ten);
}
else if($sm=="Xoá"){
	$kichthuoc->xoa($ma);
}
else if($sm=="Cập nhật") 
{
	$kichthuoc->sua($ma,$ten);
}
print_r($_POST);
	header("Location:../admin/danhmuc.php");
?>