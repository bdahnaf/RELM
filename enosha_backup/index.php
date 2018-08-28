<?php
@session_start();
require_once 'config.php';   //connect to the database
require_once 'lib/statistics/login_statistics.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/LOR_LOGIN.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>e-NOSHA</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
body, td, th {
	color: #000033;
}
.style3 {
	color: #000033
}
.style11 {
	color: #8A0000;
	font-size: small;
}

}
-->
</style>
<script language="javascript">
//==========================================User registration Confirmation message ===============================
//close the div in 5 seconds
window.setTimeout("closeHelpDiv();", 20000);

function closeHelpDiv(){
document.getElementById("helpdiv").style.display=" none";
}
</script>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style3 {color: #000033}
-->
</style>
</head>
<body>
<div id="wrap">
  <div id="header"><!-- InstanceBeginEditable name="ul" -->
    <ul id="nav">
      <?php 
	  
  print_navbar();
	   
	   ?>
      <div id="helpdiv" style="display:block">
        <p align="center"> <?php echo "<br><font color="."#FFFFFF"."><b>"; echo $_SESSION['reg_msg']; echo "</b></font>"?></p>
      </div>
    </ul>
    <!-- InstanceEndEditable -->
  </div>
  <!-- /header -->
  <div id="content">
    <div id="inner">
      <div class="left float-l"><!-- InstanceBeginEditable name="EditRegion8" -->
        <h2>Welcome to eNOSHA </h2>
        <p align="justify" class="style3"><font style="font-weight:bold">eNOSHA</font> stands for <font style="font-weight:bold">e</font>Learning <font style="font-weight:bold">N</font>eutral <font style="font-weight:bold">O</font>bject <font style="font-weight:bold">S</font>torage 
          with a <font style="font-weight:bold">H</font>olistic <font style="font-weight:bold">A</font>pproach.</p>
        <p align="justify" class="style3">&nbsp;</p>
        <p align="justify" class="style3"><?php echo $index_body ?></p>
        <p align="center" class="style3"><img src="images/enosha.png" alt="enosha" width="400" height="224" /></p>
        <!-- InstanceEndEditable -->
      </div>
      <div class="right folat-r">
        <div id="side">
		 <div id="bm"><!-- InstanceBeginEditable name="EditRegion9" -->
            
            <form name="login" action="lib/login/session.php" method="post" >
              <?php

					   if(($_SESSION['type_name']!=null)){
					   
					   $name=$_SESSION['name'];
					   ?>
              <font color="#FFFFFF">
              <?php
 
			   echo $welcome_msg ."<a href='".$weburl."/lib/admin/users/edit_user.php?id=".$_SESSION['id']."'>".$name."</a>";
			   
			   }else{  ?>
						  <h2><?php echo $login ?></h2>
	<?php
   
	echo"<table border=0>";
	echo "<tr>";
    echo"<td>".$username."</td>";
    echo"<td><input type='text'  name='uname'></td>";
    echo "</tr>";
  
    echo "<tr>";
    echo"<td>".$password."</td>";
    echo"<td><input type='password'  name='pwd'></td>";
    echo "</tr>";
  
    echo "<tr>"; 
    echo "<th colspan='2' scope='row' ><span class='style11'>".$_SESSION['msg']."</span></th>";
    echo "</tr>";
  
    echo "<tr>"; 
    echo "<td><input type='submit' name='login' value='Login' /> </td>";
    echo "</tr>";
    echo"</table>";  
    echo "<br>";
    echo"<table width=200 border=0><tr><td><font color='white'>";
    echo $dont_have_an_account."&nbsp";
    echo "<a href=".$weburl."/lib/register/register.php><font color='white'><b>$register</b></font></a>";
    echo"</td></tr><tr><td><a href=".$weburl."/lib/forgot_password/forgot_password.php><font color='white'>".$forgotten_pass."?</font></a></td></tr></table>";   
    echo "<br>";
	}
unset($_SESSION['msg']);
unset($_SESSION['reg_msg']);
			   ?>
            </form>
            <!-- InstanceEndEditable -->
		   
          </div>
          <div id="top">
            <p>&nbsp;</p>
            <p><b>Team Members</b></p>
            <p>&nbsp;</p>
            <p>Isuru Balasooriya</p>
            <p>Enosha Hettiarachchi</p>
            <p>Mathias Hatakka</p>
            <p>Peter Mozelius</p>
            <p>Dr. K.P. Hewagamage</p>
            <p>Dr. D.D. Karunarathne</p>
            <p>&nbsp;</p>
            <p><b>Acknowledgements</b></p>
            <p>Thilini Chathurika </p>
            <p>Sirani Hewage</p>
            
            </ul>
            <p><img src="images/logos.png" width="170" /></p>
           
            <!-- InstanceBeginEditable name="EditRegion6" -->
            <?php
			  if(($_SESSION['type_name']!=null)){
					echo "<font color=black><br /><br />";
					//show_current_logged_in_users();
					echo "</font>";
			 }else{}
			?>
			<!-- InstanceEndEditable --></div>
        </div>
      </div>
    </div>
  </div>
  <!-- /content -->
  <div id="footer"><div align="center">
    
    <p id="copyright"> eNOSHA  is Free Software released under the GNU/GPL License.</p>
  </div></div>
  <!-- /footer -->
</div>
</body>
<!-- InstanceEnd --></html>
