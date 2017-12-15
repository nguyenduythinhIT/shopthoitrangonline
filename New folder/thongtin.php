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
table{width:80%;margin:10px auto;min-width:600px}
td,th{height:30px;line-height:30px;min-width:30%;text-align:center;}
th{background:#2f3539;color:#EEE;font-size:20px;min-width:30%;}
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
		echo "<hr>";
		echo "<b>Thông tin cá nhân:</b><br>";
		echo "Mã khách hàng:".$detail[0]['ma']."<br>";
		echo "Tên khách hàng:".$detail[0]['ten']."<br>";
		echo "Giới tính:";
		if($detail[0]['gt']==1) echo "Nam"; else echo "Nữ";
		echo "<br>";
		echo "Email:".$detail[0]['mail']."<br>";
		echo "Số điện thoại:".$detail[0]['sdt']."<br>";
		echo "Địa chỉ:".$detail[0]['diachi']."<br>";
		echo "<b>Thông tin tài khoản:</b><br>";
		echo "Tài khoản:".$user[0]['taikhoan']."<br>";
		echo "Mật khẩu 1:";
		if($user[0]['matkhau1']!="") echo "**********<br>"; else echo "<br>";
		echo "Mật khẩu 2:";
		if($user[0]['matkhau2']!="") echo "**********<br>"; else echo "<br>";
		?> <a href="chinhsua.php" style='margin:0 auto;'><button style='width:100px;height:30px;line-height:30px;'>Chỉnh sửa</button></a> <?php
		echo "<br><br><hr><b>Lịch sử giao dịch:<br></b>";
		$hd=new HOADON();
		if(count($hd->timkh($user[0]['makh']))>0)
		{
			foreach($hd->timkh($user[0]['makh']) as $v)
			echo $v['ma']."-".$v['tien']."<br>";
		}
		else echo "Bạn vẫn chưa thực hiện thanh toán nào."
		?>
		</div>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>