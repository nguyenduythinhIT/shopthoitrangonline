<?php
class LOAI extends DB
{
	function getAll()
	{
		return $this->query("select * from LOAI");	
	}
	
	function timgd($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from LOAI where ten like :T ";
		
		return $this->query($sql, $arr);	
	}
	function timma($ten)
	{
		/*$arr = array("$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from LOAI where ma like :T ";
		
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2,$v3)
	{
		$arr = array($v1,$v2,$v3);
		$sql ="insert into LOAI values(?,?,?) ";
		return $this->query($sql, $arr);	
	}
	function sua($v1,$v2,$v3)
	{
		$arr = array("$v2","$v3","$v1");
		$sql ="update from LOAI set ten=?, gioitinh=? where ma=?";
		return $this->query($sql, $arr);
	}
	function xoa($v)
	{
		$arr = array($v);
		$sql ="delete from LOAI where ma=?";
		return $this->query($sql,$arr);	
	}
}