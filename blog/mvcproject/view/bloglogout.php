<!--  * @file
      * It will destroy session variable after browser closed.
-->

<?php
session_start();
if (isset($_SESSION['username'])) {
	session_destroy();
	$action=$_GET['action'];
	$url_arr=explode('/',$action);
	$n=count($url_arr);
	if($n==2) {
		echo "<script>location.href='../index/loginpage'</script>";
	}
	else {
			echo "<script>location.href='../loginpage'</script>";
	}
}

else {
	echo "<script>location.href='../index/loginpage'</script>";
}
?>
