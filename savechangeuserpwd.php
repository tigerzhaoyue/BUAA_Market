<?php
session_start();
$p1=md5(trim($_POST['p1']));
$p2=trim($_POST['p2']);

$name=$_SESSION['username'];
class chkchange
   {
	   var $name;
	   var $p1;
	   var $p2;
	   function chkchange($x,$y,$z)
	    {
		  $this->name=$x;
		  $this->p1=$y;
		  $this->p2=$z;
		
		}
	   function changepwd()
	   {include("conn/conn.php");
	    $sql=$conn->query("SELECT * FROM user WHERE name='$this->name'");
	    $info=$sql->fetch_array(MYSQLI_BOTH);
		if($info['pwd']!=$this->p1)
		 {
		   echo "<script>alert('原密码输入错误！');history.back();</script>";
		   exit;
		 }
		 else
		 {
		   $newpwd=md5($this->p2);
		   $newpwd1=$this->p2;
		   $result=$conn->query("UPDATE user SET pwd='$newpwd',pwd1='$newpwd1' WHERE name='$this->name'");
		   echo "<script>alert('密码修改成功！');history.back();</script>";
		   exit;
		 }
	   }
  }
 $obj=new chkchange($name,$p1,$p2); 
 $obj->changepwd() 
?>