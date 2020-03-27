<!--
  *@file
  *this file is basically is working database connectivity file.
 -->
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "mysql1";
$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
?>
