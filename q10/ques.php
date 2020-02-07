<!-- QUESTION: I lost my password! This exercise is a continuation of the exercise of
login page, implementing more features than a simple register and login
process. You are supposed to add an additional button as "forgot
password". After clicking on that button you will be redirected to a
page where you will be asked a private ques which you will set in your
database with the answer. On entering the correct answer you will be
redirected to the page where you will be allowed to reset password. The
script should respond accordingly to the situation -->
<!-- page for private questions and reset new password   -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <h3>Select your security question :</h3>
  <form action="savenewpwd.php" method="post">
   <input type="text" name="username" placeholder="enter username">
   <br><br>
   <input type="text" name="newpwd" placeholder="enter newpwd">
   <br><br>
   <input type="text" name="resetpwd" placeholder="enter resetpwd">
   <br><br>
   <select id = "prique" name="prique" required>
              <option value = "1">fname</option>
              <option value = "3">lname</option>
              <option value = "5">fullname</option>
   </select>
   <br><br>
   <input type="text" placeholder="Enter the security question answer" name="prians" required>
   <br><br>
   <input type="submit" name="submit" value="submit">
  </form>
  </body>
</html>
