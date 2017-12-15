<?php
print_r($_REQUEST);
session_start();
include_once "../config/config.php";
include_once "functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");

$taikhoan=new TAIKHOAN();
$khachhang=new KHACHHANG();
echo "<pre>";
print_r($_POST);
$tk=postIndex('tk');
$mk=postIndex('mk');
$ten=postIndex('ten');
$gt=postIndex('gt');
$mail=postIndex('mail');
$dc=postIndex('dc');
$sdt=postIndex('sdt');

$kh=$khachhang->getAll();
if(count($kh)==0) $ma='KH1';
else $ma=tangma_($kh[count($kh)-1]['ma']);
$khachhang->them($ma,$ten,$gt,$mail,$sdt,$dc);
$taikhoan->them($tk,mahoa($tk.$mk),$ma);
header("Location:../");
?>