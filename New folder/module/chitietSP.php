<?php print_r($_GET);
session_start();
include_once "functions.php";
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
$ct=new chitietSP();
echo $sm=postIndex('sm');
echo $ma=postIndex('ma');
echo $mau=postIndex('mau');
echo $kt=postIndex('kt');
echo $sl=postIndex('sl');

if(!$_SESSION['trangthai']) header("Location:../");
if(isset($_GET['ma'])) 
{
	$l=explode("_",$_GET['ma']);
	$ma=$l[0];
	$kt=$l[1];
	$mau="#".$l[2];
}

else if($sm=="Thêm") 
{
	if($ma!="")
		$ct->them($ma,$mau,$kt,$sl);
}
else if($sm=="Xoá") 
{
	$ct->xoa($ma,$mau,$kt);
}

	header("Location:../admin/xem.php?p=sp&ma=$ma");
?>