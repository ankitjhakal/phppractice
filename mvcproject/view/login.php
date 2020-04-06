<!--
  *@file
  *This file contains html code for login page.
 -->
<!-- Html code for login page  -->
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<!-- Get input from user and check for correct credentials on same page -->
	<div class="container">
	<h1>Please Login To Enter The Blog</h1>
	<form method="post" action="?Login/logincheck">
		Username:<input type="text" class="form-control" name="nuser" placeholder="admin"><br>
		Password:<input type="password" class="form-control" name="userp" placeholder="admin"><br>
		<input type="submit" class="btn btn-primary" name="login" value="Login">
	</form></div><br>
</body>
</html>
