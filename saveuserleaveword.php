<?php
date_default_timezone_set('Asia/Shanghai');
if(!isset($_SESSION))
	session_start();
$title=$_POST['title'];
$content=$_POST['content'];
$time=date("Y-m-j g:ia");
include("conn/conn.php");
$who=$_SESSION['username'];
$sql=$conn->query("SELECT * FROM user WHERE name='$who'");
$info=$sql->fetch_array(MYSQLI_BOTH);
$userid=$info['id'];
$conn->query("INSERT INTO leaveword (`title`,`content`,`time`,`userid`) VALUES ('$title','$content','$time','$userid')");
echo "<script>alert('留言成功！感谢您的意见与建议！');history.back();</script>";
//header("location:userleaveword.php");
?>