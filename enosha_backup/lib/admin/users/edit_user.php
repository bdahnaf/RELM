<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
$name=$_SESSION['name'];
$page=$_GET['page'];
$user_id = $_GET['id'];
require_once '../../../config.php';
require_once 'user_uploads.php';
require_once "$language/edit_user.php";
$userDisplay="none";
$titleDisplay="show";
check_access($action_id[1]);

if (isset($_POST['user_search'])){

$userDisplay="block";
$titleDisplay="hide";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/LOR.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>eNOSHA - User Administration Panel</title>
<link rel="stylesheet" type="text/css" href="../../../css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../../css/style.css" />
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="../../../css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../../css/style.css" />
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
<link rel="stylesheet" type="text/css" href="../../../css/edit_user.css" />
<script type="text/javascript" src="../../javascript/edit_user.js"></script>
<!-- InstanceEndEditable -->
<body>
<div id="wrap">
  <div id="header">
  <!-- InstanceBeginEditable name="ul" -->
    <ul id="nav">
      <?php 
	  
 print_navbar();



 //create query
$query_ed="SELECT username, name, email, country, profile_pic FROM user_login WHERE id='".$user_id."'";

//execute the query
$result_ed=mysql_query($query_ed) or die("Eror in quary: $qurey.".mysql_error());

$row_ed=mysql_fetch_row($result_ed);
				
$name=$row_ed[0]; 
$d_name=$row_ed[1];
$e_mail=$row_ed[2];
$country=$row_ed[3];
$profile_pic = $row_ed[4];
	   ?>
    </ul>
    <!-- InstanceEndEditable -->
  </div>
  <!-- /header -->
  <div id="con">
    <div id="inner">
      <div class="left floatl3"><!-- InstanceBeginEditable name="EditRegion8" -->
        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <p><a href="../../../index.php"><?php echo $home ?></a> <img src="../../../images/insert.jpg" alt="link" width="12" height="11" /> <?php echo $edit_user ?></font></p>
        <p align="right">
          <?php logged_in_user(); ?>
        </p>
        <br />
        <!--div style="display: <?php echo $userDisplay; ?>"-->
        <div id="helpdiv" style="display:block">
          <p align="center"> <?php echo "<font color="."#000000"."><b>"; echo $_SESSION[msg]; echo "</font>"?></p>
        </div>
        <div class="ContentArea">
          <table class="ContentArea" cellpadding="5" cellspacing="5">
            <tr  class="BlueHeader">
              <th colspan="2" scope="row"><b><?php echo $edit_details ?></b></th>
            </tr>
          </table>
          <table cellpadding="5" cellspacing="5" >            
              <!--<table width="650" border="0" >"""-->
              
              <tr>
                <td>
                <form action="edit_action.php" method="post" enctype="multipart/form-data" name="form6" id="form6"  onsubmit="return validate_form();">
                <table width="408" border="0" cellpadding="5" cellspacing="5">
                    <tr>
                      <td width="136">Username</td>
                      <td width="256"><label>
                      <input type="hidden" name="user_name" id="user_name" value="<?php echo $name?>" />
                      <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id?>" />
                        <?php echo $name; ?>
                        </label></td>
                    </tr>
                    <tr>
                      <td><?php echo $display_name; ?></td>
                      <td><label>
                        <input type="text" name="display_name" id="display_name" value="<?php echo $d_name?>" />
                        </label></td>
                    </tr>
                    <tr>
                      <td><?php echo $email; ?></td>
                      <td><label>
                        <input type="text" name="email" id="email" value="<?php echo $e_mail?>" />
                        </label></td>
                    </tr>
                    <tr>
                      <td><?php echo $country_lbl; ?></td>
                      <td><label>
                        <input type="text" name="country" id="country" value="<?php echo $country?>" />
                        </label></td>
                    </tr>
                    <tr>
                      <td><?php echo $old_pass; ?></td>
                      <td><label>
                        <input type="password" name="o_password" id="o_password" />
                        </label></td>
                    </tr>
                    <tr>
                      <td><?php echo $new_pass; ?></td>
                      <td><label>
                        <input type="password" name="n_password" id="n_password" />
                        </label></td>
                    </tr>
                    <tr>
                      <td><?php echo $confirm_pass; ?></td>
                      <td><label>
                        <input type="password" name="password_confirm" id="password_confirm" />
                        </label></td>
                    </tr>
                     <tr>
                      <td><?php echo $add_pic; ?></td>
                      <td><label>
                        <input type="file" name="profile_pic1" id="profile_pic1" />
                       </label></td>
                    </tr>
                    
                    <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="add_user" id="add_user" value="Save" />
                        </label></td>
                    </tr>
                  </table>
            </form>
           </td><td align="right"><center><img src="../../action/picture_preview.php?imgid=<?php echo $profile_pic ?> " width="200"><br />
           
           
           <?php
		   $query = mysql_query("SELECT profile_pic FROM user_login WHERE id=$user_id") or die(mysql_error());
		   $row = mysql_fetch_array($query);
		   if($row[0] != '') {
		   
		   echo "<a href=remove_profile_pic.php?id=".$user_id.">".$remove_pic."</a>";
		   }
		   else{ 
           
		   }
		   ?>
		   </center></td>
            
            </tr>
          </table> 
        </div>
        <div>
          <table class="ContentArea" cellpadding="5" cellspacing="5">
            <tr class="BlueHeader">
              <td><?php echo $my_uploads; ?> </td>
            </tr>
            <tr>
              <td><?php show_user_uploads($user_id,$page); //function in user_uploads.php ?></td>
            </tr>
          </table>
        </div>
        <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <br>
        <br>
        <br>
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
unset($_SESSION[msg]);

 ?>
