<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
check_access($action_id[4]);
require_once "$language/admin.php";


/*
 * Adding a category
 */
 

if ($_POST['pass_cata'] =='cat_add'){
	$_SESSION['user_display_cata']="block";
	$category = $_POST['category_new'];
	if(isset($_POST['external_check']))
	$external_value = "0";
	else
	$external_value = "1";
	if ($category!=''){
	$result=mysql_query("SELECT catalog_id , catalog_name FROM catalog WHERE obsolete!=1")or die(error_type(5000,"./admin.php"));
	$cat_array=array();
	while ($rows=mysql_fetch_array($result)){
				$cat_array[strtolower($rows['catalog_name'])] = $rows['catalog_id'];								
			}
			
			if (!$cat_array[strtolower($category)]>0){
				mysql_query("INSERT INTO catalog (catalog_name,internal) VALUES ('$category','$external_value')")or die (error_type(5000,"./admin.php"));
				$last_cat_id=mysql_insert_id();		
				if (!is_dir("$upload_path/$last_cat_id")) mkdir("$upload_path/$last_cat_id");
				$_SESSION['com_mes']= $new_category_added;
				header('Location:admin.php');
			}else{
				$_SESSION['exist_mes']= $category_already_exists;
				header('Location:admin.php');
			}
}else{
	$_SESSION['com_mes']=$empty_field;
	header('Location:admin.php');	
	}
}

/*
 * Adding a Level 1 Entry
 */
if ($_POST['pass_cata'] =='lev1_add')
{
	$_SESSION['user_display_cata']="block";
	$super	= $_POST['catalog1'];
	$level1 = $_POST['level_1'];

	if($super!=1 and $level1!=NULL){
	$result	= mysql_query("SELECT c_1_id , name FROM c_level_1  WHERE obsolete!=1")or die(error_type(5000,"./admin.php"));
	$lev1_array=array();	
	
	while ($rows=mysql_fetch_array($result)){
				$lev1_array[strtolower($rows['name'])] = $rows['c_1_id'];								
			}
			if($lev1_array['$level1']!=$super){
			
			if (!$lev1_array[strtolower($level1)]>0){
				mysql_query("INSERT INTO c_level_1 (name,catalog_c_1_id) VALUES ('$level1','$super')")or die (error_type(5000,"./admin.php"));
				$last_subcat_id=mysql_insert_id();	
				if (!is_dir("$upload_path/$super/$last_subcat_id")) mkdir("$upload_path/$super/$last_subcat_id");
				$_SESSION['com_mes']= $new_subcategory_added;
				header('Location:admin.php');				
			}else 
				$_SESSION['exist_mes']= $subcategory_already_exists;
				header('Location:admin.php');
			}
	}else {
	$_SESSION['com_mes']=$empty_field;
	header('Location:admin.php');	
	}
}



/*
 * Adding a Level 2 Entry
 */

if ($_POST['pass_cata'] =='lev2_add')
{
	$_SESSION['user_display_cata']="block";	
	$super	= $_POST['c_level_1'];
	$super2	= $_POST['catalog1'];
	$level2 = $_POST['level_2'];
	
	if($super!=1 and $level2!=NULL){
	$result	= mysql_query("SELECT c_2_id , name FROM c_level_2  WHERE obsolete!=1")or die(error_type(5000,"./admin.php"));
	$lev2_array=array();
	while ($rows=mysql_fetch_array($result)){
				$lev2_array[strtolower($rows['name'])] = $rows['c_2_id'];								
			}
			
			if($lev2_array['$level2']!=$super){
				if (!$lev2_array[strtolower($level2)]>0){
					mysql_query("INSERT INTO c_level_2 (name,c_1_id) VALUES ('$level2','$super')")or die (error_type(5000,"./admin.php"));
					$last_subcat_id=mysql_insert_id();	
					if (!is_dir("$upload_path/$super2/$super/$last_subcat_id")) mkdir("$upload_path/$super2/$super/$last_subcat_id");
					$_SESSION['com_mes']= $new_subcategory_added;
					header('Location:admin.php');	
				}else
					$_SESSION['exist_mes']= $subcategory_already_exists;
					header('Location:admin.php'); 
			}
	}else {
	$_SESSION['com_mes']=$empty_field;
	header('Location:admin.php');	
	}
}




/*
 * Adding a Level 3 Entry
 */


