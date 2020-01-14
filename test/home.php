
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Home page</title>
  </head>
  <body>
    <header id="header">
      <h1> Home </h1>
      <div>
        <a href="logout.php">Logout</a>
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


	  </div>

    </div>
    <footer id="footer">
      Copyright @Vezér.inc
    </footer>
  </body>
</html>
