<!--* @file
    * login page for users.
-->
<?php
include 'blogconnection.php';
//if session variable @username is set then redirect to homepage.
if (isset ($_SESSION['username'])) {
	echo "<script>location.href = 'blogindex'</script>";
}
else {
	if (isset ($_POST['nuser'])) {
		$username = $_POST['nuser'];
		$password = base64_encode($_POST['userp']);
		$sql = "SELECT bid FROM logindb WHERE username='".$_POST['nuser']."' AND password='".$_POST['userp']."' LIMIT 1";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) == 1) {
			//session variable @username is set to access data in other files from database and redirect to homepage else stay on login page.
			$_SESSION['username'] = $username;
			echo "<script>location.href = 'blogindex'</script>";
		}
		else {
			echo "Incorrect Details";
			echo "<script>location.href = 'bloglogin'</script>";
		}
	}
}
?>
<!-- html code for login page  -->
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="blog_style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<header>
		<ul>
			<li><a href="blogindex">Home</a></li>
			<li><a href="blogsignup">Register</a></li>
		</ul>
	</header>
	<h1>Please Login To Enter The Blog</h1>
	<!-- take input from user and check for correct credentials on same page -->
	<form method="post" action="bloglogin.php">
		Username:<input type="text" name="nuser" placeholder="admin"><br><br>
		Password:<input type="password" name="userp" placeholder="admin"><br><br>
		<input type="submit" name="login" value="Login">
	</form><br>
</body>
</html>
