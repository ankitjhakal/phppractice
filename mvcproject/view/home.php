<!--
  * @file
  * This file used to show all user's blogs.
 -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel='stylesheet' type='text/css' href='view/blog_style.css'>
</head>
<body>
<?php
/**
  * This class is used to show all user's  blog data.
*/
class HomeView {
	/**
     * This function is used to show all user's blog's information.
     * @param
     * @res array of blog's all information.
  */
	function show($res) {
    // Fetch all blogs in descending order of blog id.
    if(mysqli_num_rows($res) >= 1) {
      while($row = mysqli_fetch_assoc($res)) {
        echo "<div class='blog'><h1><a href =?BlogFunction/blog/" . $row['bid'] . ">" . $row['Title'] ."</a></h1><h5>";
        echo "Updated on ".$row['date'];
				echo "<br><br>";
        echo $row['description'];
        echo "</div><br><br>";
      }
		}
	}
}
?>
</body>
</html>
