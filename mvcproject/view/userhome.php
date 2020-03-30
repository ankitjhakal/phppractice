<!--
  * @file
  * this file used to show particular user's blogs.
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
  * this class is used to show particular user's  blog data.
*/

class Homeview {
	/**
     * this function is used to show  user's blog's information.
     * @param
     * @value array of blog's all information.
  */
	function show($res) {
    include 'blogconnection.php';
    // fetch all blogs in descending order of blog id.
    if(mysqli_num_rows($res) >= 1) {
      while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='blog'><h1><a href =?Blogfun/blog/" . $row['bid'] . ">" . $row['Title'] ."</a></h1><h5>";
        echo "Updated on ".$row['date'];
				echo "<br><br> ";
        echo $row['description'];
        echo "</div><br><br>";
        }
      if($_SESSION['user_name'] == $row['username']) {
				echo "<a  href = '?Blogfun/delete/". $row['bid'] ."'>DELETE POST</a></p>";
				echo "<a href = '?Blogfun/edit/". $row['bid'] ."'>EDIT POST</a></p> ";
		  }
		}
	}
}
?>
</body>
</html>
