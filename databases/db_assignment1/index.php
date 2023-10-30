<?php
require 'index.view.php';

if (isset($_GET['error'])) {
  echo "Invalid number entry";
}

if (isset($_POST['calculate'])) {
  require 'calculate.php';
}


