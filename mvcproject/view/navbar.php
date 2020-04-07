<!--
  * @file
  * This file used for fixed nav .
 -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
	<div class="container">
    <a href="" class="navbar-brand">MY BLOG SITE</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbaraid">
      <span class="navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbaraid">
    <ul class="navbar-nav text-center ml-auto">
		<li class="nav-item"><a href="index.php" class='nav-link'>HOME</a></li>
		<?php
    // If username is set as session variable then show these links else loginlink.
		if(isset($_SESSION['user_name'])) {
			echo "<li class='nav-item'><a  href = '?BlogDisplay/userhome' class='nav-link'>MyBlogs</a></li>";
			echo "<li class='nav-item'><a  href = '?BlogFunction/add' class='nav-link'>Add Blogs</a></li>";
      echo "<li class='nav-item'><a  href = '?Login/logout' class='nav-link'>LOGOUT</a></li>";
		}
		else {
			echo "<li class='nav-item'><a  href = '?Login/loginpage' class='nav-link'>LOGIN</a></li>";
      echo "<li class='nav-item'><a  href = '?SignUp/signuppage' class='nav-link'>SIGN UP</a></li>";
		}
		?>
  </ul>
	</div>
</div>
</nav>
</body>
</html>
