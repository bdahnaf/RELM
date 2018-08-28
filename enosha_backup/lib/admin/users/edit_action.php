<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
require_once 'user_uploads.php';
require_once "$language/user_admin.php";

		$user_id			= $_POST['user_id'];	
		$username 			= $_POST['user_name'];
		$display_name		= $_POST['display_name'];
		$email				= $_POST['email'];
		$country 			= $_POST['country'];
		$old_password		= md5($_POST['o_password']);
		$new_password		= md5($_POST['n_password']);
		$confirm_password 	= md5($_POST['password_confirm']);
		
		
	$query="SELECT password FROM user_login WHERE (id='".$user_id."')";
	$result=mysql_query($query);
	$row=mysql_fetch_row($result);
	$password=$row[0];
	
	
	user_profile_picture_update();
	
	
			$query1="UPDATE user_login SET username='$username' WHERE (id='".$user_id."')";
			$query2="UPDATE user_login SET name='$display_name' WHERE (id='".$user_id."')";
			$query3="UPDATE user_login SET email='$email' WHERE (id='".$user_id."')";
			$query4="UPDATE user_login SET country='$country ' WHERE (id='".$user_id."')";
			
			
			$result1=mysql_query($query1) or die(error_type(6000,"./edit_user.php"));
			$result2=mysql_query($query2) or die(error_type(6000,"./edit_user.php"));
			$result3=mysql_query($query3) or die(error_type(6000,"./edit_user.php"));
			$result4=mysql_query($query4) or die(error_type(6000,"./edit_user.php"));	
			$_SESSION[msg]=$details_updated;
			header('Location:edit_user.php?id='.$user_id);
			
	if($_POST['o_password']!=null && $_POST['n_password']!=null && $_POST['password_confirm']!=null){		
				if($old_password==$password && $new_password != $confirm_password){
					$_SESSION[msg]=$mismatching_password;
					header('Location:edit_user.php?id='.$user_id);
				}
				if($old_password==$password && $new_password == $confirm_password){
					$query5="UPDATE user_login SET password='$new_password' WHERE (id='".$_SESSION['id']."')";
					$result5=mysql_query($query5) or die("Eror in quary: $qurey5.".mysql_error());	
					$_SESSION[msg]=$details_updated;
					header('Location:edit_user.php?id='.$user_id);
				}
				if($old_password!=$password){
					$_SESSION[msg]=$incorrect_old_password;
					header('Location:edit_user.php?id='.$user_id);
				}
	}else{}
?>