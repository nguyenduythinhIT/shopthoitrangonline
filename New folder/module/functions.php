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
			echo "<td><a href=\"xem.php\" target=\"_blank\"><input type='submit' name='sm' value='Xem'/></a>";
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

?>