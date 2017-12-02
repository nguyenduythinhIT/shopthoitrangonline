<?php 
class KICHTHUOC extends DB
{
	function getAll()
	{
		return $this->query("select * from KICHTHUOC");	
	}
	
	function timgd($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from KICHTHUOC where ten like :T ";
		
		return $this->query($sql, $arr);	
	}
	function timma($ten)
	{
		/*$arr = array("$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from KICHTHUOC where ma like :T ";
		
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2)
	{
		$arr = array($v1,$v2);
		$sql ="insert into KICHTHUOC values(?,?)";
		return $this->query($sql, $arr);	
	}
	function sua($v1,$v2)
	{
		$arr = array("$v1","$v2");
		$sql ="update KICHTHUOC set ma = ?, ten = ?";
		return $this->query($sql, $arr);	
	}
	function xoa($v)
	{
		$arr = array("$v");
		$sql ="delete from KICHTHUOC where ma = ?";
		return $this->query($sql, $arr);	
	}
}
?>