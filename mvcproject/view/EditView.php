<!--
  * @file
  * This file used to show particular blog edit form.
 -->
<!DOCTYPE html>
<head>
  <title>Add content to blogs</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
    while ($row = $res->fetch_assoc()) {
      echo "<div class='container'>";
      echo "<h2>Please enter the data for edit your blog.</h2>";
      echo "<form action='?BlogFunction/editfeed/" . $row['bid'] . "' method='POST' class='form-group' enctype='multipart/form-data'>";
      echo "<label>Title :</label>";
      echo "<input type='text' placeholder = 'title of the block' class='form-control' name='title' value='".$row['Title']."'></input>";
      echo "<br>";
      echo "<label>Description :</label>";
      echo "<textarea placeholder = 'about blog' class='form-control' name='description' cols=40 rows=5>" . $row['description'] . "</textarea>";
      echo "<br><input type='submit' name ='submit' class='btn btn-primary' value='submit' />";
      echo "</form></div>";
    }
?>
</body>
</html>
