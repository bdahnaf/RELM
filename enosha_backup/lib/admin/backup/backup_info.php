<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
		function display_backup_info(){
		global $last_backup; global $on;
		$sql = "SELECT backup.user,backup.date,user_login.name as name FROM backup inner join user_login on backup.user=user_login.id ORDER BY backup_id DESC LIMIT 0,1";
		$query = mysql_query($sql) or die(mysql_error().$sql);
		$row = mysql_fetch_row($query);
		echo "<b>".$last_backup.$row[2].$on.$row[1]."</b>";
		}
		

?>