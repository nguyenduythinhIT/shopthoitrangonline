<?php
class chitietHD extends DB
{
	function getAll()
	{
		return $this->query("select * from chitietHD");	
	}
	
	function timma($ten)
	{
		$arr = array("$ten");
		$sql ="select * from chitiet_hoadon where maHD like ? ";
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2,$v3,$v4,$v5)
	{
		$arr = array($v1,$v2,$v3,$v4,$v5);
		$sql ="insert into chitiet_hoadon values(?,?,?,?,?)";
		return $this->query($sql, $arr);	
	}
}