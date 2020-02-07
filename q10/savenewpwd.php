<!-- QUESTION:I lost my password! This exercise is a continuation of the exercise of
login page, implementing more features than a simple register and login
process. You are supposed to add an additional button as "forgot
password". After clicking on that button you will be redirected to a
page where you will be asked a private ques which you will set in your
database with the answer. On entering the correct answer you will be
redirected to the page where you will be allowed to reset password. The
script should respond accordingly to the situation. -->
<!-- validation for reset password -->
<?php
include('connection.php');
//this is the reset password script
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ $username=$_POST['username'];
$prique = $_POST['prique'];
$prians = $_POST['prians'];
$newpwd= $_POST['newpwd'];
$resetpwd=$_POST['resetpwd'];
if($newpwd!=$resetpwd)
{
  echo "Please enter same password in both fields ";
  include('ques.php');
}
//check is user exist in database and private question is correct or not.
else
{
  mysqli_select_db($conn, "mysql1");
  $query="SELECT * FROM logindb";
  if($res=mysqli_query($conn,$query))
  {
  while($row=mysqli_fetch_array($res))
  {
    if($username==$row[0])
    {
      if($prique==$row[2] && $prians==$row[3] )
        {
          $q = "UPDATE logindb SET `password` = '$resetpwd'WHERE username = '$username' ";
          mysqli_query($conn, $q);
          echo "password reset successfully";
        }
     else
       {
        echo "Please submit correct answer";
        include('ques.php');
       }
    }
  }
  }
}
}
?>




​
