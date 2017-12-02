<?php
function loadClass($c)
{
	include "/classes/$c.class.php";	
}
spl_autoload_register("loadClass");
?>