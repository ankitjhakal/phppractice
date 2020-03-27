<!--
  * @file
	* page for add new blogs.
-->
<?php
include 'blogconnection.php';

// if session variable is not set then redirect to login page.
if (!isset($_SESSION['username'])) {
	echo "<script>location.href='loginpage'</script>";
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
	<div style='background-color:black; height:40px; margin:-10px; padding:1px;'>
		<ul>
			<li style="margin:-5px;float:left;padding-right:30px;"><a href="bloglogout" style="color:white;text-decoration:none">Logout</a></li>
			<li style="margin:-5px;float:left"><a href="../index" style="color:white;text-decoration:none">Home</a></li>
		</ul>
	</div>
	<main>
		<div class='heading'>
			<h1>Please enter the data for your blog site.</h1>
		</div>
		<div class="form">
			<!-- Data to enter in the database is send through this form. -->
			<form action='add' method="post" enctype="multipart/form-data">
				<label>Title :</label><input type="text" name="title" placeholder="Title of the blog"><br><br>
				<label>Username :</label><input type="text" name="username" placeholder="username"><br><br>
				<label>Description :</label><textarea name="desc" rows="5" cols="40"></textarea><br><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</main>
</body>
</html>
<?php
$title = $img = $desc = '';
// Checks if data is only sent through POST method and submit button is pressed.
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
	// Checks if title or description of the blog is empty or not.
	if(empty($_POST['title']) || empty($_POST['desc'])) {
	 	echo "enter the title";
		echo "<script>location.href = 'index?action=add'</script>";
	}
	else {
		// File path for the image and other data is being stored in the variables.
		$filepath = "ankit/" . basename($_FILES["img"]["name"]);
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$username = $_POST['username'];
		$img = $_FILES['img']['name'];
		if(move_uploaded_file($_FILES["img"]["tmp_name"], $filepath)) {
			// It inserts the data into our database.
			$sql_insert = "INSERT INTO blog (Title, image, description, username) VALUES ('$title', '$img', '$desc','$username')";
			$result = mysqli_query($conn, $sql_insert);
			if($result) {
				echo "Inserted Successfully";
				header('location: index?action=myblogs');
			  }
			else {
				echo mysqli_error($conn);
		    }
	    }
		else {
			echo "error occure";
		  }
	  }
}
?>
