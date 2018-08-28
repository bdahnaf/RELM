<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);

require_once '../../config.php';
require_once '../email/mail.php';
require_once 'password_generator.php';
require_once "$language/forgot_password.php";


$email = $_POST['forgot_pass_email'];

		$query = mysql_query("SELECT * FROM user_login WHERE email='$email'") or die(mysql_error());


//Check if there is a result from the input

if(!mysql_num_rows($query)>0) {
		
		//set a session variable for the display page
		$_SESSION['user_exists']=$no_such_user;
		
		//redirect to the password page
		$url = "Location:forgot_password.php";
		header($url);

}
else {
		//Generate a new password of length 5
		$new_pass = generateRandPass(5);
		
		//md5 value of the password to be stored in the db
		$new_md5_pass = md5($new_pass);
		
		//set the new password to the user
		$query2 = mysql_query("UPDATE user_login SET password='$new_md5_pass' WHERE email='$email'") or die(mysql_error());
		
		//set a session variable for the display page
		$_SESSION['user_exists']=$email_found;
		
		//Extract query
		$rows = mysql_fetch_array($query);
		
		//the password changer's name
		$to_name = $rows[1];
		
		if($smtp_server != "")
		//Sending the mail of the password change info
		sendMail($to_name,$email, "eNOSHA", $site_mail, $email_title,$email_body." ".$new_pass.". ".$email_body_next." ".$weburl, "1");
		
		//redirect to the password page
		$url = "Location:forgot_password.php";
		header($url);


}



















?>
