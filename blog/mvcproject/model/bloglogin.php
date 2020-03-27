<!--
  *@file
  *this file is used for login and its validation.
 -->
<?php

include 'blogconnection.php';
//if session variable @username is set then redirect to homepage.
if(isset ($_SESSION['username'])) {
	echo "<script>location.href = 'homepage'</script>";
}
else {
 	if(isset ($_POST['nuser'])) {
		$username = $_POST['nuser'];
		$password = base64_encode($_POST['userp']);
		$sql = "SELECT bid FROM logindb WHERE username='".$_POST['nuser']."' AND password='".$_POST['userp']."' LIMIT 1";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1) {
			//session variable @username is set to access data in other files from database and redirect to homepage else stay on login page.
			$_SESSION['username'] = $username;
			header('location: ../index');
			//echo "<script>location.href = 'index.php'</script>";
		  }
		else {
			echo "Incorrect Details";
			echo "<script>location.href = 'loginpage'</script>";
		  }
	  }
  }
?>
