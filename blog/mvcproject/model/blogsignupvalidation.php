<!-- * @file
     * blogsignupvalidation file and store signup data in database.
-->
<?php
error_reporting( E_WARNING );
$username = $_POST['user'];
$password = $_POST['pass'];
$bid = $_POST['bid'];
// validations
if (!preg_match("/^[a-zA-Z ]+$/i",$username) ||!preg_match("/^[0-9]+$/",$password)) {
  if(!preg_match("/^[a-zA-Z ]+$/i",$username)) {
    echo "<br> only alphabates are allowed";
  }
  if(!preg_match("/^[0-9]+$/",$password)) {
    echo "<br> only no is allowed";
  }
  include('view/blogsignup');
}
//if all entries are correct insert row into database.
else {
  if(isset($_POST['signup'])) {
      include('blogconnection.php');
      mysqli_select_db($conn, "mysql1");
      $q = "INSERT INTO logindb VALUES('$username','$password','$bid')";
      if ($result = mysqli_query ($conn, $q)) {
        echo "<strong style=color:red;>inserted row</strong><br><br>";
      }
      header('location: index?action=loginpage');
    }
}
 ?>
