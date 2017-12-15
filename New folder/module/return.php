<?php
session_start();
include_once "../config/config.php";
include_once "functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
if(isset($_SESSION['page']))
{
	$_SESSION['page']='giohang';
	if(isset($_GET['order_code']))
	{
		$hd=new HOADON();
		$item=$hd->getAll();
		if(count($item)==0) $ma="HD1";
		else $ma=tangma_($item[count($item)-1]['ma']);
		$tk=new TAIKHOAN();
		$user=$tk->tim($_SESSION['ten']);
		$makh=$user[0]['makh'];
		$sanpham=new SANPHAM();
		$tien=0;
		$cthd=new chitietHD();
		foreach($_SESSION['giohang'] as $v)
		{
			$sp=$sanpham->timma($v[0]);
			$tien=$tien+$sp[0]['giaban']*$v[3];

		}
		$hd->them($ma,$makh,$tien,1);
		foreach($_SESSION['giohang'] as $v)
		{
			$cthd->them($ma,$v[0],"$v[1]",$v[2],$v[3]);	
		}
		$_SESSION['giohang']=array();
	}
}
header("Location:../");
?>