
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>找回密码</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<?php
 include("conn/conn.php");
 $key=$_POST['key'];
 $da=$_POST['da'];
 $sql=$conn->query("SELECT * FROM user WHERE name='$key'");
 $info=$sql->fetch_array(MYSQLI_BOTH);
 if($info['huida']!=$da)
 {
   echo "<script>alert('提示问题回答错误!');history.back();</script>";
  exit;
 }
 else
 {
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="200" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#FFEDBF">
    <td height="25" colspan="2" bgcolor="#F0F0F0"><div align="center">密码成功找回</div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td width="76" height="25"><div align="center">用户名：</div></td>
    <td width="124"><div align="left"><?php echo $key;?></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="25"><div align="center">当前密码：</div></td>
    <td height="25"><div align="left"><?php echo $info['pwd1'];?></div></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td height="25" colspan="2"><div align="center"><input name="submit" type="button" id="submit" onClick="window.close()"  value="好的">
    </div></td>
  </tr>
</table>
<?php
  }
?>
</body>
</html>
