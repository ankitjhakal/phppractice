<!--  * @file
      * It will destroy session variable after browser closed.
-->

<?php
session_start();
if (isset($_SESSION['username'])) {
	session_destroy();
	echo "<script>location.href='bloglogin'</script>";
}

else {
	echo "<script>location.href='bloglogin'</script>";
}
?>
