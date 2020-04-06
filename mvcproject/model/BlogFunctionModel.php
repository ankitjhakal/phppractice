<?php
namespace Model;
use \View\BlogView;
/**
  * This class contains functions  used for fetching data of blogs, storing data
  * Of a blog again in database.
*/

class BlogFunctionModel {
  /**
     * This function is used to fetch data of blogs according to id.
     * @param
     * @id basically contains the blog_id
  */
  function blog($id) {
    include 'blogconnection.php';
    $sql = "SELECT * FROM blog WHERE bid = '$id'";
    $res = $con->query($sql);
    if(mysqli_num_rows($res) == 0) {
      echo "<h1> blog not found</h1>";
    }
    $obj = new BlogView;
    $obj->show($res);
  }
  // This function is used to store blog form data in database.
  function add() {
    include 'blogconnection.php';
    $title = $desc = '';
    // Checks if data is only sent through POST method and submit button is pressed.
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      // Checks if title or description of the blog is empty or not.
      if(empty($_POST['title']) || empty($_POST['desc'])) {
      	echo "enter the title";
      	echo "<script>location.href = '?BlogFunction/add'</script>";
      }
      else {
      	// Data is being stored in the variables.
      	$title = $_POST['title'];
      	$desc = $_POST['desc'];
      	$username = $_POST['username'];
      	// It inserts the user data into our database.
      	$sql_insert = "INSERT INTO blog (Title, description, username) VALUES
        ('$title', '$desc', '$username')";
      	$res = mysqli_query($con, $sql_insert);
    		if($res) {
    			echo "Inserted Successfully";
    			header('location:?BlogDisplay/userhome');
    		}
    		else {
    			echo mysqli_error($con);
    		}
      }
    }
  }
  /**
     * This function is used to delete blog.
     * @param
     * @id basically contains the blog_id
  */
  function delete($id) {
    include 'blogconnection.php';
    $sql = "SELECT * FROM blog WHERE bid = $id";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();
    if($_SESSION['user_name'] == $row['username']) {
      $sql = "DELETE FROM `blog` WHERE bid = $id";
      $con->query($sql);
      header("location: ?BlogDisplay/userhome");
    }
    else {
      echo "<h1>Only Unauthenticated user can do This</h1>";
    }
  }
  /**
     * This function is used to return edit blog data array to controller file.
     * @param  @id basically contains the blog_id.
     * @return mixed
  */
  function editshow($id) {
    include 'blogconnection.php';
    $sql = "SELECT * FROM blog WHERE bid = '$id'";
    $res = $con->query($sql);
    if(mysqli_num_rows($res) == 0) {
      echo "<h1> blog not found</h1>";
      return null;
    }
    return $res;
  }
  /**
     * This function is used to restore edit blog data in database.
     * @param
     * @id basically contains the blog_id
  */
  function edit($id) {
    include 'blogconnection.php';
    $title=$_POST['title'];
    $usr = $_SESSION['user_name'];
    $desc=$_POST['description'];
    $sql = "UPDATE blog SET Title = '$title', description = '$desc' WHERE bid =
    '$id' and username = '$usr'";
    $con->query($sql);
    header("location: ?BlogDisplay/userhome");
  }
}
?>
