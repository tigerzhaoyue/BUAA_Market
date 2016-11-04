
<html>
<head>
<title>查看留言</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/font.css">
</head>
<?php
include("conn/conn.php");
$id=$_GET['id'];
$sql=$conn->query("SELECT * FROM leaveword WHERE id='".$id."'");
$info=$sql->fetch_array(MYSQLI_BOTH);

?>
<body topmargin="0" leftmargin="0" bottommargin="0" >


<p>&nbsp;</p>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr> 
    <td height="20" bgcolor="#0099FF"><div align="center"><font color="#FFFFFF">留言详情</font></div></td>
  </tr>
  <tr>
    <td height="100" bgcolor="#000000"><table width="750" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="87" height="25" bgcolor="#FFFFFF"><div align="center">标题：</div></td>
          <td width="392" height="25" bgcolor="#FFFFFF"><div align="left"><?php echo $info['title'];?></div></td>
          <td width="83" bgcolor="#FFFFFF"><div align="center">时间：</div></td>
          <td width="183" bgcolor="#FFFFFF"><div align="center"><?php echo $info['time'];?></div></td>
        </tr>
        <tr> 
          <td height="100" bgcolor="#FFFFFF"><div align="center">留言内容：</div></td>
          <td colspan="3" bgcolor="#FFFFFF"><div align="left">
		<?php echo $info['content'];?>
		  </div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="20"><div align="center">&nbsp;<input type="button" value="返回" class="buttoncss" onClick="javascript:history.back();"></div></td>
  </tr>
 
</table>
</body>
</html>
