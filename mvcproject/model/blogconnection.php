<!--
  * @file
  * This file is basically is working database connectivity file.
 -->
<?php

$host = "vh.com";
$user = "root";
$pass = "";
$db = "mysql1";
$con = mysqli_connect($host, $user, $pass, $db);

if(!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
