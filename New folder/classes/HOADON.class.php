<?php
class HOADON extends DB
{
	function getAll()
	{
		return $this->query("select * from HOADON");	
	}
	
	function timkh($ten)
	{
		$arr = array("$ten");
		$sql ="select * from HOADON where makh like ? ";
		return $this->query($sql, $arr);	
	}
	function timma($ten)
	{
		$arr = array("$ten");
		$sql ="select * from HOADON where ma like ? ";
		return $this->query($sql, $arr);	
	}
	function timgd($v)
	{
		$arr = array($v);
		$sql ="select * from HOADON where trangthai like ? ";
		return $this->query($sql, $arr);	
	}

	function them($v1,$v2,$v3,$v4)
	{
		$arr = array($v1,$v2,$v3,$v4);
		$sql ="insert into HOADON values(?,?,?,?)";
		return $this->query($sql, $arr);	
	}
	function capnhat($v)
	{
		$arr = array("$v");
		$sql ="update HOADON set trangthai=2 where ma=?";
		return $this->query($sql, $arr);	
	}
	function xoa($tk)
	{
		$arr = array("$tk");
		$sql ="delete from HOADON where taikhoan = ?";
		return $this->query($sql, $arr);	
	}
}