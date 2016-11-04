<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
{
   $conn->query("delete from leaveword where id='".$value."'");

}
header("location:lookleaveword.php");
?>