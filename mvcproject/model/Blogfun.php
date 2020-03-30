<!--
  * @file
  * this  model file contains all functions used for blog editing,adding  and deleting.
 -->
 <?php
/**
  * this class contains functions  used for fetching data of blogs, storing data
  * of a blog again in database.
*/

class Blogfunmodel {
  /**
     * this function is used to fetch data of blogs according to id.
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
    include ('view/blog.php');
    $obj = new Blogview;
    $obj->show($res);
  }
  // this function is used to store blog form data in database.
  function add() {
    include 'blogconnection.php';
    $title = $desc = '';
    // Checks if data is only sent through POST method and submit button is pressed.
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      // Checks if title or description of the blog is empty or not.
      if(empty($_POST['title']) || empty($_POST['desc'])) {
      	echo "enter the title";
      	echo "<script>location.href = '?Blogfun/add'</script>";
      }
      else {
      	// data is being stored in the variables.
      	$title = $_POST['title'];
      	$desc = $_POST['desc'];
      	$username = $_POST['username'];
      	// It inserts the user data into our database.
      	$sql_insert = "INSERT INTO blog (Title, description, username) VALUES
        ('$title', '$desc', '$username')";
      	$res = mysqli_query($con, $sql_insert);
    		if($res) {
    			echo "Inserted Successfully";
    			header('location:?Blogdisplay/userhome');
    		}
    		else {
    			echo mysqli_error($con);
    		}
      }
    }
  }
  /**
     * this function is used to delete blog.
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
      header("location: ?Blogdisplay/userhome");
    }
    else {
      echo "<h1>Only Unauthenticated user can do this</h1>";
    }
  }
  /**
     * this function is used to return edit blog data array to controller file.
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
     * this function is used to restore edit blog data in database.
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
    header("location: ?Blogdisplay/userhome");
  }
}
?>
