<?php
class KHACHHANG extends DB
{
	function getAll()
	{
		return $this->query("select * from KHACHHANG");	
	}
	
	function tim($ten)
	{
		$arr = array("$ten");
		$sql ="select * from KHACHHANG where ma like ? ";
		return $this->query($sql, $arr);	
	}
	function timgd($ten)
	{
		$arr = array("%$ten%");
		$sql ="select * from KHACHHANG where ten like ? ";
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2,$v3,$v4,$v5,$v6)
	{
		$arr = array($v1,$v2,$v3,$v4,$v5,$v6);
		$sql ="insert into KHACHHANG values(?,?,?,?,?,?)";
		return $this->query($sql, $arr);	
	}
	function capnhat($v1,$v2,$v3,$v4,$v5,$v6)
	{
		$arr = array($v2,$v3,$v4,$v5,$v6,$v1);
		$sql ="update KHACHHANG set ten=?, gt=?, mail=?, sdt=? , diachi=? where ma=?";
		return $this->query($sql, $arr);	
	}
}
?>