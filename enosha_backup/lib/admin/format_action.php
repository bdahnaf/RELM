<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);

require_once '../../config.php';
check_access($action_id[4]);
require_once "$language/admin.php";

/*
 * Adding a new extension
 */ 

if ($_POST['pass_event'] == 'ext_add')
{
	$_SESSION['user_display_format']="block";
	if($_POST['extension']!=NULL){
			$dot = array('.');
			$clear_ext = str_replace($dot,"",$_POST['extension']); 
			$ext = ".".$clear_ext;

			$result	= mysql_query("SELECT format_id , name FROM format")or die(error_type(5000,"./admin.php"));
	$format_array=array();
	while ($rows=mysql_fetch_array($result)){
				$format_array[strtolower($rows['name'])] = $rows['format_id'];								
			}
			//print_r($cat_array);
			if (!$format_array[strtolower($ext)]>0){
				mysql_query("INSERT INTO format (name) VALUES ('$ext')")or die (error_type(5000,"./admin.php"));
				$_SESSION['com_mes_format']= $new_extension_added;
				header('Location:admin.php');
			}else{ 
				$_SESSION['exist_mes_ex']= $extension_already_exists;
				header('Location:admin.php');
			}
	}else {
							$_SESSION['exist_mes_ex']= $empty_field;
							header('Location:admin.php');
			} 
}

/*
 * Adding a new Format type 
 */
elseif ($_POST['pass_event'] == 'type_add')
{
echo $_POST['type_add'];
	$_SESSION['user_display_format']="block";
	if($_POST['type']!=NULL){
		$type = $_POST['type'];
		$result	= mysql_query("SELECT format_type_id , type FROM format_type WHERE obsolete!=1")or die(error_type(5000,"./admin.php"));
		$type_array=array();
		while ($rows=mysql_fetch_array($result)){
					$type_array[strtolower($rows['type'])] = $rows['format_type_id'];								
				}
				//print_r($cat_array);
				if (!$type_array[strtolower($type)]>0){
					mysql_query("INSERT INTO format_type (type) VALUES ('$type')")or die (error_type(5000,"./admin.php"));
					$_SESSION['com_mes_format']= $new_format_type_added;
					header('Location:admin.php');
				}else{
					$_SESSION['exist_mes_ex']= $format_type_already_exists;
					//header('Location:admin.php');
			}
	}else {
					$_SESSION['exist_mes_ex']= $empty_field;
					header('Location:admin.php');
			} 
}


/*
 * Removing a format type
 */
elseif ($_POST['pass_event'] == 'type_remove')
{
	$_SESSION['user_display_format']="block";
		$format_type = $_POST['format_type'];
		if($format_type!=1){
			mysql_query("UPDATE format_type SET obsolete='1' WHERE format_type_id='$format_type'")or die(error_type(5000,"./admin.php"));
			$_SESSION['com_mes_format']= $format_type_removed ;
			header('Location:admin.php');
		} else{
			$_SESSION['com_mes_format']= $cannot_remove;
			header('Location:admin.php');
		}
		
}


/*
 * Setting a extension with a format type
 */
elseif ($_POST['pass_event'] == 'set_type')
{
	$_SESSION['user_display_format']="block";
	if($_POST['format1']!=1 and $_POST['format_type1']!=1){
		$format			= $_POST['format1'];
		$format_type	= $_POST['format_type1'];
		$sql ="UPDATE format SET format_type_id=$format_type WHERE format_id=$format";
		$query = mysql_query($sql) or die (error_type(5000,"./admin.php"));
		$_SESSION['com_mes_format']= $format_type_set ;
		header('Location:admin.php');
	}
	else {
		$_SESSION['user_display_format']="block";
		$_SESSION['com_mes_format']= $misselection_format_type ;
		header('Location:admin.php');
	}
}


/*
** Function for notifying uncategorized file extensions
*/

function new_formats_notify(){
	
	global $uncategorized_extensions_notify;
	$query = mysql_query("SELECT format.name, format_type.format_type_id, format_type.obsolete, format.format_type_id from format_type inner join format on format_type.format_type_id = format.format_type_id WHERE format_type.obsolete=1 OR format.format_type_id=1") or die(error_type(5000,"./admin.php"));
	if(mysql_num_rows($query)>1){
	echo $uncategorized_extensions_notify;
	}


}

?>