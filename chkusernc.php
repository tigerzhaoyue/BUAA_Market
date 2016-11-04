<?php
 $nc=$_GET['nc'];
?>
<?php
 include("conn/conn.php");
?>
<html>
<head>
<title>
用户名重用检测
</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table left="200" width="200" height="100" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#eeeeee">
  <tr>
    <td height="50"><div align="center">
	
	<?php
	  if($nc=="")
	  {
	    echo "请输入用户名!";
	  
	  }
	  else
	  {
		$query="SELECT * FROM user WHERE name='$nc'";
	    $sql=$conn->query($query);  
	    $info=$sql->fetch_array(MYSQLI_BOTH);
		if($info)
		{
		  echo "对不起,该用户名已被占用!";
		}
		else
		{
		   echo "恭喜,该用户名没被占用!";
		} 
	  }
	?>
	</div></td>
  </tr>
  <tr>
    <td height="50"><div align="center"><input type="button" value="确定" class="buttoncss" onClick="window.close()"></div></td>
  </tr>
</table>
</body>