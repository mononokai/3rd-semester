<?php
if (isset($_POST['logout'])) {
  header("Location: logout.php");
}
else if (isset($_POST['calculator'])) {
  header("Location: calculator.php");
}
else if (isset($_POST['matrix'])) {
  header("Location: matrix.php");
}