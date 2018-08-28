<?php

@session_start();
require_once '../../../config.php';
check_access($action_id[1]);

$user_id=$_GET['id'];


$query1 = mysql_query("SELECT profile_pic FROM user_login WHERE id=$user_id") or die(mysql_error());
$row = mysql_fetch_array($query1);

unlink($row[0]);

$query2 = mysql_query("UPDATE user_login SET profile_pic='' WHERE id=$user_id") or die(mysql_error());
header('Location:edit_user.php?id='.$user_id);



?>