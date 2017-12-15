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
table{width:90%;margin:10px auto;}
table,td,th{border:1px solid #2f3539}
th{background:#2f3539;color:#ccc;height:25px;line-height:25px; overflow:hidden;}
th:first-child{width:15%;min-width:100px;}
th:last-child{width:150px;}
th a{display:block;text-decoration:none;}
button{height:25px;width:50%}
p{width:90%;height:30px;background:#2f3539;color:white;text-align:center;margin:0 auto;line-height:30px;font-weight:bold;margin:0 auto}
input[type=text]{width:99%;height:30px;}
select{width:100%;height:30px;}
input[type=submit]{width:50%;height:30px;}
</style>
		<?php 	
			echo "<p>Thông tin</p>";
			if($_GET['p']=='loai')
			{

				$l=new LOAI();
				$ds=$l->timma($_GET['ma']);
				echo "<form action='../module/loai.php' method='post'>";
				?> <table cellspacing=0 cellpadding=0 style='width:400px'>
				<tr><th>Mã</th><td><input type='text' value='<?php echo $ds[0]['ma']; ?>' name='ma' readonly></td></tr>
				<tr><th>Tên</th><td><input type='text' value='<?php echo $ds[0]['ten']; ?>' name='ten' ></td></tr>
				<tr><th>Giới tính</th><td>
				<select name='gt'>
					<option value='1' <?php if($ds[0]['gioitinh']==1) echo 'selected'; ?>>Nam</option>
					<option value='0' <?php if($ds[0]['gioitinh']==0) echo 'selected'; ?>>Nữ</option>
				</select>
				</td></tr>
				<tr><th>Xác nhận</th><td><input type='submit' name='sm' value="Cập nhật" ><input type='submit' name='sm' value="Xoá" ></td></tr>
				</table><?php
				echo "</form>";
				$sp=new SANPHAM();
				$ds=$sp->timloai($_GET['ma']);
				xem_table($ds);
			}
			else if($_GET['p']=='nhasanxuat')
			{
				$l=new NHASANXUAT();
				$ds=$l->timma($_GET['ma']);
				echo "<form action='../module/nhasanxuat.php' method='post'>";
				?> <table cellspacing=0 cellpadding=0 style='width:400px'>
				<tr><th>Mã</th><td><input type='text' value=<?php echo $ds[0]['ma']; ?> name='ma' readonly></td></tr>
				<tr><th>Tên</th><td><input type='text' value=<?php echo $ds[0]['ten']; ?> name='ten' ></td></tr>
				<tr><th>Logo</th><td style='text-align:center;'><img src='../img/upload/nsx/<?php echo $ds[0]['ma']; ?>.png' width=100><br>
				</td></tr>
				<tr><th>Xác nhận</th><td><input type='submit' name='sm' value="Cập nhật" ><input type='submit' name='sm' value="Xoá" ></td></tr>
				</table><?php
				echo "</form>";
				$sp=new SANPHAM();
				$ds=$sp->timnsx($_GET['ma']);
				xem_table($ds);
			}
			else if($_GET['p']=='mau')
			{
				$l=new MAU();
				$ds=$l->timma($_GET['ma']);
				echo "<form action='../module/mau.php' method='post'>";
				?> <table cellspacing=0 cellpadding=0 style='width:400px'>
				<tr><th>Mã</th><td><input type='text' value=<?php echo $ds[0]['ma']; ?> name='ma' readonly></td></tr>
				<tr><th>Tên</th><td><input type='text' value=<?php echo $ds[0]['ten']; ?> name='ten' ></td></tr>
				<tr><th>Xác nhận</th><td><input type='submit' name='sm' value="Cập nhật" ><input type='submit' name='sm' value="Xoá" ></td></tr>
				</table><?php
				echo "</form>";

			}
			else if($_GET['p']=='kichthuoc')
			{
				$l=new KICHTHUOC();
				$ds=$l->timma($_GET['ma']);
				echo "<form action='../module/kichthuoc.php' method='post'>";
				?> <table cellspacing=0 cellpadding=0 style='width:400px'>
				<tr><th>Mã</th><td><input type='text' value='<?php echo $ds[0]['ma']; ?>' name='ma' readonly></td></tr>
				<tr><th>Tên</th><td><input type='text' value='<?php echo $ds[0]['ten']; ?>' name='ten' ></td></tr>
				<tr><th>Xác nhận</th><td><input type='submit' name='sm' value="Cập nhật" ><input type='submit' name='sm' value="Xoá" ></td></tr>
				</table><?php
				echo "</form>";

			}
			else if($_GET['p']=='sp')
			{
				$l=new SANPHAM();
				$item=$l->timma($_GET['ma']);
				echo "<form action='../module/sanpham.php' method='post'>";
				?> <table cellspacing=0 cellpadding=0 style='width:400px'>
				<tr><th>Mã</th><td><input type='text' value=<?php echo $item[0]['ma']; ?> name='ma' readonly></td></tr>
				<tr><th>Tên</th><td><input type='text' value=<?php echo $item[0]['ten']; ?> name='ten' ></td></tr>
				<tr>
							<th>Loại</th>
							<td>
								<select name='loai' style='width:250px'>
									<?php 
									$l=new LOAI();
									$ds=$l->getAll();
									foreach($ds as $v)
									{
										if($item[0]['loai']==$v['ma']) echo "<option value=$v[ma] selected>$v[ten]</option>";
										else echo "<option value=$v[ma]>$v[ten]</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<th>NSX</th>
							<td>
								<select name='loai' style='width:250px'>
									<?php 
									$l=new NHASANXUAT();
									$ds=$l->getAll();
									foreach($ds as $v)
									{
										if($item[0]['nsx']==$v['ma']) echo "<option value=$v[ma] selected>$v[ten]</option>";
										else echo "<option value=$v[ma]>$v[ten]</option>";
									}
									?>
								</select>
							</td>
						</tr>
				<tr><th>Xác nhận</th><td><input type='submit' name='sm' value="Cập nhật" ><input type='submit' name='sm' value="Xoá" ></td></tr>
				</table><?php
				echo "</form>";
				echo "<p>Chi tiết</p>";
				$ct=new chitietSP();
				$ds=array();
				if(count($item)==1)
				{
				$ds=$ct->tim($item[0]['ma']);
				}
				$ma=new MAU();
				echo "<fieldset style='width:400px;margin:0 auto'><legend>Thêm chi tiết</legend>";
				echo "<form action='../module/chitietSP.php' method='post'>";
				echo "<table cellspacing=0 cellpadding=0>";
				echo "<tr><th></th><td><input type='text' name='ma' value='".$item[0]['ma']."' readonly></td>";
				echo "<tr><th>Màu</th>";
				echo "<td><select name='mau'>";
				foreach($ma->getAll() as $v)
				{
					echo "<option value='$v[ma]'>$v[ten]</option>";
				}
				echo "</select></td></tr><tr><th>Kích thước</th><td><select name='kt'>";
				$kt=new KICHTHUOC();
				foreach($kt->getAll() as $v)
				{
					echo "<option value='$v[ma]'>$v[ten]</option>";
				}
				echo "</select></td></tr><tr><th>Số lượng</th><td><input type='text' name='sl'></td></tr><tr><th>Xác nhận</th><td><input type='submit' name='sm' value='Thêm' ></td></tr></table></form>";
				echo "</fieldset>";
				echo "<table cellspacing=0 cellpadding=0>";
				echo "<tr><th>Mã</th><th>Màu</th><th>Kích thước</th><th>Số lượng</th><th></th></tr>";
				foreach($ds as $v)
				{
					echo "<tr><td>$v[masp]</td><td>$v[mau]</td><td>$v[kichthuoc]</td><td>$v[soluong]</td>";
					echo "<td style='width:75px'>";
					?><a href="../module/chitietSP.php?ma=<?php echo $v['masp']."_".$v['kichthuoc']."_".substr($v['mau'],1); ?>"><button style='width:100%'>Xoá</button></a><?php
					echo "</td></tr>";
				}
				echo "</table>";
			}
		?>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>