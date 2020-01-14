<?php
session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION['message'] = "logging out...";
header("location: login.php");

?>
