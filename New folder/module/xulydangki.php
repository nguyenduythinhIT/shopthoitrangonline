<?php 
session_start();
if($_SESSION['page']!="dangki.php") {header("Location:../index.php");}
include_once "../config/config.php";
include_once "functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");

$taikhoan=new TAIKHOAN();
$khachhang=new KHACHHANG();
$sm=postIndex('sm');

$tk=postIndex('taikhoan');
$mk1=postIndex('matkhau1');

$ten=postIndex('ten');
$gt=postIndex('gt');
$mail=postIndex('mail');
$sdt=postIndex('sdt');
$dc=postIndex('diachi');

$dskh=$khachhang->getAll();
if(count($dskh)==0) $ma="KH1";
else{
	$ma=$dskh[count($dskh)-1]['ma'];
	$i=1;
	$ma=tangma($ma);

}
$dstk=$taikhoan->getAll();
$khachhang->them($ma,$ten,$gt,$mail,$sdt,$dc);
$taikhoan->them($tk,$mk1,$ma);
header("Location:../index.php?message=Đăng+kí+thành+công");
?>