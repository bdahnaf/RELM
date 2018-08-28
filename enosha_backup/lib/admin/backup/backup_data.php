<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
require_once "$language/backup.php";

//==================================== Backup database ===================================================

$date = date("Y.m.d.H.i");
$sql=$mysqldump_path." -u $dbuser --password=$dbpass $dbname > ".$upload_path."/".$date.".sql_backup.sql";
$create_backup = exec($sql);

//Update the backing up data
$backup_query = mysql_query("INSERT INTO backup (user,date) VALUES ('$_SESSION[id]', '$date')") or die(mysql_error());


//======================================= Backing Up the Data Directory ===============================================


//if ($os == "windows"){
				//Directory to be archived, the data directory
				$dir = $upload_path; 
				
				if(!is_dir($upload_path.'backups/')) mkdir($upload_path.'backups/', 0777);
				
				// the name of your zip archive to be created
				$date = date("Y.m.d.H.i");
				$zipfile = $upload_path.'/backups/'.$date.'.data_backup.zip';
				
				$zip = new ZipArchive();
				$zip->open($zipfile, ZipArchive::CREATE);
				
				$dirName = $dir;
				
				if (!is_dir($dirName)) {
					throw new Exception('Directory ' . $dirName . ' does not exist');
				}
				
				$dirName = realpath($dirName);
				if (substr($dirName, -1) != '/') {
					$dirName.= '/';
				}
				
				
				$dirStack = array($dirName); 
				//Find the index where the last dir starts
				$cutFrom = strrpos(substr($dirName, 0, -1), '/')+1;
				
				while (!empty($dirStack)) {
					$currentDir = array_pop($dirStack);
					$filesToAdd = array();
				
					$dir = dir($currentDir);
					while (false !== ($node = $dir->read())) {
						if (($node == '..') || ($node == '.') || ($node == 'backups')) {
							continue;
						}
						if (is_dir($currentDir . $node)) {
							array_push($dirStack, $currentDir . $node . '/');
						}
						if (is_file($currentDir . $node)) {
							$filesToAdd[] = $node;
						}
					}
				
					$localDir = substr($currentDir, $cutFrom);
					$zip->addEmptyDir($localDir);
				   
					foreach ($filesToAdd as $file) {
						$zip->addFile($currentDir . $file, $localDir . $file);
					}
				}
				
				$zip->close(); 
				
				unlink($upload_path."/".$date.".sql_backup.sql");
				
//}
//
//else
//{
//				if(!is_dir($upload_path.'backups/')) mkdir($upload_path.'backups/', 0777);
//				$date = date("Y.m.d.H.i");
//				$test = $zip_path." -0 ".$upload_path."/backups/".$date."data_backup.zip -r ".$upload_path;
//				$test2 = exec($test);
//}
//

$_SESSION['backup_mes']= $backup_done;
header('Location:../admin.php');

?>