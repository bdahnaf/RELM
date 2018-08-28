<script language="javascript">

var xmlHttp

function catalogType(str,vari)
{ 

			xmlHttp=GetXmlHttpObject()
			if (xmlHttp==null)
			 {
			 alert ("Browser does not support HTTP Request")
			 return
			 }
			  vari1=vari
				switch(vari1){
					case 1:
					posi="c_level_1";
					document.getElementById('c_level_2').innerHTML="<?php echo  "<option></option>"; ?>";
					document.getElementById('c_level_3').innerHTML="<?php echo  "<option></option>"; ?>";
					document.getElementById('c_level_4').innerHTML="<?php echo  "<option></option>"; ?>";
					document.getElementById('c_level_5').innerHTML="<?php echo  "<option></option>"; ?>";
					break;
					
					case 2:
					posi="c_level_2";
					document.getElementById('c_level_3').innerHTML="<?php echo  "<option></option>"; ?>";
					document.getElementById('c_level_4').innerHTML="<?php echo  "<option></option>"; ?>";
					document.getElementById('c_level_5').innerHTML="<?php echo  "<option></option>"; ?>";
					break;
					
					case 3:
					posi="c_level_3";
					document.getElementById('c_level_4').innerHTML="<?php echo  "<option></option>"; ?>";
					document.getElementById('c_level_5').innerHTML="<?php echo  "<option></option>"; ?>";
					break;
					
					case 4:
					posi="c_level_4";
					document.getElementById('c_level_5').innerHTML="<?php echo  "<option></option>"; ?>";
					break;
					
					case 5:
					posi="c_level_5";
					break;
					
					case 6:
					posi="ext";
					break;

					
				}
			 
			
				var url="../../ajax.php"
				url=url+"?q"+vari+"="+str
				url=url+"&sid="+Math.random()
				xmlHttp.onreadystatechange=stateChanged 
				xmlHttp.open("GET",url,true)
				xmlHttp.send(null)
}


function stateChanged() 
{ 
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
			 { 
			  document.getElementById(posi).innerHTML=xmlHttp.responseText;
			   
			 if(document.getElementById(posi).value==''){
			 
			 i=vari1;
				if(i==6){
					document.getElementById(posi).disabled=true;
				}
				else
				{
					while(i<6){
						posi="cat"+i+"_type_drop";
						document.getElementById(posi).disabled=true;
						i++;
					}
				}
			  }else{
				 document.getElementById(posi).disabled=false;
		 }
		 
	 }
}

