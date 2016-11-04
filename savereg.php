<?php
date_default_timezone_set('Asia/Shanghai');
session_start();
include("conn/conn.php");
$username=$_POST['username'];
$usernc=$_POST['usernc'];
$pwd1=$_POST['p1'];
$pwd=md5($pwd1);
//$pwd=$pwd1;
$email=$_POST['email'];
$truename=$_POST['truename'];
$sfzh=$_POST['sfzh'];
$tel=$_POST['tel'];
$qq=$_POST['qq'];
if($_POST['ts2']!="")
  {
  $tishi=$_POST['ts2'];
  }
else 
 {
 $tishi=$_POST['ts1'];
 } 
$huida=$_POST['tsda'];
$dizhi=$_POST['dizhi'];
$youbian=$_POST['yb'];
$regtime=$time=date("Y-m-j g:ia");
$truename=$_POST['truename'];
//$dongjie=0;
$query="SELECT * FROM user WHERE name='$username'";
$sql=$conn->query($query);
$info=$sql->fetch_array(MYSQLI_BOTH);
if($info)
 {
   echo "<script>alert('该用户名已经存在!');history.back();</script>";
   exit;
 }
 else
 {  
 	$query="INSERT INTO `user` (`id`, `name`, `pwd`, `nc`, `email`, `sfzh`, `tel`, `qq`, `tishi`, `huida`, `dizhi`, `youbian`, `regtime`, `truename`,`pwd1`) VALUES (NULL, '$username', '$pwd', '$usernc', '$email', '$sfzh', '$tel', '$qq', '$tishi', '$huida', '$dizhi', '$youbian', '$regtime', '$truename','$pwd1')";
    $conn->query($query);
	$_SESSION['username']=$username;
	$_SESSION['usernc']=$usernc;
	$_SESSION['producelist']="";
	$_SESSION['quatity']="";
    echo "<script>alert('恭喜，注册成功!');window.location='index.php';</script>";
 }
?>
