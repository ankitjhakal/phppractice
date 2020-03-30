<!--
   * @file
   * this  file contains all functions related to signup.
 -->
<?php
/**
  *  this class is used for control all the functionality related to user signup.
*/

class Signupcontrol {
	/**
	   * this function is used to displlay signup form.
	*/
	function signup() {
		include('view/signup.php');
	}
	/**
	   * this function will check singup validity,if correct redirect to login
	   * -page else redirect to again signup page.
	*/
	function signupcheck() {
    include('model/signup.php');
		$obj = new Signupmodel;
		$obj->signup();
	}
}
?>
