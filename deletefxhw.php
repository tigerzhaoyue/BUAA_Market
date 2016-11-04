<?php
 include("conn/conn.php");
 while(list($name,$value)=each($_POST))
  {
      $sql=$conn->query("select image from shangpin where id='".$value."'");
	  $info=$sql->fetch_array(MYSQLI_BOTH);
	  $filename=$info['image'];
	  echo $filename;
	  if(!$filename)
	  {
	     @unlink($filename);
		
	  }
	 /* $sql1=$conn->query("select * from dingdan ");
	  while($info1=$sql1->fetch_array())
	  {  $id1=$info1['id'];
	     $array=explode("@",$info1['spc']);
	     for($i=0;$i<count($array);$i++){
	        if($array[$i]==$value)
			 {
			   $conn->query("delete from dingdan where id='".$id1."'");
			 }
	      }
	  }*/
      $conn->query("delete from shangpin where id='".$value."'");
	//  $conn->query("delete from tb_pingjia where spid='".$value."'");
  }
 header("location:editgoods.php"); 
?>