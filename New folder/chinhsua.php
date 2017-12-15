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
$_SESSION['page']='giohang';
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
		<a href="giohang.php" style='width:25%'><p style='float:left;'>Giỏ hàng:</p><p style='color:red;float:left;'><?php echo count($_SESSION['giohang']);?></p>SP</a>
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
<style>
</style>
		<p style='background:#2f3539;width:90%;height:30px;font-size:20px;line-height:30px;text-align:center;color:white;margin:0 auto;'>
			Thông tin tài khoản:
		</p>
		<div style='min-width:400px;width:75%;margin:0 auto'>
		<?php
		$tk=new TAIKHOAN();
		$user=$tk->tim($_SESSION['ten']);
		$kh=new KHACHHANG();
		$detail=$kh->tim($user[0]['makh']);
		print_r($detail);
		echo "<hr>";
		echo "<b>Thông tin cá nhân:</b><br>";
		echo "<form action='module/khachhang.php' method='post'>";
		echo "<table style='width:400px;'>";
		echo "<tr><td>Mã khách hàng:</td><td><input type='text' name='ma' value='".$detail[0]['ma']."' readonly></td></tr>";
		echo "<tr><td>Tên khách hàng:</td><td><input type='text' name='ten' value='".$detail[0]['ten']."'></td></tr>";
		echo "<tr><td>Giới tính:</td><td>";
		echo "<select name='gt'><option value=1 "; 
		if($detail[0]['gt']==1) echo "selected";
		echo ">Nam</option><option value=0 "; 
		if($detail[0]['gt']==0) echo "selected";
		echo ">Nữ</option></select></td></tr>";
		echo "<tr><td>Email:</td><td><input type='text' name='mail' value='".$detail[0]['mail']."'></td></tr>";
		echo "<tr><td>Số điện thoại:</td><td><input type='text' name='sdt' value='".$detail[0]['sdt']."'></td></tr>";
		echo "<tr><td>Địa chỉ:</td><td><input type='text' name='dc' value='".$detail[0]['diachi']."'></td></tr>";
		echo "<tr><td></td><td><input type='submit' value='Chỉnh sửa'></td></tr>";
		echo "</table>";
		echo "</form>";
		echo "<form action='module/taikhoan.php' method='post'>";
		echo "<table style='width:400px;'>";
		echo "<b>Thông tin tài khoản:</b><br>";
		echo "<tr><td>Tài khoản:</td><td><input type='text' name='tk' value='".$user[0]['taikhoan']."' readonly></td></tr>";
		echo "<tr><td>Mật khẩu 1:</td><td><input type='password' name='mk1'></td></tr>";
		echo "<tr><td>Mật khẩu 2:</td><td><input type='password' name='mk2'></td></tr>";
		echo "<tr><td></td><td><input type='submit' value='Cập nhật'></td></tr>";
		echo "</table></form>";
		?>
		</div>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>