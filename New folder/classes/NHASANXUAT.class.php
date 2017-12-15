<?php 
class NHASANXUAT extends DB
{
	function getAll()
	{
		return $this->query("select * from NHASANXUAT");	
	}
	
	function timgd($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from NHASANXUAT where ten like :T ";
		
		return $this->query($sql, $arr);	
	}
	function timma($ten)
	{
		/*$arr = array("$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from NHASANXUAT where ma like :T ";
		
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2)
	{
		$arr = array("$v1","$v2");
		$sql ="insert into NHASANXUAT values(?,?) ";
		return $this->query($sql, $arr);
	}
	function sua($v1,$v2)
	{
		$arr = array("$v2","$v1");
		$sql ="update NHASANXUAT set ten=? where ma=?";
		return $this->query($sql, $arr);
	}
	function xoa($v)
	{
		$arr = array("$v");
		$sql ="delete from NHASANXUAT where ma = ?";
		return $this->query($sql, $arr);	
	}
}
?>