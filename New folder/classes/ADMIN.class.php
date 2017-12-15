<?php
class ADMIN extends DB
{
	function getAll()
	{
		return $this->query("select * from ADMIN");	
	}
	
	function tim($ten)
	{
		$arr = array("$ten");
		$sql ="select * from ADMIN where taikhoan like ? ";
		return $this->query($sql, $arr);	
	}
	function timmk($ten)
	{
		$arr = array("$ten");
		$sql ="select * from ADMIN where matkhau1 like ? ";
		return $this->query($sql, $arr);	
	}
	function them($tk,$mk)
	{
		$arr = array("$tk","$mk");
		$sql ="insert into ADMIN values(?,?)";
		return $this->query($sql, $arr);	
	}
	function capnhat($mk)
	{
		$arr = array("$mk");
		$sql ="update ADMIN set matkhau1=?";
		return $this->query($sql, $arr);	
	}
	function xoa($tk)
	{
		$arr = array("$tk");
		$sql ="delete from ADMIN where taikhoan = ?";
		return $this->query($sql, $arr);	
	}
}
?>