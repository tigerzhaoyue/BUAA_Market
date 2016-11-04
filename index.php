<script src="style/reflex.js"></script>
<table width="766" border="0" align="center">
  <tbody>
  <span id="top" name="top"></span> 
    <tr>
      <td colspan="2"><?php include("top.php");?>&nbsp;</td>
    </tr>
    
    
    
    
    <tr>
     <td width="209" valign="top" bgcolor="#F0F0F0"><?php include("left_menu.php");?>&nbsp;</td>
      
      
      
      
      
      
      
      
      <td width="557" height="438" align="center" valign="top"><table width="548" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
  
  
  
  
  
  
  
  
    <tr>
     <td height="30"  bgcolor="#F0F0F0">　网站公告:</td><td width="200" height="30" bgcolor="#F0F0F0" align="right"><a href="gonggaolist.php" >更多..</a></td>
    </tr>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <tr>
      <td width="557"  height="50"><table width="240"  border="0" align="left" cellpadding="0" cellspacing="0">
          
              <?php
								 $sql=$conn->query("select * from gonggao order by id desc limit 0,7");
								 $info=$sql->fetch_array(MYSQLI_BOTH);
								 $showgonggaonum=0;
								 if(!$info){
				  ?>
              <tr>
                <td height="20" align="center">暂无公告！</td>
              </tr>
              <?php
								 }
								 else{
								   do{
									   $showgonggaonum=$showgonggaonum+1;
				  ?>
              <tr>
                <td height="20"><div align="center">
                  <table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="16" height="5"><div align="center"><img src="images/circle.gif" width="11" height="12" /></div></td>
                      <td height="24"><div align="left"> <a href="gonggao.php?id=<?php echo $info['id'];?>">
                        <?php 
								 echo substr($info['title'],0,30);
								  if(strlen($info['title'])>30){
									echo "...";
								  } 
							   ?>
                      </a></div></td>
                    </tr>
                  </table>
                </div></td>
              </tr>
              <?php
									 }
								   while(($info=$sql->fetch_array(MYSQLI_BOTH))&&($showgonggaonum<10));
								 }
								?>
            </table></td>
    </tr>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <tr>
    <td height="30"  bgcolor="#F0F0F0">　最新上架:</td><td width="200" height="30" bgcolor="#F0F0F0" align="right"><a href="showall.php" >更多..</a></td>
    </tr>
    
    <tr>
    <td height="30" >&nbsp;   </td>

    
    
    
    <tr>
    <td>
    <?php include("slider.php");?>

    </td>
    </tr>
  </tbody>
</table>
&nbsp;</td>
    </tr>
    
    
    
    
    <tr>
      <td colspan="2"><?php include("bottom.php");?>&nbsp;</td>
    </tr>
  </tbody>
</table>
