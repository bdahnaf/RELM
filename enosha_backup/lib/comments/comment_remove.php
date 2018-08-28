<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
require_once "$language/upload.php";

//Get the id of the to be removed comment
$comment_id = $_GET['comment'];
		
		//Select the Learning object which is associated with the comment
		$result = mysql_query("SELECT lo_id FROM comments WHERE id=$comment_id") or die (mysql_error());
		$res = mysql_fetch_row($result);
		$lo_id = $res[0];
		
		//Delete the comment from the learning object
		$query = mysql_query("DELETE FROM comments WHERE id=$comment_id") or die (mysql_error());
		$_SESSION[comment_posted] = $comment_removed;
		header('Location:../search/object_details.php?id='.$lo_id.'#comments');


?>