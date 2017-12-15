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
$kh=new KHACHHANG();
$ma=postIndex('ma');
$ten=postIndex('ten');
$gt=postIndex('gt');
$mail=postIndex('mail');
$sdt=postIndex('sdt');
$dc=postIndex('dc');
$kh->capnhat($ma,$ten,$gt,$mail,$sdt,$dc);
header("Location:../thongtin.php");
?>