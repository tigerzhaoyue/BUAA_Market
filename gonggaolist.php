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
	   $sql=$conn->query("select count(*) as total from gonggao");
	   $info=$sql->fetch_array(MYSQLI_BOTH);
	   $total=$info['total'];
	   if(!$total)
	   {
	     echo "本站暂无公告!";
	   }
	   else
	   {
	   ?>
      <table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#EEEEEE">
          <td width="296" height="20"><div align="center">公告主题</div></td>
          <td width="136"><div align="center">发布时间</div></td>
          <td width="68"><div align="center">查看内容</div></td>
        </tr>
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
			 
             $sql1=$conn->query("select * from gonggao order by id desc limit ".($page-1)*$pagesize.",$pagesize ");
             while($info1=$sql1->fetch_array(MYSQLI_BOTH))
		     {
		  ?>
 
  
        <tr>
          <td height="20"><div align="left"><img src="images/circle.gif" width="11" height="12" /><?php echo $info1['title'];?></div></td>
          <td height="20"><div align="center"><?php echo $info1['time'];?></div></td>
          <td height="20"><div align="center"><a href="gonggao.php?id=<?php echo $info1['id'];?>">查看</a></div></td>
        </tr>
            
        <?php
	    }
		?>
        <tr>
          <td height="20" colspan="3"> &nbsp;
              <div align="right">本站共有公告&nbsp;
                  <?php
		   echo $total;
		  ?>
&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="gonggaolist.php?page=1" title="首页"><font face="webdings"> 首页 </font></a> <a href="gonggaolist.php?id=<?php echo $id;?>&amp;page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="gonggaolist.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="gonggaolist.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="gonggaolist.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 后一页 </font></a> <a href="gonggaolist.php?id=<?php echo $id;?>&amp;page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> 尾页 </font></a>
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