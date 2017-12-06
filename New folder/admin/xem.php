<?php 
session_start();
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
$sp=new SANPHAM();
if(!$_SESSION['trangthai'] || !isset($_GET['p']) ) {
?>
<script>
window.close();
</script> 
<?php
}
?>
<style>
#xem{width:90%;min-height:100px;margin:0 auto;}
#xem > p{width:90%;height:30px;background:#2f3539;border:10px 0;color:white;font-size:20px;text-align:center;line-height:30px;margin:0 auto;}
#xem th{background:#2f3539;color:#fff}
#xem td{color:#000;}
#xem th,td{height:30px;min-width:75px}
#xem input[type=text]{width:300px;height:30px;padding-left:20px}
#xem input[type=submit]{width:200px;height:30px;}
#xem select{width:100%;height:30px;line-height:30px;padding-left:20px}
#xem table{margin:0 auto;}
</style>
<div id="xem">
<?php 
if($_GET['p']=='loai')
{
$loai=new LOAI();
$ds=$loai->timma($_GET['ma']);
?>
<p>Thông tin</p>
<form action = "../module/loai.php">
<table>
	<tr><th>Mã</th><td><input type='text' name='ma' value='<?php echo $ds[0]['ma']; ?>' readonly></td></tr>
	<tr><th>Tên</th><td><input type='text' name='ten' value='<?php echo $ds[0]['ten']; ?>'></td></tr>
	<tr><th>Giới tính</th><td><select name='gt'>
		<option value=1>Nam</option><option value=0>Nữ</option>
	</select></td></tr>
	<tr><td></td><td><input type='submit' name='sm' value='Sửa'></td></tr>
</table>
</form>
<p>DS SẢN PHẨM</p>
<?php	
table_sp($sp->timloai($_GET['ma']),"loai=".$_GET['ma']);
}
else if($_GET['p']=='mau')
{
$mau=new MAU();
$ds=$mau->timma($_GET['ma']);
?>
<p>Thông tin</p>
<form action = "../module/mau.php">
<table>
	<tr><th>Mã</th><td><input type='text' name='ma' value='<?php echo $ds[0]['ma']; ?>' readonly></td></tr>
	<tr><th>Tên</th><td><input type='text' name='ten' value='<?php echo $ds[0]['ten']; ?>'></td></tr>
	<tr><td></td><td><input type='submit' name='sm' value='Sửa'></td></tr>
</table>
</form>
<?php
}
else if($_GET['p']=='kichthuoc')
{
$kichthuoc=new KICHTHUOC();
$ds=$kichthuoc->timma($_GET['ma']);
?>
<p>Thông tin</p>
<form action = "../module/mau.php">
<table>
	<tr><th>Mã</th><td><input type='text' name='ma' value='<?php echo $ds[0]['ma']; ?>' readonly></td></tr>
	<tr><th>Tên</th><td><input type='text' name='ten' value='<?php echo $ds[0]['ten']; ?>'></td></tr>
	<tr><td></td><td><input type='submit' name='sm' value='Sửa'></td></tr>
</table>
</form>
<?php
}
else if($_GET['p']=='nhasanxuat')
{
$nsx=new NHASANXUAT();
$ds=$nsx->timma($_GET['ma']);
?>
<p>Thông tin</p>
<form action = "../module/mau.php">
<table>
	<tr><th>Mã</th><td><input type='text' name='ma' value='<?php echo $ds[0]['ma']; ?>' readonly></td></tr>
	<tr><th>Tên</th><td><input type='text' name='ten' value='<?php echo $ds[0]['ten']; ?>'></td></tr>
	<tr><td></td><td><input type='submit' name='sm' value='Sửa'></td></tr>
</table>
</form>
<p>DS SẢN PHẨM</p>
<?php	
table_sp($sp->timnsx($_GET['ma']),"nsx=".$_GET['ma']);
}
?>
</div>