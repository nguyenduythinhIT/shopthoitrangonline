<?php 
session_start();
include_once "config/config.php";
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
}
$_SESSION['page']="index.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Shop thời trang online</title>
<!-- InstanceEndEditable -->
<link rel='stylesheet' href="css/styles.css"/>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>	

<body>

<div id="head">
	<div class="top">
		<div id="logo"><a href="index.php">LOGO</a></div>
		<div id="search">
			<form action="module/xulytimkiem.php">
				<input type="search" name="search" placeholder="Tìm kiếm" />
				<input type="submit"value="Tìm kiếm" />
			</form>
		</div>
		<div id="login"><?php 
		if($_SESSION['ten']==" ")
		{ echo "<a href='dangnhap.php'>Đăng nhập</a>"; }
		else
		{
			echo "<a href='dangxuat.php'>Đăng xuất</a>";
		}
		?></div>
		<div id="setting"><?php 
		if($_SESSION['ten']==" ")
		{ }
		else
		{
			if($_SESSION['trangthai']==false) echo "<a href='thongtin.php'>Thông tin</a>";
			else echo "<a href='admin/'>Quản lý</a>";
		}
		?></div>
		<br style="clear:both">
	</div>
	<div class="bottom">
		<a href="danhmuc.php?page=new" class="sub-menu">New</a>
		<a href="danhmuc.php?page=hot" class="sub-menu">Hot</a>
		<a href="danhmuc.php?page=nam" class="sub-menu">Đồ Nam</a>
		<a href="danhmuc.php?page=nu" class="sub-menu">Đồ Nữ</a>
		<a href="giohang.php" class="sub-menu">Giỏ hàng</a>
		
	</div>
</div>
<div id="space"></div>
<div id="backtotop"><p>TOP</p></div>
<br style="clear:both"/>
<div id="cont">
<!-- InstanceBeginEditable name="EditRegion3" -->

<!-- InstanceEndEditable -->
</div>
<br style="clear:both"/>
<div id="foot"></div>
</body>
<!-- InstanceEnd --></html>
