
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
	<div style='background-color:black; height:40px; margin:-10px; padding:1px;'>
		<ul>
			<li style="margin:-5px;float:left;padding-right:30px;"><a href="index" style="color:white;text-decoration:none">Home</a></li>
			<li style="margin:-5px;float:left"><a href="index?action=blogsignup" style="color:white;text-decoration:none">Register</a></li>
		</ul>
	</div>
	<h1>Please Login To Enter The Blog</h1>
	<!-- take input from user and check for correct credentials on same page -->
	<form method="post" action="index?action=bloglogin">
		Username:<input type="text" name="nuser" placeholder="admin"><br><br>
		Password:<input type="password" name="userp" placeholder="admin"><br><br>
		<input type="submit" name="login" value="Login">
	</form><br>
</body>
</html>
