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
		<div style="width:100%;height:45px"></div>
		<div style="width:200px;float:left;"></div>
		<div id="main">
<style>
table{width:80%;margin:10px auto;min-width:600px}
td,th{height:30px;line-height:30px;min-width:30%;text-align:center;}
th{background:#2f3539;color:#EEE;font-size:20px;min-width:30%;}
</style>
		<table>
		<tr><th colspan=7>Giỏ hàng</th></tr>
		<?php if($_SESSION['giohang']==array() ) echo "<tr><td>Không có sản phẩm trong giỏ hàng</td></tr><tr><td><a href='index.php'>Về trang chủ</a></td></tr>";
				else {
		?>
		<tr><th>Mã</th><th>Tên</th><th>Màu</th><th>Kích thước</th><th>Số lượng</th><th>Giá</th><th><button style='width:100%;height:30px;'>Bỏ hết</button></th></tr>
		<?php
			
			$sp=new SANPHAM();
			$ct=new chitietSP();
			$mau=new MAU();
			$kt=new KICHTHUOC();
			$tien=0;
			foreach($_SESSION['giohang'] as $v)
			{
				$s=$sp->timma($v[0]);
				$m=$mau->timma($v[1]);
				$k=$kt->timma($v[2]);
				$tien=$tien+$s[0]['giaban']*$v[3];
				echo "<tr><td>$v[0]</td>";
				echo "<td>".$s[0]['ten']."</td>";
				if($v[1] != "") echo "<td>".$m[0]['ten']."</td>"; else echo "<td></td> ";
				if($v[2] != "") echo "<td>".$k[0]['ten']."</td>"; else echo "<td></td> ";
				echo "<td>".$v[3]."</td>";
				echo "<td>".$s[0]['giaban']*$v[3]."</td><td><button style='width:100%;height:30px'>Bỏ</botton></td></tr>";
				echo "<tr style='height:5px'><td style='height:5px' colspan=7><hr></td></tr>";
			}
			echo "<tr><th colspan=5>Tổng tiền:</th><th colspan=2>$tien</th></tr>"
		?>
		</table>
		<table>
		<tr><td>
		<?php
				if($_SESSION['ten']!=" ")
				{
					$email="nguyenduythinh.it@outlook.com";
					$cmt="";
					$url="http://shopthoitrangonline.tk/module/return.php";
					echo "<a target=\"_blank\" href=\"https://www.nganluong.vn/button_payment.php?receiver=$email&product_name=cvb&price=$tien&return_url=$url&comments=$cmt\">
					<img src=\"https://www.nganluong.vn/css/newhome/img/button/pay-lg.png\"border=\"0\" />
					</a>";
					echo "<br><a href='module/return.php?order_code=".$_SESSION['ten']."'>Thanh toán</a>";
				}
				else echo "Đăng nhập để thanh toán <br><a href='dangki.php'>Đăng kí</a> nếu chưa có tài khoản.";
			}
		?>
		
		</td></tr>
		</table>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>