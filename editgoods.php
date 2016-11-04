<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#F0F0F0"><div align="center">
      <?php include("left_menu.php");?>
    </div></td>
    <td width="561" align="center" valign="top" bgcolor="#FFFFFF"><table width="500" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td></td>
      </tr>
    </table>
      <table width="550" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
           <td><div align="left">&nbsp;&nbsp;当前用户&nbsp;<span style="color: #0000FF">：&nbsp;</span>
		  <?php echo $_SESSION['username'];?>&nbsp;
          <span style="color: #0000FF"></span><a href="addgoods.php">上架新商品</a>&nbsp;
          <span style="color: #0000FF">丨</span><a href="editgoods.php">查看&修改</a>&nbsp;
          <span style="color: #0000FF">丨</span><a href="logout.php">注销离开&nbsp;</a></div>
          </td>
        </tr>
      </table>
      <table width="500" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="20" bgcolor="#EEEEEE"><div align="center" style="color: #990000">我的商品</div></td>
        </tr>
        
        
        
        
        <tr>
          <table width="500" border="0"><form name="form1" method="post" action="deletefxhw.php">
  <tbody>
     <tr>
      <td height="25" bgcolor="#FFFFFF"><div align="center">
         选择
        </div></td>
      <td height="25" bgcolor="#FFFFFF">
          
          <div align="center">商品名称</div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center">价格</div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center">出售时间</div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center">其他操作</div></td>
    </tr>
    <?php
	  

			$usname=$_SESSION['username'];
		   $sqll=$conn->query("select * from user where name='".$usname."'");
		   $usinfo=$sqll->fetch_array(MYSQLI_BOTH);
		   $usid=$usinfo['id'];
           $sql1=$conn->query("select * from shangpin where ownerid='".$usid."'" );
		   while($info1=$sql1->fetch_array(MYSQLI_BOTH))
		    {
	  ?>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><div align="center">
          <input type="checkbox" name="<?php echo $info1['id'];?>" value=<?php echo $info1['id'];?>>
        </div></td>
      <td height="25" bgcolor="#FFFFFF">
          
          <div align="center"><?php echo $info1['name'];?></div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['price'];?></div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['addtime'];?></div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center"><a href="changegoods.php?id=<?php echo $info1['id'];?>">修改</a></div></td>
    </tr>
    <?php
	    }
        
      ?>
     <tr>
     <td align="center">
	  <div align="left"><input name="submit" type="submit" class="buttoncss" id="submit" value="删除选择"></div></td>
     </tr>
  </tbody>
</table>

        </tr>
      </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
