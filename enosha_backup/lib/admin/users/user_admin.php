<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
check_access($action_id[3]);

$name=$_SESSION['name'];
$page=$_GET['page'];
require_once "$language/user_admin.php";
require_once "$language/validate.php";
require_once 'user_search.php';
require_once '../../register/users_to_be_validated.php';

$user_type_added = $_SESSION['user_com_mes'];
$user_type_exists = $_SESSION['user_exist_mes_ex'];
if($_SESSION['user_type_display'] == ""){
	$user_type_display = "none";
	}else{
	$user_type_display = $_SESSION['user_type_display'];
	}
if($_SESSION['user_search_display']==""){
			$userSearch_display = "none";
		}else{
			$userSearch_display = $_SESSION['user_search_display'];
		}
if($_SESSION['user_rights_assign']==""){
			$userRights_assign="none";
		}else{
			$userRights_assign=$_SESSION['user_rights_assign'];
		}

$userDisplay="none";
$titleDisplay="show";
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
<link rel="stylesheet" type="text/css" href="../../../css/user_admin.css" />
<script type="text/javascript" src="../../javascript/user_admin.js"></script>

<!-- InstanceEndEditable -->
<body>
<div id="wrap">
  <div id="header">
  <!-- InstanceBeginEditable name="ul" -->
    <ul id="nav">
      <?php

  print_navbar();

	   ?>
    </ul>
    <!-- InstanceEndEditable -->
  </div>
  <!-- /header -->
  <div id="con">
    <div id="inner">
      <div class="left floatl3"><!-- InstanceBeginEditable name="EditRegion8" -->
        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <p><a href="../../../index.php"><?php echo $home ?></a> <img src="../../../images/insert.jpg" alt="link" width="12" height="11" /> <?php echo $user_administration ?></font></p>
        <p align="right"><?php logged_in_user() ?></p>  <!-- method located in lib/action -->
        <br />
        <div class="Header"><?php echo $perform_a_task ?></div>
        <br/>
        <?php
		users_to_be_validated();
		?><br />
        <!--div style="display: <?php echo $userDisplay; ?>"-->
 <table class="ContentArea">
        <tr  class="BlueHeader">
          <th colspan="2" scope="row"><b><?php echo $add_a_user ?></b></th>

        </tr>
