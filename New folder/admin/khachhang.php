<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Shop thời trang online</title>

<link rel='stylesheet' href="../css/style.css"/>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/main.js"></script>

</head>	

<body> 
<div id="head">
	<div class="top">
		<a href="index.php">ShopThờiTrang</a>
		<form action="../index.php" method="get">
			<input type="search" name="s" placeholder="Tìm kiếm">
			<input type="submit" value="Tìm" >
		</form>
	</div>
</div>
<div id="content" >
	<div class="left">
<?php
session_start();
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
if(!isset($_SESSION['ten']))
{
	$_SESSION['ten']=" ";
	$_SESSION['giohang']=array();
	$_SESSION['trangthai']=false;
}?>
<?php 
	include "menu_backend.php";
?>
	</div>
	<div class="right">
		<div style="width:100%;height:55px"></div>
		<div style="width:200px;float:left;"></div>
		<div id="main">
<style>
table{width:95%;margin:10px auto;}
table,td,th{border:1px solid #2f3539}
th{background:#2f3539;color:#ccc;height:25px;line-height:25px; overflow:hidden;}
th:first-child{width:15%}
th:last-child{width:150px;}
th a{display:block;text-decoration:none;}
button{height:25px;width:50%}
</style>
<script>

function loadsp($v)
{
		$("#khachhang").load("showkh.php?p="+$v);
}
function clickbtn()
{
	$text=$("#timkh").val();
	loadsp($text)
}

$( document ).ready(function() {
loadsp("");
});
</script>
<p style='background:#2f3539;width:90%;height:30px;line-height:30px;text-align:center;color:white;margin:0 auto'>DANH MỤC KHÁCH HÀNG</p>
	<input type='search' id='timkh' style='width:calc(90% - 150px);height:30px;margin-left:5%;margin-top:5px;float:left;'>
	<button style='width:150px;float:left;margin-top:5px;height:30px' onclick="clickbtn()">Tìm khách hàng</button>
	<br style="clear:both">
	<div id="khachhang" style='width:90%;min-height:300px;margin:0 auto'>
	</div>
		</div>
		<div id="foot">
		</div>
	</div>
</div>

</body>
</html>