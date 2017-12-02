<?php
class KHACHKHANG extends DB
{
	function getAll()
	{
		return $this->query("select * from KHACHKHANG");	
	}
	
	function search($ten)
	{
		$arr = array("$ten");
		$sql ="select * from KHACHKHANG where taikhoan like ? ";
		return $this->query($sql, $arr);	
	}
	function insert($tk,$mk)
	{
		$arr = array("$tk","$mk");
		$sql ="insert into KHACHKHANG values(?,?)";
		return $this->query($sql, $arr);	
	}
	function update($mk)
	{
		$arr = array("$mk");
		$sql ="update KHACHKHANG set matkhau1=?";
		return $this->query($sql, $arr);	
	}
	function delete($tk)
	{
		$arr = array("$tk");
		$sql ="delete from KHACHKHANG where taikhoan = ?";
		return $this->query($sql, $arr);	
	}
}