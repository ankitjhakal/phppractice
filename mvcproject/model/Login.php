<!--
   * @file
   * This model file contains all functions related to login validity.
 -->
<?php
/**
  * This class is used to check validity  of user login.
*/
class LoginModel {
	/**
	   * This function will check login validity.
		 * @return mixed
	*/
	function login() {
		include 'blogconnection.php';
		// If session variable @username is set then redirect to homepage.
	 	if(isset ($_POST['nuser'])) {
			$username = $_POST['nuser'];
			$password = base64_encode($_POST['userp']);
			$sql = "SELECT * FROM logindb WHERE username = '".$_POST['nuser']."' AND
			password = '".$_POST['userp']."' LIMIT 1";
	    $res = $con->query($sql);
			if(mysqli_num_rows($res) == 1) {
				$row = $res->fetch_assoc();
				return $row;
			}
			else {
				echo "Incorrect Details";
				return null;
			}
    }
	}
}
?>
