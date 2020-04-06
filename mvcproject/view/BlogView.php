<?php
namespace View;
 ?>
<!--
  * @file
  * This file used to show particular blog.
 -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
/**
  * This class is used to display particular blog data.
*/
class BlogView {
	/**
     * This function is used to show blog's information.
     * @param
     * @Value array of blog's all information.
  */
	function show($value) {
		while ($row = $value->fetch_assoc()) {
			echo "<div class='container bg-warning'><h1>" . $row['Title'] ."</a></h1><br><h5>" . $row['date'] . "</h5><br><p>description : <u>" . $row['description'] . "" ;
			if(isset($_SESSION['user_name'])) {
			  if($row['username']==$_SESSION['user_name']) {
				  echo "<br><br>";
				  echo "<a  href = '?BlogFunction/delete/". $row['bid'] ."''>DELETE POST</a><br>";
				  echo "<a  href = '?BlogFunction/edit/". $row['bid'] ."'>EDIT POST</a>";
			  }
			}
			echo "</div><br>";
		}
	}
}
?>
</body>
</html>
