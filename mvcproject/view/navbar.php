<!--
  * @file
  * This file used for fixed nav .
 -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="view/blog_style.css">
</head>
<body>
	<div class="topnav">
		<a href="index.php">HOME</a>
		<?php
    // If username is set as session variable then show these links else loginlink.
		if(isset($_SESSION['user_name'])) {
			echo "<a  href = '?BlogDisplay/userhome'>MyBlogs</a>";
			echo "<a  href = '?BlogFunction/add'>Add Blogs</a></p>";
      echo "<a  href='?Login/logout' class='rightanchortag'>LOGOUT</a>";
		}
		else {
			echo "<a  href='?Login/login'>LOGIN</a>";
      echo "<a  href='?SignUp/signup' class='rightanchortag'>SIGN UP</a>";
		}
		?>
	</div>
</body>
</html>
