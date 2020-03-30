<!--
  * @file
  * this file used for fixed nav .
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
    // if username is setas session variable then show these links else loginlink.
		if(isset($_SESSION['user_name'])) {
			echo "<a  href = '?Blogdisplay/userhome'>MyBlogs</a>";
			echo "<a  href = '?Blogfun/add'>Add Blogs</a></p>";
      echo "<a style='float:right' href='?Login/logout'>LOGOUT</a>";
		}
		else {
			echo "<a  href='?Login/login'>LOGIN</a>";
		}
		?>
	</div>
</body>
</html>
