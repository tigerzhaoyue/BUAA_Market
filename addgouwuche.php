<?php
if(!isset($_SESSION))
	session_start();
include("conn/conn.php");
if(!isset($_SESSION['username'])){
  echo "<script>alert('请先登录后购物!');history.back();</script>"; 
  exit;
 }
$id=strval($_GET['id']);
//echo $id;
$sql=$conn->query("select * from shangpin where id='".$id."'"); 
$info=$sql->fetch_array(MYSQLI_BOTH);
  $array=explode("@",$_SESSION['producelist']);
  for($i=0;$i<count($array)-1;$i++){
	 if($array[$i]==$id){
	     echo "<script>alert('该商品已经在您的购物车中!');history.back();</script>";
		 exit;
	  }
	}
  $_SESSION['producelist']=$_SESSION['producelist'].$id."@";
  header("location:gouwuche.php");
?> 