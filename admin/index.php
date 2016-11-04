<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/font.css" rel="stylesheet">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<p> 
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script language="javascript">
	  function chkinput(form){
	    if(form.name.value==""){
		  alert("请输入用户名!");
		  form.name.select();
		  return(false);
		}
		if(form.pwd.value==""){
		  alert("请输入用户密码!");
		  form.pwd.select();
		  return(false);
		}
		return(true);
	  }
	</script>
<form name="form1" method="post" action="chkadmin.php" onSubmit="return chkinput(this)">
  <table width="558" height="405"  background="images/1.gif" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
	<tr>
		<td width="194" >&nbsp;</td>
		<td width="364" ><table border="0" align="center" cellpadding="0" cellspacing="0">
		  <tr>
		    <td width="57" align="center">&nbsp;</td>
		    <td width="94" align="center">&nbsp;</td>
		    <td width="53" height="100" align="center">&nbsp;</td>
	      </tr>
		  <tr>
		    <td height="40" align="center">&nbsp;</td>
		    <td align="center">&nbsp;</td>
		    <td align="center">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="center">用户名：</td>
		    <td align="center"><input type="text" name="name" size="14" maxlength="20" class="inputcss"></td>
		    <td height="40" align="center">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="center">密&nbsp;码：</td>
		    <td align="center"><input type="password" name="pwd" size="14" maxlength="20" class="inputcss"></td>
		    <td height="40" align="center">&nbsp;</td>
	      </tr>
		  <tr>
		    <td height="126" align="center">&nbsp;</td>
		    <td align="center"><input name="imageField" type="image" src="images/newlogin_07.gif"  border="0"></td>
		    <td align="center">&nbsp;</td>
	      </tr>
	    </table></td>
	</tr>
	<tr>
		<td height="45" align="right" >&nbsp;</td>
		<td align="right" >&nbsp;</td>
	</tr>
  </table>
</form>
</body>
</html>