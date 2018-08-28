<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
require_once '../../statistics/download_statistics.php';
require_once "$language/admin.php";
check_access($action_id[4]);


			echo $available_backups."<br>";

			//define the path as relative
			$path = $upload_path."backups/";
			
			//using the opendir function
			$dir_handle = @opendir($path) or die("Unable to open $path");
			
			//echo "Directory Listing of $path<br/>";
			
			$array = array();
			$cnt = 0;	
			//running the while loop
			while ($file = readdir($dir_handle)) 
			{
			   if($file!="." && $file!=".."){
				  echo "<a href=download_backup.php?id=".$file.">".$file."</a><br/>";
				  $array[$cnt] = $file;
				  $cnt++;
				  }
			}
			
			rsort($array);
			
			//closing the directory
			closedir($dir_handle);




?>