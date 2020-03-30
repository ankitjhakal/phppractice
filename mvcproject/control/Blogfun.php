<!--
  * @file
  * this  controller file contains all functions used for blog editing,adding  and deleting.
 -->
<?php
/**
  * this class is used for control all the functionality related to blog handling.
*/

class Blogfuncontrol {
  /**
     * this function is used to show blogs according to id.
     * @param
     * @id basically contains the blog_id
  */
  function blog($id) {
    include('model/Blogfun.php');
    $obj = new Blogfunmodel;
    $obj->blog($id);
  }
  // this function is used to display add blog form.
  function add() {
    include('view/add.php');
  }
  // this function is used to add blog form data in database.
  function addblog() {
    include('model/Blogfun.php');
    $obj = new Blogfunmodel;
    $obj->add();
  }
  /**
     * this function is used to delete a blog.
     * @param
     * @id basically contains the blog_id
  */
	function delete($id) {
		include('model/Blogfun.php');
		$obj = new Blogfunmodel;
		$obj->delete($id);
	}
  /**
     * this function is used to edit a blog.
     * @param
     * @id basically contains the blog_id
  */
  function edit($id) {
    include('model/Blogfun.php');
    $obj = new Blogfunmodel;
    $res = $obj->editshow($id);
    if($res != null) {
      $row = $res->fetch_assoc();
      if($_SESSION['user_name'] == $row['username']) {
        $res = $obj->editshow($id);
        include('view/edit.php');
        $obj = new Editview;
        $obj->edit($res);
      }
      else {
        echo "<h1>Unauthenticated user<h1>";
      }
    }
  }
  /**
     * this function is used to save edit blog data in database.
     * @param
     * @id basically contains the blog_id
  */
  function editfeed($id) {
    include('model/Blogfun.php');
    $obj = new Blogfunmodel;
    $obj->edit($id);
  }
}
?>
