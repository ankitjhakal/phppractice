<!--
  *@file
  *this file will update the database after blog has edited.
 -->
<?php
//include 'blogconnection.php';
$title = $img = $desc = '';

// Checks if data is only sent through POST method and submit button is pressed.
if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['submit'])) {
	// Checks if title or description of the blog is empty or not.
	if(empty($_POST['title']) || empty($_POST['desc'])) {
		echo "enter the title";
		echo "<script>location.href = 'edit'</script>";
	  }
	else {
    include 'blogconnection.php';
		// File path for the image and other data is being stored in the variables.=""
		$title = $desc = $bid = "";
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$bid = $_POST['b_id'];
		echo $bid;
		// It update the data into our database.
		$sql_insert = "UPDATE blog SET Title='$title', description ='$desc' WHERE bid =".$bid."";
		$result=mysqli_query($conn, $sql_insert);
		if($result) {
			header('location: ../myblogs');
      }
		else {
			echo mysqli_error($conn);
		  }
		}
  }
?>
