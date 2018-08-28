<?php

$server = 'localhost';
$username = 'root';
$password = '';
$dbName = 'relm';

$con=mysqli_connect($server,$username,$password,$dbName);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


?>