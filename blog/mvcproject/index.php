<!--
  *@file
  *this file is basically is working as frontcontroller for project
 -->

<?php
error_reporting( E_WARNING );
$blog_no=$_GET['blog_no'];
$action=$_GET['action'];
// this file is added for calling methods like getbyid,getbyusername,and homepage
require 'controller/blogfunc.php';

if($action=="")
{
  require 'view/blogindex.php';
  $obj = new blog();
  $obj->get_homepage_blogs();

}
elseif($action=="getbyid")
{
  $obj = new blog();
  $obj->get_by_id($blog_no);
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
elseif($action=="edit")
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
 ?>
