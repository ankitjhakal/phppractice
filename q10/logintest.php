<!-- QUESTION: I lost my password! This exercise is a continuation of the exercise of
login page, implementing more features than a simple register and login
process. You are supposed to add an additional button as "forgot
password". After clicking on that button you will be redirected to a
page where you will be asked a private ques which you will set in your
database with the answer. On entering the correct answer you will be
redirected to the page where you will be allowed to reset password. The
script should respond accordingly to the situation -->
<!-- login form for reset password  -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form  action="logged.php" method="post">
      Username: <input type="text" name="username"><br><br>
      Password: <input type="text" name="password"><br><br>
      Reset PWD: <input type="submit" name="forgotpassword" value="forgot password"><br><br>
      <input type="submit" name="submit" value="login">
    </form>
  </body>
</html>
