<!--
   * @file
   * This model file contains all functions related to login validity.
 -->
<?php
/**
  * This class is used to check validity  of signup.
*/
class SignUpModel {
	/**
	   * This function will check signup validity.
	*/
	function signup() {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    // validations for signup
    if (!preg_match("/^[a-zA-Z ]+$/i",$username) || !preg_match("/^[0-9]+$/",$password)) {
			if($username == "" || $password == "") {
				echo "<strong>require to fill all entries</strong>";
			}
			elseif(!preg_match("/^[a-zA-Z ]+$/i",$username)) {
        echo "<br><strong>only alphabates are allowed</strong>";
      }
      elseif(!preg_match("/^[0-9]+$/",$password)) {
        echo "<br><strong>only no is allowed<strong>";
      }
      include('view/signup.php');
    }
    //if all entries are correct insert row into database.
    else {
      if(isset($_POST['signup'])) {
        include('blogconnection.php');
        mysqli_select_db($con, "mysql1");
        $q = "INSERT INTO logindb VALUES('$username','$password')";
        if($result = mysqli_query ($con, $q)) {
          echo "<strong>inserted row</strong><br><br>";
        }
        header('location:?Login/login');
      }
    }
	}
}
?>
