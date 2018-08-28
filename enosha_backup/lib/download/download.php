<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
require_once '../statistics/download_statistics.php';


		//Get parameters from the download function in /lib/actions/download.php
		$filetype = $_GET['type'];
		$file_name = $_GET['filename'];
		$file_path = $_GET['path'];
		
		//Create the absolute path of the file to be downloaded
		$file_path = stripslashes($file_path);
		$download_path = $upload_path.$file_path;
		
		//Create the file name by contacanating the name and the type (file extension)
		$download_file_name = $file_name.".".$filetype;
		
		//Update download statistics
		update_statistics($file_path);
		
		//Send the file to the browser to be downloaded
		header('Content-Description: File Transfer');
		header('Content-type: application/'.$filetype);
		header('Content-Disposition: attachment; filename='.$download_file_name);
		readfile($download_path);


?>