<?php
include("conn/conn.php");
$name=$_POST['name'];
$pwd=$_POST['pwd'];
 class chkinput{
   var $name;
   var $pwd;

   function chkinput($x,$y)
    {
     $this->name=$x;
     $this->pwd=$y;
    }

   function checkinput()
   {
     include("conn/conn.php");
     $query="SELECT * FROM admin WHERE admin='$this->name'";
     $sql=$conn->query($query);
	 $sql->data_seek(0);
     $info=$sql->fetch_array(MYSQLI_BOTH);
     if(!$info)
       {
          echo "<script language='javascript'>alert('This admin doesn't exist!');history.back();</script>";
          exit;
       }
      else
       {
          if($info['pwd']==$this->pwd){
               header("location:default.php");
            }
          else
           {
             echo "<script language='javascript'>alert('password error!');history.back();</script>";
             exit;
           }

      }    
   }
 }


    $obj=new chkinput($name,$pwd);
    $obj->checkinput();

?>