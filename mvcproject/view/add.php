<!--
  * @file
	* Page for add new blog form.
-->
<?php
// If session variable is not set then redirect to login page.
if (!isset($_SESSION['user_name'])) {
	echo "<script>location.href='?Login/login'</script>";
}
?>
<!-- Html form for add blog -->
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<title>Entry for Blogs</title>
</head>
<body>
	<main>
		<div class="container">
			<h1>Please enter the data for your blog site.</h1>
			<!-- Data to enter in the database is send through this form. -->
			<form action='?BlogFunction/addblog/' class='form-group' method="POST" enctype="multipart/form-data">
				<label>Title :</label><input type="text" class='form-control' name="title" placeholder="Title of the blog">
				<input type="hidden" name="username" class='form-control' placeholder="username" value="<?php echo $_SESSION['user_name'] ?>"><br>
				<label>Description :</label><textarea name="desc" class='form-control' rows="5" cols="40"></textarea><br>
				<input type="submit" name="submit" class='btn btn-primary' value="Submit">
			</form>
		</div>
	</main>
</body>
</html>
