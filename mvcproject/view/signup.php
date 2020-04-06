<!--
	* @file
	* Signup page if user doesn't exist.
-->
<!DOCTYPE html>
<html>
<head>
	<title>signup Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1>Please signup To Enter The Blog</h1>
	<form method="post" action="?SignUp/signupcheck">
		Username:<input type="text" class="form-control" name="user" placeholder="admin"><br>
		Password:<input type="password" class="form-control" name="pass" placeholder="admin"><br>
		<input type="submit" class="btn btn-primary" name="signup" value="signup">
	</form></div><br>
</body>
</html>
