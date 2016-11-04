<?php  
$n0=$_POST['n0'];
$n1=$_POST['n1'];
$p0=$_POST['p0'];
$p1=trim($_POST['p1']);
include("conn/conn.php");

  $sql=$conn->query("SELECT * FROM admin WHERE admin='$n0'");
  $info=$sql->fetch_array();
  if($info==false)
   {
     echo "<script>alert('不存在此用户!');history.back();</script>";
     exit;
   }
   else
   {
    if($info['pwd']==$p0)
	 {
	  if($n1)
	   {
	  	 $conn->query("update admin set admin='".$n1."'where id=".$info['id']." ");
	  }
	  else
	 {
	   echo "<script>alert('请输入新用户名!');history.back();</script>";
       exit;
	 }
	  if($p1)
	   {
	     $conn->query("update admin set pwd='".$p1."' where id=".$info['id']." ");
	   
	   }
	 }
	 else
	 {
	   echo "<script>alert('请输入新密码!');history.back();</script>";
       exit;
	 }
   }


echo "<script>alert('更改成功!');history.back();</script>";




?>