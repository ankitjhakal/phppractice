<!--
   * @file
   * this  file contains all functions used blog task using oops concept.
 -->
<?php
error_reporting( E_WARNING );
// Specified blog with Blog id by GET method is fetched through database.

class blog {
  /* * this function is used to show blogs according to id.
     * @param
     * @id basically contains the blog_id
  */
  function get_by_id($id) {
  include 'blogconnection.php';
  $sql = "SELECT * FROM blog WHERE bid='".$id."'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) >= 1) {
  // Data is displayed in appropriate div classes from the database.
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='blog'>";
    echo "<div class = 'title'>";
    echo $row['Title'];
    echo "<div class = 'time'>";
    echo "Updated on ".$row['date'];
    echo "</div>";
    echo "</div>";
    echo "<div class = 'desc'>";
    echo $row['description'];
    echo "</div>";
    echo "</div>";
  }
}
}
/* * this function is used to show blogs according to username.
   * @return : mixed.
*/
function get_by_username() {
  include 'blogconnection.php';
  $sql = "SELECT * FROM blog WHERE username ='".$_SESSION['username']."'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) >= 1) {
  // Data is displayed in appropriate div classes from the database.
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='blog'>";
    echo "<div class='title'>";
    echo $row['Title'];
    echo "<div class='time'>";
    echo "Updated on ".$row['date'];
    echo "</div>";
    echo "</div>";
    echo "<div class='desc'>";
    echo $row['description'];
    echo "</div>";
    echo "<div class='menu'>";
    echo "<li><a href='edit?blog_no=".$row['bid']."'>Edit</a></li>";
    echo "<li><a href='delete.php?blog_no=".$row['bid']."'>Delete</a></li>";
    echo "</div>";
    echo "</div>";
  }
}
else {
  echo "EMPTY TEXT";
}
}
/* * this function is used to show all blogs.
   * @return : mixed.
*/
function get_homepage_blogs() {
  include 'blogconnection.php';
  $sql="SELECT * FROM blog ORDER BY bid DESC";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) >= 1) {
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='data'>";
    echo "<div class='block'>";
    echo "<div class='title'>";
    echo "<a href='blogdisplay2?blog_no=".$row['bid']."'> ".$row['bid']."</a>";
    echo "<div class='time'>";
    echo "Updated on ".$row['date'];
    echo "</div>";
    echo "</div>";
    echo "<div class='desc'>";
    echo $row['description'];
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
}
}
}
?>
