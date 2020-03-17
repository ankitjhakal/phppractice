<!-- * @file
     * it is homepage for our blog site.
-->
<?php
include 'blogconnection.php';
// if session variable @username is set then assign @user my blogs else login.
if (isset($_SESSION['username'])) {
	$user = "my blogs";
}
else {
	$user = 'Login';
}
?>
<!-- html for homepage -->
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="blog_style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<title>Home page</title>
</head>
<body>
	<div style="background-color:black; height:40px; margin:-10px; padding:1px;">
		<ul>

			<?php
			// if session variable is set then display my blogs and logout in navbar else login.
			if (isset($_SESSION['username'])) {
				$action=$_GET['action'];
				$url_arr=explode('/',$action);
				$n=count($url_arr);
				if($n==1) {
					echo "<li style='margin:0px;float:left;padding-right:30px;'><a href = 'index/myblogs' style='color:white; text-decoration:none;'>$user</a></li>";
					echo "<li style='margin:-5px;'><a href = 'index/bloglogout' style='color:white; text-decoration:none;'>logout</a></li>";
				}
				else {
					echo "<li style='margin:0px;float:left;padding-right:30px;'><a href = 'myblogs' style='color:white; text-decoration:none;'>$user</a></li>";
					echo "<li style='margin:-5px;'><a href = 'bloglogout' style='color:white; text-decoration:none;'>logout</a></li>";
				}
			}
			else {
				$action=$_GET['action'];
				$url_arr=explode('/',$action);
				$n=count($url_arr);
				if($n==1) {
					echo "<li style='margin:-5px;'><a href = 'index/loginpage' style='color:white; text-decoration:none;'>Login</a></li>";
				}
				else {
					echo "<li style='margin:-5px;'><a href = 'loginpage' style='color:white; text-decoration:none;'>Login</a></li>";
				}
			}
			?>
		</ul>
	</div>
	<main>
		<div class = "heading">
			<h1>Welcome to our blog site</h1>
		</div>
		<div class = "content">
			<div class = "outline">
				<!-- php code to display all blogs using oops concept -->

			</div>
		</div>
	</main>
</body>
</html>
