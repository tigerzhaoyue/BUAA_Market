<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include("conn/conn.php");
if(is_numeric($_POST['price'])==false)
 {
   echo "<script>alert('价格只能为数字！');history.back();</script>";
   exit;
 }
$mingcheng=$_POST['cargoname'];
$addtime=date("Y-m-j");
$price=$_POST['price'];
$typeid=$_POST['typeid'];
//$upfile=$_POST['upfile'];
$cargoid=$_POST['cargoid'];




function getname($exname){
   $dir = "upimages/";
   $i=1;
   if(!is_dir($dir)){
      mkdir($dir,0777);
   }
   
   while(true){
       if(!is_file($dir.$i.".".$exname)){
	       $name=$i.".".$exname;
	       break;
	   }
	   $i++;
	 }

   return $dir.$name;
}


echo $_FILES['upfile']['name'];
echo "<br>";
$exname=strtolower(substr($_FILES['upfile']['name'],(strrpos($_FILES['upfile']['name'],'.')+1)));
echo $exname;
echo "<br>";
$uploadfile = getname($exname);
echo $uploadfile;
echo "<br>";
move_uploaded_file($_FILES['upfile']['tmp_name'], $uploadfile);
if(trim($_FILES['upfile']['name']!=""))
 { 
  $uploadfile="./".$uploadfile;
}
else
 {
  $uploadfile="";
 }

echo $uploadfile;
echo "<br>";



$jianjie=$_POST['jianjie'];


$query="UPDATE shangpin SET name='$mingcheng',introduce='$jianjie',price='$price',image='$uploadfile',typeid='$typeid' WHERE `id`='$cargoid'";

if($conn->query($query))
	echo "<script>alert('商品".$mingcheng."修改成功!');window.location.href='editgoods.php';</script>";
else
	echo "<script>alert('商品".$mingcheng."修改失败!');window.location.href='editgoods.php';</script>";
?>