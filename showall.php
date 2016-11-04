<?php
 include("top.php");
?>
<table width="766" height="438" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="209"  height="438" valign="top" bgcolor="#F0F0F0"><?php include("left_menu.php");?></td>
    <td width="557" align="center" valign="top" bgcolor="#FFFFFF">      <table width="557" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="557" height="20" background="images/gg.gif">&nbsp;</td>
        </tr>
      </table>
      <?php
	   $sql=$conn->query("select count(*) as total from shangpin");
	   $info=$sql->fetch_array(MYSQLI_BOTH);
	   $total=$info['total'];
	   if(!$total)
	   {
	     echo "本站暂无商品!";
	   }
	   else
	   {
	   ?>
      <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
        <?php
 
    
	       $pagesize=10;
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
			 
             $sql1=$conn->query("select * from shangpin order by rand() desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=$sql1->fetch_array(MYSQLI_BOTH))
		     {
				 if($info1['image'])
				 	$imgpath=$info1['image'];
				 else
				 	$imgpath="./upimages/0.jpg";
				$sqlowner=$conn->query("select * from user where id='".$info1['ownerid']."'");
				$infoowner=$sqlowner->fetch_array(MYSQLI_BOTH);
		  ?>
 
  
        <tr>
          <td height="95" ><div align="center"><img src="<?php echo $imgpath;?>" height="90" /></div></td>
          <td height="95"width="124"><font color="FF6501"><img src="images/circle.gif" width="10" height="10">&nbsp;<?php echo $info1['name'];?></font></td>
          <td height="95">
          <div align="center">
          <table>
          <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">主人：</font><font color="FF6501"><?php echo $infoowner['nc'];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">价格：</font><font color="FF6501"><?php echo $info1['price'];?></font></td>
                              </tr>
                              <tr>
                                <td height="16">&nbsp;</td>
                                <td><font color="#000000">上架时间：</font><font color="FF6501"><?php echo $info1['addtime'];?></font></td>
          </tr>
          </table>
          </div></td>
          <td height="95"><div align="center">
          <table>
          <tr>
                                <td height="30" colspan="2"><a href="lookinfo.php?id=<?php echo $info1['id'];?>"><img src="images/b3.gif" width="40" height="15" border="0"></a>                                 </td>
          </tr>
          <tr>
                                <td height="30" colspan="2"><a href="addgouwuche.php?id=<?php echo $info1['id'];?>"><img src="images/b1.gif" width="40" height="15" border="0"></a>                                 </td>
          </tr>
          </table>
          
          </div></td>
        </tr>
        <tr>
        	<td height="10"></td>
        </tr>
            
        <?php
	    }
		?>
        <tr>
          <td height="20" colspan="3"> &nbsp;
              <div align="right">本站共有商品&nbsp;
                  <?php
		   echo $total;
		  ?>
&nbsp;件&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;件&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="showall.php?page=1" title="首页"><font face="webdings"> 首页 </font></a> <a href="showall.php?id=<?php echo $id;?>&amp;page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="showall.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="showall.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="showall.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 后一页 </font></a> <a href="showall.php?id=<?php echo $id;?>&amp;page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> 尾页 </font></a>
        <?php }?>
            </div></td>
        </tr>
      </table>
    <?php
	    }
		
		?></td>
  </tr>
</table>
<?php
 include("bottom.php");
?>