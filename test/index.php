<?php
session_start();
$db = mysqli_connect('localhost','root','','authentication') or die($db);

if (isset($_POST['register_btn'])) {

  $username = mysqli_real_escape_string($db,$_POST['username']);
  $email = mysqli_real_escape_string($db,$_POST['email']);
  $password1 = mysqli_real_escape_string($db,$_POST['password1']);
  $password2 = mysqli_real_escape_string($db,$_POST['password2']);

  if ($password1 == $password2) {
    // code...
    $password1 = md5($password1);
    $sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password1')";
    mysqli_query($db,$sql);
    $_SESSION['messeage'] = "Succesfull registration";
    $_SESSION['username'] = $username;
    header("location: login.php");
  }else{
    $_SESSION['message'] = "The passwords are wrong";
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
  </head>
  <body>
    <header id="header">
      <h1> Register </h1>
      <div>
        <a href="login.php">Login</a>
      </div>
    </header>
    <div id="container">
      <?php
      if (isset($_SESSION['message'])) {
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
        // code...
      }
       ?>
      <div id="main">
        <form method="post" action="index.php">
          <table>
            <tr>
              <td>Username:</td>
              <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><input type="email" name="email" class="textInput"></td>
            </tr>
            <tr>
              <td>Password:</td>
              <td><input type="password" name="password1" class="textInput"></td>
            </tr>
            <tr>
              <td>Password again:</td>
              <td><input type="password" name="password2" class="textInput"></td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" name="register_btn" value="Register" class="btn1"></td>
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
