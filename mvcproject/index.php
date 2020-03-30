<!--
  *@file
  *This file is basically is working as frontcontroller for project
 -->
<?php
error_reporting( E_WARNING );
session_start();
// @control variable contains filename in controller folder.
$control = 'BlogDisplay';
$function = 'home';
$args = array_keys($_GET);
$args = explode("/", $args[0]);
// If variables is set then assign values to control and function var.
if(isset($args[0]) && $args[0] != '') {
	$control = $args[0];
}
if(isset($args[1]) && $args[1] != '') {
	$function = $args[1];
}
if(isset($args[2]) && $args[2] != '') {
	$id = $args[2];
}
// It's all about invalid urls,for wrong url  show page not found message.
$argsarr = array("Login", "BlogFunction", "BlogDisplay", "SignUp");
$argsarr2 = array("home", "userhome", "blog", "add", "edit", "delete" , "login",
"logout", "logincheck", "editfeed", "addblog", "signup", "signupcheck");
$argsarr3 = array("home", "add", "login" , "logout", "userhome");
// Conditions forinvalid urls and show pagenot found msg.
if(!in_array($control, $argsarr)) {
  echo "<h1>page not found</h1>";
}
elseif(!in_array($function, $argsarr2)) {
  echo "<h1>page not found</h1>";
}
elseif(in_array($function, $argsarr3) && $args[2] != null) {
  echo "<h1>page not found</h1>";
}
elseif($args[1] == "blog" && $args[2] == null) {
  echo "<h1>page not found</h1>";
}
elseif($args[0] == "BlogFunction" && $args[3] != null) {
	echo "<h1>page not found</h1>";
}
else {
	include('view/navbar.php');
	echo "<br><br>";
	include('control/' . $control . '.php');
	$class = $control . 'Control';
	$object = new $class;
	if(isset($id)) {
	$object->$function($id);
  }
  else {
    $object->$function();
  }
}
?>
