<?php
 include("conn/conn.php");
 $title=$_POST['title'];
 $content=$_POST['content'];
 $time=date("Y-m-j");
 $conn->query("insert into `gonggao` (`id`,`title`,`content`,`time`) values (NULL,'$title','$content','$time')");
 echo "<script>alert('公告添加成功!');history.back();</script>";
?>