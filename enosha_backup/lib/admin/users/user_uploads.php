<?php
@session_start();
require_once '../../../config.php';

function show_user_uploads($user_id,$pass_page){

				global $title;
				global $description;
				global $category;
				global $date_added;
				global $no_result;
				$page=$pass_page;
				//count number of fields
				$sql_count ="SELECT learning_object.title, learning_object.description, catalog.catalog_name, learning_object.date from learning_object inner join catalog on learning_object.catalog_id = catalog.catalog_id WHERE author_id=$user_id ORDER BY date DESC";
							$result1_count=mysql_query($sql_count)or die(error_type(6000,"./user_admin.php"));
							if(mysql_num_rows($result1_count)>0){
								while($row1 = mysql_fetch_row($result1_count)){
									$count++;
								}
							}
				// get number of pages to display results
							$pages=$count/5;
							$original_pages =ceil($pages);
							$start=0;
							$end=5;
							
				//set start and end values for the LIMIT
							if($page > 1){
								$x = $page -1;
								$start = $x*5;
							}
				$result= "SELECT learning_object.title, learning_object.description, catalog.catalog_name, learning_object.date, learning_object.id from learning_object inner join catalog on learning_object.catalog_id = catalog.catalog_id WHERE uploader_id=$user_id ORDER BY date DESC LIMIT $start , $end";
				
									$object_result=mysql_query($result) or die (error_type(6000,"user_admin.php"));
									
									if(mysql_num_rows($object_result)>0){
										echo "<table border='1' cellspacing=5 cellpadding=5 width=600>
										<tr>
										<th><b>$title</b></th>
										<th><b>$description</b></th>
										<th><b>$category</b></th>
										<th><b>$date_added</b></th>
										</tr>";
				
										while($row = mysql_fetch_array($object_result))
										{
										echo "<form method='post' action='user_action.php'><tr>";
										echo "<td><a href=\"../../search/object_details.php?id=".$row['id']."\">" . $row['title'] . "</a></td>";
										//echo "<td>" . $row['description'] . "</td>";
										$description = $row['description'];
										$limit = 100;
										if (strlen($description) > $limit)
										$description = substr($description, 0, strrpos(substr($description, 0, $limit), ' ')) . '...';
											
										echo "<td align=left>".$description."</td>";
										echo "<td>" . $row['catalog_name'] . "</td>";
										echo "<td>" . $row['date'] . "</td>";
										echo "</tr></form>";
										}
										if($original_pages>1){
										echo "<tr>";
										echo"<td"." colspan="."5"."><div align="."center".">";
										if($page>1){
											echo "<a href=\"edit_user.php?id=".$user_id."&page=".($page-1)."\">Previous</a>&nbsp";
										}
										for($x=1; $x<$original_pages+1; $x++){
											echo "<a href=\"edit_user.php?id=".$user_id."&page=".$x."\">".$x."</a>&nbsp";
										}
										if($page<$original_pages){
											if($page == 0){
												$i=1;
												echo "<a href=\"edit_user.php?id=".$user_id."&page=".($i+1)."\">Next</a>&nbsp";
											}else{
												echo "<a href=\"edit_user.php?id=".$user_id."&page=".($page+1)."\">Next</a>&nbsp";
											}
										}
										echo "</div></td>";
										echo"</tr>";
										}
										echo "</table>";
									}else{
										echo "<h3><b>".$no_result."</b></h3>";
									}
   }


function user_profile_picture_update(){

				global $upload_path;
				
				if(!is_dir($upload_path.'profiles/')) mkdir($upload_path.'profiles/', 0777);
				
				$target_path = $upload_path.'profiles/'; 
				
				$file_name = $_FILES['profile_pic1']['name'];
				$file_name= $_SESSION['id'].substr($file_name,strrpos($file_name,"."));
				if($_FILES['profile_pic1']['name'] ==''){
				//echo "hgjhjhg";
				
				 return; }
				
				$query2 = mysql_query("SELECT profile_pic FROM user_login WHERE (id='".$_SESSION[id]."')") or die(mysql_error());
				$rows=mysql_fetch_array($query2);
				if (file_exists($rows[0])) unlink($rows[0]);

				if(move_uploaded_file($_FILES['profile_pic1']['tmp_name'], $target_path.$file_name)) {
				
					$query1= mysql_query("UPDATE user_login SET profile_pic='$target_path$file_name' WHERE (id='".$_SESSION[id]."')") or die(mysql_error());
					
				} else{
					echo "There was an error uploading the file, please try again!";die();
				}

  }
  
?>