</table>
				<div class="ContentArea">
                <?php if(isset($_SESSION['user_add'])) echo "<b>".$_SESSION['user_add']."</b>"; ?>
	          <table>
	          <form id="form6" name="form6" method="post" action="user_action.php" onsubmit="return validateForm();">
	  <table width="550" border="0" cellpadding="10">
	  <tr>
	    <td valign="top">
	    <table width="350" border="0">

	    <tr id="change1">
	      <td width="136"><?php echo $user_name ?></td>
	      <td width="256"><label>
	        <input type="text" name="user_name" id="user_name" />
	      </label></td>
	    </tr>
	    <tr id="change2">
	      <td><?php echo $display_name ?></td>
	      <td><label>
	        <input type="text" name="display_name" id="display_name" />
	      </label></td>
	    </tr>
	    <tr id="change3">
	      <td><?php echo $password ?></td>
	      <td><label>
	        <input type="password" name="password" id="password" />
	      </label></td>
	    </tr>
	    <tr id="change4">
	      <td><?php echo $confirm_password ?></td>
	      <td><label>
	        <input type="password" name="password_confirm" id="password_confirm" />
	      <div id='password_confirm_div' class="notice"></div></label></td>
	    </tr>
	    <tr id="change5">
	      <td><?php echo $user_type ?></td>
	      <td><?php

	  			//for selecting the user types
	  			$result=mysql_query("SELECT * FROM user_type WHERE obsolete=0")or die(mysql_error());
	  			echo '<select name="user_type" id="user_type" style="width: 13em;">';
	  			$row = mysql_fetch_array( $result );
	  			echo '<option value="' . $row['type_id'] .'" selected="selected">' . "$select_a_user_type" .'</option>';

	  			while($row = mysql_fetch_array( $result )) {
	  			echo '<option value="' . $row['type_id'] .'">' . $row['type_name'] .'</option>';
	  			}
	  		echo '</select>';
	  		?>   </td>
	    </tr>
	    <tr id="change6">
	      <td><?php echo $email ?></td>
	      <td><label>
	        <input type="text" name="email" id="email" />
	      </label><div id='email_div' class="notice"></div></td>
	    </tr>
	    <tr>
	      <td><b><?php echo $optional_data_notice ?></b></td></tr>


	    <tr id="change7">
	      <td><?php echo $country ?></td>
	      <td><label>
	        <input type="text" name="country" id="country" />
	      </label></td>
	    </tr>
	      <td>&nbsp;</td>
	      <td><label>
	        <input type="submit" name="add_user" id="add_user" value="+Add" />
	      </label></td>
	    </tr>
	  </table>
            </form>
            </td>

            <form action="user_admin.php" name="SearchUsers" method="post">
              <td valign="top"><table border="0">
                <tr>
                  <td><b><?php echo $check_for_users ?></b></td>
                </tr>
                <tr>
                  <td><label>
                    <input type="text" name="search_user1" id="search_user1" />
                    <input type="submit" name="user_search1" id="user_search1" value="Search" />
                    </label></td>
                </tr>
            </form>
            <tr>
              <td><?php user_check(); ?></td>    <!-- method located in admin/user_search -->
            </tr>
          </table>
          </td>
          <td></td>
          </tr>
          </table>
        </div>
         <!-- /////////////////////////////////////////Search for users////////////////////////////////////////////// -->
        <div id="Layer3">
   <table class="ContentArea">
        <tr  class="BlueHeader"onclick="toggleUserSearch();">
          <th colspan="2" scope="row"><font style="font-weight:bold"><?php echo $user_search ?></font></th>
          <td align="right"><a id="displayUserSearch" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a></td>
        </tr>
	</table>
	<div id="userSearch" style="display: <?php echo $userSearch_display; ?>">
        <table class="ContentArea">
        <form id="form3" name="form3" method="post" action="user_admin.php">
			<table width="650" border="0" class=ContentArea cellpadding="10" cellspacing="10">
				<tr><td> <table border="0">
                <tr>
                  <td><b><?php echo $search_for_users ?></b></td>
                </tr>
                <tr>
                  <td><label>
                    <input type="text" name="search_user" id="search_user" />
                    <input type="submit" name="user_search" id="user_search" value="Search" />
                    </label></td>
                </tr>
             </form>
            <tr>
              <td><br /><?php user_search($page);?></td>    <!-- method located in admin/users/user_search -->
            </tr>
          </table></td></tr></table>
                </div>
        			</div>
        <!-- /////////////////////////////////////////Add User Types////////////////////////////////////////////// -->
        <div id="Layer3">
        <table class="ContentArea">
          <tr  class="BlueHeader"onclick="toggleUserTypes();">
            <th colspan="2" scope="row"><font style="font-weight:bold"><?php echo $add_user_types ?></font></th>
            <td align="right"><a id="displayUserType" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a></td>
          </tr>
        </table>
        <div id="userType" style="display: <?php echo $user_type_display; ?>">
        <table class="ContentArea">
        <form id="form3" name="form3" method="post" action="user_action.php">
          <table width="650" border="0" class=ContentArea cellpadding="10" cellspacing="10">
          <tr><?php if(isset($_SESSION['user_com_mes'])) echo "<b>".$user_type_added."</b>"; elseif(isset($_SESSION['user_exist_mes_ex'])) echo  "<b>".$user_type_exists."</b>";  ?></tr>
            <tr>
              <td width="162"><?php echo $add_a_user_type ?></td>
              <td><label>
                <input type="text" name="type" id="type" />
                </label>
                <input type="submit" name="add_type" id="add_type" value="+Add" /></td>
              <td align="right"><?php echo $current_list ?>
                <?php

	  			//for selecting the user types
	  			$result=mysql_query("SELECT * FROM user_type WHERE obsolete=0")or die(mysql_error());
	  			echo '<select name="user_type" style="width: 8em;">';
	  			$row = mysql_fetch_array( $result );
	  			echo '<option value="' . $row['type_id'] .'" selected="selected">' . $row['type_name'] .'</option>';

	  			while($row = mysql_fetch_array( $result )) {
	  			echo '<option value="' . $row['type_id'] .'">' . $row['type_name'] .'</option>';
	  			}
	  		echo '</select>';
	  		?>
              </td>
              <td  align="right"><label>
                <input type="submit" name="type_remove" id="type_remove" value="-Remove" />
                </label></td>
            </tr>
            <tr><td></td><td></td>
            <td align="right"><?php echo $obsolete_list ?>
             <?php

	  			//for selecting the user types
	  			$result=mysql_query("SELECT * FROM user_type WHERE obsolete=1")or die(mysql_error());
	  			echo '<select name="user_type_obsolete" style="width: 8em;">';
	  			echo '<option value="1" selected="selected"></option>';

	  			while($row = mysql_fetch_array( $result )) {
	  			echo '<option value="' . $row['type_id'] .'">' . $row['type_name'] .'</option>';
	  			}
	  		echo '</select>';
	  		?>         
            </td>
             <td  align="right"><label>
                <input type="submit" name="type_activate" id="type_activate" value="+Activate" />
                </label></td>
                </tr>
          </table>
        </form>
        </div>
        </div>
        
        
        <!-- /////////////////////////////////////////  Set User Rights  ////////////////////////////////////////////// -->
        
        <div id="Layer3">
   			<table class="ContentArea">
       			<tr  class="BlueHeader"onclick="toggleUserRights();">
         			<th colspan="2" scope="row"><font style="font-weight:bold"><?php echo $set_user_rights ?></font></th>
          			<td align="right"><a id="displayUserType" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a>							                </td>
        		</tr>
			</table>
		<div id="userRights" style="display: <?php echo $userRights_assign; ?>">
      	  <table class="ContentArea">
			<iframe src="rights_display.php" frameborder="0" width="750" scrolling="no" marginheight="0"></iframe>
            </table>
      </div>
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
unset($_SESSION['user_com_mes']);
unset($_SESSION['user_exist_mes_ex']);
unset($_SESSION['user_search_display']);
unset($_SESSION['user_add']);
unset($_SESSION['user_type_display']);
?>
