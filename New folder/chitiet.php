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
function loadClass($c)
{
	include "classes/$c.class.php";	
}
spl_autoload_register("loadClass");
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
	</div>
</div>
<div id="content" >
	<div class="left">

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
table{width:98%;margin:10px auto;}
td,th{height:30px;line-height:30px;min-width:30%;}
th{background:#2f3539;color:#EEE;font-size:20px;min-width:30%;}
</style>
			<table>
				<tr><th colspan=2>Chi tiết Sản phẩm</th></tr>
				<tr><td>
				<?php 
					$sp=new SANPHAM();
					$item=$sp->timma($_GET['ma']);
					$ct=new chitietSP();
					$ds=$ct->tim($item[0]['ma']);
				?>
				</td><td>
					
					<form action='module/giohang.php?p=<?php echo $item[0]['ma']; ?>' method='post'>
					<table style='width:300px'>
						<tr><th style='width:100px'>Mã:</th><td><?php echo $item[0]['ma']; ?></td></tr>
						<tr><th>Tên:</th><td><?php echo $item[0]['ten']; ?></td></tr>
						<tr><th>Chọn:</th><td>
						<select name="chon" style="width:96.5%;height:30px;padding-left:15px;">
						<?php 
							foreach($ds as $v)
							{
								$mau=new MAU();
								$m=$mau->timma($v['mau']);
								$kt=new KICHTHUOC();
								$k=$kt->timma($v['kichthuoc']);
								echo "<option value='$v[mau].$v[kichthuoc]'>";
								echo $m[0]['ten']." - Size:".$k[0]['ten']." - còn lại:".$v['soluong']." </option>";
							}
						?>
						</select>
						<td>
						<tr><th>Số lượng:</th><td><input type='text' name='soluong' value=1></td></tr>
						<tr><td></td><td><input style='height:35px;line-height:35px;font-size:15px;width:150px;' type='submit' name='sm' value='Thêm vào giỏ hàng'></td></tr>
						<tr><td colspan=2>
						<?php
						$num=$item[0]['hinh'];
						for($i=0;$i<$num;$i++)
						{
						?>
						<img src='img/upload/sp/<?php echo $item[0]['ma']."_".$i.".png"; ?>'width=500>
						<?php
						}
						?>
						</td></tr>
					</table>
					</form>
				</td></tr>
			</table>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>