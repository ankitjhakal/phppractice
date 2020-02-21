<!--  * @file
      * It will destroy session variable after browser closed.
-->

<?php
session_start();
if (isset($_SESSION['username'])) {
	session_destroy();
	echo "<script>location.href='index?action=bloglogin'</script>";
}

else {
	echo "<script>location.href='index?action=bloglogin'</script>";
}
?>
