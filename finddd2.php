<?php
if(!isset($_SESSION))
 session_start();
 if(!isset($_SESSION['username'])){
    echo "<script>alert('请先登录，后查看订单!');history.back();</script>";
  exit;
  }
?>

<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#F0F0F0"><div align="center">
      <?php include("left_menu.php");?>
    </div></td>
    <td width="561" align="center" valign="top" bgcolor="#FFFFFF">
      <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
          <td height="20" bgcolor="#EEEEEE"><div align="center" style="color: #990000">我的出售</div></td>
        </tr>    

        <tr>
          <table width="500" border="0"><form name="form1" method="post" action="deletefxhw.php">
  <tbody>
     <tr>
      <td height="25" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center">下单时间</div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center">其他操作</div></td>
    </tr>
    <?php
			$usname=$_SESSION['username'];
		   $sqll=$conn->query("select * from user where name='".$usname."'");
		   $usinfo=$sqll->fetch_array(MYSQLI_BOTH);
		   $usid=$usinfo['id'];
           $sql1=$conn->query("select * from dingdan where ownerid='".$usid."'" );
		   while($info1=$sql1->fetch_array(MYSQLI_BOTH))
		    {
	  ?>
    <tr>
      <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['dingdanhao'];?></div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['time'];?></div></td>
      <td height="25" bgcolor="#FFFFFF"><div align="center"><a href="showdd2.php?dd=<?php echo $info1['dingdanhao'];?>">查看</a></div></td>
    </tr>
    <?php  }?>
  </tbody>
          </table>
        </tr>

        




       
      </table>
      </td>
  </tr>
</table>
<?php
 include("bottom.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
