<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST))
  {
    $conn->query("DELETE FROM user WHERE id=".$value.""); 
    $conn->query("DELETE FROM leaveword WHERE userid=".$value."");
    $conn->query("DELETE FROM pingjia WHERE userid=".$value."");
    $conn->query("DELETE FROM shangpin WHERE ownerid=".$value."");
  }
header("location:edituser.php");
?>