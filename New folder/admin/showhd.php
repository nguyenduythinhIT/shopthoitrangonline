<style>
table{width:95%;margin:10px auto;}
table,td,th{border:1px solid #2f3539}
th{background:#2f3539;color:#ccc;height:25px;line-height:25px; overflow:hidden;}
th:first-child{width:15%}
th:nth-child(2){width:150px;}
th a{display:block;text-decoration:none;}
button{height:25px;width:100%}
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
$kh=new HOADON();
echo "<table cellpadding=0 cellspacing=0>";
echo "<tr><th>Mã hoá đơn</th><th>Mã khách hàng</th><th>Số tiền gd</th><th>Trang thái</th><th style='width:150px'></th><th>Xem chi tiết</th></tr>";
if($_GET['p']=="")
{
	foreach($kh->getAll() as $v)
	{
		echo "<tr>";
		echo "<td>$v[ma]</td><td>$v[makh]</td><td>$v[tien]</td><td>";
		if($v['trangthai']==1) echo "Chưa giao hàng";
		else if($v['trangthai']==2) echo "Đã giao hàng";
		echo "</td><td>";
		if($v['trangthai']==1) echo "<a href='../module/donhang.php?ma=$v[ma]'><button>Đã giao hàng</button></a>";
		echo "</td><td>";
		 echo "<a href='chitietHD.php?ma=$v[ma]'><button>Xem</button></a>";
		echo "</td></tr>";
	}
}
else
{
	foreach($kh->timgd($_GET['p']) as $v)
	{
			echo "<tr>";
		echo "<td>$v[ma]</td><td>$v[makh]</td><td>$v[tien]</td><td>";
		if($v['trangthai']==1) echo "Chưa giao hàng";
		else if($v['trangthai']==2) echo "Đã giao hàng";
		echo "</td><td>";
		if($v['trangthai']==1) echo "<a href='../module/donhang.php?ma=$v[ma]'><button>Đã giao hàng</button></a>";
		echo "</td></tr>";
	}
}
echo "</table>";
?>