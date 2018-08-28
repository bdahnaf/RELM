<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
$name=$_SESSION['name'];

require_once '../../config.php';
//check_access($action_id[7]);
require_once "$language/feedback.php";
$del_id=$_GET['del_id'];
$count;
$start = 0;
$end = 5;
$page=$_GET['page'];
$del_mes_feed=$_SESSION['del_mes_feed'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="../../../../../Users/ewis/Desktop/CS_Sce_01_03/Templates/LOR.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>eNOSHA - Feedback </title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="../../css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<style type="text/css" >
.BlueHeader {
    /*width:745px;*/
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-weight: bold;
	color: #ffffff;
	text-align: left;
	margin: 5px 0 0 0;
	padding: 0px;
	font-style: normal;
	text-decoration: none;
	text-indent: 5px;
	vertical-align: middle;
	background-color:#6f8abd;
}
.ContentArea {
   /* width:750px;*/
	padding: 0px;
	border: 1px solid #CCCCCC;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333333;
	background-color: #ffffff;
	margin-bottom:5px;
}
.Layer8{
	width:750px;
    background-color: #ffffff;
}
</style>

</head>
<!-- InstanceBeginEditable name="JS" -->
<link rel="stylesheet" type="text/css" href="../styles/style.css" />
<link rel="stylesheet" type="text/css" href="../../css/simple_search.css" />
<script type="text/javascript" src="../javascript/simple_search.js"></script>

</head>

<!-- InstanceEndEditable -->
<body>
<div id="wrap">
  <div id="header">
  <!-- InstanceBeginEditable name="ul" -->
    <body onload=init()>
      <ul id="nav">
    
         <?php 
	  
  print_navbar();
	   
	   ?>
    </ul><!-- InstanceEndEditable -->  </div>
  <!-- /header -->
  <div id="con">
    <div id="inner">
      <div class="left floatl3"><!-- InstanceBeginEditable name="EditRegion8" -->
       <p>
  <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
       </p>
        <p><a href="../../index.php"><?php echo $home ?></a> <img src="../../images/insert.jpg" alt="link" width="12" height="11" /> <a href="../admin/admin.php"><?php echo $administration ?></a> <img src="../../images/insert.jpg" alt="link" width="12" height="11" /> <?php echo $showfeedback ?> </p>
<p align="right"><?php logged_in_user() ?></p>  <!-- method located in lib/action -->
<br />
<?php

// for count ,available records
		$sql_count ="SELECT u.name,u.email,f.date,f.comment FROM feedback f, user_login u WHERE u.id=f.log_id ORDER BY f.date DESC";
		$result1_count=mysql_query($sql_count)or die("ERROR selections:".mysql_error());
		if(mysql_num_rows($result1_count)>0){
			while($row1 = mysql_fetch_row($result1_count)){
				$count++;
			}
		}
		// get number of pages to display results
		$pages=$count/5;
		$original_pages =ceil($pages);
		
		//set start and end values for the LIMIT
		if($page > 1){
			$x = $page -1;
			$start = $x*5;
		}

$query1 ="SELECT u.name,u.email,f.date,f.comment,f.id FROM feedback f, user_login u WHERE u.id=f.log_id ORDER BY f.date DESC LIMIT $start , $end";
$result1=mysql_query($query1)or die("Unable to select data".mysql_error());
if(mysql_num_rows($result1)>0){
?>
	<table class="ContentArea" width="771" height="127" border="0" cellpadding="5">
	<tr>
      <th   height="33" colspan="5" bordercolor="#6F8ABD" bgcolor="#6f8abd" scope="row"><div align="center"><span class="BlueHeader" style="color:#FFFFFF"> <?php echo $feedback ?></span></div></th>
      </tr>    
    <tr>
      <th width="118"  bordercolor="#6F8ABD" bgcolor="#6f8abd"  height="34"  style="color:#000000" scope="row"><strong><?php echo $name_heading ?></strong></th>
      <th width="153"  bordercolor="#6F8ABD" bgcolor="#6f8abd"  height="34" style="color:#000000" scope="row"><strong><?php echo $email_heading ?></strong></th>
      <th width="93"  bordercolor="#6F8ABD" bgcolor="#6f8abd"  height="34" style="color:#000000" scope="row"><strong><?php echo $date_heading ?></strong></th>
      <th width="355"  bordercolor="#6F8ABD" bgcolor="#6f8abd" height="34" style="color:#000000" scope="row"><strong><?php echo $comment_heading ?></strong></th>
      <th width="177"  bordercolor="#6F8ABD" bgcolor="#6f8abd" style="color:#000000" scope="row"><strong><?php echo $delete ?></strong></th>

    </tr>
    
	<?php    
	while($row1=mysql_fetch_row($result1)){
	?>
		<tr>
      		<th   height="34" scope="row"><?php echo $row1[0];?></th>
      		<th   height="34" scope="row"><?php echo $row1[1];?></th>
      		<th   height="34" scope="row"><?php echo $row1[2];?></th>
            <th   height="34" scope="row"><?php echo $row1[3];?></th>
            <th   height="34" scope="row"><?php echo "<a href=\"feedback_delete.php?del_id=".$row1[4]."\">".$delete."</a>"; ?></th>
    	</tr>
	<?php
	}
	?>
    <tr>
    	<th colspan="4"><div align="center">
        <?php
			if($original_pages>1){
			if($page>1){
				echo "<a href=\"feedback_show.php?page=".($page-1)."\">Previous</a>&nbsp";
			}
			for($x=1; $x<$original_pages+1; $x++){
				echo "<a href=\"feedback_show.php?page=".$x."\">".$x."</a>&nbsp";
			}
			if($page<$original_pages){
				if($page == 0){
					$i=1;
					echo "<a href=\"feedback_show.php?page=".($i+1)."\">Next</a>&nbsp";
				}else{
					echo "<a href=\"feedback_show.php?page=".($page+1)."\">Next</a>&nbsp";
				}
			}
		}
		?>
   	 	</div></th>
    </tr>
	  </table>
 <?php
}else{
	echo"There is no result found";
}
?>

 
			<br />
			<br/>
			
 
  


  
  
							
	
    </table><!-- InstanceEndEditable -->      </div>
      <div class="right folat-r"></div>
    </div>
  </div>
  <!-- /content -->

  <div id="footer"><div align="center">
   
    <p id="copyright">© 2009. All Rights Reserved. <br/>
    </p>
  </div></div>

  <!-- /footer -->
</div>
</body>
<!-- InstanceEnd --></html>

