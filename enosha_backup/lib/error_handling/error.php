<?php
@session_start();

function error_type($x,$redirect_page) {
		
		 global $error;
			
		 $error_number=$x;
		
		 $date =date("Y/m/d : H:i:s", time());
		 $name = $_SESSION['name'];
		 if($_SESSION['type_id']==3)
		 $audience="external";
		 else
		 $audience="internal";
		 $page=$_SESSION['file'];
		 
		 $query="INSERT INTO error_report(error_no, date_time, user, audience, error_page) VALUES ('$error_number', '$date', '$name', '$audience', '$page')";
		  
		 mysql_query($query) or die(mysql_error());
		 $_SESSION[reg_msg] = $error;
		 header('Location:'.$redirect_page);
 
}



?>