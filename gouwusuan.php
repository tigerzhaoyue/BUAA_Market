<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#F4F4F4"><div align="center">
      <?php include("left_menu.php");?>
      </div></td>
    <td width="557" align="center" valign="top" bgcolor="#FFFFFF">       <script language="javascript">
		   function chkinput(form){
			   if(form.name.value==""){
				  alert("请输入收货人姓名!");
				  form.name.select();
				  return(false);
				}
				if(form.dz.value==""){
				  alert("请输入收货人地址!");
				  form.dz.select();
				  return(false);
				}
				if(form.yb.value==""){
				  alert("请输入收货人邮编!");
				  form.yb.select();
				  return(false);
				}
				if(form.tel.value==""){
				  alert("请输入收货人联系电话!");
				  form.tel.select();
				  return(false);
				}
				if(form.email.value==""){
				  alert("请输入收货人E-mail地址!");
				  form.email.select();
				  return(false);
				
				}
				if(form.email.value.indexOf("@")<0){
				    alert("收货人E-mail地址格式输入错误!");
				    form.email.select();
				    return(false);
				 }
				return(true);
			 }
		 </script>
      <table width="557" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="6"></td>
        </tr>
      </table>
      <table width="530" border="0" align="center" cellpadding="1" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#EEEEEE">
      <tr>
        <td height="25" bgcolor="#EEEEEE"><div align="center" style="color: #720206">收货人信息</div></td>
      </tr>
      <tr>
        <td height="295"><table width="530" height="293" border="0" align="center" cellpadding="0" cellspacing="0">

            <form name="form1" method="post" action="savedd.php" onSubmit="return chkinput(this)">
              <tr>
                <td width="100" height="25" bgcolor="#FFFFFF"><div align="center">收货姓名：</div></td>
                <td width="183" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="name2" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
                <td width="86" bgcolor="#FFFFFF"><div align="center">称呼：</div></td>
                <td width="176" bgcolor="#FFFFFF"><div align="left">
                    <select name="sex">
                      <option selected value="先生">先生</option>
                      <option value="女士">女士</option>
                    </select>
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">邮政编码：</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="yb" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">联系电话：</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="tel" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">电子邮箱：</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input type="text" name="email" size="25" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">详细地址：</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <input name="dz" type="text" class="inputcss" id="dz" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'" size="50">
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">送货方式：</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <select name="shff" id="shff">
                      <option selected value="普通平邮">普通平邮</option>
                      <option value="EMS">EMS</option>
                      <option value="中通快递">中通快递</option>
                      <option value="圆通快递">圆通快递</option>
                      <option value="申通快递">申通快递</option>
                      <option value="顺丰快递">顺丰快递</option>
                      <option value="卖家送货">卖家送货</option>
                      <option value="个人自提">个人自提</option>
                      <option value="E-mail">E-mail（虚拟物品）</option>
                    </select>
                </div></td>
              </tr>
              <tr>
                <td height="25" bgcolor="#FFFFFF"><div align="center">支付方式：</div></td>
                <td height="25" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <select name="zfff" id="zfff">
                      <option value="银行汇款">银行汇款</option>
                      <option value="银行汇款">银行汇款</option>
                      <option value="邮局汇款">邮局汇款</option>
                      <option value="支付宝">支付宝</option>
                      <option value="微信支付">微信支付</option>
                      <option value="财付通支付">财付通支付</option>
                    </select>
                  转到：<a href="https://mybank.icbc.com.cn/icbc/perbank/index.jsp">支付页面</a> </div></td>
              </tr>
              <tr>
                <td height="86" bgcolor="#FFFFFF"><div align="center">简单备注：</div></td>
                <td height="86" colspan="3" bgcolor="#FFFFFF"><div align="left">
                    <textarea name="ly" cols="70" rows="5" class="inputcss" style="background-color:#e8f4ff " onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'"></textarea>
                </div></td>
              </tr>
              <tr>
                <td height="22" colspan="4" bgcolor="#FFFFFF"><div align="center">
                    <input name="submit2" type="submit" class="buttoncss" value="提交订单">
                </div></td>
              </tr>
            </form>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
 if(isset($_GET['dingdanhao']))
  {  $dd=$_GET['dingdanhao'];
	 if(!isset($_SESSION))
		session_start();
     $array=explode("@",$_SESSION['producelist']);
	 $sum=count($array)*20+260;
    echo" <script language='javascript'>";
	echo" window.open('showdd.php?dd='+'".$dd."','newframe','top=150,left=200,width=600,height=".$sum.",menubar=no,toolbar=no,location=no,scrollbars=no,status=no ')";
	echo "</script>";

  }
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
