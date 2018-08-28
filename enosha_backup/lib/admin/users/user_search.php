<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
/*
** A Search facility for the administrator to search for system users
*/	
$_SESSION['user_search_display']="block";
function user_search($page){
				
				require_once 'user_search.php';
				
				global $name_heading;
				global $username_heading;
				global $email_heading;
				global $user_type_heading;	
				global $user_status;
				global $active;
				global $banned;	
				global $no_result;
				global $change_level;
				
	  	if (isset($_POST['user_search'])){
					$_SESSION['user_search_display']="block";
	  				$user	=	$_POST['search_user'];				
	  				if($user!=NULL){
	  				$author= "SELECT user_login.name, user_login.username, user_login.email, user_login.blocked, user_type.type_name, user_login.id from user_login inner join user_type  on user_login.type_id = user_type.type_id WHERE username LIKE '%$user%' OR email LIKE '%$user%' OR name LIKE '%$user%'";
	  				$author_result=mysql_query($author) or die(error_type(6000,"./user_admin.php"));
	  				if(mysql_num_rows($author_result)>0){
	  					echo "<table border='1' cellspacing=5 cellpadding=5>
	  					<tr>
	  					<th><b>$name_heading</b></th>
						<th><b>$username_heading</b></th>
						<th><b>$email_heading</b></th>
						<th><b>$user_type_heading</b></th>
						<th><b>$change_level</b></th>
						<th><b>$user_status</b></th>
						<th></th>
	  					</tr>";
						$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

	  					while($row = mysql_fetch_array($author_result))
	  				  	{
	  				 	echo "<form method='post' action='user_action.php'><tr>";
	  				  	echo "<td><a href='edit_user.php?id=".$row['id']."'>" . $row['name'] . "</a></td>";
	  				  	echo "<td>" . $row['username'] . "</td>";
						echo "<input type='hidden' value='".$row['username']."' id='x' name='x'>";
						echo "<input type='hidden' value='".$url."' id='y' name='y'>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['type_name'] . "</td>";
						echo "<td>";
						
						//for selecting the user types
							$result=mysql_query("SELECT * FROM user_type WHERE obsolete=0")or die(error_type(6000,"./user_admin.php"));
							echo '<select name="user_type" style="width: 7em;">';
							$row1 = mysql_fetch_array( $result );
							echo '<option value="' . $row1['type_id'] .'" selected="selected">' . $row1['type_name'] .'</option>';
	
								while($row1 = mysql_fetch_array( $result )) {
								echo '<option value="' . $row1['type_id'] .'">' . $row1['type_name'] .'</option>';
							}
							echo '</select>';
						echo "<input type='submit' id='change_level' name='change_level' value='Go'>";
						echo "</td>" ;	
						echo "<td>" ;
						if ($row['blocked']==0) echo "$active"; else echo "$banned";
						echo "</td>";
						echo "<td>";
						if  ($row['blocked']==0) echo "<input type='submit' value='Ban' name='ban' id='ban' />"; 
						else echo "<input type='submit' value='Activate' name='unban' id='unban' />";
						echo "</td>";
	  				  	echo "</tr></form>";
	  				  	}
	  					echo "</table>";
	  				}else{
	  					echo "<h3><b>".$no_result."</b></h3>";
	  				}
	  				} else user_browse($page);
	  	   }else user_browse($page);
	  	}

