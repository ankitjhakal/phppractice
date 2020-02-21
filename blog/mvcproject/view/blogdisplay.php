x<!--
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
			<li><a href = "index">Home</a></li>
			<li><a href = "index?action=add">Add</a></li>
      <li><a href = "index?action=bloglogout">logout</a></li>
		</ul>
	</header>
	<main>
		<div style = "text-align: center;">
			<h1>Blogs</h1>
		</div>
		<div class = "display">
			<!-- php code for get blogs with username using oops concpet  -->
		<?php
		  $sql = "SELECT * FROM blog WHERE bid='".$id."'";
		  $result = mysqli_query($conn, $sql);
		  if (mysqli_num_rows($result) >= 1) {
		  // Data is displayed in appropriate div classes from the database.
		  while ($row = mysqli_fetch_assoc($result)) {
		    echo "<div class='blog'>";
		    echo "<div class = 'title'>";
		    echo $row['Title'];
		    echo "<div class = 'time'>";
		    echo "Updated on ".$row['date'];
		    echo "</div>";
		    echo "</div>";
		    echo "<div class = 'desc'>";
		    echo $row['description'];
		    echo "</div>";
		    echo "</div>";
		  }
		}
		?>
			<?php
			header('location :index?action=myblogs');
			?>
	</div>
	</main>
</body>
</html>
