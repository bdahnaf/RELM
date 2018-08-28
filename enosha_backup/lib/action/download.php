<?php 


/*
** Method for passing the file name, file type and the path parameters to the download procedure
*/
function download($location,$title){
			
		global $download;
		global $preview;
		$location=str_replace(" ","%20",$location);
		$type=trim(strrchr($location,'.'),'.');
		$name=str_replace(" ","_",$title);
			
		$filetype = $type;
		$file_name = $name;
		$file_path = $location;
		$user_id = $_SESSION['id'];
		
		//Create the absolute path of the file to be downloaded
		$file_path = stripslashes($file_path);
		$download_path = $upload_path.$file_path;
		
		//Create the file name by contacanating the name and the type (file extension)
		$download_file_name = $file_name.".".$filetype;
		
		$filetype = strtolower($filetype);
		
		if($filetype == 'jpg' || $filetype == 'png' || $filetype == 'bmp' || $filetype == 'gif'){
		$type_id = 1;
		echo "<td width=50><a href=../download/preview.php?filename=$name&type=$type&type_id=$type_id&path=$location><img src=../../images/preview.png title=".$preview."></a> <a href=../download/download.php?filename=$name&type=$type&path=$location><img src=../../images/download_small.png title=".$download."></a></td>";
		}
		if($filetype == 'pdf'){
		$type_id = 2;
		echo "<td width=50><a href=../download/preview.php?filename=$name&type=$type&type_id=$type_id&path=$location><img src=../../images/preview.png title=".$preview."></a> <a href=../download/download.php?filename=$name&type=$type&path=$location><img src=../../images/download_small.png title=".$download."></a></td>";
		}
		if($filetype == 'txt' || $filetype == 'sql'  || $filetype == 'html'){
		$type_id = 3;
		echo "<td width=50><a href=../download/preview.php?filename=$name&type=$type&type_id=$type_id&path=$location><img src=../../images/preview.png title=".$preview."></a> <a href=../download/download.php?filename=$name&type=$type&path=$location><img src=../../images/download_small.png title=".$download."></a></td>";
		}
		if($filetype == 'swf'){
		$type_id = 4;
		echo "<td width=50><a href=../download/preview.php?filename=$name&type=$type&type_id=$type_id&path=$location><img src=../../images/preview.png title=".$preview."></a> <a href=../download/download.php?filename=$name&type=$type&path=$location><img src=../../images/download_small.png title=".$download."></a></td>";
		}
		if($filetype == 'doc' || $filetype == 'docx'){
		$type_id = 5;
		echo "<td width=50><a href=../download/download.php?filename=$name&type=$type&type_id=$type_id&path=$location><img src=../../images/download_small.png title=".$download."></a></td>";
		}

		if($filetype == 'zip'){
		$type_id = 6;
		echo "<td width=50><a href=../download/preview.php?filename=$name&type=$type&type_id=$type_id&path=$location><img src=../../images/preview.png title=".$preview."></a> <a href=../download/download.php?filename=$name&type=$type&path=$location><img src=../../images/download_small.png title=".$download."></a></td>";
		}
		
/*		else{
		$type_id = 0;
		echo "<td width=50><a href=../download/download.php?filename=$name&type=$type&type_id=$type_id&path=$location><img src=../../images/download_small.png title=".$download."></a></td>";
		}
*/

}





?>