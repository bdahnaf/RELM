<?php 
@session_start();
//require_once 'config.php';
//check_access($action_id[1]);
//require_once "$language/upload.php";

//$name=$_SESSION['name'];
//$confirm_mes=$_SESSION['confirm_mes'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/LOR.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>eNOSHA - Installation</title>
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
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="../../css/upload.css" />
<script type="text/javascript" src="../javascript/upload.js"></script>
<!-- InstanceEndEditable -->
<body>
<div id="wrap">
  <div id="header">
  <!-- InstanceBeginEditable name="ul" -->
    <ul id="nav">
</ul>
    <!-- InstanceEndEditable -->
  </div>
  <!-- /header -->
  <div id="con">
    <div id="inner">
      <div class="left floatl3"><!-- InstanceBeginEditable name="EditRegion8" -->
      <div id="helpdiv" style="display:block">
      <form id="form1" name="form1" method="post" action="lib/install.php">
        <table width="700" border="0">
          <tr>
            <td width="169">Database Host</td>
            <td width="521"><label>
              <input type="text" name="dbhost" id="dbhost" />
            </label></td>
          </tr>
          <tr>
            <td>Database User</td>
            <td><label>
              <input type="text" name="dbuser" id="dbuser" />
            </label></td>
          </tr>
          <tr>
            <td>Database Pass</td>
            <td><label>
              <input type="password" name="dbpass" id="dbpass" />
            </label></td>
          </tr>
          <tr>
            <td>Database Name</td>
            <td><label>
              <input type="text" name="dbname" id="dbname" />
            <i>(e.g: enosha)</i></label></td>
          </tr>
          <tr>
            <td>Webroot</td>
            <td><label>
              <input type="text" name="webroot" id="webroot" />
              <i>            (e.g. /var/www/html/enosha)</i></label></td>
          </tr>
          <tr>
            <td>Web URL</td>
            <td><label>
              <input type="text" name="weburl" id="weburl" />
              <i>(e.g: http://mysite/enosha)</i></label></td>
          </tr>
           <tr>
             <td>&nbsp;</td>
             <td align="right"><input type="submit" name="proceed" id="proceed" value="Proceed"/></td>
           </tr>
        </table>
        
        </form>
        </div>
        
        

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
