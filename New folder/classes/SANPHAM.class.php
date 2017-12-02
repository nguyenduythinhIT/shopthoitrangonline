<?php 
class SANPHAM extends DB
{
	function getAll()
	{
		return $this->query("select * from SANPHAM");	
	}
	
	function timgd($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from SANPHAM where ten like :T ";
		
		return $this->query($sql, $arr);	
	}
	function timma($ten)
	{
		/*$arr = array("$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from SANPHAM where ma like :T ";
		
		return $this->query($sql, $arr);	
	}
	function them($arr)
	{
		$sql ="insert into SANPHAM values(?,?,?,?,?,?,?,?) ";
		return $this->query($sql, $arr);
	}
	function sua($v1,$v2)
	{
		$arr = array("$v2","$v1");
		$sql ="update from SANPHAM set ten=? where ma=?";
		return $this->query($sql, $arr);
	}
	function xoa($v)
	{
		$arr = array("$v");
		$sql ="delete from SANPHAM where ma = ?";
		return $this->query($sql, $arr);	
	}
}
?>