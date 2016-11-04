<?php
include("conn/conn.php");
$title=$_POST['title'];
$content=$_POST['content'];
$spid=$_GET['id'];
$time=date("Y-m-j");
if(!isset($_SESSION))
	session_start();
$sql=$conn->query("select * from user where name='".$_SESSION['username']."'");
$info=$sql->fetch_array(MYSQLI_BOTH);
$userid=$info['id'];
$conn->query("insert into `pingjia` (`id`,`userid`,`spid`,`title`,`content`,`time`) values (NUll,'$userid','$spid','$title','$content','$time') ");
echo "<script>alert('评论发表成功!');history.back();</script>";
?>