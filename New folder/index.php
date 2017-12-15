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
		<div style="width:100%;height:35px"></div>
		<div style="width:200px;float:left;"></div>
		<div id="main">
		<?php include "include/index.php"; ?>
		</div>
		<div id="foot">
		<?php include "include/foot.php"; ?>
		</div>
	</div>
</div>

</body>
</html>