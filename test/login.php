<?php
session_start();
$db = mysqli_connect('localhost','root','','authentication') or die($db);

if (isset($_POST['login_btn'])) {

  $username = mysqli_real_escape_string($db,$_POST['username']);

  $password1 = mysqli_real_escape_string($db,$_POST['password1']);

  $password1 = md5($password1);
  $sql = "SELECT * FROM users WHERE username='$username'AND password = '$password1'";
  $result =mysqli_query($db,$sql);
  if (mysqli_num_rows($result)==1) {
    // code...
    $_SESSION['message']="Logging in...";
    $_SESSION['username']=$username;
    header("location: home.php");
  }else {
    // code...
    $_SESSION['message']="Wrong Username or Password";
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
  </head>
  <body>
    <header id="header">
      <h1> HOME </h1>
      <div>
        <a href="index.php">Register</a>
      </div>
    </header>
    <div id="container">

      <div id="main">
        <?php
        if (isset($_SESSION['message'])) {
          echo "<div id='error_msg'>".$_SESSION['message']."</div>";
          unset($_SESSION['message']);
          // code...
        }
         ?>
        <form method="post" action="login.php">
          <table>
            <tr>
              <td>Username:</td>
              <td><input type="text" name="username" class="textInput"></td>
            </tr>

            <tr>
              <td>Password:</td>
              <td><input type="password" name="password1" class="textInput"></td>
            </tr>
            <tr>
              <td><input type="submit" name="login_btn" value="Login" class="btn2"></td>
            </tr>
          </table>
        </form>
	  </div>

    </div>
    <footer id="footer">
      Copyright @Vezér.inc
    </footer>
  </body>
</html>
