<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
$name=$_SESSION['name'];

require_once '../../config.php';
require_once "$language/feedback.php";
$feed_mes=$_SESSION['feed_mes'];
$del_mes=$_SESSION['del_mes'];
$feedback="Feedback";
$start = 0;
$end = 10;
$page=$_GET['page'];
if($page == ""){
		$userDisplay_data="none";
}else{
		$userDisplay_data="block";
}
$count;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- InstanceBegin template="../../../../../Users/ewis/Desktop/CS_Sce_01_03/Templates/LOR.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>eNOSHA - Send Feedback </title>
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
<link rel="stylesheet" type="text/css" href="../styles/reset.css" />

<link rel="stylesheet" type="text/css" href="../../css/simple_search.css" />
<script type="text/javascript" src="../javascript/feedback.js"></script>

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
        <p><a href="../../index.php"><?php echo $home ?></a> <img src="../../images/insert.jpg" alt="link" width="12" height="11" /> <?php echo $feedback ?> </p>
<p align="right"><?php logged_in_user() ?></p>  <!-- method located in lib/action -->
	<div id="helpdiv" style="display:block">
	  <p align="center">
	  <?php echo "<font color="."#000000"."><b>"; echo "$feed_mes"; echo "</font>"?></p>
	 </div>
      <br />
        <form  name="form1" action="feedback_insert.php" method="POST" id="form1" onsubmit="return validateForm();">
		  <table class="ContentArea" width="732" height="270" border="0" cellpadding="5">

    <tr>
      <th   height="34" colspan="5" bordercolor="#6F8ABD" bgcolor="#6f8abd" scope="row"><h2 align="center" class="style5 style10" style="color:#FFFFFF"> <?php echo $send_feedback ?></h2></th>
      </tr>
    <tr>
      <th height="33" valign="top"  scope="row">&nbsp;</th>
      <td colspan="4" valign="top" ><div align="left" class="style9" style="color:#000000">
        <div align="left"><?php echo $comments ?></div>
      </div></td>
    </tr>
    <tr>
      <th width="5" height="33" valign="top"  scope="row"><p>&nbsp;</p>        </th>
      <td colspan="3" align="left" id="change1"><label>
        <textarea name="comment" id="comment" cols="60" rows="10"></textarea>
      </label></td>
      <td width="372" rowspan="2" valign="top"><label>
        <input type="button" name="show_comm" id="show_comm" value="Show My Recent Comments "  onclick="showcomments();"/>
        <br />
 <div id="com" style="display:<?php echo $userDisplay_data; ?>">
        <?php
$log_id; 
$query1="SELECT id FROM user_login WHERE name='$name'";
$result1=mysql_query($query1)or die("Unable to select data".mysql_error());
if(mysql_num_rows($result1)>0){
	while($row1=mysql_fetch_row($result1)){
	$log_id=$row1[0];
	}
}

// for count ,available records
		$sql_count ="SELECT date,comment,id FROM feedback WHERE log_id='$log_id' ORDER BY date DESC";
		$result1_count=mysql_query($sql_count)or die("ERROR selections:".mysql_error());
		if(mysql_num_rows($result1_count)>0){
			while($row_count = mysql_fetch_row($result1_count)){
				$count++;
			}
		}
		// get number of pages to display results
		$pages=$count/10;
		$original_pages =ceil($pages);
		
		//set start and end values for the LIMIT
		if($page > 1){
			$x = $page -1;
			$start = $x*10;
		}

$query2="SELECT date,comment,id FROM feedback WHERE log_id='$log_id' ORDER BY date DESC LIMIT $start , $end";
$result2=mysql_query($query2)or die("Unable to select data".mysql_error());
if(mysql_num_rows($result2)>0){
	echo "<table cellpadding=5 border=1 align=left width=400px> "; 
		echo "<tr bgcolor=#6f8abd align=left>";
			echo "<td>Date</td>";
			echo "<td>Comment</td>";
			echo "<td>Delete</td>";
    	echo "</tr>";
	while($row2=mysql_fetch_row($result2)){
		echo "<tr>";
			echo "<td>".$row2[0]."</td>";
			echo "<td>".$row2[1]."</td>";
			echo"<td align=center>"."<a href=\"feedback_insert.php?id=".$row2[2]."\">".$delete."</a>"."</td>";
			echo "</tr>";
	}
		if($original_pages>1){
		echo "<tr>";
			echo "<td align=center colspan=3>";
				
					if($page>1){
						echo "<a href=\"feedback.php?page=".($page-1)."\">Previous</a>&nbsp";
					}
					for($x=1; $x<$original_pages+1; $x++){
						echo "<a href=\"feedback.php?page=".$x."\">".$x."</a>&nbsp";
					}
					if($page<$original_pages){
						if($page == 0){
							$i=1;
							echo "<a href=\"feedback.php?page=".($i+1)."\">Next</a>&nbsp";
						}else{
							echo "<a href=\"feedback.php?page=".($page+1)."\">Next</a>&nbsp";
						}
					}
			
			echo "</td>";
		echo "</tr>"; 
			}
	echo "</table>";
}
  ?>
  </div>
  <p>
        <div id="deldiv" style="display:block">
          <p align="left"><?php echo "<font color="."#0000CC"."><b>"; echo "$del_mes"; echo "</font>"?></p>
	 </div><br />
      </label></td>
    </tr>
    <tr>
      <th height="160" valign="top" scope="row"><p align="center">&nbsp;</th>
      <th width="97" height="160" valign="top" scope="row"><input type="submit" id="sub1"  name="sub1" value="Send Feedback" /></th>
      <th width="44" valign="top" scope="row"><input type="reset" name="Submit2" value="Clear" /></th>
      <th width="150" valign="top" scope="row"><img src="../../images/feedback.png" /></th>
      </tr>
  </table>         
        </form>
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

<?php
unset($_SESSION['feed_mes']);
unset($_SESSION['del_mes']);
?>