<?php
@session_start();
$_SESSION['file'] =addslashes(__FILE__);
require_once '../../config.php';
check_access($action_id[4]);

$userDisplay="none";
$titleDisplay="show";
if (isset($_POST['user_search'])){

$userDisplay="block";
$titleDisplay="hide";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/LOR.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Administration Panel</title>
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
<script language="JavaScript" type="text/JavaScript">
function toggleCat() {
	var ele = document.getElementById("category");
	var text = document.getElementById("displayEdu");
	if(ele.style.display == "block") {
    	ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
}

function toggleFormats(){
	var ele = document.getElementById("formats");
	var text = document.getElementById("displayEdu2");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
}

function toggleUser() {

	var ele = document.getElementById("users");
	var text = document.getElementById("displayEdu6");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
}

function toggleLang() {

	var ele = document.getElementById("lang");
	var text = document.getElementById("displayEdu3");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
}

function toggleActivity() {

	var ele = document.getElementById("activity");
	var text = document.getElementById("displayEdu4");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
}

function toggleLocal() {

	var ele = document.getElementById("local");
	var text = document.getElementById("displayEdu5");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		text.innerHTML = "show";
  	}
	else {
		ele.style.display = "block";
		text.innerHTML = "hide";
	}
}

function Inint_AJAX() {
	   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
	   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
	   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
	   alert("XMLHttpRequest not supported");
	   return null;
	};

	function dochange(src, val) {
	     var req = Inint_AJAX();
	     req.onreadystatechange = function () {
	          if (req.readyState==4) {
	               if (req.status==200) {
	                    document.getElementById(src).innerHTML=req.responseText; //retuen value
	               }
	          }
	     };
	     req.open("GET", "category.php?data="+src+"&val="+val); //make connection
	     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1"); // set Header
	     req.send(null); //send value
	}

	window.onLoad=dochange('catalog', -1);         // value in first dropdown

//==========================================END JAVASCRIPT//==========================================
</script>
<!-- InstanceEndEditable -->
<body>
<div id="wrap">
  <div id="header">
  <!-- InstanceBeginEditable name="ul" -->
    <ul id="nav">
    <?php 
	  
 if($_SESSION['type_id']!=null){
 echo "<li><a href='../../index.php'>Home</a></li>";}
 
 //create query
$query="SELECT action_id FROM user_right WHERE usertype_id='".$_SESSION['type_id']."'";

//execute the query
$result=mysql_query($query) or die("Eror in quary: $qurey.".mysql_error());

while($row=mysql_fetch_array($result)){
			
			$query_2="SELECT action, action_url FROM user_action WHERE id='$row[0]'"; 
			$result_2=mysql_query($query_2);
			$row_2=mysql_fetch_row($result_2);
			echo "<li><a href='".$weburl." $row_2[1]'>$row_2[0]</a></li>";		
		}
		
if($_SESSION['type_id']!=null){
echo "<li><a href='../login/logout.php'>Logout</a></li>";}
	   
	   ?>
    </ul><!-- InstanceEndEditable -->
  </div>
  <!-- /header -->
  <div id="con">
    <div id="inner">
      <div class="left floatl3"><!-- InstanceBeginEditable name="EditRegion8" -->
      
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
