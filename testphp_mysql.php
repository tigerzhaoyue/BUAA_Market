<?php //testphp_mysql.php
session_start();
$code=mt_rand(0,10000000);
//echo "code now:".$code."<br>";
$hostname='localhost';
$database='construction';
$username='root';
$password='';
$conn=new mysqli('localhost','root');
if($conn->connect_error)
	die($conn->connect_error);
$conn->query("set character set gb2312");
$conn->query("set names utf8");
$conn->select_db($database);
if(isset($_POST['delete']) && isset($_POST['JNO'])){
	$JNO=get_post($conn, 'JNO');
	$query="DELETE FROM j WHERE JNO='$JNO'";
	$result=$conn->query($query);
	if(!$result)
		echo "DELETE failed: $query<br>".$conn->error."<br><br>";
}
if(isset($_POST['JNO'])&&
   isset($_POST['JNAME'])&&
   isset($_POST['CITY'])){
	if(!isset($_SESSION['code']))
		$_SESSION['code']=$code;
	$_POST['originator']=$code;
	if($_SESSION['code']==$_POST['originator']){
	$JNO=get_post($conn, 'JNO');
	$JNAME=get_post($conn,'JNAME');
	$CITY=get_post($conn,'CITY');
	$query="INSERT INTO j VALUES"."('$JNO','$JNAME','$CITY')";
	$result=$conn->query($query);
	if(!$result)
		echo "INSERT failed: $query<br>"."$conn->error"."<br><br>";
	}
	else
		echo "You've submitted your post!";
}
echo <<<_END
在此加入新的一条记录<br>
<form action ="testphp_mysql.php" method="post"><pre>
项目编号 <input type="text" name="JNO">
项目名称 <input type="text" name='JNAME'>
项目城市 <input type="text" name='CITY'>
<input type="hidden" name='originator' value="$code">
<input type='submit' value="ADD RECORD"> 
</pre></form>
_END;
$query="SELECT * FROM j";
$result=$conn->query($query);
if(!$result)
	die ("Database access failed:".$conn->error);

$rows=$result->num_rows;
for($j=0;$j<$rows;++$j){
	$result->data_seek($j);
	$row = $result->fetch_array(MYSQLI_NUM);
echo <<<_END
<pre>
项目编号 $row[0];
项目名称 $row[1];
项目城市 $row[2];
</pre>
<form action="testphp_mysql.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="JNO" value="$row[0]">
<input type="submit" value="DELETE RECORD">
_END;
}
$result->close();
$conn->close();
function get_post($conn,$var){
	return $conn->real_escape_string($_POST[$var]);
}
?>