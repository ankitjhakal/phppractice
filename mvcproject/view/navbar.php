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
		if(isset($_SESSION['user_name'])) {
			echo "<a style='float:left' href='?Blogdisplay/userhome'>MyBlogs</a>";
			echo "<a style='float:left' href = '?Blogfun/add'>Add Blogs</a></p>";
      echo "<a style='float:right' href='?Login/logout'>LOGOUT</a>";
		}
		else {
			echo "<a style='float:left' href='?Login/login'>LOGIN</a>";
		}
		?>
	</div>
</body>
</html>
