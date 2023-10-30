<?php
require 'home.php';

session_start();
if (isset($_SESSION['x']) && isset($_SESSION['z'])) {
  echo "The answer to your 3x3 matrix is ( {$_SESSION['x']} , {$_SESSION['y']} , {$_SESSION['z']} )";
  unset($_SESSION['x']);
  unset($_SESSION['y']);
  unset($_SESSION['z']);
}
else if (isset($_SESSION['x']) && !isset($_SESSION['z'])) {
  echo "The answer to your 2x2 matrix is ( {$_SESSION['x']} , {$_SESSION['y']} )";
  unset($_SESSION['x']);
  unset($_SESSION['y']);
}

if (isset($_POST['calc2'])) {
  $x1 = $_POST['x1'];
  $x2 = $_POST['x2'];
  $y1 = $_POST['y1'];
  $y2 = $_POST['y2'];
  $operation = $_POST['operator'];

  session_start();
  
  switch ($operation) {
    case 'none':
      break;
    case 'add':
      $_SESSION['x'] = $x1 + $x2;
      $_SESSION['y'] = $y1 + $y2;
      break;
    case 'subtract':
      $_SESSION['x'] = $x1 - $x2;
      $_SESSION['y'] = $y1 - $y2;
      break;
    case 'multiply':
      $_SESSION['x'] = $x1 * $x2;
      $_SESSION['y'] = $y1 * $y2;
      break;
    case 'divide':
      $_SESSION['x'] = $x1 / $x2;
      $_SESSION['y'] = $y1 / $y2;
      break;
  }
  header("Location: matrix.php");
}
else if (isset($_POST['calc3'])) {
  $x1 = $_POST['x1'];
  $x2 = $_POST['x2'];
  $x3 = $_POST['x3'];
  $y1 = $_POST['y1'];
  $y2 = $_POST['y2'];
  $y3 = $_POST['y3'];
  $z1 = $_POST['z1'];
  $z2 = $_POST['z2'];
  $z3 = $_POST['z3'];
  $operation = $_POST['operator'];

  session_start();
  
  switch ($operation) {
    case 'none':
      break;
    case 'add':
      $_SESSION['x'] = $x1 + $x2 + $x3;
      $_SESSION['y'] = $y1 + $y2 + $y3;
      $_SESSION['z'] = $z1 + $z2 + $z3;
      break;
    case 'subtract':
      $_SESSION['x'] = $x1 - $x2 - $x3;
      $_SESSION['y'] = $y1 - $y2 - $y3;
      $_SESSION['z'] = $z1 - $z2 - $z3;
      break;
    case 'multiply':
      $_SESSION['x'] = $x1 * $x2 * $x3;
      $_SESSION['y'] = $y1 * $y2 * $y3;
      $_SESSION['z'] = $z1 * $z2 * $z3;
      break;
    case 'divide':
      $_SESSION['x'] = $x1 / $x2 / $x3;
      $_SESSION['y'] = $y1 / $y2 / $y3;
      $_SESSION['z'] = $z1 / $z2 / $z3;
      break;
  }
  header("Location: matrix.php");
}

require 'matrix.view.php';