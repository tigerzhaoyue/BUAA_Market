<?php
  $title=$_POST['title'];
  $content=$_POST['content'];
  include("conn/conn.php");
  $iddd=$_POST[id];
  $conn->query("update gonggao set title='$title',content='$content' where id='".$iddd."'");
  echo "<script>alert('公告修改成功!');history.back();</script>";
?>