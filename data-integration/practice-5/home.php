<?php

session_start();

require 'home.view.php';

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: new_user.php");
}