<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>订单管理</title>
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
       $sql=$conn->query("SELECT count(*) AS total FROM dingdan ");
	   $info=$sql->fetch_array(MYSQLI_BOTH);
	   $total=$info['total'];
	   if(!$total)
	   {
	     echo "本站暂无订单!";
	   }
	   else
	   {
	      
?>


<form name="form1" method="post" action="deleteuser.php">
<p>&nbsp;</p>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <td height="20" bgcolor="#0099FF"><div align="center" class="style1">订单管理</div></td>
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
			 
             $sql1=$conn->query("SELECT * FROM dingdan  ORDER BY id desc limit ".($page-1)*$pagesize.",$pagesize ");
            
	   
	   ?>
	   <tr>
          <td width="224" height="20" bgcolor="#FFFFFF"><div align="center">订单号</div></td>
          <td width="93" bgcolor="#FFFFFF"><div align="center">买家用户ID</div></td>
          <td width="93" bgcolor="#FFFFFF"><div align="center">卖家用户ID</div></td>
          <td width="120" bgcolor="#FFFFFF"><div align="center">下单时间</div></td>
          <td width="93" bgcolor="#FFFFFF"><div align="center">订单状态</div></td>
 
        </tr>
       <?php
	      while($info1=$sql1->fetch_array(MYSQLI_BOTH))
		     {
	   ?>
	   <tr>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['dingdanhao'];?></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['xiadanid'];?></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['ownerid'];?></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['time'];?></div></td>
          <td height="20" bgcolor="#FFFFFF"><div align="center"><?php echo $info1['zt'];?></div></td>
          
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
	&nbsp;总订单&nbsp;<?php
		   echo $total;
		  ?>&nbsp;单&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;单&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="finddd.php?page=1" title="首页"><font face="webdings"> 首页 </font></a> 
		<a href="finddd.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="finddd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="finddd.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="finddd.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 后一页</font></a> 
		<a href="finddd.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> 尾页</font></a>
        <?php }?>
	
	</div></td>
  </tr>

</table>

<?php
   }
?>
</form>
</body>
</html>
