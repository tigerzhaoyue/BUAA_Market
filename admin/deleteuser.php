<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
  {
    $conn->query("DELETE FROM user WHERE id=".$value.""); 
	//$conn->query("delete from tb_pingjia where userid=".$value."");
	$conn->query("DELETE FROM leaveword WHERE userid=".$value."");
  }
header("location:edituser.php");
?>