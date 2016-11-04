<?php
$leibie=$_POST['leibie'];
include("conn/conn.php");
$sql=$conn->query("select * from type where typename='".$leibie."'");
$info=$sql->fetch_array(MYSQLI_BOTH);
if($info){
 echo"<script>alert('该类别已经存在!');window.location.href='addleibie.php';</script>";
exit;
}
$conn->query("insert into `type` (`id`,`typename`) values (NULL,'$leibie')");
echo"<script>alert('新类别添加成功!');window.location.href='addleibie.php';</script>";
?>