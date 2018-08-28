<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
$user_exists=$_SESSION['user_exists'];

require_once '../../config.php';
require_once "$language/forgot_password.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/LOR.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>eNOSHA - Forgotten Password </title>
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
    </ul><!-- InstanceEndEditable -->
  </div>
  <!-- /header -->
  <div id="con">
    <div id="inner">
      <div class="left floatl3"><!-- InstanceBeginEditable name="EditRegion8" -->
       <p>
  <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
  
       </p>
        <p><a href="../../index.php"><?php echo $home ?></a> <img src="../../images/insert.jpg" alt="link" width="12" height="11" /> <?php echo $forgot_pass ?> </p>
<p align="right"></p>  <!-- method located in lib/action -->
<br />
        <form  name="form1" action="forgot_password_action.php" method="POST" onsubmit="return validateForm ();" >
        <table>
        <tr><td><?php echo $email ?> 
        </td>
        <td>
         <input type="text" name="forgot_pass_email" id="forgot_pass_email"  style='width: 20em;'/><input type="submit" value="<?php echo $send_new_pass ?>" name="email_submit" id="email_submit" />
        </td>
        </tr>
       
        </table> <br /><br /><?php if(isset($_SESSION['user_exists'])) echo "<b>".$user_exists."</b>"; ?>
			</form>
 
  


  
  
							
	
  <!-- InstanceEndEditable -->
      </div>
      <div class="right folat-r"></div>
    </div>
  </div>
  <!-- /content -->

  <div id="footer"><div align="center">
   
    <p id="copyright"> eNOSHA  is Free Software released under the GNU/GPL License.<br/>
    </p>
  </div></div>

  <!-- /footer -->
</div>
</body>
<!-- InstanceEnd --></html>

<?php
unset($_SESSION['user_exists']);
?>