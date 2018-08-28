<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
check_access($action_id[4]);
require_once "$language/admin.php";

/*
 * Inserting a new Language
 */
			if ($_POST['pass_lang'] =='add_lang')
			{
				$_SESSION['user_display_lang']="block";
				if($_POST['lang']!=NULL){
				$lang = $_POST['lang'];
				$result	= mysql_query("SELECT lang_id , language FROM language")or die(error_type(5000,"./admin.php"));
				$lang_array=array();
				while ($rows=mysql_fetch_array($result)){
							$lang_array[strtolower($rows['language'])] = $rows['lang_id'];								
						}
						if (!$lang_array[strtolower($lang)]>0){
							mysql_query("INSERT INTO language (language) VALUES ('$lang')")or die (error_type(5000,"./admin.php"));
							$_SESSION['com_mes_lang']= $new_language_added;
							header('Location:admin.php');
						}else{ 
							$_SESSION['exist_mes_lan']= $language_already_exists;
							header('Location:admin.php');
						}
				}else {
							$_SESSION['exist_mes_lan']= $empty_field;
							header('Location:admin.php');
				} 
			}
			
/*
 * Removing a Language
 */			
 
 			elseif ($_POST['pass_lang'] =='lang_remove')
			{
				$_SESSION['user_display_lang']="block";
				$language = $_POST['language'];
				if($language!=1){
				mysql_query("UPDATE language SET obsolete='1' WHERE lang_id='$language'")or die(error_type(5000,"./admin.php"));
				$_SESSION['com_mes_lang']= $language_removed ;
				header('Location:admin.php');
				} else{
				$_SESSION['com_mes_lang']= $cannot_remove ;
				header('Location:admin.php');
				}
	
			}

/*
 * Activating a Language
 */			
 
 			elseif ($_POST['pass_lang'] =='lang_activate')
			{
				$_SESSION['user_display_lang']="block";
				$language = $_POST['language_obsolete'];
				if($language!=1){
				mysql_query("UPDATE language SET obsolete='0' WHERE lang_id='$language'")or die(error_type(5000,"./admin.php"));
				$_SESSION['com_mes_lang']= $language_activated ;
				header('Location:admin.php');
				} else{
				$_SESSION['com_mes_lang']= $cannot_remove ;
				header('Location:admin.php');
				}
	
			}			
			
/*
 * 	Inserting a new Activity type
 */
			elseif ($_POST['pass_activity'] =='add_activity')
			{
			$_SESSION['user_display_act']="block";
			if($_POST['activity']!=NULL){
				$activity = $_POST['activity'];
				$result	= mysql_query("SELECT interactivity_id , interactivity_name FROM interactivity_type")or die(error_type(5000,"./admin.php"));
				$activity_array=array();
				while ($rows=mysql_fetch_array($result)){
							$activity_array[strtolower($rows['interactivity_name'])] = $rows['interactivity_id'];								
						}
						if (!$activity_array[strtolower($activity)]>0){
							mysql_query("INSERT INTO interactivity_type (interactivity_name) VALUES ('$activity')")or die (error_type(5000,"./admin.php"));
							$_SESSION['com_mes_act']= $new_activity_added;
							header('Location:admin.php');
						}else{ 
							$_SESSION['exist_mes_act']= $activity_already_exists;
							header('Location:admin.php');
						}
				}else {
							$_SESSION['exist_mes_act']= $empty_field;
							header('Location:admin.php');
				}
			}
			


/*
 * Removing an Activity Type
 */			
 
 			elseif ($_POST['pass_activity'] =='act_remove')
			{
				$_SESSION['user_display_act']="block";
				$activity = $_POST['activity_drop'];
				if($activity!=1){
				mysql_query("UPDATE interactivity_type SET obsolete='1' WHERE interactivity_id='$activity'")or die(error_type(5000,"./admin.php"));
				$_SESSION['com_mes_act']= $activity_removed ;
				header('Location:admin.php');
				}else{
				$_SESSION['com_mes_act']= $cannot_remove ;
				header('Location:admin.php');
				}
			
			}

/*
 * Activating an Activity Type
 */			
 
 			elseif ($_POST['pass_activity'] =='activity_activate')
			{
				$_SESSION['user_display_act']="block";
				$activity = $_POST['activity_obsolete_drop'];
				if($activity!=1){
				mysql_query("UPDATE interactivity_type SET obsolete='0' WHERE interactivity_id='$activity'")or die(error_type(5000,"./admin.php"));
				$_SESSION['com_mes_act']= $activity_activated ;
				header('Location:admin.php');
				}else{
				$_SESSION['com_mes_act']= $cannot_remove ;
				header('Location:admin.php');
				}
			
			}

			
		
			
