<?php
namespace Controller;
use \Model\HomeModel;
/**
  * This class contains functions  used  to display user's blogpage or homepage.
*/

class BlogDisplay {
  // This function is used to control for displaying  user's home page.
	function userhome() {
		$usr = $_SESSION['user_name'];
		$obj = new HomeModel;
		$obj->userhome($usr);
	}
	// This function is used to control for displaying all user's blogs.
  function home() {
		$obj = new HomeModel;
		$obj->home();
	}
}
?>
