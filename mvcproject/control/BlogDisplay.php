<!--
  * @file
  * This  controller file contains all functions used to display user's blogs or homepage.
 -->
<?php
/**
  * This class contains functions  used  to display user's blogpage or homepage.
*/

class BlogDisplayControl {
  // This function is used to control for displaying  user's home page.
	function userhome() {
		$usr = $_SESSION['user_name'];
		include('model/BlogDisplay.php');
		$obj = new HomeModel;
		$obj->userhome($usr);
	}
	// This function is used to control for displaying all user's blogs.
  function home() {
		include('model/BlogDisplay.php');
		$obj = new HomeModel;
		$obj->home();
	}
}

?>
