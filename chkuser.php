<?php
include("conn/conn.php");
$username1=$_POST['username'];
$userpwd1=md5($_POST['userpwd']);
$yz1=$_POST['yz'];
$num1=$_POST['num'];
if(strval($yz1)!=strval($num1)){
  echo "<script>alert('Identifying code error!');history.go(-1);</script>";
  exit;
 }
class chkinput{
   var $name;
   var $pwd;

   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput(){
     include("conn/conn.php");
	 $queryname=$this->name;
     $sql=$conn->query("SELECT * FROM user WHERE name='".$queryname."'");
     $info=$sql->fetch_array(MYSQLI_BOTH);
     if(!$info){
           echo "<script language='javascript'>alert('No such a user!');history.back();</script>";
          exit;
       }
      else{
	     /* if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('该用户已经被冻结！');history.back();</script>";
               exit;
			}
           */
          if($info['pwd']==$this->pwd)
            {  
			   echo "success!";
			   session_start();
	           $_SESSION['username']=$info['name'];
			   $_SESSION['usernc']=$info['nc'];
			   $_SESSION['producelist']="";
	
			  /* $producelist="";
			   session_register('producelist');
			   $quatity="";
			   session_register('quatity');*/
               header("location:index.php");
               exit;
			   
            }
          else {
               echo "<script language='javascript'>alert('Password error!');history.back();</script>";
               exit;
           }

      }
   }
 }
    $obj=new chkinput($username1,$userpwd1);
    $obj->checkinput();
?>