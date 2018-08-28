<?php
session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';

// for delete item from the database
$_SESSION['del_mes_feed']="";
if($_GET['del_id'] != null){
$del_id=$_GET['del_id'];
$query_del="DELETE FROM feedback WHERE id='$del_id'";
mysql_query($query_del) or die("Unable to delete data from the database".mysql_error());
	$_SESSION['del_mes_feed']="Record is deleted";
	header('Location:feedback_show.php');
}else{
	$_SESSION['del_mes_feed']="";
}


?>
