<?php
require_once '../../config.php';


/*
** Method for sending mails, for registration and validation
*/
function sendMail($ToName, $ToEmail, $FromName, $FromEmail, $Subject, $Body, $Header)
{

			global $smtp_server;
			$SMTP = fsockopen($smtp_server, 25);
			
			$InputBuffer = fgets($SMTP, 1024);
			
			fputs($SMTP, "HELO sitename.com\n");
			$InputBuffer = fgets($SMTP, 1024);
			fputs($SMTP, "MAIL From: $FromEmail\n");
			$InputBuffer = fgets($SMTP, 1024);
			fputs($SMTP, "RCPT To: $ToEmail\n");
			$InputBuffer = fgets($SMTP, 1024);
			fputs($SMTP, "DATA\n");
			$InputBuffer = fgets($SMTP, 1024);
			fputs($SMTP, "$Header");
			fputs($SMTP, "From: $FromName <$FromEmail>\n");
			fputs($SMTP, "To: $ToName <$ToEmail>\n");
			fputs($SMTP, "Subject: $Subject\n\n");
			fputs($SMTP, "$Body\r\n.\r\n");
			fputs($SMTP, "QUIT\n");
			$InputBuffer = fgets($SMTP, 1024);
			
			fclose($SMTP);
} 


?>