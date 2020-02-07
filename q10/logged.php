<!-- QUESTION: I lost my password! This exercise is a continuation of the exercise of
login page, implementing more features than a simple register and login
process. You are supposed to add an additional button as "forgot
password". After clicking on that button you will be redirected to a
page where you will be asked a private ques which you will set in your
database with the answer. On entering the correct answer you will be
redirected to the page where you will be allowed to reset password. The
script should respond accordingly to the situation -->
<!-- check user successfully logged or not if not then use forgotpassword button -->
<?php
if(isset($_POST['forgotpassword']))
{
  header('location:ques.php');
}
else
{
 include('connection.php');
 mysqli_select_db($conn, "mysql1");
 $query="SELECT * FROM logindb";
 if($res=mysqli_query($conn,$query))
 {
 while($row=mysqli_fetch_array($res))
 {
 if($_POST['username']==$row[0])
  {
   if($_POST['password']==$row[1])
   {
    echo "successfully login";
   }
   else
   {
     echo "wrong password";
     include('logintest.php');
   }
  }
 }
 }
 else
 {
  echo "connection error";
 }
}
?>
