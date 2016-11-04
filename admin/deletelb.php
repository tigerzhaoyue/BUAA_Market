<?php
include("conn/conn.php");
while(list($name,$value)=each($_POST)){
 $info=$conn->query("select * from shangpin where typeid='".$value."'");
 if($info){
	 echo"<script>alert('该类别仍有商品！');window.location.href='showleibie.php';</script>";
	 exit;
	 }
 else
 	$conn->query("delete from type where id='".$value."'");
 }
 header("location:showleibie.php");
/* echo $name;
 echo "\t";
 echo $value;
 }*/
?>