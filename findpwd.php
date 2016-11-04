
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>找回密码</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<?php
 include("conn/conn.php");
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="200" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
 <script language="javascript">
   function chkinput(form)
   {
     if(form.da.value=="")
	 {
	  alert('请输入密码提示答案!');
	  form.da.select();
	  return(false);
	 }
	  return(true);
   }
 </script>
  <form name="form2" method="post" action="showpwd.php" onSubmit="return chkinput(this)">
  <tr bgcolor="#FFEDBF">
    <td height="25" colspan="2" bgcolor="#F0F0F0"><div align="center">找回密码</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="67" height="25"><div align="center">提示问题：</div></td>
    <td width="133"><div align="left">
	<?php
	  $key=$_POST['findusername'];
	  $sql=$conn->query("SELECT * FROM user WHERE name='$key'");
	  $info=$sql->fetch_array(MYSQLI_BOTH);
	  if($info==false)
	   {
	     echo "<script>alert('无此用户!');history.back();</script>";
		 exit;
	   }
	   else
	   {
	     echo $info['tishi'];
	   }
	   
	?>
	</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="25"><div align="center">提示答案：</div></td>
    <td height="25"><div align="left"><input type="text" name="da" class="inputcss" size="20">
	  <input type="hidden" name="key" value="<?php echo $key;?>">
	</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="25" colspan="2"><div align="center"><input type="submit" value="确定" class="buttoncss"></div></td>
  </tr>
  </form>
</table>
<p>&nbsp;</p>
</body>
</html>
