<?php
require 'home.php';
require 'calculator.view.php';

if (isset($_POST['calculate'])) {
  $operation = $_POST['operator'];
  $num1 = $_POST['num1'];
  $num2 = $_POST['num2'];

  session_start();
  
  switch ($operation) {
    case 'none':
      break;
    case 'add':
      $_SESSION['result'] = $num1 + $num2;
      break;
    case 'subtract':
      $_SESSION['result'] = $num1 - $num2;
      break;
    case 'multiply':
      $_SESSION['result'] = $num1 * $num2;
      break;
    case 'divide':
      $_SESSION['result'] = $num1 / $num2;
      break;
  }
  header("Location: calculator.php");
}

