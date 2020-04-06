<!--
  *@file
  *This file is basically is working as frontcontroller for project
 -->
<?php
use Controller\SignUp;
use Controller\BlogFunction;
use Controller\BlogDisplay;
use Controller\Login;

//error_reporting( E_WARNING );
session_start();
// @control variable contains filename in controller folder.
$control = 'BlogDisplay';
$function = 'home';
$args = array_keys($_GET);
if(isset($args[0])) {
	$args = explode("/", $args[0]);
}
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
$argsarr3 = array("home", "add", "login" , "logout", "userhome");
// Conditions forinvalid urls and show pagenot found msg.
if(!file_exists('control/'.$control.'.php')) {
  echo "<h1>page not found</h1>";
}
elseif(in_array($function, $argsarr3) && isset($args[2])) {
  echo "<h1>page not found</h1>";
}
elseif(isset($args[1]) && $args[1] == "blog" && !isset($args[2])) {
  echo "<h1>page not found</h1>";
}
elseif(isset($args[0]) && $args[0] == "BlogFunction" && isset($args[3])) {
	echo "<h1>page not found</h1>";
}
else {

	include('view/navbar.php');
	echo "<br><br>";
	include('vendor/autoload.php');
	$class = "Controller\\".$control;
	$object = new $class;
	if (!method_exists ($object, $function)) {
	  echo "<h1>Page not found</h1>";
	}
	elseif(isset($id)) {
	$object->$function($id);
  }
  else {
    $object->$function();
  }
}
?>
