<?php
namespace View;
 ?><!--
  * @file
  * This file used to show particular user's blogs.
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
  * This class is used to show particular user's  blog data.
*/

class UserHome {
	/**
     * This function is used to show  user's blog's information.
     * @param
     * @value array of blog's all information.
  */
	function show($res) {
    // Fetch all blogs in descending order of blog id.
    if(mysqli_num_rows($res) >= 1) {
      while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='container bg-warning'><h1><a href =?BlogFunction/blog/" . $row['bid'] . ">" . $row['Title'] ."</a></h1><h5>";
        echo "Updated on ".$row['date'];
				echo "<br><br> ";
        echo $row['description'];
        if($_SESSION['user_name'] == $row['username']) {
				  echo "<br><a  href = '?BlogFunction/delete/". $row['bid'] ."'>DELETE POST</a></p>";
				  echo "<a href = '?BlogFunction/edit/". $row['bid'] ."'>EDIT POST</a></p> ";
      }
        echo "</div><br><br>";
		  }
		}
	}
}
?>
</body>
</html>