function GetXmlHttpObject() {

			var xmlHttp=null;
			try
				 {
				 // Firefox, Opera 8.0+, Safari
				 xmlHttp=new XMLHttpRequest();
				 }
					catch (e)
				 {
				 //Internet Explorer
				 try
				  {
				  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
				 catch (e)
				  {
				  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
		 }
		
		return xmlHttp;
}

</script>

<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
$name=$_SESSION['name'];

require_once '../../config.php';
check_access($action_id[4]);
require_once "$language/admin.php";
require_once 'format_action.php';
require_once './backup/backup_info.php';

		$com_mes=$_SESSION['com_mes'];
		$com_mes_format=$_SESSION['com_mes_format'];
		$com_mes_lang=$_SESSION['com_mes_lang'];
		$com_mes_act=$_SESSION['com_mes_act'];
		$com_mes_local=$_SESSION['com_mes_local'];
		$exist_cata=$_SESSION['exist_mes'];
		$exist_ex=$_SESSION['exist_mes_ex'];
		$exist_lan=$_SESSION['exist_mes_lan'];
		$exist_act=$_SESSION['exist_mes_act'];
		$exist_local=$_SESSION['exist_mes_local'];
		$com_mod = $_SESSION['com_mes_mod'];
		$backup_mes=$_SESSION['backup_mes'];
		if($_SESSION['user_display_cata']==""){
			$userDisplay_cata="none";
		}else{
			$userDisplay_cata=$_SESSION['user_display_cata'];
		}
		if($_SESSION['user_display_format']==""){
			$userDisplay_format="none";
		}else{
			$userDisplay_format=$_SESSION['user_display_format'];
		}
		if($_SESSION['user_display_lang']==""){
			$userDisplay_lang="none";
		}else{
			$userDisplay_lang=$_SESSION['user_display_lang'];
		}
		if($_SESSION['user_display_act']==""){
			$userDisplay_act="none";
		}else{
			$userDisplay_act=$_SESSION['user_display_act'];
		}
		if($_SESSION['user_display_target']==""){
			$userDisplay_target="none";
		}else{
			$userDisplay_target=$_SESSION['user_display_target'];
		}
		if($_SESSION['user_display_mod']==""){
			$userMod_target="none";
		}else{
			$userMod_target=$_SESSION['user_display_mod'];
		}
		if($_SESSION['backup_mes']==""){
			$userDisplay_backup="none";
		}else{
			$userDisplay_backup=$_SESSION['backup_mes'];
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/LOR.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>eNOSHA - Administration Panel</title>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="../../css/reset.css" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<style type="text/css" >
.Layer8{
	width:750px;
    background-color: #ffffff;
}
</style>

</head>
<!-- InstanceBeginEditable name="JS" -->
<link rel="stylesheet" type="text/css" href="../../css/admin.css" />
<script type="text/javascript" src="../javascript/admin.js"></script>
<!-- InstanceEndEditable -->
<body>
<div id="wrap">
  <div id="header">
  <!-- InstanceBeginEditable name="ul" -->
    <ul id="nav">
      <?php 
	  
			 print_navbar();
	   
	   ?>
    </ul>
    <!-- InstanceEndEditable -->
  </div>
  <!-- /header -->
  <div id="con">
    <div id="inner">
      <div class="left floatl3"><!-- InstanceBeginEditable name="EditRegion8" -->
        <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////// -->
       <body onload="init()">
        <p><a href="../../index.php"><?php echo $home ?></a> <img src="../../images/insert.jpg" alt="link" width="12" height="11" /> <?php echo $administration ?></font></p>
        <p align="right">
          <?php logged_in_user() ?>
        </p>
        <!-- method located in lib/action -->
        <br />
        <div class="Header"><?php echo $perform_a_task ?></div>
        <br/>
        <table class="ContentArea">
          <tr class="BlueHeader" onclick="toggleCat();">
            <th  colspan="2" scope="row"><font style="font-weight:900" ><?php echo $add_categories_title ?></font></th>
            <td align="right"><a id="displayEdu" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a></td>
          </tr>
        </table>
        <div id="category" style="display:<?php echo $userDisplay_cata;?>">
          <form id="form1" name="form1" method="post" action="category_action.php">
            <table width="800" border="0" class=ContentArea  cellpadding="5" cellspacing="10">
              <tr align="center"><?php echo "<b>".$exist_cata."</b>"; ?><?php echo "<b>".$com_mes."</b>";?></tr>
              <tr>
                <td width="170"><?php echo $add_category ?></td>
                <td><?php
						echo  "<select name='catalog1' id='catalog1' onchange='catalogType(this.value,1)'  style='width: 12em;' onfocus='focus_catalog()' \">";
						$quer=mysql_query("SELECT `catalog_id`, `catalog_name` FROM catalog WHERE obsolete=0 order by `catalog_id`");
						if($noticia = mysql_fetch_array($quer)){
						echo "<option value='1'>Select a Subcategory</option>";
						while($noticia = mysql_fetch_array($quer)) {
							echo "<option value='$noticia[catalog_id]'>$noticia[catalog_name]</option>";
						}
					}

				echo  "</select><br>";
        		?> 
                </td>
                <td><label>
                  <input type="text" name="category_new" id="category_new" />
                  <input type="checkbox" id="external_check" name="external_check" title="Make External?"/> </label></td>
                 <td><label>
                  <input type="button" name="cat_add" id="cat_add" value="+Add"  onclick="validate_cata_subcata('cat_add');"/>
                  
                  </label></td>
                  <td><label>
                  <input type="button" name="cat_edit" id="cat_edit" value="Edit" onclick="target_popup(form1,0);"/>
                  </label></td>
                <td><label>
                  <input type="button" name="cat_remove" id="cat_remove" value="-Remove" onclick="validate_cata_subcata('cat_remove');"/>
                  </label></td>
              </tr>
              <tr>
                <td width="170"><?php echo $add_level1 ?></td>
                <td><?php
						echo  "<select name='c_level_1' id='c_level_1' onchange='catalogType(this.value,2)' style='width: 12em;' disabled='true' onfocus='focus_c_level_1()' \">";
						echo  "<option></option>";
						echo  "</select><br>";
				 ?>
                </td>
                <td><label>
                  <input type="text" name="level_1" id="level_1" disabled/>
                  </label></td>
                 <td><label>
                  <input type="button" name="lev1_add" id="lev1_add" value="+Add" onclick="validate_cata_subcata('lev1_add');"/>
                  </label></td>
                  <td><label>
                  <input type="button" name="lev1_edit" id="lev1_edit" value="Edit" onclick="target_popup(form1,1);"/>
                  </label></td>

                <td><label>
                  <input type="button" name="lev1_remove" id="lev1_remove" value="-Remove" onclick="validate_cata_subcata('lev1_remove');"/>
                  </label></td>
              </tr>
              <tr>
                <td width="170"><?php echo $add_level2 ?></td>
                <td><?php
						echo  "<select name='c_level_2' id='c_level_2' onchange='catalogType(this.value,3)' style='width: 12em;' disabled='true' onfocus='focus_c_level_2()' \">";
						echo  "<option></option>";
						echo  "</select><br>";
				?></td>
                <td><label>
                  <input type="text" name="level_2" id="level_2" disabled/>
                  </label></td>
                <td><label>
                  <input type="button" name="lev2_add" id="lev2_add" value="+Add" onclick="validate_cata_subcata('lev2_add');"/>
                  </label></td>
                    <td><label>
                  <input type="button" name="lev2_edit" id="lev2_edit" value="Edit" onclick="target_popup(form1,2);"/>
                  </label></td>

                <td><label>
                  <input type="button" name="lev2_remove" id="lev2_remove" value="-Remove" onclick="validate_cata_subcata('lev2_remove');"/>
                  </label></td>
              </tr>
              <tr>
                <td width="170"><?php echo $add_level3 ?></td>
                <td><?php
						echo  "<select name='c_level_3' id='c_level_3' onchange='catalogType(this.value,4)' style='width: 12em;' disabled='true' onfocus='focus_c_level_3()' \">";
						echo  "</select><br>";
	 			?>
                </td>
                <td><label>
                  <input type="text" name="level_3" id="level_3" disabled/>
                  </label></td>
                <td><label>
                  <input type="button" name="lev3_add" id="lev3_add" value="+Add" onclick="validate_cata_subcata('lev3_add');"/>
                  </label></td>
                   <td><label>
                  <input type="button" name="lev3_edit" id="lev3_edit" value="Edit" onclick="target_popup(form1,3);"/>
                  </label></td>

                <td><label>
                  <input type="button" name="lev3_remove" id="lev3_remove" value="-Remove" onclick="validate_cata_subcata('lev3_remove');"/>
                  </label></td>
              </tr>
              <tr>
                <td width="170"><?php echo $add_level4 ?></td>
                <td><?php
				echo  "<select name='c_level_4' id='c_level_4' onchange='catalogType(this.value,5)' style='width: 12em;' disabled='true' onfocus='focus_c_level_4()' \">";
				echo  "</select><br>";
   		    	?>
                </td>
                <td><label>
                  <input type="text" name="level_4" id="level_4" disabled/>
                  </label></td>
                <td><label>
                  <input type="button" name="lev4_add" id="lev4_add" value="+Add" onclick="validate_cata_subcata('lev4_add');"/>
                  </label></td>
                 <td><label>
                  <input type="button" name="lev4_edit" id="lev4_edit" value="Edit" onclick="target_popup(form1,4);"/>
                  </label></td>

                <td><label>
                  <input type="button" name="lev4_remove" id="lev4_remove" value="-Remove" onclick="validate_cata_subcata('lev4_remove');"/>
                  </label></td>
              </tr>
              <tr>
                <td width="170"><?php echo $add_level5 ?></td>
                <td><?php
				echo  "<select name='c_level_5' id='c_level_5'  style='width: 12em;' disabled='true' onfocus='focus_c_level_5()' \">";
				echo  "</select><p><p>";
   		    	?>
                </td>
                <td><label>
                  <input type="text" name="level_5" id="level_5" disabled/>
                  </label></td>
                <td><label>                  
                  <input type="button" name="lev5_add" id="lev5_add" value="+Add" onclick="validate_cata_subcata('lev5_add');"/>
                  </label></td>
                  <td><label>
                  <input type="button" name="lev5_edit" id="lev5_edit" value="Edit" onclick="target_popup(form1,5);"/>
                  </label></td>

                <td><label>
                  <input type="hidden" name="pass_cata" id="pass_cata" value="+Add"/>
                  <input type="button" name="lev5_remove" id="lev5_remove" value="-Remove" onclick="validate_cata_subcata('lev5_remove');"/>
                  </label></td>
              </tr>
            </table>
          </form>
        </div>
        <!-- //////////////////////////////////////////Setting the Format Types////////////////////////////////////////////////// -->
        <div id="Layer2">
        <table class="ContentArea">
          <tr class="BlueHeader"onclick="toggleFormats();">
            <th colspan="2" scope="row"><font style="font-weight:bold"><?php echo $set_file_types ?></font></th>
            <td align="right"><a id="displayEdu2" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a></td>
          </tr>
        </table>
        <div id="formats" style="display: <?php echo $userDisplay_format; ?>">
        <table class="ContentArea">
        <form id="form2" name="form2" method="post" action="format_action.php">
          <table width="650" border="0" class=ContentArea  cellpadding="5" cellspacing="10">
            <tr align="center"><?php echo  "<b>".$exist_ex."</b>"; ?><?php echo "<b>".$com_mes_format."</b>"; ?></tr>
            <tr>
              <td width="115"><?php echo $add_extension ?></td>
              <td width="150"><label>
                <input type="text" name="extension" id="extension" />
                </label></td>
              <td width="50"><label>
                 <input type="button" name="ext_add" id="ext_add" value="+Add" onclick="validate_type_ex_re('ext_add');"/>
                </label></td>
              <td width="167" align="right"><?php echo $current_list ?>
                <?php

			//for selecting the extensions
			$result=mysql_query("SELECT * FROM format ORDER BY name")or die(error_type(5000,"./admin.php"));
			echo '<select name="format" style="width: 8em;">';
			$row = mysql_fetch_array( $result );
			echo '<option value="' . $row['format_id'] .'" selected="selected">' . $row['name'] .'</option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['format_id'] .'">' . $row['name'] .'</option>';
			}
		echo '</select>';
		?></td>
            </tr>
            <tr>
              <td><?php echo $add_generic_type ?></td>
              <td><label>
                <input type="text" name="type" id="type" />
                </label></td>
              <td width="200"><label>
                <input type="button" name="type_add" id="type_add" value="+Add" onclick="validate_type_ex_re('type_add');"/>
                </label></td>
              <td align="right"><?php echo $current_list ?>
                <?php

			//for selecting the format types
			$result=mysql_query("SELECT * FROM format_type WHERE obsolete=0")or die(error_type(5000,"./admin.php"));
			echo '<select name="format_type" style="width: 8em;">';
			$row = mysql_fetch_array( $result );
			echo '<option value="' . $row['format_type_id'] .'" selected="selected">' . $row['type'] .'</option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['format_type_id'] .'">' . $row['type'] .'</option>';
			}
		echo '</select>';
		?>
              </td>
              <td><label>
                <input type="hidden" name="pass_event" id="pass_event" value="-Remove" />
                <input type="button" name="type_remove" id="type_remove" value="-Remove" onclick="validate_type_ex_re('type_remove');"/>
                </label></td>
            </tr>
          </table>
          <table width="650" border="0" class=ContentArea cellpadding="5" cellspacing="10">
            <tr>
              <td><font color="#FF0000">
                <?php new_formats_notify(); //function located in format_action.php ?>
                </font></td>
            </tr>
            <tr>
              <td width="450"><?php echo $set_extensions_with_types ?></td>
              <td width="99" align="right"><?php

			//for selecting the extensions
			$result=mysql_query("SELECT format.name, format_type.format_type_id, format_type.obsolete, format.format_type_id, format.format_id from format_type inner join format on format_type.format_type_id = format.format_type_id WHERE format_type.obsolete=1 OR format.format_type_id=1") or die(error_type(5000,"./admin.php"));
			
			echo '<select name="format1"  style="width: 8em;">';
			$row = mysql_fetch_array( $result );
			echo '<option value="' . $row['format_id'] .'" selected="selected">' . $row['name'] .'</option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['format_id'] .'">' . $row['name'] .'</option>';
			}
		echo '</select>';
		?>
              <td width="91"><label>
                <?php

			//for selecting the format types
			$result=mysql_query("SELECT * FROM format_type WHERE obsolete!=1") or die(error_type(5000,"./admin.php"));
			echo '<select name="format_type1" style="width: 8em;">';
			$row = mysql_fetch_array( $result );
			echo '<option value="' . $row['format_type_id'] .'" selected="selected">' . $row['type'] .'</option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['format_type_id'] .'">' . $row['type'] .'</option>';
			}
		echo '</select>';
		?>
                </label></td>
              <td width="327"><label>
                 <input type="button" name="set_type" id="set_type" value="Set Type" onclick="validate_type_ex_re('set_type');"/>
                </label></td>
            </tr>
          </table>
        </form>
        </div>
        </div>
        <!-- //////////////////////////////////////Toggle Language///////////////////////////////////////// -->
        <div id="Layer3">
        <table class="ContentArea">
          <tr  class="BlueHeader"onclick="toggleLang();">
            <th colspan="2" scope="row"><font style="font-weight:bold"><?php echo $add_languages_title ?></font></th>
            <td align="right"><a id="displayEdu3" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a></td>
          </tr>
        </table>
        <div id="lang" style="display: <?php echo $userDisplay_lang; ?>">
        <table class="ContentArea">
        <form id="form3" name="form3" method="post" action="general_action.php">
          <table width="650" border="0" class=ContentArea cellpadding="10" cellspacing="10">
            <tr align="center"><?php echo "<b>".$exist_lan."</b>"; ?><?php echo "<b>".$com_mes_lang."</b>"; ?></tr>
            <tr>
              <td width="162"><?php echo $add_language ?></td>
              <td><label>
                <input type="text" name="lang" id="lang" />
                </label>
               <input type="button" name="add_lang" id="add_lang" value="+Add" onclick="validate_language('add_lang');"/></td>
              <td align="right"><?php echo $current_list ?>
                <?php

			//for selecting the format types
			$result=mysql_query("SELECT * FROM language WHERE obsolete=0")or die(error_type(5000,"./admin.php"));
			echo '<select name="language" style="width: 8em;">';
			$row = mysql_fetch_array( $result );
			echo '<option value="' . $row['lang_id'] .'" selected="selected">' . $row['language'] .'</option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['lang_id'] .'">' . $row['language'] .'</option>';
			}
		echo '</select>';
		?>
              </td>
              <td  align="right"><label>
               <input type="button" name="lang_remove" id="lang_remove" value="-Remove" onclick="validate_language('lang_remove');"/>
                </label></td>
            </tr>
            <tr><td></td><td></td>
            <td align="right"><?php echo $obsolete_list ?>
            <?php 
			$result=mysql_query("SELECT * FROM language WHERE obsolete=1")or die(error_type(5000,"./admin.php"));
			echo '<select name="language_obsolete" style="width: 8em;">';
			echo '<option value="1" selected="selected"></option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['lang_id'] .'">' . $row['language'] .'</option>';
			}
		echo '</select>';
		?>
            </td>
             <td align="right"><label>
                <input type="hidden" name="pass_lang" id="pass_lang" value="+Activate"/>
                <input type="button" name="lang_activate" id="lang_activate" value="+Activate" onclick="validate_language('lang_activate');"/>
                </label></td>
          </table>
        </form>
        </div>
        </div>
        <!-- //////////////////////////////////////Toggle Activity Types///////////////////////////////////////// -->
        <div id="Layer4">
        <table class="ContentArea">
          <tr class="BlueHeader"onclick="toggleActivity();">
            <th colspan="2" scope="row"><font style="font-weight:bold"><?php echo $add_activity_types_title ?></font></th>
            <td align="right"><a id="displayEdu4" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a></td>
          </tr>
        </table>
        <div id="activity" style="display: <?php echo $userDisplay_act; ?>">
        <table class="ContentArea">
        <form id="form4" name="form4" method="post" action="general_action.php">
          <table width="650" border="0" class=ContentArea  cellpadding="10" cellspacing="10">
            <tr align="center"><?php echo "<b>".$exist_act."</b>"; ?><?php echo "<b>".$com_mes_act."</b>"; ?></tr>
            <tr>
              <td width="160"><?php echo $add_activity_type ?></td>
              <td><label>
                <input type="text" name="activity" id="activity" />
                </label>
               <input type="button" name="add_activity" id="add_activity" value="+Add" onclick="validate_activity('add_activity');"/></td>
              <td align="right">Current List
                <?php

			//for selecting the format types
			$result=mysql_query("SELECT * FROM interactivity_type WHERE obsolete=0")or die(error_type(5000,"./admin.php"));
			echo '<select name="activity_drop" style="width: 8em;">';
			$row = mysql_fetch_array( $result );
			echo '<option value="' . $row['interactivity_id'] .'" selected="selected">' . $row['interactivity_name'] .'</option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['interactivity_id'] .'">' . $row['interactivity_name'] .'</option>';
			}
		echo '</select>';
		?>
              </td>
              <td  align="right"><label>
                <input type="button" name="act_remove" id="act_remove" value="-Remove" onclick="validate_activity('act_remove');"/>
                </label></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td align="right"><?php echo $obsolete_list ?>
                <?php 
			//for selecting the format types
			$result=mysql_query("SELECT * FROM interactivity_type WHERE obsolete=1")or die(error_type(5000,"./admin.php"));
			echo '<select name="activity_obsolete_drop" style="width: 8em;">';
			echo '<option value="1" selected="selected"></option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['interactivity_id'] .'">' . $row['interactivity_name'] .'</option>';
			}
			echo '</select>';
			?>
              </td>
              <td align="right"><label>
                <input type="hidden" name="pass_activity" id="pass_activity" value="+Activate"/>
                <input type="button" name="activity_activate" id="activity_activate" value="+Activate" onclick="validate_activity('activity_activate');"/>
                </label></td>
          </table>
        </form>
        </div>
        </div>
        <!-- //////////////////////////////////////Toggle Localization///////////////////////////////////////// -->
        <div id="Layer5">
        <table class="ContentArea">
          <tr class="BlueHeader" onclick="toggleLocal();">
            <th colspan="2" scope="row"><font style="font-weight:bold"><?php echo $add_target_regions_title ?></font></th>
            <td align="right"><a id="displayEdu5" style="font-size:12px" onmouseover="this.style.cursor='pointer';"><?php echo $show ?></a></td>
          </tr>
        </table>
        <div id="local" style="display: <?php echo $userDisplay_target; ?>">
        <table class="ContentArea">
        <form id="form5" name="form5" method="post" action="general_action.php">
          <table width="650" border="0" class=ContentArea  cellpadding="10" cellspacing="10">
            <tr align="center"><?php echo "<b>".$exist_local."</b>"; ?><?php echo "<b>".$com_mes_local."</b>"; ?></tr>
            <tr>
              <td width="160"><?php echo $add_target_region ?></td>
              <td><label>
                <input type="text" name="localization" id="localization" />
                </label>
               <input type="button" name="add_local" id="add_local" value="+Add" onclick="validate_localization('add_local');"/></td>
              <td align="right"><?php echo $current_list; ?>
                <?php

			//for selecting the format types
			$result=mysql_query("SELECT * FROM localization WHERE obsolete=0")or die(error_type(5000,"./admin.php"));
			echo '<select name="localization_drop" style="width: 8em;">';
			$row = mysql_fetch_array( $result );
			echo '<option value="' . $row['localization_id'] .'" selected="selected">' . $row['lo_name'] .'</option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['localization_id'] .'">' . $row['lo_name'] .'</option>';
			}
		echo '</select>';
		?>
              </td>
              <td align="right"><label>
                <input type="button" name="region_remove" id="region_remove" value="-Remove" onclick="validate_localization('region_remove');"/>
                </label></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td align="right"><?php echo $obsolete_list ?>
                <?php

			//for selecting the format types
			$result=mysql_query("SELECT * FROM localization WHERE obsolete=1")or die(error_type(5000,"./admin.php"));
			echo '<select name="localization_obsolete_drop" style="width: 8em;">';
			echo '<option value="1" selected="selected"></option>';

			while($row = mysql_fetch_array( $result )) {
			echo '<option value="' . $row['localization_id'] .'">' . $row['lo_name'] .'</option>';
			}
		echo '</select>';
		?></td>
              <td align="right"><label>
              	<input type="hidden" name="pass_region" id="pass_region" value="+Activate" />
                <input type="button" name="region_activate" id="region_activate" value="+Activate" onclick="validate_localization('region_activate');"/>
                </label></td>
            </tr>
          </table>
        </form>
        </div>
        </div>
        <!-- ///////////////////////////////////////// Add Modules ///////////////////////////////////////// -->
        <?php
        if($_SESSION['type_name']==$userType[1]){
		echo "<table class='ContentArea'>";
        echo "<tr class='BlueHeader' onclick='toggleMod();'>"; 
		echo "<th colspan='2' scope='row'><font style='font-weight:bold'>".$add_module."</font></th>";
		echo "<td align='right'><a id='displayEdu7' style='font-size:12px' onmouseover='this.style.cursor='pointer';'>";
		echo $show."</a></td>";
		echo "</tr>";
        echo "</table>";
		echo "<div id='mod' style='display: $userMod_target'>";
        echo "<table class='ContentArea'>";	
		echo "<form method='post' action='general_action.php'>";
		echo "<table width='650' border='0' class='ContentArea'  cellpadding='10' cellspacing='10'>";
		echo "<tr align='center'><b>".$com_mod."</b></tr>";
        echo "<tr><td valign='top' width='160'>".$mod_name."</td><td align='left'><input type='text' name='mod_name' id='mod_name'></td><td align=right>".$current_list." ";
		$result=mysql_query("SELECT * FROM user_action")or die(error_type(5000,'./admin.php'));
		echo '<select name="module_drop" id="module_drop" style="width: 8em;">';
		$row = mysql_fetch_array( $result );
		echo '<option value="' . $row['id'] .'" selected="selected">' . $row['action'] .'</option>';

		while($row = mysql_fetch_array( $result )) {
		echo '<option value="' . $row['id'] .'">' . $row['action'] .'</option>';
		}
		echo '</select>';
		echo "<td align='left'><input type='submit' value='Edit' name='mod_edit_button' id='mod_edit_button'></td>";
		echo "</tr>";
		echo "<tr><td valign='top' width='160'>".$mod_url."</td><td align='left'><input type='text' name='mod_url' id='mod_url'></td><td align=right><input type='text' name='mod_edit' id='mod_edit'></td><td><input type='submit' value='Save' name='mod_save' id='mod_save'></td></tr>";
        echo "<tr><td></td><td><input type='submit' value='Add' name='mod_add' id='mod_add'></td></tr>";
		echo "</table></form></div>";
		}
		?>
        
        <!-- ///////////////////////////////////////// View Feedback ///////////////////////////////////////// -->

        
                <?php
        if($_SESSION['type_name']==$userType[1]){
		echo "<table class='ContentArea'>";
        echo "<tr class='BlueHeader' onclick='toggleFeedback();'>"; 
		echo "<th colspan='2' scope='row'><font style='font-weight:bold'>".$view_feedback."</font></th>";
		echo "<td align='right'><a id='displayEdu8' style='font-size:12px' onmouseover='this.style.cursor='pointer';'>";
		echo $show."</a></td>";
		echo "</tr>";
        echo "</table>";
		echo "<div id='feed' style='display:none'>";
        echo "<table class='ContentArea'>";	
		echo "<form method='post' action='general_action.php'>";
		echo "<table width='650' border='0' class='ContentArea'  cellpadding='10' cellspacing='10'>";
		echo "<tr align='center'><b>".$com_mod."</b></tr>";
		echo "<tr><td><a href='../feedback/feedback_show.php'>".$show."</a></td></tr>";
		echo "</table></form></div>";
		}
		?>
        
        

        
        <!-- ////////////////////////////////////// System Backup ///////////////////////////////////////// -->
        <?php
        if($_SESSION['type_name']==$userType[1]){
		echo "<table class='ContentArea'>";
        echo "<tr class='BlueHeader' onclick='toggleBackUp();'>"; 
		echo "<th colspan='2' scope='row'><font style='font-weight:bold'>".$system_backup."</font></th>";
		echo "<td align='right'><a id='displayEdu6' style='font-size:12px' onmouseover='this.style.cursor='pointer';'>";
		echo $show."</a></td>";
		echo "</tr>";
        echo "</table>";
		echo "<div id='backup' style='display: $userDisplay_backup'>";
        echo "<table class='ContentArea'>";
		echo "<table width='650' border='0' class='ContentArea'  cellpadding='10' cellspacing='10'>";
        echo "<tr><td valign='top'>".$backup_notice."</td><td align=center><img src='../../images/backup.png'></td></tr>";
		echo "<form method='post' action='backup/backup_data.php'><tr><td>$nbsp</td><td align=center><input type='submit' value='Backup Data'></td></tr></form>";
        echo "<tr><td></td><td align=center><b>".$backup_mes."</b></td></tr>";
		echo "<tr><td>".display_backup_info()."</td></tr><tr><td><br><iframe src='backup/backup_list.php' width='500'></iframe></td></tr>";
		echo "</table></div>";
		}
		?>
        <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <br>
        <br>
        <br>
        <!-- InstanceEndEditable -->
      </div>
      <div class="right folat-r"></div>
    </div>
  </div>
  <!-- /content -->

  <div id="footer"><div align="center">
   
    <p id="copyright"> eNOSHA  is Free Software released under the GNU/GPL License.<br/>
    </p>
  </div></div>

  <!-- /footer -->
</div>
</body>
<!-- InstanceEnd --></html>
<?php
unset($_SESSION['com_mes']);
unset($_SESSION['com_mes_format']);
unset($_SESSION['com_mes_lang']);
unset($_SESSION['com_mes_act']);
unset($_SESSION['com_mes_local']);
unset($_SESSION['exist_mes']);
unset($_SESSION['exist_mes_ex']);
unset($_SESSION['exist_mes_lan']);
unset($_SESSION['exist_mes_act']);
unset($_SESSION['exist_mes_local']);
unset($_SESSION['user_display_cata']);
unset($_SESSION['user_display_format']);
unset($_SESSION['user_display_lang']);
unset($_SESSION['user_display_act']);
unset($_SESSION['user_display_target']);
unset($_SESSION['user_display_mod']);
unset($_SESSION['com_mes_mod']);
unset($_SESSION['backup_mes']);

 ?>
