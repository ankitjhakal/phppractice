<!--
  * @file
	* page for add new blog form.
-->
<?php
include 'blogconnection.php';

// if session variable is not set then redirect to login page.
if (!isset($_SESSION['user_name'])) {
	echo "<script>location.href='?login/login'</script>";
}
?>
<!-- html form for add blog -->
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="blog_style.css">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<title>Entry for Blogs</title>
</head>
<body>
	<main>
		<div class='heading'>
			<h1>Please enter the data for your blog site.</h1>
		</div>
		<div class="form">
			<!-- Data to enter in the database is send through this form. -->
			<form action='?Blogfun/addblog/' method="POST" enctype="multipart/form-data">
				<label>Title :</label><input type="text" name="title" placeholder="Title of the blog"><br><br>
				<input type="hidden" name="username" placeholder="username" value="<?php echo $_SESSION['user_name'] ?>"><br><br>
				<label>Description :</label><textarea name="desc" rows="5" cols="40"></textarea><br><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</main>
</body>
</html>
