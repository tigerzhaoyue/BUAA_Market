
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>用户信息管理</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<?php
include("conn/conn.php");
$id=$_GET['id'];
$sql=$conn->query("SELECT * FROM user WHERE id=".$id."");
$info=$sql->fetch_array(MYSQLI_BOTH);
?>
<body topmargin="0" leftmargin="0" bottommargin="0">
<p>&nbsp;</p>
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" bgcolor="#0099FF"><div align="center" class="style1">用户信息</div></td>
  </tr>
  <tr>
    <td height="98" bgcolor="#666666"><table width="650" border="0" align="center" cellpadding="0" cellspacing="1">
      <!--DWLayoutTable-->
      <tr>
        <td width="99" height="20" bgcolor="#FFFFFF"><div align="center">用户名：</div></td>
        <td width="180" bgcolor="#FFFFFF"><div align="left"><?php echo $info['name'];?></div></td>
        <td width="100" bgcolor="#FFFFFF"><div align="center">用户昵称：</div></td>
        <td width="266" bgcolor="#FFFFFF"><div align="left"><?php echo $info['nc']; ?></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">真实姓名：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['truename'];?></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">身份证号：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['sfzh'];?></div></td>
      </tr>
	  <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">E-mail：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['email'];?></div></td>
      </tr>
	  <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">联系电话：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['tel'];?></div></td>
      </tr>
	  <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">QQ号码：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['qq'];?></div></td>
      </tr>
	  <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">注册时间：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['regtime'];?></div></td>
      </tr>
	  <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">密码提示：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['tishi'];?></div></td>
      </tr>
	  <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="center">密码提示答案：</div></td>
        <td colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo $info['huida'];?></div></td>
      </tr>
    </table></td>
  </tr>
 <tr>
    <td height="20"><div align="center"></div></td>
  </tr>
<tr>
    <td height="20"><div align="center">&nbsp;<input type="button" value="返回" class="buttoncss" onClick="javascript:history.back();"></div></td>
  </tr>
</table>
</body>
</html>
