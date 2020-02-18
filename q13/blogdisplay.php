<!--
     * @file
     * It will diplay blogs
-->

<?php
include 'blogconnection.php';
// get blog_no from url if not set then assign blog_no value 1.
if (isset($_GET['blog_no']) && $_GET['blog_no'] != "") {
	$blog_no = $_GET['blog_no'];
}
else {
	$blog_no = 1;
}
?>
<!-- html page for blog display -->
<!DOCTYPE html>
<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "blog_style.css">
	<link href = 'http://fonts.googleapis.com/css?family=Lato:400,700' rel = 'stylesheet' type = 'text/css'>
	<title>Blog Content</title>
</head>
	<header>
		<body>
		<ul>
			<li><a href = "blogindex.php">Home</a></li>
			<li><a href = "entry.php">Add</a></li>
      <li><a href = "bloglogout.php">logout</a></li>
		</ul>
	</header>
	<main>
		<div style = "text-align: center;">
			<h1>Blogs</h1>
		</div>
		<div class = "display">
			<?php
			require 'blogfunc.php';
			get_by_username();
			?>
	</div>
	</main>
</body>
</html>
