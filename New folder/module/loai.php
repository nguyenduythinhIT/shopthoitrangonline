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
$loai=new LOAI();
$sm=postIndex('sm');
$ma=postIndex('ma');
$ten=postIndex('ten');
$gt=postIndex('gt');

if(!$_SESSION['trangthai']) header("Location:../");
if(isset($_GET['ma'])) $loai->xoa($_GET['ma']);
else if($sm=="Thêm") 
{
	print_r($_POST);
	if($ma!="" && $ten!="" && $gt!="")
		$loai->them($ma,$ten,$gt);
		
}
else if($sm=="Cập nhật") 
{

	$loai->sua($ma,$ten,$gt);
}

header("Location:../admin/danhmuc.php");
?>