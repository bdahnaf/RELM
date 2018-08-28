<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
require_once "$language/upload.php";

/*
** Comment Posting
*/

		//Get the comment, the learning object id and the posting user
		$comment = $_POST['comment'];
		$lo_id = $_POST['y'];
		$user_id = $_SESSION['id'];
		
		//If there is a comment posted, add it to the table
		if($comment!=''){
			$sql = "INSERT INTO comments (lo_id, comment, user_id) VALUES ($lo_id, '$comment', $user_id)";
			$query = mysql_query($sql) or die (mysql_error().$sql);
			$_SESSION[comment_posted] = $comment_posted;
			header('Location:../search/object_details.php?id='.$lo_id.'#comments');
		}else{
			//If there is an error, print comment was not posted
			$_SESSION[comment_posted] = $comment_not_posted;
			header('Location:../search/object_details.php?id='.$lo_id.'#comments');
		}
		
		


?>