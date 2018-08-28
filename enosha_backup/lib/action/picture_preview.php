<?php
	if(strtolower(substr($_GET['imgid'],-3,3))=='jpg' || strtolower(substr($_GET['imgid'],-4,4))=='jpeg'){

		header ("Content-type: image/jpeg");
		
	
		if (file_exists($_GET['imgid'])){
		$img_handle = imagecreatefromjpeg($_GET['imgid'] ) or die("");
		imagejpeg ($img_handle);
		}

}
	elseif(strtolower(substr($_GET['imgid'],-3,3))=='png'){

		header ("Content-type: image/png");
		
	
		if (file_exists($_GET['imgid'])){
		$img_handle = imagecreatefrompng($_GET['imgid'] ) or die("");
		imagepng ($img_handle);
		}

}

	elseif(strtolower(substr($_GET['imgid'],-3,3))=='gif'){

		header ("Content-type: image/gif");
		
	
		if (file_exists($_GET['imgid'])){
		$img_handle = imagecreatefromgif($_GET['imgid'] ) or die("");
		imagegif ($img_handle);
		}

}


?>
