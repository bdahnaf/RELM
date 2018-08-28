<?php

/*
 * Created on Feb 19, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
$conn = mysql_connect($dbhost,$dbuser,$dbpass) or die ("Couldn't connect to database");
mysql_select_db($dbname);


	//create query
	$query="SELECT type_name FROM user_type";
	
	//execute the query
	$result=mysql_query($query) or die("Eror in quary: $qurey.".mysql_error());
	
	while($row=mysql_fetch_array($result)){
	
	$userType[]=$row[0];

	}
	
	
//get all the available actions
    $query_1="SELECT action, id FROM user_action";
    $result_1=mysql_query($query_1);
    while($row_1=mysql_fetch_array($result_1)){
    $action[]=$row_1[0];
    $action_id[]=$row_1[1];
        }
 
 
	//Record last activity time
	$date	=  date("Y/m/d : H:i:s", time());
	if(isset($_SESSION['id'])){
			$activity_query = mysql_query("UPDATE user_login SET last_activity='$date' WHERE id='$_SESSION[id]'") or die(mysql_error());
	}else{}    
 
 
 
	// Check the access rights
	function check_access($action_id){
	 
		//create query
		$query="SELECT * FROM user_right WHERE usertype_id='".$_SESSION['type_id']."' AND action_id='$action_id'";
	   
		//execute the query
		$result=mysql_query($query) or die("Eror in quary: $qurey.".mysql_error());
	   
		if(mysql_num_rows($result)>0){
		 
		 $a=2;
		 
		 } else{
			exit("you do not have rights to access this page.");
		}   

}


?>