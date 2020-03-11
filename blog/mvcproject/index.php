<!--
  *@file
  *this file is basically is working as frontcontroller for project
 -->

<?php
error_reporting( E_WARNING );
$action=$_GET['action'];
$url_arr=explode('/',$action);
$n=count($url_arr);

if($n<3){
$action=$url_arr[1];
$url_arr=explode('"',$action);
$action=$url_arr[0];
}
else {
  $action=$url_arr[1];
  $x=explode('"',$url_arr[2]);
  $x=$x[0];

  if($x=="homepage")
  {
    $action="homepage";
  }

  if($action=="editpage" && preg_match("/^[a-zA-Z ]+$/i",$x)) {
    $action=$x;

  }
  if($action=="delete" && preg_match("/^[a-zA-Z ]+$/i",$x)) {
    $action=$x;

  }
}
// this file is added for calling methods like getbyid,getbyusername,and homepage
require 'controller/blogfunc.php';
if($action=="")
{
  require 'view/blogindex.php';
  $obj = new blog();
  $obj->get_homepage_blogs();

}
if($action=="homepage")
{
  require 'view/blogindex.php';
  $obj = new blog();
  $obj->get_homepage_blogs();

}
elseif($action=="getbyid")
{
  $obj = new blog();
  $obj->get_by_id($x);
}
elseif($action=="myblogs")
{
  $obj = new blog();
  $obj->get_by_username();
}
elseif($action=="bloglogin")
{
  require 'model/bloglogin.php';
}
elseif($action=="loginpage")
{
  require 'view/loginhtml.php';
}
elseif($action=="bloglogout")
{
  require 'view/bloglogout.php';
}
elseif($action=="editpage")
{
  require 'view/edithtml.php';
}
elseif($x=="edit")
{
  require 'model/edit.php';
}
elseif($action=="addpage")
{
  require 'view/addhtml.php';
}
elseif($action=="add")
{ echo "fuids";
  require 'model/entry.php';
}
elseif($action=="delete")
{
  require 'model/delete.php';
}

elseif($action=="blogsignup")
{
  require 'view/blogsignup.php';
}
elseif($action=="blogsignupvalidation")
{
  require 'model/blogsignupvalidation.php';
}
 ?>
