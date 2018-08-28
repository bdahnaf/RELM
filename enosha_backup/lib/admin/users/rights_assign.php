<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
require_once "$language/user_admin.php";
check_access($action_id[3]);

		
/*
** To Remove actions from s certain user type
*/	
		if(isset($_POST['remove'])){
				$_SESSION['user_rights_assign']="block";
				$action = $_POST['user_right'];
				$user_type = $_POST['user_type']; 
					if($action!=''){
						$_SESSION['user_right_mes']= $right_removed;
						$query = mysql_query("DELETE FROM user_right WHERE usertype_id='$user_type' AND action_id='$action'") or die(error_type(6000,"./user_admin.php"));
						header('Location:rights_display.php?id='.$user_type);	 						
		 			} else{
						$_SESSION['user_right_mes']= $misselection;
						header('Location:rights_display.php?id='.$user_type);
					}
		
		}

/*
** To assign actions to a certain user type
*/	 

		elseif(isset($_POST['assign'])){ 
					$_SESSION['user_rights_assign']="block";
					$action = $_POST['actions'];
					$user_type = $_POST['user_type'];
					if($action!='' AND $user_type!=''){
					$result = mysql_query("SELECT * FROM user_right WHERE usertype_id=$user_type AND action_id=$action") or die (error_type(6000,"./user_admin.php"));
						if(mysql_num_rows($result)<1){
						$query = mysql_query("INSERT INTO user_right (usertype_id,action_id) VALUES ('$user_type','$action')") or die(error_type(6000,"./user_admin.php"));
							$_SESSION['user_right_mes']= $right_added;
							header('Location:rights_display.php?id='.$user_type);
	
						
						} else {
						$_SESSION['user_right_mes']= $right_exists;
						header('Location:rights_display.php?id='.$user_type);
						}
		 			} else {
						$_SESSION['user_right_mes']= $misselection;
						header('Location:rights_display.php?id='.$user_type);
					}
		 
	 }
		
	 



		
		
?>