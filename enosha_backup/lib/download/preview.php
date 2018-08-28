<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
require_once '../scorm/scorm_preview.php';

		$filetype = $_GET['type'];
		$type_id = $_GET['type_id'];
		$file_name = $_GET['filename'];
		$file_path = $_GET['path'];
		$user_id = $_SESSION['id'];
		
		//Create the absolute path of the file to be downloaded
		$file_path = stripslashes($file_path);
		$download_path = $upload_path.$file_path;
		
		//Create the file name by contacanating the name and the type (file extension)
		$download_file_name = $file_name.".".$filetype;
		
		$filetype = strtolower($filetype);
		
		if($type_id == 0){
		//header('Content-Type: image/'.$filetype);
		readfile("$download_path");
		}

		if($type_id == 1){
		header('Content-Type: image/'.$filetype);
		readfile("$download_path");
		}
		if($type_id == 2){
		header('Content-Type: application/'.$filetype);
		readfile("$download_path");
		}
		if($type_id == 3){
		header('Content-Type: text/html');
		readfile("$download_path");
		}
		if($type_id == 4){
		header('Content-Type: application/x-shockwave-flash');
		readfile("$download_path");
		}
		if($type_id == 6){
		$arr = array();
		array_push($arr,$filetype,$file_name,$file_path,$user_id);
		scorm_preview($arr);
		}
		
		else echo "No preview available";


?>