/*
 * 	Inserting a new Localization
 */
			elseif ($_POST['pass_region'] =='add_local')
			{
			$_SESSION['user_display_target']="block";
			if($_POST['localization']!=NULL){
				$localization = $_POST['localization'];
				$result	= mysql_query("SELECT localization_id , lo_name FROM localization")or die(error_type(5000,"./admin.php"));
				$localization_array=array();
				while ($rows=mysql_fetch_array($result)){
							$localization_array[strtolower($rows['lo_name'])] = $rows['localization_id'];								
						}
						if (!$localization_array[strtolower($localization)]>0){
							mysql_query("INSERT INTO localization (lo_name) VALUES ('$localization')")or die (error_type(5000,"./admin.php"));
							$_SESSION['com_mes_local']= $new_localization_added;
							header('Location:admin.php');
						}else{
							$_SESSION['exist_mes_local']= $localization_already_exists;
							header('Location:admin.php'); 
						}
				}else {
							$_SESSION['exist_mes_local']= $empty_field;
							header('Location:admin.php');
				}
			}
			
			

/*
 * Removing a Target Region
 */			
 
 			elseif ($_POST['pass_region'] =='region_remove')
			{
				$_SESSION['user_display_target']="block";
				$localization = $_POST['localization_drop'];
				if($localization!=1){
				mysql_query("UPDATE localization SET obsolete='1' WHERE localization_id='$localization'")or die(error_type(5000,"./admin.php"));
				$_SESSION['com_mes_local']= $region_removed;
				header('Location:admin.php');
				}else{
				$_SESSION['com_mes_local']= $cannot_remove;
				header('Location:admin.php');
				
				}
			
			}

/*
 * Activating a Target Region
 */			
 
 			elseif ($_POST['pass_region'] =='region_activate')
			{
				$_SESSION['user_display_target']="block";
				$localization = $_POST['localization_obsolete_drop'];
				if($localization!=1){
				mysql_query("UPDATE localization SET obsolete='0' WHERE localization_id='$localization'")or die(error_type(5000,"./admin.php"));
				$_SESSION['com_mes_local']= $region_activated;
				header('Location:admin.php');
				}else{
				$_SESSION['com_mes_local']= $cannot_remove;
				header('Location:admin.php');
				
				}
			
			}
			
/*
** Adding a Module
*/


			elseif (isset($_POST['mod_add']))
			{
			$_SESSION['user_display_mod']="block";
			if($_POST['mod_name']!='' AND $_POST['mod_url']!=''){
				$module = $_POST['mod_name'];
				$module_url = $_POST['mod_url'];
				$result	= mysql_query("SELECT id, action FROM user_action") or die(error_type(5000,"./admin.php"));
				$module_array=array();
				while ($rows=mysql_fetch_array($result)){
							$module_array[strtolower($rows['action'])] = $rows['id'];								
						}
						if (!$module_array[strtolower($module)]>0){
							mysql_query("INSERT INTO user_action (action,action_url) VALUES ('$module','$module_url')")or die (error_type(5000,"./admin.php"));
							$_SESSION['com_mes_mod']= $mod_added;
							header('Location:admin.php');
						}else{
							$_SESSION['com_mes_mod']= $mod_exists;
							header('Location:admin.php'); 
						}
				}else {
							$_SESSION['com_mes_mod']= $empty_field;
							header('Location:admin.php');
				}
			}

/* 
** Edit Modules
*/

			elseif (isset($_POST['mod_edit_button']))
			{
				$_SESSION['user_display_mod']="block";
				$module = $_POST['module_drop'];
				$module_url = $_POST['mod_url'];
				if($module!=''){
				$result = mysql_query("SELECT action FROM user_action WHERE id=$module")or die(error_type(5000,"./admin.php"));
				$row = mysql_fetch_array($result);
				//$_SESSION['com_mes_mod']= $row['action'];
				header('Location:admin.php');
				}else{
				$_SESSION['com_mes_mod']= $cannot_remove;
				header('Location:admin.php');
				
				}
			
			}

			
			$url = "Location:$weburl/lib/admin/admin.php";
			header($url);
			die();
?>
