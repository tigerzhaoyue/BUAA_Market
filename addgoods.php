<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
 session_start();
 if(!isset($_SESSION['username']))
 {
   echo "<script>alert('您还没有登录,请先登录!');history.back();</script>";
   exit;
  }
?>
<?php
 include("top.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209" height="438" valign="top" bgcolor="#F0F0F0"><?php
include("left_menu.php");?></td>
    <td width="537" align="center" valign="top" bgcolor="#FFFFFF"><table width="500" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
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
          <td height="20" bgcolor="#F0F0F0"><div align="center" style="color: #660206">填写商品信息</div></td>
        </tr>
        <tr>
          <td height="160" bgcolor="#FFEDBF"><table width="500" height="160" border="0" align="center" cellpadding="0" cellspacing="0">


	<script language="javascript">
	function chkinput1(form)
	{
	  if(form.cargoname.value=="")
	   {
	     alert("请输入商品名称!");
		 form.cargoname.select();
		 return(false);
	   }
	  
	
	
	  if(form.price.value=="")
	   {
	     alert("请输入商品价格!");
		 form.price.select();
		 return(false);
	   }
	 

	   if(form.jianjie.value=="")
	   {
	     alert("有简介才会有人买哦!");
		 form.jianjie.select();
		 return(false);
	   }
	
	
	   return(true);
	}
    </script>













              <form name="form1" enctype="multipart/form-data" method="post" action="savenewgoods.php" onsubmit="return chkinput1(this)">
                <?php
		   $usnm=$_SESSION['username'];
		   $sql=$conn->query("SELECT * FROM user WHERE name='$usnm'");
		   $info=$sql->fetch_array(MYSQLI_BOTH);
		  
		  ?>
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">商品名称：</div><input type="hidden" name="usid"  value="<?php echo $info['id'];?>"></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="cargoname" size="25" class="inputcss" >
                  </div></td>
                </tr>
                
                
                
                 <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">价格/元：</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="left">
                      <input type="text" name="price" size="25" class="inputcss" >
                  </div></td>
                </tr>
                
                
                
                
                 <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">商品类别：</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="left">
                     <?php
			$sql=$conn->query("select * from type order by id desc");
			$info=$sql->fetch_array(MYSQLI_BOTH);
			if(!$info)
			{
			  echo "请先添加商品类型!";
			}
			else
			{
			?>
            <select name="typeid" class="inputcss">
			<?php
			do
			{
			?>
              <option value=<?php echo $info['id'];?>><?php echo $info['typename'];?></option>
			<?php
			}
			while($info=$sql->fetch_array(MYSQLI_BOTH));
			?>  
            </select>
            <?php
		     }
		    ?>
        </div></td>
                </tr>
                
                
                
                
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">商品简介：</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="left">
                     <textarea name="jianjie" cols="45" rows="8" class="inputcss"></textarea>
        		  </div></td>
                </tr>
                
                
                
                
                
                
                
                <tr>
                  <td height="25" bgcolor="#FFFFFF"><div align="center">上传图片：</div></td>
                  <td height="25" bgcolor="#FFFFFF"><div align="left">
                      <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                      <input type="file" name="upfile" class="inputcss" size="30"></div></td>
                </tr>
                
                
                
                <tr>
                  <td height="20" colspan="2" bgcolor="#FFFFFF"><div align="center">
                      <input name="submit2" type="submit" class="buttoncss" value="确定">
&nbsp;&nbsp;
                <input name="reset" type="reset" class="buttoncss" value="重填">
                  </div></td>
                </tr>
              </form>
          </table></td>
        </tr>
      </table>
      <table width="500" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><div align="center" style="color: #0000FF"><br><br><br></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>
