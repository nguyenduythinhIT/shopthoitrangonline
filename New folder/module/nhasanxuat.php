<?php 
session_start();
include_once "functions.php";
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
$nsx=new NHASANXUAT();
$sm=postIndex('sm');
$ma=postIndex('ma');
$ten=postIndex('ten');
$arrImg = array("image/png", "image/jpeg", "image/bmp");
if($sm=="") header("Location:../");
else if($sm=="Thêm") 
{
	if($ma!="" && $ten!=""){
	$errFile = $_FILES["hinh"]["error"];
	if ($errFile>0)
		{}
	else
	{
		$type = $_FILES["hinh"]["type"];
		if (!in_array($type, $arrImg))
			{}
		else
		{	$temp = $_FILES["hinh"]["tmp_name"];
			$name =$ma;
			if (!move_uploaded_file($temp, "../image/upload/nsx/".$name.".png"))
				{echo "lỗi";}
			
		}
	}

	$nsx->them($ma,$ten);
	}
	?><script>window.close();</script> <?php 
}
else if($sm=="Xoá") 
{
	$nsx->xoa($ma);
	header("Location:../admin/danhmuc.php");
}
else if($sm=="Sửa") 
{
	
	header("Location:../admin/danhmuc.php");
}
?>