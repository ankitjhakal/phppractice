<?php
namespace Controller;
use \Model\SignUpModel;
/**
  *  This class is used for control all the functionality related to user signup.
*/

class SignUp {
	/**
	   * This function is used to displlay signup form.
	*/
	function signuppage() {
		include('view/signup.php');
	}
	/**
	   * This function will check singup validity,if correct redirect to login
	   * -Page else redirect to again signup page.
	*/
	function signupcheck() {
		$obj = new SignUpModel;
		$obj->signup();
	}
}
?>
