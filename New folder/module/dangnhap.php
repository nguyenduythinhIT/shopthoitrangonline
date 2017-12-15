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
if($sm=="Đăng nhập")
{
	$tk=postIndex('tk');
	$mk=postIndex('mk');
	$ad=new ADMIN();
	$kh=new TAIKHOAN();
	if(count($ad->timmk(mahoa($tk.$mk)))==1)
	{
		$_SESSION['ten']=$tk;
		$_SESSION['trangthai']=true;
	}
	else if(count($kh->timmk(mahoa($tk.$mk)))==1)
	{
		$_SESSION['ten']=$tk;
		$_SESSION['trangthai']=false;
	}
	else{
		header("Location:../index.php?error=1");
	}
}
header("Location:../");
?>