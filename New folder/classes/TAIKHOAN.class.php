<?php
class TAIKHOAN extends DB
{
	function getAll()
	{
		return $this->query("select * from TAIKHOAN");	
	}
	
	function tim($ten)
	{
		$arr = array("$ten");
		$sql ="select * from TAIKHOAN where taikhoan like ? ";
		return $this->query($sql, $arr);	
	}
	function timmk($ten)
	{
		$arr = array("$ten");
		$sql ="select * from TAIKHOAN where matkhau1 like ? ";
		return $this->query($sql, $arr);	
	}	
	function them($tk,$mk,$ma)
	{
		$arr = array($tk,$mk,$ma);
		$sql ="insert into TAIKHOAN(taikhoan,matkhau1,makh) values(?,?,?)";
		return $this->query($sql, $arr);	
	}
	function capnhat($v1,$v2,$v3)
	{
		$arr = array($v2,$v3,$v1);
		$sql ="update TAIKHOAN set matkhau1=? , matkhau2=? where taikhoan=?";
		return $this->query($sql, $arr);	
	}
	function xoa($tk)
	{
		$arr = array("$tk");
		$sql ="delete from TAIKHOAN where taikhoan = ?";
		return $this->query($sql, $arr);	
	}
}
?>