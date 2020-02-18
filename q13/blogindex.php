<!-- * @file
     * it is homepage for our blog site.
-->
<?php
include 'blogconnection.php';
// if session variable @username is set then assign @user my blogs else login.
if (isset($_SESSION['username'])) {
	$user="my blogs";
}
else {
	$user='Login';
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
	<header>
		<ul>
			<li><a href='bloglogin.php'>Login</a></li>
			<?php
			// if session variable is set then display my blogs and logout in navbar else login.
			if (isset($_SESSION['username'])) {
				echo "<li><a href = 'blogdisplay.php'>$user</a></li>";
        echo "<li><a href = 'bloglogout.php'>logout</a></li>";
			}
			?>
		</ul>
	</header>
	<main>
		<div class="heading">
			<h1>Welcome to our blog site</h1>
		</div>
		<div class="content">
			<div class="outline">
				<!-- php code to display all blogs -->
				<?php
				require 'blogfunc.php';
				get_homepage_blogs();
				?>
			</div>
		</div>
	</main>
</body>
</html>
