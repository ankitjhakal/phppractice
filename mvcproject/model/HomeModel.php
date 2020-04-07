<?php
namespace Model;
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
    include('view/HomeView.php');
	}
	//This function is used to fetch particular user data for displaying  user's home page.
	function userhome($usr) {
		include 'blogconnection.php';
		// Fetch all blogs of a particular user.
		$sql = "SELECT * FROM blog WHERE username ='$usr'";
		$res = $con->query($sql);
		include('view/UserHome.php');

	}
}
?>
