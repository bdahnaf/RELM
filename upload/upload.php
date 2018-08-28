 <?php
 include 'dbconfig.php';
	 // define variables and set to empty values
	$title = $authorName = $className = $tags = $fullLocation = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $title = test_input($_POST["title"]);
	  $authorName = test_input($_POST["authorName"]);
	  $className = test_input($_POST["className"]);
	  $tags = test_input($_POST["tags"]);
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	
 if(isset($_POST["btn_zip"]))  
 {  
      $output = '';  
      if($_FILES['zip_file']['name'] != '')  
      {  
           $file_name = $_FILES['zip_file']['name'];
           $array = explode(".", $file_name);  
           $name = $array[0];  
           $ext = $array[1];
			
           if($ext == 'zip')  
           {  
                $path = 'upload/';  
                $location = $path . $file_name;  
                if(move_uploaded_file($_FILES['zip_file']['tmp_name'], $location))  
                {  
                     $zip = new ZipArchive;  
                     if($zip->open($location))  
                     {  
                          $zip->extractTo($path);  
                          $zip->close();  
                     }
                     unlink($location);
					 //header('Location: success.php');
                }
				$fullLocation = $path . $name . '/index.html';				
           }
      }  
 }
 
// Perform queries 
mysqli_query($con,"INSERT INTO tblData (id,class,title,tags,filelocation,author) 
VALUES (NULL,'$className','$title','$tags','$fullLocation','$authorName')");

mysqli_close($con); 
header('Location: success.php');
?>  
