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
	echo "<script>location.href='index.php?action=loginpage'</script>";
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
			<li style="margin:-5px;float:left;padding-right:30px;"><a href="index?action=bloglogout" style="color:white;text-decoration:none">Logout</a></li>
			<li style="margin:-5px;float:left"><a href="index" style="color:white;text-decoration:none">Home</a></li>
		</ul>
	</div>
	<main>
		<div class='heading'>
			<h1>Please enter the data for edit your blog .</h1>
		</div>
		<div class="form">
			<!-- Data to enter in the database is send through this form. -->
		 <form action='index?action=edit' method="post" enctype="multipart/form-data">
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
