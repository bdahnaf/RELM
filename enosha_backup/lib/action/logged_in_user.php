<?php


/*
** Method for printing the 'logged in as' user
*/
function logged_in_user(){
			
			global $logged_in_user;
			global $weburl;
			echo $logged_in_user."<a href='".$weburl."/lib/admin/users/edit_user.php?id=".$_SESSION['id']."'><b>".$_SESSION['name']."..</b></a>";

}

 ?>