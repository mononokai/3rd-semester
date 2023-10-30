<?php
session_start();
if ($_SESSION['new']) {
  echo "<h1>Thank you for signing up</h1>";

  $_SESSION['new'] = false;
}
if (isset($_SESSION["name"])) {
  echo "<h1>Welcome, {$_SESSION['name']}. Your email address is {$_SESSION['email']}<h1>";
}
else header("Location: index.php?error=1");

require 'home.view.php';