if ($_POST['pass_cata'] =='lev3_add')
{
	$_SESSION['user_display_cata']="block";
	$super	= $_POST['c_level_2'];
	$super1	= $_POST['c_level_1'];
	$super2	= $_POST['catalog1'];
	$level3 = $_POST['level_3'];

	if($super!=1 and $level3!=NULL){
	$result	= mysql_query("SELECT c_3_id , name FROM c_level_3  WHERE obsolete!=1")or die(error_type(5000,"./admin.php"));
	$lev3_array=array();
	while ($rows=mysql_fetch_array($result)){
				$lev3_array[strtolower($rows['name'])] = $rows['c_3_id'];								
			}
			if($lev3_array['$level3']!=$super){
				if (!$lev3_array[strtolower($level3)]>0){
					mysql_query("INSERT INTO c_level_3 (name,c_2_id) VALUES ('$level3','$super')")or die (error_type(5000,"./admin.php"));
					$last_subcat_id=mysql_insert_id();	
					if (!is_dir("$upload_path/$super2/$super1/$super/$last_subcat_id")) mkdir("$upload_path/$super2/$super1/$super/$last_subcat_id");
					$_SESSION['com_mes']= $new_subcategory_added;
					header('Location:admin.php');	
				}else
					$_SESSION['exist_mes']= $subcategory_already_exists;
					header('Location:admin.php'); 
			}
	}else {
	$_SESSION['com_mes']=$empty_field;
	header('Location:admin.php');	
	}
}




/*
 * Adding a Level 4 Entry						
 */

if ($_POST['pass_cata'] =='lev4_add')
{
	$_SESSION['user_display_cata']="block";
	$super	= $_POST['c_level_3'];
	$super1	= $_POST['c_level_2'];
	$super2	= $_POST['c_level_1'];
	$super3	= $_POST['catalog1'];
	$level4 = $_POST['level_4'];

	if($super!=1 and $level4!=NULL){
	$result	= mysql_query("SELECT c_4_id , name FROM c_level_4  WHERE obsolete!=1")or die(error_type(5000,"./admin.php"));
	$lev4_array=array();
	while ($rows=mysql_fetch_array($result)){
				$lev4_array[strtolower($rows['name'])] = $rows['c_4_id'];								
			}
			if($lev4_array['$level4']!=$super){
				if (!$lev4_array[strtolower($level4)]>0){
					mysql_query("INSERT INTO c_level_4 (name,c_3_id) VALUES ('$level4','$super')")or die (error_type(5000,"./admin.php"));
					$last_subcat_id=mysql_insert_id();	
					if (!is_dir("$upload_path/$super3/$super2/$super1/$super/$last_subcat_id")) mkdir("$upload_path/$super3/$super2/$super1/$super/$last_subcat_id");
					$_SESSION['com_mes']= $new_subcategory_added;
					header('Location:admin.php');	
				}else 
					$_SESSION['exist_mes']= $subcategory_already_exists;
					header('Location:admin.php'); 
			}
	}else {
	$_SESSION['com_mes']=$empty_field;
	header('Location:admin.php');	
	}
}




/*
 * Adding a Level 5 Entry
 */

if ($_POST['pass_cata'] =='lev5_add')
{
	$_SESSION['user_display_cata']="block";
	$super	= $_POST['c_level_4'];
	$super1	= $_POST['c_level_3'];
	$super2	= $_POST['c_level_2'];
	$super3	= $_POST['c_level_1'];
	$super4	= $_POST['catalog1'];
	$level5 = $_POST['level_5'];

	
	if($super!=1 and $level5!=NULL){
	$result	= mysql_query("SELECT c_5_id , name FROM c_level_5  WHERE obsolete!=1")or die(error_type(5000,"./admin.php"));
	$lev5_array=array();
	while ($rows=mysql_fetch_array($result)){
				$lev5_array[strtolower($rows['name'])] = $rows['c_5_id'];								
			}
			if($lev5_array['$level5']!=$super){
				if (!$lev5_array[strtolower($level5)]>0){
					mysql_query("INSERT INTO c_level_5 (name,c_4_id) VALUES ('$level5','$super')")or die (error_type(5000,"./admin.php"));
					$last_subcat_id=mysql_insert_id();
					if (!is_dir("$upload_path/$super4/$super3/$super2/$supe1/$super/$last_subcat_id")) mkdir("$upload_path/$super4/$super3/$super2/$supe1/$super/$last_subcat_id");
					$_SESSION['com_mes']= $new_subcategory_added;
					header('Location:admin.php');	
				}else 
					$_SESSION['exist_mes']= $subcategory_already_exists;
					header('Location:admin.php'); 
			}
	}else {
	$_SESSION['com_mes']=$empty_field;
	header('Location:admin.php');	
	}
}



