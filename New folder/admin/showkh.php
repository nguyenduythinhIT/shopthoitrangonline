<style>
table{width:95%;margin:10px auto;}
table,td,th{border:1px solid #2f3539}
th{background:#2f3539;color:#ccc;height:25px;line-height:25px; overflow:hidden;}
th:first-child{width:15%}
th:nth-child(2){width:150px;}
th a{display:block;text-decoration:none;}
button{height:25px;width:50%}
</style>
<?php 
session_start();
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
$kh=new KHACHHANG();
echo "<table cellpadding=0 cellspacing=0>";
echo "<tr><th>Mã</th><th>Tên</th><th>Địa chỉ</th></tr>";
if($_GET['p']=="")
{
	foreach($kh->getAll() as $v)
	{
		echo "<tr>";
		echo "<td>$v[ma]</td><td>$v[ten]</td><td>$v[diachi]</td>";
		echo "</tr>";
	}
}
else
{
	foreach($kh->timgd($_GET['p']) as $v)
	{
		echo "<tr>";
		echo "<td>$v[ma]</td><td>$v[ten]</td><td>$v[diachi]</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>