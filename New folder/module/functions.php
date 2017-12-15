<?php 
function postIndex($v)
{
	if(isset($_POST[$v])) return $_POST[$v];
	return "";
}

function item($v)
{
	echo "<div class='item'>";
	echo "<img src='img/upload/sp/".$v['ma']."_0.png' width=150 />";
	echo "<p>".$v['ten']."</p>";
	echo "<p>".$v['giaban']."VND</p>";
	echo "<div><a href='chitiet.php?ma=$v[ma]'>XEM</a></div>";
	echo "</div>";
}

function mahoa($v)
{
	return sha1(md5($v));
}
function dm_table($ds,$name)
{
	echo "<table cellpadding=0 cellspacing=0 id='dm_$name'>";
	echo "<tr><th>Mã</th><th>Tên</th><th><a href='them.php?p=$name'><button>Thêm</button></a></th></tr>";
	foreach($ds as $k=>$v)
	{
		echo "<tr><td>$v[ma]</td><td>$v[ten]</td>";
		echo "<td>";
		echo "<a href='xem.php?p=$name&ma=$v[ma]'><button>Xem</button></a>";
		echo "<a href='../module/$name.php?ma=$v[ma]'><button>Xoá</button></a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
function xem_table($ds)
{
	echo "<table cellpadding=0 cellspacing=0 id='dm_sp' style='min-width:400px;width:65%'>";
	echo "<tr><th>Mã</th><th>Tên</th><th><a href='them.php?p=sp'><button>Thêm</button></a></th></tr>";
	foreach($ds as $k=>$v)
	{
		echo "<tr><td>$v[ma]</td><td>$v[ten]</td>";
		echo "<td>";
		echo "<a href='xem.php?p=sp&ma=$v[ma]'><button>Xem</button></a>";
		echo "<a href='../module/sanpham.php?ma=$v[ma]'><button>Xoá</button></a>";
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
function tangma($v)
{
	$v1=substr($v,0,2);
	$v2=substr($v,2);
	$v2=$v2+1;
	$v=$v1.$v2;
	echo $v;
}
function tangma_($v)
{
	$v1=substr($v,0,2);
	$v2=substr($v,2);
	$v2=$v2+1;
	
	return $v1.$v2;;
}
?>