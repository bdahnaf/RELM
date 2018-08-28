<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';


function show_comments(){

global $comment_button;
global $comment_by;
global $title_id;
global $comments;
global $no_comments;
global $remove_comment;
 
 //Select the comments for the required learning object
$query2=mysql_query("SELECT comments.comment, comments.id, user_login.name, user_login.id, learning_object.id FROM user_login, comments inner join learning_object on lo_id WHERE comments.lo_id=$title_id AND comments.lo_id=learning_object.id AND comments.user_id=user_login.id ORDER BY comments.id DESC") or die (mysql_error());
		
		
		//If a comment is posted print the message
		if(isset($_SESSION[comment_posted]) )echo "<b>".$_SESSION[comment_posted]."</b>"; 
				
				//Form for comment adding
				echo "<form method='post' action='../comments/comments_action.php'><table class='ContentArea'><tr>";
				echo "<textarea name='comment' id='comment' cols=50></textarea><br>";
				echo "<input type='submit' name=comment_submit id=comment_submit value='".$comment_button."'></tr>";
				echo "</table>";
				echo "<table class='RoundContentArea' cellpadding=10><tr class='RoundedBlueHeader'><th colspan=4 scope='row'><b>".$comments."</b></th></tr>";
				//Print the comments
				if(mysql_num_rows($query2)>0){
					while($row2 = mysql_fetch_array($query2)){
						$_SESSION[comment_id]=$row2[1];
						echo "<tr><td width=300>".$row2['comment']."</td><td width=150></td><td>".$comment_by." ".$row2['name']."</td>";
						//If the commentator is the logged in user, give the right to remove comment
						if ($_SESSION['id'] == $row2[3]){
							echo "<td><a href='../comments/comment_remove.php?comment=".$_SESSION[comment_id]."'>".$remove_comment."</a></td>";
						} 
						echo "</tr>";
					}		
				} 
			//If no comments are posted
			else echo "<tr><td>".$no_comments."</td></tr>";
			echo "<input type='hidden' value='".$title_id."' id='y' name='y'>";			
	echo "</table></form>";
}

?>
