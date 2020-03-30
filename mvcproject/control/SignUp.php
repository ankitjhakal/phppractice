<!--
   * @file
   * This  file contains all functions related to signup.
 -->
<?php
/**
  *  This class is used for control all the functionality related to user signup.
*/

class SignUpControl {
	/**
	   * This function is used to displlay signup form.
	*/
	function signup() {
		include('view/signup.php');
	}
	/**
	   * This function will check singup validity,if correct redirect to login
	   * -Page else redirect to again signup page.
	*/
	function signupcheck() {
    include('model/signup.php');
		$obj = new SignUpModel;
		$obj->signup();
	}
}
?>
