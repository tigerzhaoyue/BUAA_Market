<link href="css/font.css" rel="stylesheet">
<?php
	if(!isset($_SESSION))
		session_start();
	include("conn/conn.php");
?>
<table width="209" border="0" bgcolor="#F0F0F0">
  <tbody>
    <tr>
      <td><table width="100%" border="0">
        <tbody>
          <tr>
            <td><img src="images/carttop.jpg" width="209" height="46" alt=""/></td>
          </tr>
          <tr>
            
            
            
            
            
            
            
            
        <td>
            
         
         
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
     &nbsp;&nbsp;<?php
	  if(isset($_SESSION['username'])){
		  $usname=$_SESSION['username'];
		  $usnc=$_SESSION['usernc'];
	    echo "用户：".$usnc."，欢迎您！";
		}
		else 
		{echo "游客，欢迎您！<br>&nbsp;&nbsp;请先登录，后购物~";}
	?>
              </font></td>
            </tr>
            <tr>
              <td>         
 <table width="209" border="0" align="center" cellpadding="0" cellspacing="0">
 <form action="gouwuche.php" method="post" name="form1" id="form1">
                  <tr>
                    <td>
					<?php
			  $_SESSION['total']="";
			  $qk=0;
			  if(isset($_GET['qk'])&&$_GET['qk']=="yes"){
			     $_SESSION['producelist']="";
				 $_SESSION['quatity']=""; 
			  }
			  if(!isset($_SESSION['producelist']))
			  		$_SESSION['producelist']="";
			   $arraygwc=explode("@",$_SESSION['producelist']);
			   $s=0;
			   for($i=0;$i<count($arraygwc);$i++){
			       $s+=intval($arraygwc[$i]);
			   }
			  if($s==0 ){
				   echo "<tr>";
                   echo" &nbsp;&nbsp;您的购物车为空!";
                   echo"</tr>";
				}
			  else{ 
			?>
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
				   $_SESSION["total"]=$total;
			?>
&nbsp;
                      <?php
			      }
				 }
			 ?>
购物车总计：<?php echo $total;?>元 
             <br>
             &nbsp;&nbsp;<a href="gouwuche.php">查看详细</a> <a href="gouwuche.php?qk=yes">清空购物车</a> 
                      <?php
			 }
			?>
            <?php
	if(isset($_SESSION['username'])){
	    echo "&nbsp;&nbsp;<a href='logout.php'>注销账户</a>";
	  }
	?></br>
            </td>
                  </tr>
                </form>
              </table></td>
            </tr>
          </table>
          
             
            
            
</td>
              
              
              
              
              
              
              
            
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>
      <script language="javascript" type="text/javascript">
							 function chkuserinput(form){
							   if(form.username.value==""){
								  alert("Please input your username!");
								  form.username.select();
								  return(false);
								}		
								if(form.userpwd.value==""){
								  alert("Please input your password!");
								  form.userpwd.select();
								  return(false);
								}	
								if(form.yz.value==""){
								  alert("Please input identifying code!");
								  form.yz.select();
								  return(false);
								}	
							   return(true);				 
							 }
						  </script>
        <script language="javascript" type="text/javascript">
						    function openfindpwd(){
							window.open("openfindpwd.php","newframe","left=500,top=200,width=600,height=400,menubar=no,toolbar=no,location=no,scrollbars=no,location=no");
							   }
						</script>
      <form name="form2" method="post" action="chkuser.php" onSubmit="return chkuserinput(this)">
        <table width="100%" border="0" align="center">
          <tbody>
            <tr>
              <td colspan="2"><img src="images/user.gif" width="209" height="46" alt=""/></td>
              </tr>
            <tr>
              <td width="17">用户：</td>
              <td width="80"><input name="username" type="text" id="username" size="17"></td>
            </tr>
            <tr>
              <td>密码：</td>
              <td><label for="userpwd"></label>
                <input name="userpwd" type="password" id="userpwd" size="17"></td>
            </tr>
            <tr>
              <td>验证：</td>
              <td><label for="yz"></label>
                <input name="yz" type="text" id="yz" size="10">
			  <?php
			  $num=intval(mt_rand(1000,9999));
			  for($i=0;$i<4;$i++){
				  echo "<img src=images/code/".substr(strval($num),$i,1).".gif>";
			  }
              ?>
			  </td>
            </tr>
            <tr>
              <td colspan="2">
			  </td>
              </tr>
            <tr>
              <td><input type="hidden" value="<?php echo $num;?>" name="num" />
                  <input name="submit" type="submit" id="submit" value="登陆">
              </td>
              <td align="center"> <a href="agreereg.php">注册</a>&nbsp;<a href="javascript:openfindpwd()">找回密码</a>&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" align="center">
        <tbody>
          <tr>
            <td><img src="images/search.gif" width="209" height="46" alt=""/></td>
          </tr>
          <tr>
            <td><form action="searchorder.php" method="post" name="form" id="form2">
              <label for="name"></label>
              <input name="name" type="text" id="name" size="17" style="backgroud-color:#fff " 
              onMouseOver="this.style.backgroundColor='#ffffff'" onMouseOut="this.style.backgroundColor='#e8f4ff'">
              <input type="submit" name="submit2" id="submit2" value="搜索">
            </form></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>
