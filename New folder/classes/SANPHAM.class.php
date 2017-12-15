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
	function timloai($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> $ten);
		$sql ="select * from SANPHAM where loai like :T ";
		
		return $this->query($sql, $arr);	
	}
	function timnsx($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> $ten);
		$sql ="select * from SANPHAM where nsx like :T ";
		
		return $this->query($sql, $arr);	
	}

	function timma($ten)
	{
		/*$arr = array("$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> $ten);
		$sql ="select * from SANPHAM where ma like :T ";
		
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9)
	{
		$arr=array($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8,$v9);
		$sql ="insert into SANPHAM values(?,?,?,?,?,?,?,?,?) ";
		return $this->query($sql, $arr);
	}
	function sua($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8)
	{
		$arr=array($v2,$v3,$v4,$v5,$v6,$v7,$v8,$v1);
		$sql ="update SANPHAM set ten=?, giaban=? , loai=? ,nsx=?, soluong=?, hinh=?, trangthai=?, mota=? where ma=?";
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