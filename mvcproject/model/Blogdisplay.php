<!--
  * @file
  * this  model file contains all functions used to fetch all user's blogs or
	* all user blogs from database.
 -->
<?php
/**
  * this class contains functions  used  to fetch data of user's, all user
	* and display user's blogpage or homepage.
*/

class Homemodel {
	//this function is used to fetch all user data and display home page.
	function home() {
		include 'blogconnection.php';
		$sql = "SELECT * FROM blog order by bid DESC";
		$res = $con->query($sql);
		include('view/home.php');
		$obj = new Homeview;
		$obj->show($res);
	}
	//this function is used to fetch particular user data for displaying  user's home page.
	function userhome($usr) {
		include 'blogconnection.php';
		// fetch all blogs of a particular user.
		$sql = "SELECT * FROM blog WHERE username ='$usr'";
		$res = $con->query($sql);
		include('view/userhome.php');
		$obj = new Homeview;
		$obj->show($res);
	}
}
?>
