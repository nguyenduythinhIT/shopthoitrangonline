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
}
$_SESSION['page']="admin/";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/index.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Shop thời trang online</title>
<!-- InstanceEndEditable -->
<link rel='stylesheet' href="../css/styles.css"/>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>	

<body>

<div id="head">
	<div class="top">
		<div id="logo"><a href="index.php">LOGO</a></div>
		<div id="search">
			<form action="../module/xulytimkiem.php">
				<input type="search" name="search" placeholder="Tìm kiếm" />
				<input type="submit"value="Tìm kiếm" />
			</form>
		</div>
		<div id="login"><?php 
		if($_SESSION['ten']==" ")
		{ echo "<a href='../dangnhap.php'>Đăng nhập</a>"; }
		else
		{
			echo "<a href='../dangxuat.php'>Đăng xuất</a>";
		}
		?></div>
		<div id="setting"><?php 
		if($_SESSION['ten']==" ")
		{ }
		else
		{
			if($_SESSION['trangthai']==false) echo "<a href='../thongtin.php'>Thông tin</a>";
			else echo "<a href='index.php'>Quản lý</a>";
		}
		?></div>
		<br style="clear:both">
	</div>
	<div class="bottom">
		<a href="../danhmuc.php?page=new" class="sub-menu">New</a>
		<a href="../danhmuc.php?page=hot" class="sub-menu">Hot</a>
		<a href="../danhmuc.php?page=nam" class="sub-menu">Đồ Nam</a>
		<a href="../danhmuc.php?page=nu" class="sub-menu">Đồ Nữ</a>
		<a href="../giohang.php" class="sub-menu">Giỏ hàng</a>
		
	</div>
</div>
<div id="space"></div>
<div id="backtotop"><p>TOP</p></div>
<br style="clear:both"/>
<div id="cont">
<!-- InstanceBeginEditable name="EditRegion3" -->
<div id="backend">
	<p class="title">BACKEND</p>
    <div class="left">
    	<div><a href="index.php">Thông tin</a></div>
    	<div  style="background:#3a5257;"><a href="danhmuc.php">QL Danh mục</a></div>
        <div><a href="khachhang.php">QL Khách hàng</a></div>
        <div><a href="hoadon.php">QL Hoá đơn</a></div>
        <div><a href="khuyenmai.php">QL Khuyến mãi</a></div>
    </div>
    <div class="right">
    	<div>
		<p>Danh mục</p>
		<?php 
		$loai=new LOAI(); 
		$mau=new MAU();
		$kt=new KICHTHUOC();
		$nsx=new NHASANXUAT();
		?>
		<div>
			Loại:<br>
			<div class="add">
				<form action="../module/loai.php" method="post">
					<table>
						<tr><td colspan=2>Thêm Loại:</td></tr>
						<tr><td>Mã:</td><td><input type="text" name="ten" /></td></tr>
						<tr><td>Tên:</td><td><input type="text" name="ten" /></td></tr>
						<tr><td>Giới tính</td><td><input type="radio" name="gt" value=1 checked />Nam<input type="radio" name="gt" value=0 />Nữ</td></tr>
						<tr><td></td><td><input type="submit" name="sm" value="Thêm"/><input type="reset" value="Đóng" style="width:100px;height:27px;" /></td></tr>
					</table>
				</form>
			</div>
			<?php $list=$loai->getAll();
			table($list,"loai");
			?>
		</div>
		<div>
			Màu:<br>
			<div class="add">
			</div>
			<?php $list=$mau->getAll();
			table($list,"mau");
			?>
		</div>
		<div>
			Kích thước:<br>
			<div class="add">
			</div>
			<?php $list=$kt->getAll();
			table($list,"kichthuoc");
			?>
		</div>
		<div>
			Nhà sản xuất:<br>
			<div class="add">
			</div>
			<?php $list=$nsx->getAll();
			table($list,"nhasanxuat");
			?>
		</div>
		
        </div>
    </div>
</div>
<br style="clear:both"/>
<!-- InstanceEndEditable -->
</div>
<br style="clear:both"/>
<div id="foot"></div>
</body>
<!-- InstanceEnd --></html>
