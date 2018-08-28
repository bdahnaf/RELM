<?php


/*
** Method for printing the navigation bar according to the user privilege level
*/
function print_navbar(){

				global $weburl;
				global $home;
				global $logout;
				global $action;
			
			
			 //Hardcoded link for the home page	
			 if($_SESSION['type_id']!=null){
			 echo "<li><a href='".$weburl."/index.php'>".$home."</a></li>";
			 }

			 //Query for selecting which actions are associated with the logged in user type
			$query="SELECT action_id FROM user_right WHERE usertype_id='".$_SESSION['type_id']."'";
			$result=mysql_query($query) or die("Eror in quary: $qurey.".mysql_error());
			
			//Print the actions in the navigation bar
			while($row=mysql_fetch_array($result)){

						$query_2="SELECT action, action_url FROM user_action WHERE id='$row[0]'";
						$result_2=mysql_query($query_2);
						$row_2=mysql_fetch_row($result_2);
						if($row_2[0]!=$action[5])
						echo "<li><a href='".$weburl."$row_2[1]'>$row_2[0]</a></li>";
					}
			
			//Hardcoded links for the help and logout	
			if($_SESSION['type_id']!=null){
			echo "<li><a href='".$weburl."/lib/help/help.php'>Help</a></li>";
			echo "<li><a href='".$weburl."/lib/login/logout.php'>".$logout."</a></li>";
			}
}


?>
