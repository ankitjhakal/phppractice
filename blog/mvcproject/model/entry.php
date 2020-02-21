<?php
include 'blogconnection.php';
$title=$img=$desc='';
echo "hi";
// Checks if data is only sent through POST method and submit button is pressed.
if ($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST['submit'])) {

	// Checks if title or description of the blog is empty or not.
	if (empty($_POST['title']) || empty($_POST['desc'])) {
		echo "enter the title";
		echo "<script>location.href = 'index?action=addpage'</script>";
	}
	else {
    echo "hi";
		// File path for the image and other data is being stored in the variables.
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$username = $_POST['username'];
					// It inserts the data into our database.
		echo $title;
		$sql_insert = "INSERT INTO blog (Title, description, username)VALUES ('$title', '$desc','$username')";
		$result=mysqli_query($conn, $sql_insert);
    echo "hi";
			if ($result) {
				echo "Inserted Successfully";
				header('location: index?action=myblogs');

			}
			else {
				echo mysqli_error($conn);
			}
		}


	}

?>
