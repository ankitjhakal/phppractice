<!--
  * @file
	* this file basically used to delete blogs according to blogid.
 -->
<?php

include 'blogconnection.php';

if(isset($_GET['blog_no']) && $_GET['blog_no'] != "") {
	$blog_no = $_GET['blog_no'];
}
else {
	$blog_no = 1;
}
if(isset($_SESSION['username'])) {
	$action = $_GET['action'];
	$url_arr = explode('/',$action);
	$blog_no = explode('"',$url_arr[2]);
	$blog_no = $blog_no[0];
  $sql = "DELETE FROM `blog` WHERE bid='".$blog_no."'";
  $result = mysqli_query($conn, $sql);
  header('location: ../myblogs');
}
?>
