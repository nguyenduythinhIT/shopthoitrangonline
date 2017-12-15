<div style='width:90%;min-height:200px;text-align:center;margin:0 auto'><a href='index.php'><img src='img/layout/logo.png' height=200></a></div>
<?php 
if(!isset($_GET['p']))
{
	
	if(!isset($_GET['s']))
	{
		$sp=new SANPHAM();
		echo "<p class='title'>Mới</p>";
		$ds=$sp->getAll();
		$i=0;
		foreach($ds as $v)
		{
			$i++;
			item($v);
			if($i>5) break;
		}
		echo "<br style='clear:both'>";
		echo "<p class='title'>Bán nhiều</p>";
		$ds=$sp->getAll();
		$i=0;
		foreach($ds as $v)
		{
			$i++;
			item($v);
			if($i>5) break;
		}
	}
	else{
		echo "<p class='title'>Tìm kiếm</p>";
		$sp=new SANPHAM();
		$ds=$sp->timgd($_GET['s']);
			echo "Tìm được ".count($ds)." sản phẩm<br>";
		$i=0;
		foreach($ds as $v)
		{
			$i++;
			item($v);
			if($i>5) break;
		}
	
	}
}
else
{
	$sp=new SANPHAM();
	$ds=$sp->timloai($_GET['p']);
	echo "<p class='title'>Danh sach sản phẩm</p>";
	echo "Có ".count($ds)." sản phẩm<br>";
	$i=0;
	foreach($ds as $v)
	{
		$i++;
		item($v);
		if($i>20) break;
	}
}

?>
