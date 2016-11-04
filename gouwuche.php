<?php
if(!isset($_SESSION))
 session_start();
 if(!isset($_SESSION['username'])){
    echo "<script>alert('请先登录，后购物!');history.back();</script>";
	exit;
  }
?>
<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="229" height="438" valign="top" bgcolor="#F0F0F0"><?php include("left_menu.php");?></td>
    <td width="561" align="center" valign="top" bgcolor="#FFFFFF"><table width="550" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
    </table>
      <table width="557" border="0" align="center" cellpadding="0" cellspacing="0">
        <form name="form1" method="post" action="gouwuche.php">
          <tr>
            <td height="46" background="images/cart.gif"></td>
          </tr>
          <tr>
            <td  bgcolor="#FFFFFF"><table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
                <?php
			  $_SESSION['total']="";
			  if(isset($_GET['qk'])&&$_GET['qk']=="yes"){
			     $_SESSION['producelist']="";
				 $_SESSION['quatity']=""; 
			  }
			   $arraygwc=explode("@",$_SESSION['producelist']);
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
				   echo "<tr>";
                   echo" <td height='25' colspan='6' bgcolor='#FFFFFF' align='center'>您的购物车为空!</td>";
                   echo"</tr>";
				}
			  else{ 
			?>
                <tr>
                  <td width="125" height="25" bgcolor="#FFFFFF"><div align="center">商品名称</div></td>
                  <td width="64" bgcolor="#FFFFFF"><div align="center">价格</div></td>
                  <td width="71" bgcolor="#FFFFFF"><div align="center">操作</div></td>
                </tr>
                <?php
			    $total=0;
			    $array=explode("@",$_SESSION['producelist']);
				 while(list($name,$value)=each($_POST)){
					  for($i=0;$i<count($array)-1;$i++){
					    if(($array[$i])==$name){
						  $arrayquatity[$i]=$value;  
						}
					}
				}
				
				for($i=0;$i<count($array)-1;$i++){ 
				   $id=$array[$i];
				  
				  if($id!=""){
				   $sql=$conn->query("select * from shangpin where id='".$id."'");
				   $info=$sql->fetch_array(MYSQLI_BOTH);
				   $total1=$info['price'];
				   $total+=$total1;
				   $_SESSION['total']=$total;
			?>
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['name'];?></div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><?php echo $info['price'];?>元</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="center"><a href="removegwc.php?id=<?php echo $info['id']?>">删除</a></div></td>
                </tr>
                <?php
			      }
				 }
			 ?>
                <tr>
                  <td height="25" colspan="8" bgcolor="#FFFFFF"><div align="right">
                      <table width="500" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                        <td width="125"><div align="center"><a href="gouwusuan.php">去结算</a></div></td>
                          <td width="125"><div align="center"><a href="gouwuche.php?qk=yes">清空购物车</a></div></td>
                          <td width="125"><div align="left">总计：<?php echo $total;?>元</div></td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
                <?php
			 }
			?>
            </table></td>
          </tr>
        </form>
    </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>