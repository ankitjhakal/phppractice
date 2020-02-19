<!--  * @file
      * page for add new blogs.
-->
<?php
include 'blogconnection.php';
// if session variable is not set then redirect to login page.
if(isset($_SESSION['username'])) {
$blog_no = $_GET['blog_no'];
$q = "SELECT Title,description FROM blog  WHERE bid =$blog_no";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($result);
}
if (!isset($_SESSION['username'])) {
	echo "<script>location.href='bloglogin.php'</script>";
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
	<header>
		<ul>
			<li><a href="bloglogout.php">Logout</a></li>
			<li><a href="blogindex.php" class="right">Home</a></li>
		</ul>
	</header>
	<main>
		<div class='heading'>
			<h1>Please enter the data for edit your blog .</h1>
		</div>
		<div class="form">
			<!-- Data to enter in the database is send through this form. -->
		 <form action='' method="post" enctype="multipart/form-data">
				<label>Title :</label><input type="text" name="title" value="<?php echo $row['Title'] ?>" placeholder="Title of the blog"><br><br>
				<label>Description :</label><textarea name="desc"  rows="5" cols="40"><?php echo $row['description'] ?></textarea><br><br>
				<input type='hidden' name= 'b_id' value="<?php echo $blog_no ?>">
				<!-- <input type="text" name="bid" value=""><br> -->
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>
	</main>
</body>
</html>
<?php
//include 'blogconnection.php';
$title = $img = $desc = '';

// Checks if data is only sent through POST method and submit button is pressed.
if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['submit'])) {

	// Checks if title or description of the blog is empty or not.
	if (empty($_POST['title']) || empty($_POST['desc'])) {
		echo "enter the title";
		echo "<script>location.href = 'edit.php'</script>";
	}
	else {

		// File path for the image and other data is being stored in the variables.=""
		$title = $desc = $bid = "";
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$bid = $_POST['b_id'];
		// It update the data into our database.
		$sql_insert = "UPDATE blog SET Title='$title', description ='$desc' WHERE bid =".$bid."";
		$result=mysqli_query($conn, $sql_insert);
		if ($result) {
			header('location: blogdisplay');
    }
		else {
				echo mysqli_error($conn);
		}
		}
}

?>
