<?php 
session_start();
if(!$_SESSION['trangthai'] || !isset($_GET['p']) ) {
?>
<script>
window.close();
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
	<form action="../module/loai.php" method="post">
	<table style="margin:0 auto;">
		<tr><th colspan=2>LOẠI</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten'></td></tr>
		<tr><th>Giới tính:</th><td>
		<select name='gt'>
			<option value=1 selected>NAM</option>
			<option value=1>NỮ</option>
		</select>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
<?php	
}
else if($_GET['p']=='mau')
{
?>
	<form action="../module/mau.php" method="post">
	<table style="margin:0 auto;">
		<tr><th colspan=2>LOẠI</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten'></td></tr>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
<?php
}
else if($_GET['p']=='kichthuoc')
{
?>
	<form action="../module/kichthuoc.php" method="post">
	<table style="margin:0 auto;">
		<tr><th colspan=2>LOẠI</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten'></td></tr>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
<?php
}
else if($_GET['p']=='nhasanxuat')
{
?>
	<form action="../module/nhasanxuat.php" method="post" enctype="multipart/form-data" >
	<table style="margin:0 auto;">
		<tr><th colspan=2>LOẠI</th></tr>
		<tr><th>Mã</th><td><input type='text' name='ma'></td></tr>
		<tr><th>Tên</th><td><input type='text' name='ten'></td></tr>
		<tr><th>Logo</th><td><input type='file' name='hinh'></td></tr>
		</td></tr>
		<tr><td></td><td><input type='submit' name='sm' value="Thêm"></td></tr>
	</table>
<?php
}
?>
</div>
