<?php
if(!isset($_SESSION))
	session_start();
include("conn/conn.php");
$sql=$conn->query("select * from user where name='".$_SESSION['username']."'");
$info=$sql->fetch_array(MYSQLI_BOTH);
$xiadanid=$info['id'];
$spc=$_SESSION['producelist'];
$arraysp=explode("@",$spc);
$sql11=$conn->query("select * from shangpin where id='".$arraysp[0]."'");
$spinfo=$sql11->fetch_array(MYSQLI_BOTH);
$ownerid=$spinfo['ownerid'];
$dingdanhao=date("YmjHis").$info['id'];
$shouhuoren=$_POST['name2'];
$sex=$_POST['sex'];
$dizhi=$_POST['dz'];
$youbian=$_POST['yb'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$shff=$_POST['shff'];
$zfff=$_POST['zfff'];
if(!isset($_POST['ly'])){
   $leaveword="";
 }
 else{
   $leaveword=$_POST['ly'];
 }
 $time=date("Y-m-j H:i:s");
 $zt="未作任何处理";
 $total=$_SESSION['total'];
 $query="INSERT INTO `dingdan`(`id`,`xiadanid`,`spc`,`dingdanhao`,`shouhuoren`,`sex`,`dizhi`,`youbian`,`tel`,`email`,`shff`,`zfff`,`leaveword`,`zt`,`time`,`ownerid`) VALUES(NULL,'$xiadanid','$spc','$dingdanhao','$shouhuoren','$sex','$dizhi','$youbian','$tel','email','$shff','$zfff','$leaveword','$zt','$time','$ownerid')";
 $conn->query($query);
 
 header("location:gouwusuan.php?dingdanhao=$dingdanhao");
?>
