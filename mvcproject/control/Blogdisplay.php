<!--
  * @file
  * this  controller file contains all functions used to display user's blogs or homepage.
 -->
<?php
/**
  * this class contains functions  used  to display user's blogpage or homepage.
*/

class Blogdisplaycontrol {
  //this function is used to control for displaying  user's home page.
	function userhome() {
		$usr = $_SESSION['user_name'];
		include('model/Blogdisplay.php');
		$obj = new Homemodel;
		$obj->userhome($usr);
	}
	//this function is used to control for displaying all user's blogs.
  function home() {
		include('model/Blogdisplay.php');
		$obj = new Homemodel;
		$obj->home();
	}
}

?>
