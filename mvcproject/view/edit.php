<!--
  * @file
  * this file used to show particular blog edit form.
 -->
<!DOCTYPE html>
<head>
  <title>Add content to blogs</title>
  <link rel='stylesheet' type='text/css' href='view/blog_style.css'>
</head>
<body>
   <h2>Please enter the data for edit your blog.</h2>
<?php
/**
  * this class is used to display particular blog edit form.
*/
class Editview {
  /**
     * this function is used to show blog edit form with previous data.
     * @param
     * @value array of blog's all information.
  */
  function edit($res) {
    while ($row = $res->fetch_assoc()) {
      echo "<div class='editblock'>";
      echo "<form action='?Blogfun/editfeed/" . $row['bid'] . "' method='POST' enctype='multipart/form-data'>";
      echo "<label>Title :</label>";
      echo "<input type='text' placeholder = 'title of the block' name='title' value='".$row['Title']."'></input>";
      echo "<br><br>";
      echo "<label>Description :</label>";
      echo "<textarea placeholder = 'about blog' name='description' cols=40 rows=5>" . $row['description'] . "</textarea>";
      echo "<br><br><input type='submit' name ='submit' value='submit' />";
      echo "</form></div>";
    }
  }
}
?>
</body>
</html>
