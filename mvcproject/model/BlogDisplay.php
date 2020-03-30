<!--
  * @file
  * This  model file contains all functions used to fetch all user's blogs or
	* All user blogs from database.
 -->
<?php
/**
  * This class contains functions  used  to fetch data of user's, all user
	* And display user's blogpage or homepage.
*/

class HomeModel {
	//This function is used to fetch all user data and display home page.
	function home() {
		include 'blogconnection.php';
		$sql = "SELECT * FROM blog order by bid DESC";
		$res = $con->query($sql);
		include('view/home.php');
		$obj = new HomeView;
		$obj->show($res);
	}
	//This function is used to fetch particular user data for displaying  user's home page.
	function userhome($usr) {
		include 'blogconnection.php';
		// Fetch all blogs of a particular user.
		$sql = "SELECT * FROM blog WHERE username ='$usr'";
		$res = $con->query($sql);
		include('view/userhome.php');
		$obj = new HomeView;
		$obj->show($res);
	}
}
?>
