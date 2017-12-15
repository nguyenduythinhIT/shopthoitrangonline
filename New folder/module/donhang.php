<?php
session_start();
include_once "../config/config.php";
include_once "functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
$hd=new HOADON();
$ct=new chitietHD();
$sp=new chitietSP();
$ds=$ct->timma($_GET['ma']);
echo "<pre>";
foreach($ds as $v)
{
	print_r($v);
	$sanpham=$sp->timsp($v['maSP'],$v['mau'],$v['kichthuoc']);
	print_r($sanpham=$sanpham[0]);
	$sanpham['soluong']=$sanpham['soluong']-$v['soluong'];
	$sp->capnhat($sanpham['masp'],$sanpham['mau'],$sanpham['kichthuoc'],$sanpham['soluong']);
}
$hd->capnhat($_GET['ma']);
header("Location:../admin/hoadon.php");
?>