<?
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
     //set IE read from page only not read from cache
     header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
     header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
     header ("Cache-Control: no-cache, must-revalidate");
     header ("Pragma: no-cache");

     header("content-type: application/x-javascript; charset=tis-620");

     $data=$_GET['data'];
     $val=$_GET['val'];

     
     if ($data=='catalog') {  // first dropdown
          echo "<select name='catalog' onChange=\"dochange('c_level_1', this.value);anable_catalog()\"  style='width: 15em;' onfocus='focus_catalog()'>\n";
          $result=mysql_db_query($dbname,"select `catalog_id`, `catalog_name` from catalog  WHERE obsolete=0 order by `catalog_id`");
          list($id, $name)=mysql_fetch_array($result);
          echo "<option value=\"$id\"  >Current List</option>\n";
          
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n";
          }
     } else if ($data=='c_level_1') { // second dropdown
          echo "<select name='c_level_1' onChange=\"dochange('c_level_2', this.value);anable_c_level_1()\"  style='width: 15em;' onfocus='focus_c_level_1()'>\n";
          echo "<option value='1'>Select a category above</option>\n";
		  $val2=$val;
          $val = substr($val,0,2);
          $result=mysql_db_query($dbname,"SELECT `c_1_id`, `name` FROM c_level_1 WHERE `catalog_c_1_id` = '$val' AND obsolete=0 ORDER BY `c_1_id` ");
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
	 }	else if ($data=='c_level_2') { // third dropdown
          echo "<select name='c_level_2' onChange=\"dochange('c_level_3', this.value);anable_c_level_2()\"  style='width: 15em;' onfocus='focus_c_level_2()'>\n";
          echo "<option value='1'>Select a category above</option>\n";
		  $val2=$val;
          $val = substr($val,0,4);
          $result=mysql_db_query($dbname,"SELECT `c_2_id`, `name` FROM c_level_2 WHERE `c_1_id` = '$val'  AND obsolete=0 ORDER BY `c_2_id` ");
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
		  
     }  else if ($data=='c_level_3') { // fourth dropdown
          echo "<select name='c_level_3' onChange=\"dochange('c_level_4', this.value);anable_c_level_3()\"  style='width: 15em;' onfocus='focus_c_level_3()'>\n";
          echo "<option value='1'>Select a category above</option>\n";
		  $val2=$val;
          $val = substr($val,0,6);
          $result=mysql_db_query($dbname,"SELECT `c_3_id`, `name` FROM c_level_3 WHERE `c_2_id` = '$val'  AND obsolete=0 ORDER BY `c_3_id` ");
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
		  
     }  else if ($data=='c_level_4') { // fifth dropdown
          echo "<select name='c_level_4' onChange=\"dochange('c_level_5', this.value);anable_c_level_4()\"  style='width: 15em;' onfocus='focus_c_level_4()'>\n";
          echo "<option value='1'>Select a category above</option>\n";
		  $val2=$val;
          $val = substr($val,0,8);
          $result=mysql_db_query($dbname,"SELECT `c_4_id`, `name` FROM c_level_4 WHERE `c_3_id` = '$val'  AND obsolete=0 ORDER BY `c_4_id` ");
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
		  
     }    else if ($data=='c_level_5') { // sixth dropdown
          echo "<select name='c_level_5'  style='width: 15em;' onfocus='anable_c_level_5()'>\n";
          echo "<option value='1'>Select a category above</option>\n";
		  $val2=$val;
          $val = substr($val,0,8);
          $result=mysql_db_query($dbname,"SELECT `c_5_id`, `name` FROM c_level_5 WHERE `c_4_id` = '$val'  AND obsolete=0 ORDER BY `c_5_id` ");
          while(list($id, $name)=mysql_fetch_array($result)){
               echo "<option value=\"$id\" >$name</option> \n" ;
          }
		  
     }
     echo "</select>\n";
	 


?>