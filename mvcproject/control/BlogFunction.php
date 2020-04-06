<?php
namespace Controller;
use \Model\BlogFunctionModel;
use \View\EditView;
/**
  * This class is used for control all the functionality related to blog handling.
*/

class BlogFunction {
  /**
     * This function is used to show blogs according to id.
     * @param
     * @id basically contains the blog_id
  */
  function blog($id) {
    $obj = new BlogFunctionModel;
    $obj->blog($id);
  }
  // This function is used to display add blog form.
  function add() {
    include('view/add.php');
  }
  // This function is used to add blog form data in database.
  function addblog() {
    $obj = new BlogFunctionModel;
    $obj->add();
  }
  /**
     * This function is used to delete a blog.
     * @param
     * @id basically contains the blog_id
  */
	function delete($id) {
		$obj = new BlogFunctionModel;
		$obj->delete($id);
	}
  /**
     * This function is used to edit a blog.
     * @param
     * @id basically contains the blog_id
  */
  function edit($id) {
    $obj = new BlogFunctionModel;
    $res = $obj->editshow($id);
    if($res != null) {
      $row = $res->fetch_assoc();
      if($_SESSION['user_name'] == $row['username']) {
        $res = $obj->editshow($id);
        include('view/EditView.php');
        $obj = new EditView;
        $obj->edit($res);
      }
      else {
        echo "<h1>Unauthenticated user<h1>";
      }
    }
  }
  /**
     * This function is used to save edit blog data in database.
     * @param
     * @id basically contains the blog_id
  */
  function editfeed($id) {
    $obj = new BlogFunctionModel;
    $obj->edit($id);
  }
}
?>
