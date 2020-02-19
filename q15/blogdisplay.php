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
			<li><a href = "blogindex">Home</a></li>
			<li><a href = "entry">Add</a></li>
      <li><a href = "bloglogout">logout</a></li>
		</ul>
	</header>
	<main>
		<div style = "text-align: center;">
			<h1>Blogs</h1>
		</div>
		<div class = "display">
			<!-- php code for get blogs with username using oops concpet  -->
			<?php
			require 'blogfunc.php';
			$obj = new blog();
			$obj->get_by_username();
			?>
	</div>
	</main>
</body>
</html>
