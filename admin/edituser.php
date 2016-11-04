<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>用户管理</title>
<link rel="stylesheet" type="text/css" href="css/font.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body topmargin="0" leftmargin="0" bottommargin="0">
<?php
       include("conn/conn.php");
       $sql=$conn->query("SELECT count(*) AS total FROM user ");
	   $info=$sql->fetch_array(MYSQLI_BOTH);
	   $total=$info['total'];
	   if(!$total)
	   {
	     echo "本站暂无用户注册!";
	   }
	   else
	   {
	      
?>


<form name="form1" method="post" action="deleteuser.php">
<p>&nbsp;</p>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="20" bgcolor="#0099FF"><div align="center" class="style1">用户管理</div></td>
  </tr>
  <tr>
    <td  bgcolor="#666666"><table width="600" border="0" align="center" cellpadding="0" cellspacing="1">
       <?php
	     $pagesize=20;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			
			}else{
			   $pagecount=$total/$pagesize;
			
			}
			if(!isset($_GET['page'])){
			    $page=1;
			
			}else{
			    $page=intval($_GET['page']);
			
			}
			 
             $sql1=$conn->query("SELECT * FROM user  ORDER BY regtime desc limit ".($page-1)*$pagesize.",$pagesize ");
            
	   
	   ?>
	   <tr>
          <td width="224" height="20" bgcolor="#FFFFFF"><div align="center">用户名</div></td>
          <td width="93" bgcolor="#FFFFFF"><div align="center">用户昵称</div></td>
          <td width="79" bgcolor="#FFFFFF"><div align="center">删除</div></td>
          <td width="75" bgcolor="#FFFFFF"><div align="center">查看详细</div></td>
 
        </tr>
       <?php
	      while($info1=$sql1->fetch_array(MYSQLI_BOTH))
		     {
	   ?>
	   <tr>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['name'];?></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center">
		  <?php
			   echo $info1['nc'];  
		  ?>
		
          </div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center">
          <input type="checkbox" name="<?php echo $info1['id'];?>" value=<?php echo $info1['id'];?>></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><a href="lookuserinfo.php?id=<?php echo $info1['id'];?>"><img src="images/button_select.png" width="14" height="13" border="0"></a></div></td>
          
        </tr>
		<?php
	        }
		    
		?>
    </table></td>
  </tr>
</table>
<table width="600" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="508"><div align="left">
	&nbsp;总用户&nbsp;<?php
		   echo $total;
		  ?>&nbsp;位&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;位&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="edituser.php?page=1" title="首页"><font face="webdings"> 首页 </font></a> 
		<a href="edituser.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="edituser.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="edituser.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="edituser.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 后一页</font></a> 
		<a href="edituser.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> 尾页</font></a>
        <?php }?>
	
	</div></td>
    <td width="92"><div align="center"><input type="submit" value="删除所选" class="buttoncss">
    </div></td>
  </tr>

</table>

<?php
   }
?>
</form>
</body>
</html>
