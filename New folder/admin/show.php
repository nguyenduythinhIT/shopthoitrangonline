<style>
table{width:95%;margin:10px auto;}
table,td,th{border:1px solid #2f3539}
th{background:#2f3539;color:#ccc;height:25px;line-height:25px; overflow:hidden;}
th:first-child{width:15%}
th:last-child{width:150px;}
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
$sp=new SANPHAM();
if($_GET['p']=="")
{
	xem_table($sp->getAll());
}
else
{
	xem_table($sp->timgd($_GET['p']));
}
?>