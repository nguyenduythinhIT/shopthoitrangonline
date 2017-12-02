<?php class MAU extends DB
{
	function getAll()
	{
		return $this->query("select * from MAU");	
	}
	
	function timgd($ten)
	{
		/*$arr = array("%$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from MAU where ten like :T ";
		
		return $this->query($sql, $arr);	
	}
	function timma($ten)
	{
		/*$arr = array("$ten%");
		$sql ="select * from sach where tensach like ? ";
		*/
		$arr = array(":T"=> "%$ten%");
		$sql ="select * from MAU where ma like :T ";
		
		return $this->query($sql, $arr);	
	}
	function them($v1,$v2)
	{
		$arr = array("$v1","$v2");
		$sql ="insert into MAU values(?,?) ";
		return $this->query($sql, $arr);
	}
	function sua($v1,$v2)
	{
		$arr = array("$v2","$v1");
		$sql ="update from MAU set ten=? where ma=?";
		return $this->query($sql, $arr);
	}
	function xoa($v)
	{
		$arr = array("$v");
		$sql ="delete from MAU where ma = ?";
		return $this->query($sql, $arr);	
	}
}
	?>
	