/*
** A browse facility for the administrator to see system users
*/	

	
function user_browse($pass_page){

				global $name_heading;
				global $username_heading;
				global $email_heading;
				global $user_type_heading;	
				global $user_status;
				global $active;
				global $banned;	
				global $no_result;
				global $change_level;
				$page=$pass_page;
					
					$_SESSION['user_search_display']="block";
	  				$author_count= "SELECT user_login.name, user_login.username, user_login.email, user_login.blocked, user_type.type_name , user_login.id from user_login inner join user_type  on user_login.type_id = user_type.type_id WHERE user_login.username NOT LIKE 'admin' ORDER BY register_date DESC";
	  				$author_result=mysql_query($author_count) or die(error_type(6000,"./user_admin.php"));
					if(mysql_num_rows($author_result)>0){
						while($row1 = mysql_fetch_row($author_result)){
							$count++;
						}
					}
		// get number of pages to display results
					$pages=$count/5;
					$original_pages =ceil($pages);
					$start=0;
					$end=5;
					
		//set start and end values for the LIMIT
					if($page > 1){
						$x = $page -1;
						$start = $x*5;
					}
					$author = mysql_query("SELECT user_login.name, user_login.username, user_login.email, user_login.blocked, user_type.type_name, user_login.id from user_login inner join user_type  on user_login.type_id = user_type.type_id WHERE user_login.username NOT LIKE 'admin' ORDER BY register_date DESC LIMIT $start , $end") or die(error_type(6000,"./user_admin.php"));
					
	  				if(mysql_num_rows($author)>0){
	  					echo "<table border='1' cellspacing=5 cellpadding=5>
	  					<tr>
	  					<th><b>$name_heading</b></th>
						<th><b>$username_heading</b></th>
						<th><b>$email_heading</b></th>
						<th><b>$user_type_heading</b></th>
						<th><b>$change_level</b></th>
						<th><b>$user_status</b></th>
						<th></th>
	  					</tr>";
						$url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	  					while($row = mysql_fetch_array($author))
	  				  	{
	  				 	echo "<form method='post' action='user_action.php'><tr>";
	  				  	echo "<td><a href='edit_user.php?id=".$row['id']."'>" . $row['name'] . "</a></td>";
	  				  	echo "<td>" . $row['username'] . "</td>";
						echo "<input type='hidden' value='".$row['username']."' id='x' name='x'>";
						echo "<input type='hidden' value='".$url."' id='y' name='y'>";
						echo "<td>" . $row['email'] . "</td>";
						echo "<td>" . $row['type_name'] . "</td>";
						echo "<td>";
						//for selecting the user types
							$result=mysql_query("SELECT * FROM user_type WHERE obsolete=0")or die(error_type(6000,"./user_admin.php"));
							echo '<select name="user_type" style="width: 7em;">';
							$row1 = mysql_fetch_array( $result );
							echo '<option value="' . $row1['type_id'] .'" selected="selected">' . $row1['type_name'] .'</option>';
	
								while($row1 = mysql_fetch_array( $result )) {
								echo '<option value="' . $row1['type_id'] .'">' . $row1['type_name'] .'</option>';
							}
							echo '</select>';
						echo "<input type='submit' id='change_level' name='change_level' value='Go'>";
						echo "</td>" ;	
						echo "<td>" ;
						if ($row['blocked']==0) echo "$active"; else echo "$banned";
						echo "</td>";
						echo "<td>";
						if  ($row['blocked']==0) echo "<input type='submit' value='Ban' name='ban' id='ban' />"; 
						else echo "<input type='submit' value='Activate' name='unban' id='unban' />";
						echo "</td>";
	  				  	echo "</tr></form>";
	  				  	}
						
						//==========
						if($original_pages>1){
						echo "<tr>";
						echo"<td"." colspan="."5"."><div align="."center".">";
						if($page>1){
							echo "<a href=\"user_admin.php?page=".($page-1)."\">Previous</a>&nbsp";
						}
						for($x=1; $x<$original_pages+1; $x++){
							echo "<a href=\"user_admin.php?page=".$x."\">".$x."</a>&nbsp";
						}
						if($page<$original_pages){
							if($page == 0){
								$i=1;
								echo "<a href=\"user_admin.php?page=".($i+1)."\">Next</a>&nbsp";
							}else{
								echo "<a href=\"user_admin.php?page=".($page+1)."\">Next</a>&nbsp";
							}
							}
						echo "</div></td>";
						echo"</tr>";
						}
						
						//=================
							
							
	  					echo "</table>";
	  				}else{
	  					echo "<h3><b>".$no_result."</b></h3>";
	  				}
	  				
	  	   
	  	}
		
		
/*
** A Simple search facility for the administrator to check for existing users when adding new users
*/		
function user_check(){


				global $name_heading;
				global $username_heading;
				global $email_heading;
				global $no_result;			
				
	  	if (isset($_POST['user_search1'])){
	  				$user	=	$_POST['search_user1'];
	  				if($user!=NULL){
	  				$author= "SELECT * from user_login where username LIKE '%$user%' OR email LIKE '%$user%' OR name LIKE '%$user%'";
	  				$author_result=mysql_query($author);
	  				if(mysql_num_rows($author_result)>0){
	  					echo "<table border='1' cellspacing=5 cellpadding=5>
	  					<tr>
	  					<th><b>$name_heading</b></th>
						<th><b>$username_heading</b></th>
						<th><b>$email_heading</b></th>
	  					</tr>";

	  					while($row = mysql_fetch_array($author_result))
	  				  	{
	  				 	echo "<tr>";
	  				  	echo "<td><a href='edit_user.php?id=".$row['id']."'>" . $row['name'] . "</a></td>";
	  				  	echo "<td>" . $row['username'] . "</td>";
						echo "<td>" . $row['email'] . "</td>";
	  				  	echo "</tr>";
	  				  	}
	  					echo "</table>";
	  				}else{
	  					echo "<h3><b>".$no_result."</b></h3>";
	  				}
	  				}
	  	   }
	  	}
	  ?>
