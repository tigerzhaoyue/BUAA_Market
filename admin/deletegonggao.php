<?php
 include("conn/conn.php");
  while(list($name,$value)=each($_POST))
  {
    $conn->query("delete from gonggao where id='".$value."'");
  
  }
 header("location:admingonggao.php");  
?>