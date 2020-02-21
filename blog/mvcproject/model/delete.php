<!--
  * @file
	* this file basically used to delete blogs according to blogid.
 -->
<?php
include 'blogconnection.php';
if (isset($_GET['blog_no']) && $_GET['blog_no'] != "") {
	$blog_no = $_GET['blog_no'];
}
else {
	$blog_no = 1;
}
if(isset($_SESSION['username']))
{
  $sql="DELETE FROM `blog` WHERE bid='".$blog_no."'";
  $result=mysqli_query($conn, $sql);
  header('location: index?action=myblogs');
}
 ?>
