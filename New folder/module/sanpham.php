<?php 
echo "<pre>";
print_r($_FILES);
session_start();
include_once "functions.php";
include_once "../config/config.php";
include_once "../module/functions.php";
function loadClass($c)
{
	include "../classes/$c.class.php";	
}
spl_autoload_register("loadClass");
$sp=new SANPHAM();
$sm=postIndex('sm');
$ma=postIndex('ma');
$ten=postIndex('ten');
$gia=postIndex('gia');
$loai=postIndex('loai');
$nsx=postIndex('nsx');
$soluong=postIndex('soluong');
$trangthai=postIndex('trangthai');
if($trangthai=="") $trangthai=1;
$mota=postIndex('mota');
if($mota=="") $mota="chưa có mô tả";
$arrImg = array("image/png", "image/jpeg", "image/bmp");
if($sm=="") header("Location:../");
else if($sm=="Thêm") 
{
	if($ma!="" && $ten!=""){
	$sohinh=count($_FILES["hinh"]["error"]);
	for($i=0;$i<$sohinh;$i++)
	{
		$errFile = $_FILES["hinh"]["error"][$i];
		if ($errFile>0)
			{}
		else
		{
			$type = $_FILES["hinh"]["type"][$i];
			if (!in_array($type, $arrImg))
				{}
			else
			{	$temp = $_FILES["hinh"]["tmp_name"][$i];
				$name =$ma."_".$i;
				if (!move_uploaded_file($temp, "../image/upload/sp/".$name.".png"))
					{echo "lỗi";}
				
			}
		}
	}

	$sp->them($ma,$ten,$gia,$loai,$nsx,$soluong,$sohinh,$trangthai,$mota);
	}
	?><script>window.close();</script> <?php 
}
else if($sm=="Xoá") 
{
	$ex=$sp->timma($ma);
	if($ex!=array())
	{
	$n=$ex[0]['hinh'];
	for($i=0;$i<$n;$i++)
	{unlink("../image/upload/sp/".$ma."_".$i.".png");}
	$sp->xoa($ma);
	}
	header("Location:../admin/xem.php?p=loai&ma=L001");
}
else if($sm=="Sửa") 
{
	
	header("Location:../admin/xem.php?p=loai&ma=L001");
}
?>