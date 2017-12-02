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
		echo "<th><button style='width:100px;height:30px;float:right;' onclick='btn_them(".$name.")'>Thêm</button></th>";
		echo "</tr>";
		foreach($l as $k=>$v)
		{
			echo "<tr>";$i++;
			foreach($v as $value)
			{
				echo "<td>".$value."</td>";
			}
			echo "<td><form action='".$name.".php' method='post'><input type='submit' value='Xem'/></form></td>";
			echo "</tr>";
		}
		
		echo "</table>";
	}
	else {echo "<table  cellpadding=0 cellspacing=0><tr><th>Chưa có</th>";
	echo "<th><button style='width:100px;height:30px;float:right;'>Thêm</button></th>";
	echo "</tr></table>";}
}

?>