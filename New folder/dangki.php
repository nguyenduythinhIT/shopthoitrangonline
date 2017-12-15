<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shop thời trang online</title>

<link rel='stylesheet' href="css/style.css"/>
<script src="js/jquery-3.2.1.min.js">
<?php
session_start();
include_once "config/config.php";
include_once "module/functions.php";
if(!isset($_SESSION['ten']))
{
	$_SESSION['ten']=" ";
	$_SESSION['giohang']=array();
	$_SESSION['trangthai']=false;
}
?>
</script>
<script src="js/main.js"></script>

</head>	

<body> 
<div id="head">

	<div class="top">
		<a href="index.php">ShopThờiTrang</a>
		<form action="index.php" method="get">
			<input type="search" name="s" placeholder="Tìm kiếm">
			<input type="submit" value="Tìm" >
		</form>
		<a href="giohang.php" style='width:25%'>Giỏ hàng:<?php echo count($_SESSION['giohang']);?> SP</a>
	</div>
</div>
<div id="content" >
	<div class="left">
<?php
function loadClass($c)
{
	include "classes/$c.class.php";	
}
spl_autoload_register("loadClass");
?>
		<?php include "include/dangnhap.php"; ?>
		<hr style="clear:both"/>
		<div><a href="index.php">TRANG CHỦ</a></div>
		<hr/>
		<p>Danh mục sản phẩm</p>
		<br style="clear:both">

		<?php 
			$loai=new LOAI();
			$ds=$loai->getAll();
			foreach($ds as $v)
			{ ?><div><a href="index.php?p=<?php echo $v['ma']; ?>"><?php if($v['gioitinh']==1 ){ echo $v['ten']." "."Nam";} else echo $v['ten']." "."Nữ";?></a></div><?php }
		?>
	</div>
	<div class="right">
		<div style="width:100%;height:55px"></div>
		<div style="width:200px;float:left;"></div>
		<div id="main">
		<fieldset style='width:500px;margin:0 auto'><p style='width:100%;height:30px;background:#000;color:#fff;line-height:30px;text-align:center;'>ĐĂNG KÍ</p>
		<form action='module/dangki.php' method='post'>
		<table border=0>
		<tr><td>Tên đăng nhập:</td><td><input type='text' name='tk' style='width:350px;'></td></tr>
		<tr><td>Mật khẩu:</td><td><input type='password' name='mk' style='width:350px;'></td></tr>
		<tr><td>Nhập lại Mật khẩu:</td><td><input type='password' style='width:350px;'></td></tr>
		<tr><td colspan=2><hr></td></tr>
		<tr><td>Họ tên:</td><td><input type='text' name='ten' style='width:350px;'></td></tr>
		<tr><td>Giới tính:</td><td><select name='gt' style='width:100px;height:30px'><option value=1>Nam</option><option value=2>Nữ</option></select></td></tr>
		<tr><td>Mail:</td><td><input type='text' name='mail' style='width:350px;'></td></tr>
		<tr><td>Địa chỉ:</td><td><input type='text' name='dc' style='width:350px;'></td></tr>
		<tr><td>Số điện thoại:</td><td><input type='text' name='sdt' style='width:350px;'></td></tr>
		<tr><td></td><td><input type='submit' name='sm' value='Xác Nhận' style='width:150px;height:30px'></td></tr>
		</table>
		</form></fieldset>
		</div>
		<div id="foot">
		<?php include "include/foot.php"; ?>
		</div>
	</div>
</div>

</body>
</html>