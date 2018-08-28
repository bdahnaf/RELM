<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../../config.php';
require_once '../../statistics/download_statistics.php';
check_access($action_id[4]);


$file_id = $_GET['id'];
$path = $upload_path."backups/";


		header('Content-Description: File Transfer');
		header('Content-type: application/zip');
		header('Content-Disposition: attachment; filename='.$file_id );
		readfile($path.$file_id);


?>