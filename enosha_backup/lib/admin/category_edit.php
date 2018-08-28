<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
$name=$_SESSION['name'];

require_once '../../config.php';
check_access($action_id[4]);
require_once "$language/admin.php";


		$category_id = $_POST['catalog_id'];
		$new_category_name= $_POST['catalog'];
		
		if($_POST['level'] == '0'){
		
		$sql = "UPDATE catalog SET catalog_name='".$new_category_name."' WHERE catalog_id=".$category_id;
		$query = mysql_query($sql) or die(mysql_error().$sql);
		
		}
		elseif($_POST['level'] == '1'){
		
		$sql = "UPDATE c_level_1 SET name='".$new_category_name."' WHERE c_1_id=".$category_id;
		$query = mysql_query($sql) or die(mysql_error().$sql);
		

		}
		elseif($_POST['level'] == '2'){
		
		$sql = "UPDATE c_level_2 SET name='".$new_category_name."' WHERE c_2_id=".$category_id;
		$query = mysql_query($sql) or die(mysql_error().$sql);
		

		}

		elseif($_POST['level'] == '3'){
		
		$sql = "UPDATE c_level_3 SET name='".$new_category_name."' WHERE c_3_id=".$category_id;
		$query = mysql_query($sql) or die(mysql_error().$sql);
		

		}

		elseif($_POST['level'] == '4'){
		
		$sql = "UPDATE c_level_4 SET name='".$new_category_name."' WHERE c_4_id=".$category_id;
		$query = mysql_query($sql) or die(mysql_error().$sql);
		

		}
		elseif($_POST['level'] == '5'){
		
		$sql = "UPDATE c_level_5 SET name='".$new_category_name."' WHERE c_5_id=".$category_id;
		$query = mysql_query($sql) or die(mysql_error().$sql);
		

		}else{
		
		echo "Invalid";
		
		}

		$_SESSION['com_mes']= $category_edited;
		header('Location:admin.php');


?>