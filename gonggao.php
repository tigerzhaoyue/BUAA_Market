<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#F0F0F0"><?php include("left_menu.php");?></td>
    <td width="581" align="center" valign="top" bgcolor="#FFFFFF"><table width="557" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="557" height="25" background="images/gg.gif">&nbsp;</td>
        </tr>
        <tr>
          <td height="150"><table width="530"  border="0" align="center" cellpadding="0" cellspacing="1">
              <?php
		     
		     $id=$_GET['id'];
			 $sql=$conn->query("select * from gonggao where id='".$id."'");
			 $info=$sql->fetch_array(MYSQLI_BOTH);
		     include("function.php");
		   
		   ?>
              <tr>
                <td width="24" height="25" bgcolor="#FFFFFF"><div align="center"></div></td>
                <td width="315" bgcolor="#FFFFFF"><div align="center">公告主题：<?php echo unhtml($info['title']);?></div></td>
                <td width="66" bgcolor="#FFFFFF"><div align="center">发布时间：</div></td>
                <td width="120" bgcolor="#FFFFFF"><div align="left"><?php echo $info['time'];?></div></td>
              </tr>
              <tr>
                <td height="125" bgcolor="#FFFFFF"><div align="center"></div></td>
                <td height="125" colspan="3" bgcolor="#FFFFFF"><div align="left"><?php echo unhtml($info['content']);?></div></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="530" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="right"><a href="gonggaolist.php">查看其他公告</a></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>