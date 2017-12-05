<?php 
session_start();
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
if(!$_SESSION['trangthai'] || !isset($_GET['p']) ) {
?>
<script>
function validate()
{
	var ten = document.getElementById('ten');
	var hinh = document.getElementById('hinh');
	if(ten.value =='')
	{
		alert('Vui lòng nhập tên');
		ten.placeholder = "Vui lòng nhập tên";
		return false;
	}
	if(hinh.value =='')
	{
		alert('Vui long up hinh anh');
		return false;
	}
	return true;
}
</script>
<?php
}
?>
<style>
#them{width:90%;min-height:100px;margin:0 auto;}
#them > p{width:90%;height:30px;background:#2f3539;border:10px 0;color:white;font-size:20px;text-align:center;line-height:30px;margin:0 auto;}
#them th{background:#2f3539;color:#fff}
#them td{color:#000;}
#them th,td{min-width:50px;height:30px;}
#them input[type=text]{width:300px;height:30px;padding-left:20px}
#them input[type=submit]{width:200px;height:30px;}
#them select{width:100%;height:30px;line-height:30px;padding-left:20px}
</style>
<div id="them">
<p>THÊM</p>
<?php 
if($_GET['p']=='loai')
{
?>
	<form action="../module/loai.php" method="post" id="form" onsubmit="validate()">
	<table style="margin:0 auto;">
		<tr><th colspan=2>LOẠI</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma' id='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten' id='ten'></td></tr>
		<tr><th>Giới tính:</th><td>
		<select name='gt'>
			<option value=1 selected>NAM</option>
			<option value=1>NỮ</option>
		</select>
		</td></tr>
		<tr><td></td><td><input type="submit" name="sm" value="Thêm"></td></tr>
	</table>
	</form>
<?php	
}
else if($_GET['p']=='mau')
{
?>
	<form action="../module/mau.php" method="post" onsubmit="return validate()">
	<table style="margin:0 auto;">
		<tr><th colspan=2>MÀU</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten' id='ten' ></td></tr>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
	</form>
<?php
}
else if($_GET['p']=='kichthuoc')
{
?>
	<form action="../module/kichthuoc.php" method="post" onsubmit="return validate()">
	<table style="margin:0 auto;">
		<tr><th colspan=2>KÍCH THƯỚC</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten' id='ten' placeholder=""></td></tr>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
	</form>
<?php
}
else if($_GET['p']=='nhasanxuat')
{
?>
	<form action="../module/nhasanxuat.php" method="post" onsubmit="return validate()"  enctype="multipart/form-data" >
	<table style="margin:0 auto;">
		<tr><th colspan=2>NHÀ SẢN XUẤT</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten' id='ten'></td></tr>
		<tr><th>Logo</th><td><input type='file' name='hinh' id='hinh'></td></tr>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
	</form>
<?php
}
else if($_GET['p']=='sp')
{
?>
<form action="../module/sanpham.php" method="post" enctype="multipart/form-data" >
	<table style="margin:0 auto;">
		<tr><th colspan=2>SẢN PHẨM</th></tr>
		<tr><th>Mã:</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên:</th><td><input type='text' name='ten' id='ten'></td></tr>
		<tr><th>Giá bán:</th><td><input type='text' name='gia' id='gia'></td></tr>
		<tr><th>Loại:</th><td>
		<select name='loai'>
			<?php 
				if(isset($_GET['loai'])) $l=$_GET['loai'];
				else $l="";
				$loai=new LOAI();
				$ds=$loai->getAll();
				foreach($ds as $v)
				{
					echo "<option value='".$v['ma'];
					if($l==$v['ma']) echo "' selected >";
					else echo "'>";
					if($v['gioitinh']==1) {echo $v['ten']." "."Nam"."</option>";}
					else {echo $v['ten']." "."Nữ"."</option>";}
					
				}
			?>
		</select></td>
		<td><a href='them.php?p=loai' target='_blank'>Thêm Loại</a></td></tr>
		<tr><th>Nsx:</th><td>
		<select name='nsx'>
			<?php 
				if(isset($_GET['nsx'])) $n=$_GET['nsx'];
				else $n="";
				$nsx=new NHASANXUAT();
				$ds=$nsx->getAll();
				foreach($ds as $v)
				{
					echo "<option value='".$v['ma'];
					if($n==$v['ma']) echo "' selected >";
					else echo "'>";
					echo $v['ten']."</option>";

				}
			?>
		</select></td>
		<td><a href='them.php?p=nhasanxuat' target='_blank'>Thêm nsx</a></td></tr>
		<tr><th>Số lượng:</th><td><input type='text' name='soluong' id='soluong'></td></tr>
		<tr><th>Chọn hình:</th><td><input type='file' name='hinh[]' id='hinh' multiple></td></tr>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
	</form>
<?php } ?>
</div>
