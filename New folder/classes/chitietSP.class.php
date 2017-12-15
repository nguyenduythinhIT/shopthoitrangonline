<?php
class chitietSP extends DB
{
	function getAll()
	{
		return $this->query("select * from chitiet_sanpham");	
	}
	
	function tim($ten)
	{
		$arr = array("$ten");
		$sql ="select * from chitiet_sanpham where masp like ? ";
		return $this->query($sql, $arr);	
	}
		function timsp($v1,$v2,$v3)
	{
		$arr = array($v1,$v2,$v3);
		$sql ="select * from chitiet_sanpham where masp like ? and mau like ? and kichthuoc like ?";
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2,$v3,$v4)
	{
		$arr = array($v1,$v2,$v3,$v4);
		$sql ="insert into chitiet_sanpham values(?,?,?,?)";
		return $this->query($sql, $arr);	
	}
	function capnhat($v1,$v2,$v3,$v4)
	{
		$arr = array($v4,$v1,$v2,$v3);
		$sql ="update chitiet_sanpham set soluong = ? where masp=? and mau=? and kichthuoc=?";
		return $this->query($sql, $arr);	
	}
	function xoa($v1,$v2,$v3)
	{
		$arr = array("$v1","$v2","$v3");
		$sql ="delete from chitiet_sanpham where masp = ? AND mau = ? AND kichthuoc = ?";
		return $this->query($sql, $arr);	
	}
}
?>