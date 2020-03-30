<!--
  * @file
  * this file used to show particular blog.
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
  * this class is used to display particular blog data.
*/
class Blogview {
	/**
     * this function is used to show blog's information.
     * @param
     * @value array of blog's all information.
  */
	function show($value) {
		while ($row = $value->fetch_assoc()) {
			echo "<div class='blog'><h1>" . $row['Title'] ."</a></h1><br><br><h5>" . $row['date'] . "</h5><br><p>description : <u>" . $row['description'] . "" ;
			if($row['username']==$_SESSION['user_name']) {
				echo "<br><br>";
				echo "<a  href = '?Blogfun/delete/". $row['bid'] ."''>DELETE POST</a>";
				echo "<br><br>";
				echo "<a  href = '?Blogfun/edit/". $row['bid'] ."'>EDIT POST</a>";
			}
			echo "</div><br>";
		}
	}
}
?>
</body>
</html>
