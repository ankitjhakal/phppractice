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
    echo "<div style='background-color:black; height:40px; margin:-10px; padding:1px;'>";
    echo "<ul style='list-style-tyle:none;margin: 10px auto;'>";
    echo "<li><a href='index.php' style='color:white; text-decoration:none;'>Home</a></li>";
    echo "</ul></div><br><br><br>";
  // Data is displayed in appropriate div classes from the database.
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='blog' style='background-color:#20e3e3; margin:0 40;'>";
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
    echo "<div style='background-color:black; height:40px; margin:-10px; padding:1px;'>";
    echo "<ul>";
    echo "<li style='margin:0px;float:left;padding-right:30px;'><a href = 'index'  style='color:white;text-decoration:none'>Home</a></li>";
		echo "<li  style='margin:0px;float:left;padding-right:30px;'><a href = 'index?action=addpage'style='color:white;text-decoration:none' >Add</a></li>";
    echo "<li style='margin:0px;float:left;'><a href = 'index?action=bloglogout' style='color:white;text-decoration:none'>logout</a></li>";
    echo "</ul></div><br><br><br>";
  // Data is displayed in appropriate div classes from the database.
   while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='blog' style='background-color:#20e3e3;margin:0 40;'>";
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
    echo "<li><a href='index?action=editpage&blog_no=".$row['bid']."'>Edit</a></li>";
    echo "<li><a href='index?action=delete&blog_no=".$row['bid']."'>Delete</a></li>";
    echo "</div>";
    echo "</div><br><br>";
  }
}
else {
  echo "<div style='background-color:black; height:40px; margin:-10px; padding:1px;'>";
  echo "<ul>";
  echo "<li style='margin:0px;float:left;padding-right:30px;'><a href = 'index'  style='color:white;text-decoration:none'>Home</a></li>";
  echo "<li  style='margin:0px;float:left;padding-right:30px;'><a href = 'index?action=addpage'style='color:white;text-decoration:none' >Add</a></li>";
  echo "<li style='margin:0px;float:left;'><a href = 'index?action=bloglogout' style='color:white;text-decoration:none'>logout</a></li>";
  echo "</ul></div><br><br><br>";
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
    echo "<div class='data' style='background-color:#20e3e3;margin:0 40;'>";
    echo "<div class='block'>";
    echo "<div class='title'>";
    echo "<a href='index?action=getbyid&blog_no=".$row['bid']."'> ".$row['bid']."</a>";
    echo "<div class='time'>";
    echo "Updated on ".$row['date'];
    echo "</div>";
    echo "</div>";
    echo "<div class='desc'>";
    echo $row['description'];
    echo "</div>";
    echo "</div>";
    echo "</div><br><br>";
  }
}
}
}
?>
