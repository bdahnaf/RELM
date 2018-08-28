<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
require_once "$language/user_admin.php";
check_access($action_id[3]);

$user_type = $_GET['id'];
$user_right_exists = $_SESSION['user_right_mes'];
if(isset($_POST['user_type_right']))$user_type = $_POST['user_type_right'];



?>

<html>
<link rel="stylesheet" type="text/css" href="../../../css/reset.css" />

 <body bgcolor="#FFFFFF" topmargin="0" style="padding:0"> 
 	<form id="form3" name="form3" method="post" action="rights_display.php">
				<table width="650" border="0" class=ContentArea cellpadding="10" cellspacing="10" align="center">
					<tr><?php if(isset($_SESSION['user_right_mes'])) echo "<b>".$user_right_exists."</b>"; ?></tr>
					  <tr>
						<td valign="top">
						<label>
					
					<?php
                            echo "<select id='user_type_right' name='user_type_right' style='width: 13em;' onchange='this.form.submit();'>";
                            echo "<option value=\"$id\">".$select_a_user_type."</option>\n";
                            $result=mysql_db_query($dbname,"select `type_id`, `type_name` from user_type where obsolete=0 order by `type_id`");	
                            list($id, $name)=mysql_fetch_array($result);
                  
                            while(list($id, $name)=mysql_fetch_array($result)){
                                echo "<option value=\"$id\"";
								if ($user_type == $id) echo "selected='selected' ";
								echo ">$name</option> \n" ;
                             }
                            echo "</select>";
                    ?>
                    
                    
					</label>
              </form></td>
			  <form id="form4" name="form4" method="post" action="rights_assign.php"><td valign="top">
					
					
					<?php
					
							echo "<select name='user_right' id='user_right' size='7' style='width:150px'>\n";
							$result=mysql_query("SELECT ua.id, ua.action FROM user_action ua,user_right ur WHERE ur.usertype_id = '$user_type ' AND ur.action_id = ua.id ORDER BY ua.id")or die(mysql_error());
                            while(list($id, $name)=mysql_fetch_array($result)){
                                echo "<option value=\"$id\" >$name</option> \n" ;
								}
							echo "</select>";
			     ?>
                 
                 
            </td>
            <td>
                    <input type="submit" id="assign" name="assign" value="<<">
                    <br />
                    <input type="submit" id="remove" name="remove" value=">>">
            </td>       
            			  <td>
                                <?php
                                    
                                    //for displaying all user actions available
                                    $result=mysql_query("SELECT * FROM user_action")or die(mysql_error());
                                    echo '<select name="actions" id="actions" size="7">';
                                    $row = mysql_fetch_array( $result );
                                    while($row = mysql_fetch_array( $result )) {
                                    echo '<option value="' . $row['id'] .'">' . $row['action'] .'</option>';
                                    }
                                echo '</select>';
                                echo '<input name="assign" type="hidden" value="assign" />';
								echo '<input name="user_type" type="hidden" value="'.$user_type.'" />';
                                ?>
                                
                                
                         </td>
		            </tr>
		   </table>
    </form>
    </body>
    </html>
    <?php
	unset($_SESSION['user_rights_assign']);
	unset($_SESSION['user_right_mes']);
	?>