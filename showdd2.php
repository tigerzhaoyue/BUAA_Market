<?php
if(!isset($_SESSION))
	session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>商品订单</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style5 {
	color: #000000;
	font-weight: bold;
}
.style6 {color: #000000}
.style7 {color: #990000}
-->
</style>
</head>
<?php
  include("conn/conn.php");
  $dingdanhao=$_GET['dd'];
  $sql=$conn->query("select * from dingdan where dingdanhao='".$dingdanhao."'");
  $info=$sql->fetch_array(MYSQLI_BOTH);
  $spc=$info['spc'];
  $arraysp=explode("@",$spc);
?>
<body topmargin="0" leftmargin="0" bottommargin="0" class="scrollbar">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="306" bgcolor="#FFFFFF"><table width="600"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="20" bgcolor="#F0F0F0"><div align="center" class="style7">您好，<?php echo $_SESSION['username'];?>，此订单详细信息如下:</div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="left"><span class="style5">&nbsp;订单号：</span><?php echo $dingdanhao;?></div></td>
      </tr>
      <tr>
        <td height="20" bgcolor="#FFFFFF"><div align="left" class="style5">&nbsp;商品列表(如下)：</div></td>
      </tr>
    </table>
      <table width="500" height="60" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#666666"><table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
              <tr bgcolor="#F0F0F0">
                <td width="153" height="20"><div align="center" class="style7">商品名称</div></td>
                <td width="80"><div align="center" class="style7">价格</div></td>
              </tr>
              <?php
	  $total=0;
	  for($i=0;$i<count($arraysp)-1;$i++){
		 if($arraysp[$i]!=""){
	     $sql1=$conn->query("select * from shangpin where id='".$arraysp[$i]."'");
	     $info1=$sql1->fetch_array(MYSQLI_BOTH);
		 $total+=$info1['price'];
	  ?>
              <tr bgcolor="#FFFFFF">
                <td height="20"><div align="center"><?php echo $info1['name'];?></div></td>
                <td height="20"><div align="center"><?php echo $info1['price'];?></div></td>
              </tr>
              <?php
	   }
	   }
	 ?>
              <tr bgcolor="#FFFFFF">
                <td height="20" colspan="5">
                  <div align="right"><span class="style5">总计费用:</span><?php echo $total;?> </div></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#FFFFFF">
          <td width="81" height="20" align="center"><div align="left" class="style6">&nbsp;下单账户：</div></td>
          <td colspan="3"><div align="left"><?php echo $_SESSION['username'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;收货人：</div></td>
          <td height="20" colspan="3"><div align="left"><?php echo $info['shouhuoren'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;收货人地址：</div></td>
          <td height="20" colspan="3"><div align="left"><?php echo $info['dizhi'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;邮&nbsp;&nbsp;编：</div></td>
          <td width="145" height="20"><div align="left"><?php echo $info['youbian'];?></div></td>
          <td width="66"><div align="left" class="style6">&nbsp;电&nbsp;&nbsp;话：</div></td>
          <td width="158"><div align="left"><?php echo $info['tel'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;E-mail:</div></td>
          <td height="20"><div align="left"><?php echo $info['email'];?></div></td>
          <td height="20">&nbsp;</td>
          <td height="20">&nbsp;</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" align="center"><div align="left" class="style6">&nbsp;送货方式：</div></td>
          <td height="20"><div align="left"><?php echo $info['shff'];?></div></td>
          <td height="20"><div align="left" class="style6">&nbsp;支付方式：</div></td>
          <td height="20"><div align="left"><?php echo $info['zfff'];?></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20" colspan="4"><div align="left" class="style6">&nbsp;请您按支付方式付款，卖家发货后网站会将钱转给卖家</div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="20">&nbsp;</td>
          <td height="20"><div align="center">
              <input name="button" type="button" class="buttoncss" onClick="window.close()" value="关闭窗口">
          </div></td>
          <td height="20"><div align="center" class="style6">创建时间：</div></td>
          <td height="20"><div align="left"><?php echo $info['time'];?></div></td>
        </tr>
      </table>
<?php
$_SESSION['producelist']="";
?></td>
  </tr>
</table>
</body>
</html>
