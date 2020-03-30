<!--
   * @file
   * This  file contains all functions related to login.
 -->
<?php
/**
  *  This class is used for control all the functionality related to user login.
*/

class LoginControl {
	/**
	   * This function is used to redirect userhome page if username is setup else
	   * Display login page.
	*/
	function login() {
		if(isset($_SESSION['user_name'])) {
			header("location: ?BlogDisplay/userhome");
		}
		include('view/login.php');
	}
	/**
	   * This function will check login validity,if correct redirect to user home
	   * -View else redirect to again login page.
	*/
	function logincheck() {
    include('model/Login.php');
		$obj = new LoginModel;
		$return_value = $obj->login();
    if($return_value == null) {
			include('view/login.php');
		}
    else {
		  $_SESSION['user_name'] = $return_value['username'];
			header("location:?BlogDisplay/home");
		}
	}
	// This function used for logout and destroy session variable.
	function logout() {
		session_destroy();
		echo "logout succesfull";
		header("location:?BlogDisplay/home");
  }
}
?>