/*
 * Removing a category - Making Obsolete
 */
 
if ($_POST['pass_cata'] =='cat_remove')
{
		$_SESSION['user_display_cata']="block";
		$category = $_POST['catalog1'];
		if ($category!=1 AND $category!=''){
		mysql_query("UPDATE catalog SET obsolete='1' WHERE catalog_id='$category'")or die(error_type(5000,"./admin.php"));
		$_SESSION['com_mes']= $category_removed;
		header('Location:admin.php');
		}else {
		$_SESSION['com_mes']= $cannot_remove;
		header('Location:admin.php');
		}
}

/*
**  Code for making the subcategories obsolete
*/
if ($_POST['pass_cata'] =='lev1_remove')
{
		$_SESSION['user_display_cata']="block";
		$level1 = $_POST['c_level_1'];
		if ($level1!=1 AND $level1!=''){
		mysql_query("UPDATE c_level_1 SET obsolete='1' WHERE c_1_id='$level1'")or die(error_type(5000,"./admin.php"));
		$_SESSION['com_mes']= $subcategory_removed;
		header('Location:admin.php');
		}else {
		$_SESSION['com_mes']= $cannot_remove;
		header('Location:admin.php');
		}
}

if ($_POST['pass_cata'] =='lev2_remove')
{
		$_SESSION['user_display_cata']="block";
		$level2 = $_POST['c_level_2'];
		if ($level2!=1 AND $level2!=''){	
		mysql_query("UPDATE c_level_2 SET obsolete='1' WHERE c_2_id='$level2'")or die(error_type(5000,"./admin.php"));
		$_SESSION['com_mes']= $subcategory_removed;
		header('Location:admin.php');
		}else {
		$_SESSION['com_mes']= $cannot_remove;
		header('Location:admin.php');
		}
}

if ($_POST['pass_cata'] =='lev3_remove')
{
		$_SESSION['user_display_cata']="block";
		$level3 = $_POST['c_level_3'];
		if ($level3!=1 AND $level3!=''){
		mysql_query("UPDATE c_level_3 SET obsolete='1' WHERE c_3_id='$level3'")or die(error_type(5000,"./admin.php"));
		$_SESSION['com_mes']= $subcategory_removed;
		header('Location:admin.php');
		}else {
		$_SESSION['com_mes']= $cannot_remove;
		header('Location:admin.php');
		}
}

if ($_POST['pass_cata'] =='lev4_remove')
{
		$_SESSION['user_display_cata']="block";
		$level4 = $_POST['c_level_4'];
		if ($level4!=1 AND $level4!=''){
		mysql_query("UPDATE c_level_4 SET obsolete='1' WHERE c_4_id='$level4'")or die(error_type(5000,"./admin.php"));
		$_SESSION['com_mes']= $subcategory_removed;
		header('Location:admin.php');
		}else {
		$_SESSION['com_mes']= $cannot_remove;
		header('Location:admin.php');
		}
}

if ($_POST['pass_cata'] =='lev5_remove')
{
		$_SESSION['user_display_cata']="block";
		$level5 = $_POST['c_level_5'];
		if ($level5!=1 AND $level5!=''){
		mysql_query("UPDATE c_level_5 SET obsolete='1' WHERE c_5_id='$level5'")or die(error_type(5000,"./admin.php"));
		$_SESSION['com_mes']= $subcategory_removed;
		header('Location:admin.php');
		}else {
		$_SESSION['com_mes']= $cannot_remove;
		header('Location:admin.php');
		}
}
//=================================================== End of Elseifs ================================================================

if ($_POST['pass_cata'] =='cat_edit')
{
		$_SESSION['user_display_cata']="block";
		$level5 = $_POST['c_level_5'];
		if ($level5!=1 AND $level5!=''){
		mysql_query("UPDATE c_level_5 SET obsolete='1' WHERE c_5_id='$level5'")or die(error_type(5000,"./admin.php"));
		$_SESSION['com_mes']= $subcategory_removed;
		header('Location:admin.php');
		}else {
		$_SESSION['com_mes']= $cannot_remove;
		header('Location:admin.php');
		}
}
?>