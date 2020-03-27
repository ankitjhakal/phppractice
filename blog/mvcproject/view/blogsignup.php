<!--
	* @file
	* signup page if user doesn't exist.
-->
<!DOCTYPE html>
<html>
<head>
	<title>signup Page</title>
	<link rel="stylesheet" type="text/css" href="blog_style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <div style='background-color:black; height:40px; margin:-10px; padding:1px;'>
		<ul>
			<li style='margin:-5px;'><a href = '../index/loginpage' style='color:white; text-decoration:none;'>Login</a></li>
		</ul>
	</div>
	<h1>Please signup To Enter The Blog</h1>
	<form method="post" action="blogsignupvalidation">
		Username:<input type="text" name="user" placeholder="admin"><br><br>
		Password:<input type="password" name="pass" placeholder="admin"><br><br>
    bid:<input type="text" name="bid" placeholder="admin"><br><br>
		<input type="submit" name="signup" value="signup">
	</form><br>
</body>
</html>
