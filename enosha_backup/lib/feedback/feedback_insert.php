<?php
session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
// insert data to the database
$log_id;
$name=$_SESSION['name'];
if($_POST['sub1'] != null){
	$query1="SELECT id FROM user_login WHERE name='$name'";
	$result1=mysql_query($query1)or die("Unable to select data".mysql_error());
	if(mysql_num_rows($result1)>0){
		while($row1=mysql_fetch_row($result1)){
		$log_id=$row1[0];
		}
	}
	$comment =$_POST['comment'];
	$date=date("Y-m-d");
	$query = "INSERT INTO feedback(log_id,date,comment) VALUES('$log_id','$date','$comment')";
	mysql_query($query)or die("Unable to insert data".mysql_error());
	$_SESSION['feed_mes']="Feedback Send Successfully";
	header('Location:feedback.php');
}

// delete records form tha database
if($_GET['id'] != null){
	$id=$_GET['id'];
	$query="DELETE FROM feedback WHERE id='$id'";
	mysql_query($query) or die("Unable to delete data from the database".mysql_error());
	$_SESSION['del_mes']="Your record is deleted";
	header('Location:feedback.php');
}
?>
