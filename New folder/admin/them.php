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
table,td,th{border:1px solid white}
th{background:#2f3539;color:#ccc;height:25px;line-height:25px; overflow:hidden;}
th a{display:block;text-decoration:none;}
button{height:35px;width:100%}
input[type=text]{width:100%;height:30px;max-width:300px}
input[type=submit]{width:100px;height:30px;max-width:300px}
select{width:100px;height:30px;}
</style>
		<p style='width:90% ;margin:0 auto;background:#2f3539;color:white;text-align:center;height:30px;line-height:30px;font-weight:bold;'>THÊM</p>
		<table cellspacing=0 cellpadding=0>
		<tr><th style='height:35px'><a href='?p=loai'><button>Thêm loại</button></a></th>
		<th><a href='?p=nsx'><button>Thêm NSX</button></a></th>
		<th><a href='?p=mau'><button>Thêm màu</button></a></th>
		<th><a href='?p=kichthuoc'><button>Thêm kích thước</button></a></th>
		<th><a href='?p=sp'><button>Thêm sản phẩm</button></a></th>
		</tr>
		</table>
		<?php
		if($_GET['p']=='loai')
		{
			$i=new LOAI();
			$ds=$i->getAll();
			if(count($ds)==0) $ma='LO0';
			else $ma=$ds[count($ds)-1]['ma'];
			?>
				<form action='../module/loai.php' method='post'>
				<table  cellspacing=0 cellpadding=0>
					<tr><th style='width:200px'>LOẠI:</th></tr>
					<tr><td></td><td>
					<table  cellspacing=0 cellpadding=0>
						<tr>
							<th>Mã</th>
							<td><input type='text' name='ma' value='<?php tangma($ma); ?>' readonly></td>
						</tr>
						<tr>
							<th>Tên</th>
							<td><input type='text' name='ten' ></td>
						</tr>
						<tr>
							<th>Giới tính</th>
							<td>
								<select name='gt'>
									<option value=1>Nam</option>
									<option value=0>Nữ</option>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type='submit' name='sm' value='Thêm'>
							</td>
						</tr>
					</table>
					</td>
					</tr>
				</table>
				</form>
			<?php
		}
		else if($_GET['p']=='nhasanxuat')
		{
			$i=new NHASANXUAT();
			$ds=$i->getAll();
			if(count($ds)==0) $ma='NS0';
			else $ma=$ds[count($ds)-1]['ma'];
			?>
				<form action='../module/nhasanxuat.php' method='post' enctype="multipart/form-data">
				<table  cellspacing=0 cellpadding=0>
					<tr><th style='width:200px'>NHÀ SẢN XUẤT:</th></tr>
					<tr><td></td><td>
					<table  cellspacing=0 cellpadding=0>
						<tr>
							<th>Mã</th>
							<td><input type='text' name='ma' value='<?php tangma($ma); ?>' readonly></td>
						</tr>
						<tr>
							<th>Tên</th>
							<td><input type='text' name='ten' ></td>
						</tr>
						<tr>
							<th>Logo</th>
							<td>
								<input type='file' name='hinh'>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type='submit' name='sm' value='Thêm'>
							</td>
						</tr>
					</table>
					</td>
					</tr>
				</table>
				</form>
			<?php
		}
		else if($_GET['p']=='mau')
		{
			?>
				<form action='../module/mau.php' method='post'>
				<table  cellspacing=0 cellpadding=0>
					<tr><th style='width:200px'>MÀU:</th></tr>
					<tr><td></td><td>
					<table  cellspacing=0 cellpadding=0>
						<tr>
							<th>Mã</th>
							<td><input type='text' name='ma' ></td>
						</tr>
						<tr>
							<th>Tên</th>
							<td><input type='text' name='ten' ></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type='submit' name='sm' value='Thêm'>
							</td>
						</tr>
					</table>
					</td>
					</tr>
				</table>
				</form>
			<?php
		}
		if($_GET['p']=='kichthuoc')
		{
			$i=new KICHTHUOC();
			$ds=$i->getAll();
			if(count($ds)==0) $ma='KT0';
			else $ma=$ds[count($ds)-1]['ma'];
			?>
				<form action='../module/kichthuoc.php' method='post'>
				<table  cellspacing=0 cellpadding=0>
					<tr><th style='width:200px'>KÍCH THƯỚC:</th></tr>
					<tr><td></td><td>
					<table  cellspacing=0 cellpadding=0>
						<tr>
							<th>Mã</th>
							<td><input type='text' name='ma' value='<?php tangma($ma); ?>' readonly></td>
						</tr>
						<tr>
							<th>Tên</th>
							<td><input type='text' name='ten' ></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type='submit' name='sm' value='Thêm'>
							</td>
						</tr>
					</table>
					</td>
					</tr>
				</table>
				</form>
			<?php
		}
		if($_GET['p']=='sp')
		{
			$i=new SANPHAM();
			$ds=$i->getAll();
			if(count($ds)==0) $ma='SP0';
			else $ma=$ds[count($ds)-1]['ma'];
			?>
				<form action='../module/sanpham.php' method='post' enctype="multipart/form-data">
				<table  cellspacing=0 cellpadding=0>
					<tr><th style='width:200px'>SẢN PHẨM:</th></tr>
					<tr><td></td><td>
					<table  cellspacing=0 cellpadding=0>
						<tr>
							<th>Mã</th>
							<td><input type='text' name='ma' value='<?php tangma($ma); ?>' readonly></td>
						</tr>
						<tr>
							<th>Tên</th>
							<td><input type='text' name='ten' ></td>
						</tr>
						<tr>
							<th>Loại</th>
							<td>
								<select name='loai' style='width:250px'>
									<?php 
									$l=new LOAI();
									$ds=$l->getAll();
									foreach($ds as $v)
									{
										echo "<option value=$v[ma]>$v[ten]</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<th>NSX</th>
							<td>
								<select name='nsx' style='width:250px'>
									<?php 
									$l=new NHASANXUAT();
									$ds=$l->getAll();
									foreach($ds as $v)
									{
										echo "<option value=$v[ma]>$v[ten]</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr><th>Giá bán</th><td><input type='text' name='gia'></td></tr>
						<tr><th>Hình</th><td><input type='file' name='hinh[]' multiple></td></tr>
						<tr>
							<td></td>
							<td>
								<input type='submit' name='sm' value='Thêm'>
							</td>
						</tr>
					</table>
					</td>
					</tr>
				</table>
				</form>
			<?php
		}
		?>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>