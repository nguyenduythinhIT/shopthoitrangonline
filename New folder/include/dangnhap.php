<style>
input[type=text]{width:95%;margin-bottom:5px;height:25px}
input[type=password]{width:95%;height:25px;margin-bottom:5px;}
input[type=submit]{width:40%;height:25px;margin-bottom:5px;}
</style>
<script>
function check($v)
{
	$tk=$("#"+$v+" .tk").val();
	$mk=$("#"+$v+" .mk").val();
	if($tk.length == 0 || $mk.length == 0)
	{
		alert('Xin nhập đầy đủ thông tin');
		return false;
	}
	return true;
}
</script>
<?php 
if(isset($_GET['error']))
{
	if($_GET['error']=="dn")
	{
		?><script>alert('Tài khoản hoặc mật khẩu không đúng');</script><?php
	}
}
if($_SESSION['ten']==" ")
{
?>
<p>Đăng nhập</p>
<form action="module/dangnhap.php" method="post" id="formdangnhap" onsubmit="return(check('formdangnhap'))">
	<input type='text' name='tk' placeholder='Tài khoản' class="tk" />
	<input type='password' name='mk' class="mk" />
	<input type='submit' name='sm' value="Đăng nhập" class="dangnhap" />
</form>
<a href="dangki"  style="color:#ccc">Đăng kí mới</a><br/>
<?php
}
else{
?>
<p>Thông tin</p><div style="color:white;clear:both;min-height:55px;">
<?php
if($_SESSION['trangthai']){
	echo $_SESSION['ten']."<br>";
	echo "<a href='admin/'>Quản lý</a>";
	
}
else{
	$tk=new TAIKHOAN();
	$kh=new KHACHHANG();
	$wer=$tk->tim($_SESSION['ten']);
	$user=$kh->tim($wer[0]['makh']);
	echo $user[0]['ten'];
	echo "<a href='thongtin.php'>Xem thông tin</a>";
}
echo "</div>";

}
?>
<div style="color:white;clear:both;min-height:30px;">
<a href="module/dangxuat.php">Đăng xuất</a>
</div>