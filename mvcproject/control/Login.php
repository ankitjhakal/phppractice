<!--
   * @file
   * this  file contains all functions related to login.
 -->
<?php
/**
  *  this class is used for control all the functionality related to user login.
*/

class Logincontrol {
	/**
	   *this function is used to redirect userhome page if username is setup else
	   *display login page.
	*/
	function login() {
		if(isset($_SESSION['user_name'])) {
			header("location: ?Blogdisplay/userhome");
		}
		include('view/login.php');
	}
	/**
	   *this function will check login validity,if correct redirect to user home
	   * -view else redirect to again login page.
	*/
	function logincheck() {
    include('model/Login.php');
		$obj = new Loginmodel;
		$return_value = $obj->login();
    if($return_value == null) {
			include('view/login.php');
		}
    else {
		  $_SESSION['user_name'] = $return_value['username'];
			header("location:?Blogdisplay/home");
		}
	}
	// function used for logout and destroy session variable.
	function logout() {
		session_destroy();
		echo "logout succesfull";
		header("location:?Blogdisplay/home");
  }
}
?>
