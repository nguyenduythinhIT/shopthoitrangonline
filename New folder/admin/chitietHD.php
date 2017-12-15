<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Shop thời trang online</title>

<link rel='stylesheet' href="../css/style.css"/>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>

</head>	

<body> 
<div id="head">
	<div class="top">
		<a href="../index.php">ShopThờiTrang</a>
		<form action="../index.php" method="get">
			<input type="search" name="s" placeholder="Tìm kiếm">
			<input type="submit" value="Tìm" >
		</form>
	</div>
</div>
<div id="content" >
	<div class="left">
<?php
session_start();
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
if(!isset($_SESSION['ten']))
{
	$_SESSION['ten']=" ";
	$_SESSION['giohang']=array();
	$_SESSION['trangthai']=false;
}?>
<?php 
	include "menu_backend.php";
?>
	</div>
	<div class="right">
		<div style="width:100%;height:55px"></div>
		<div style="width:200px;float:left;"></div>
		<div id="main">
<style>
th{background:#2f3539;color:white;line-height:30px;min-width:100px;}
</style>
		<?php 
		$sp=new SANPHAM();
		$hd=new HOADON();
		$kh=new KHACHHANG();
		$ct=new chitietHD();
		$m=new MAU();
		$kt=new KICHTHUOC();
		?>
		<p style='width:80%;margin:0 auto;background:#2f3539;color:white;line-height:30px;font-weight:bold;text-align:center'>Chi tiết hoá đơn</p>
		<div style='width:50%;min-width:400px;margin:0 auto'>
		<?php 
			$hoadon=$hd->timma($_GET['ma']);
			echo "<br>Mã hoá đơn:<b>".$hoadon[0]['ma']."</b><br>";
			$khachhang=$kh->tim($hoadon[0]['makh']);
			echo "<br>Khách hàng:<b>".$khachhang[0]['ten']."</b><br>";
			echo "<br>Địa chỉ:<b>".$khachhang[0]['diachi']."</b><br>";
			echo "<hr><br>Chi tiết:";
			$ds=$ct->timma($_GET['ma']);
			echo "<br><table border=0>";
			echo "<tr><th>Tên SP</th><th>Màu</th><th>Kích thước</th><th>Số lượng</th><th>Giá bán</th></tr>";
			foreach($ds as $v)
			{
				$mau=$m->timma($v['mau']);
				$mau=$mau[0];
				$sanpham=$sp->timma($v['maSP']);
				$sanpham=$sanpham[0];
				$kichthuoc=$kt->timma($v['kichthuoc']);
				$kichthuoc=$kichthuoc[0];
				echo "<tr><td>$sanpham[ten]</td><td>$mau[ten]</td><td>$kichthuoc[ten]</td><td>$v[soluong]</td><td>".$sanpham['giaban']*$v['soluong']."VND</td></tr>";
				echo "<tr><td colspan=5 ><hr></td></tr>";
				
			}

			echo "<tr><td colspan=3 ><hr></td><th>TỔNG TIỀN:</th><td><b>".$hoadon[0]['tien']."VND</b></td></tr></table>";
			
			
		?>
		</div>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>