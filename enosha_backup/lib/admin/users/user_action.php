<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
check_access($action_id[3]);
require_once "$language/user_admin.php";
$author_result;


/*
 * Inserting a new user
 */
			if (isset($_POST['add_user']))
			{
				if($_POST['user_name']!=NULL){
				$username 			= $_POST['user_name'];
				$display_name		= $_POST['display_name'];
				$password			= $_POST['password'];
				$confirm_password 	= $_POST['password_confirm'];
				$user_type			= $_POST['user_type'];
				$email				= $_POST['email'];
				$country 			= $_POST['country'];
				$date				=date("Y/m/d : H:i:s", time());
				$mdpass             =md5($password);
				
				$result	= mysql_query("SELECT id, username FROM user_login")or die(error_type(6000,"./user_admin.php"));
				$user_array=array();
				while ($rows=mysql_fetch_array($result)){
							$user_array[strtolower($rows['username'])] = $rows['id'];								
						}
						if (!$user_array[strtolower($username)]>0){
							mysql_query("INSERT INTO user_login (username,name,password,email,type_id,country,register_date) VALUES ('$username','$display_name','$mdpass','$email','$user_type','$country','$date')")or die (error_type(6000,"./user_admin.php"));
						$_SESSION['user_add'] = $user_added;
						header('Location:user_admin.php');
						} else {
						$_SESSION['user_add'] = $user_exists;
						header('Location:user_admin.php');
						}
				}//else echo "Please make sure insert a new User";
			}
			
/*
** Adding a new user type
*/  	
			
			elseif (isset($_POST['add_type'])){
			    $_SESSION['user_type_display']="block";
				$type_name = $_POST['type'];
				if($type_name!=''){
				$result	= mysql_query("SELECT type_id, type_name FROM user_type")or die(error_type(6000,"./user_admin.php"));
				$usertype_array=array();
				while ($rows=mysql_fetch_array($result)){
							$user_array[strtolower($rows['type_name'])] = $rows['type_id'];								
						}
						if (!$user_array[strtolower($type_name)]>0){
							mysql_query("INSERT INTO user_type (type_name) VALUES ('$type_name')")or die (error_type(6000,"./user_admin.php"));
							$_SESSION['user_com_mes']= $new_user_type_added;
							header('Location:user_admin.php');
						}else {
						$_SESSION['user_exist_mes_ex']= $user_type_already_exists;
						header('Location:user_admin.php');
						}
				} else {
						$_SESSION['user_exist_mes_ex']= $empty_field;
						header('Location:user_admin.php');
					}
				}


/*
** Removing a user type
*/  				
				
			if (isset($_POST['type_remove'])){
			
			$_SESSION['user_type_display']="block";
			$type= $_POST['user_type'];
			mysql_query("UPDATE user_type SET obsolete='1' WHERE type_id='$type'")or die(error_type(6000,"./user_admin.php"));
			$_SESSION['user_exist_mes_ex']= $user_type_removed;
			header('Location:user_admin.php');
	
			}


/*
** Activating a user type
*/ 
				
			if (isset($_POST['type_activate'])){
			
			$_SESSION['user_type_display']="block";
			$type= $_POST['user_type_obsolete'];
			mysql_query("UPDATE user_type SET obsolete='0' WHERE type_id='$type'")or die(error_type(6000,"./user_admin.php"));
			$_SESSION['user_exist_mes_ex']= $user_type_activated;
			header('Location:user_admin.php');
	
			}
				

/*
** User Ban
*/ 			
		
			if (isset($_POST['ban'])){
			mysql_query("UPDATE user_login SET blocked=1 WHERE username='".$_POST['x']."'") or die (error_type(6000,"./user_admin.php"));
			header('Location:user_admin.php');
			}

			
/*
** User Activate (Un-ban)
*/ 		
		
		
			if (isset($_POST['unban'])){
			mysql_query("UPDATE user_login SET blocked=0 WHERE username='".$_POST['x']."'") or die (error_type(6000,"./user_admin.php"));
			header('Location:user_admin.php');
			}	

/*
** Changing a User Level
*/ 				

			if (isset($_POST['change_level'])){
			$user_type = $_POST['user_type'];
			$username =  $_POST['x'];
			$url = $_POST['y'];
			mysql_query("UPDATE user_login SET type_id=$user_type WHERE username='$username'") or die (error_type(6000,"./user_admin.php"));
			header('Location:'.$url);
			}	

					
	?>