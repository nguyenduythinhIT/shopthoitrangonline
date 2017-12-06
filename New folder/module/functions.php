<?php 
function postIndex($v)
{
	if(isset($_POST[$v])) return $_POST[$v];
	return "";
}

function table($l,$name)
{
	if($l != array())
	{
		$i=2;
		echo "<table cellpadding=0 cellspacing=0>";
		echo "<tr>";
		foreach($l[0] as $k=>$v)
			echo "<th>".$k."</th>";
		echo "<th><a href='them.php?p=$name' target='_blank'><button>Thêm</button></a></th>";
		echo "</tr>";
		foreach($l as $k=>$v)
		{
			echo "<tr>";$i++;
			foreach($v as $value)
			{
				echo "<td>".$value."</td>";
			}
			echo "<td><a href=\"xem.php?p=$name&ma=".$v['ma']."\" target=\"_blank\"><input type='submit' name='sm' value='Xem'/></a>";
			?>
			<form action='../module/<?php echo $name;?>.php' method='post'>
				<div  style="overflow:hidden;width:0;height:0" ><input type='text' name='ma' value="<?php echo $v['ma']; ?>"></div>
				<input type='submit' name='sm' value='Xoá'/>
				</form></td><?php
			echo "</tr>";
		}
		
		echo "</table>";
	}
	else {echo "<table  cellpadding=0 cellspacing=0><tr><th>Chưa có</th>";
	echo "<th><a href='them.php?p=$name' target='_blank'><button>Thêm</button></a></th>";
	echo "</tr></table>";}
}
function table_sp($ds,$vs)
{
	if($ds!=array())
	{	
		?><table cellspacing=0 cellpadding=1 border=1><?php
		echo "<tr>";
		foreach($ds[0] as $k => $v)
		{
			echo "<th>".$k."</th>";
		}
		echo "<th><a href='them.php?p=sp&$vs' target='_blank'><button style=\"width:200px;height:30px;\">Thêm</button></a></th>";
		foreach($ds as $k => $v)
		{
			echo "<tr>";
			foreach($v as $value) {echo "<td>".$value."</td>";}
			echo "<td><a href=\"xem.php?p=sp&$vs\" target=\"_blank\"><button style=\"width:100px;height:30px;float:left;\">Xem</button></a>";
			?>
			<form action='../module/sanpham.php' method='post'>
				<div  style="overflow:hidden;width:0;height:0" ><input type='text' name='ma' value="<?php echo $v['ma']; ?>" ></div>
				<input type='submit' name='sm' value='Xoá' style="width:100px;height:30pxfloat:left;"/>
				</form></td>
			<?php
			echo "</tr>";
		}
		?></table><?php
	}
	
	else {echo "<table ><tr><th>Chưa có</th>";
	echo "<th><a href='them.php?p=sp&$vs' target='_blank'><button style=\"width:200px;height:30px;\">Thêm</button></a></th>";
	echo "</tr></table>";}

}
function showitem($ds)
{
	?>
	<div class="item">
		<img src="image/upload/sp/<?php echo $ds['ma']; ?>0.png" width='200' height='200' />
		<p><?php echo $ds['ten'];echo "(".$ds['ma'].")" ?></p>
		<p><?php echo "Giá:".$ds['giaban']."VND";?></p>
		<div><a href="chitietsp.php?ma=<?php echo $ds['ma']; ?>" target="_blank">Xem</a></div>
	</div>
	<?php

}
function showitem_ngang($ds)
{
	?>
	<div class="item_ngang">
		<img src="image/upload/sp/<?php echo $ds['ma']; ?>0.png" width='80' height='80' />
		<div><p><?php echo $ds['ten'];echo "(".$ds['ma'].")" ?></p></div>
		<div><p><?php echo "Giá:".$ds['giaban']."VND";?></p></div>
		<div>Xem</div>
	</div>
	<?php
}
function tangma($v)
{	
	$t= substr($v,2)+1;
	$v=substr($v,0,2).$t;
	return $v;
}
?>