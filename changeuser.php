<?php
include("conn/conn.php");
$username=$_POST['usnm'];
$nc=$_POST['nc'];
$email=$_POST['email'];
$truename=$_POST['truename'];
$sfzh=$_POST['sfzh'];
$tel=$_POST['tel'];
$qq=$_POST['qq'];
$dizhi=$_POST['dizhi'];
$youbian=$_POST['youbian'];
$sql=$conn->query("UPDATE user SET nc='$nc',email='$email',truename='$truename',sfzh='$sfzh',tel='$tel',qq='$qq',dizhi='$dizhi',youbian='$youbian' WHERE `name`='$username'");
header("location:usercenter.php");
?>