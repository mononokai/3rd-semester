<?php
session_start();



if (isset($_GET['error'])) {
  echo "<h1>Please fill out the entire form<h1>";
}

if (isset($_POST['submit']) && $_POST['password'] == $_POST['confirm']) {
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['password'] = $_POST['password'];
  $_SESSION['new'] = true;
  header("Location: home.php");
}
else if ($POST['password'] != $_POST['confirm']) {
  echo "<h1>Passwords do not match, please try again.</h1>";
}

require 'index.view.php';