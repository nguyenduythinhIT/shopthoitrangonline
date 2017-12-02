<?php 
session_start();
if($_SESSION['page']!="dangnhap.php") {header("Location:../index.php");}
include_once "../config/config.php";
include_once "functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");

$sm=postIndex('sm');
if($sm == '') header("Location:../index.php");
$tk=postIndex('taikhoan');
$mk1=postIndex('matkhau1');

$admin=new ADMIN();
//$khachhang=new KHACHHANG();

$user=$admin->tim($tk);
if(count($user)==0) header("Location:../dangnhap.php?error=tk");
else{
	if($mk1 == $user[0]['matkhau1'])
	{
		$_SESSION['ten']=$tk;
		$_SESSION['trangthai']=true;
		header("Location:../index.php");
	}
}
?>