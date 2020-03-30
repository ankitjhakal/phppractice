<!--
  *@file
  *This file contains html code for login page.
 -->
<!-- Html code for login page  -->
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="blog_style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<h1>Please Login To Enter The Blog</h1>
	<!-- Get input from user and check for correct credentials on same page -->
	<form method="post" action="?Login/logincheck">
		Username:<input type="text" name="nuser" placeholder="admin"><br><br>
		Password:<input type="password" name="userp" placeholder="admin"><br><br>
		<input type="submit" name="login" value="Login">
	</form><br>
</body>
</html>
