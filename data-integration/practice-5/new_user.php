<?php

session_start();

require 'new_user.view.php';

if (isset($_SESSION['errors'])) {
  var_dump($_SESSION['errors']);
  echo "errors";
}

if (isset($_POST["submit"])) {
  $user = new New_User($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm']);
  $user->validate();

  if ($user->errors) {
    $_SESSION['errors'] = $user->errors;
    $_SESSION['inputs'] = $_POST;
    header("Location: new_user.php");
  }
  else {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    header("Location: home.php");
  }
}



class New_User {
  public $errors = [];

  function __construct(public $username, public $email, private $password, private $confirm)
  {

  }

  // Name can't be less than 6 chars
  function name_check() {
    if (strlen($this->username) < 6) {
      array_push($this->errors, 1);
    }
  }

  // Must be valid email
  function email_check() {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      array_push($this->errors, 2);
    }
  }

  // Password must have at least one uppercase letter, lowercase letter, and number
  // Password must have at least 6 chars
  function pass_check() {
    if (strlen($this->password) < 6) {
      array_push($this->errors, 3);
    }
    if (!preg_match("/[A-Z]/", $this->password) and !preg_match("/[a-z]/", $this->password) and !preg_match("/[0-9]/", $this->password)) {
      array_push($this->errors, 4);
    }
  }

  // Passwords must match
  function pass_confirm() {
    if ($this->password != $this->confirm) {
      array_push($this->errors, 5);
    }
  }

  // No field can be empty
  // Return an error array when all checks are done
  function validate() {
    if (empty($this->username) or empty($this->email) or empty($this->password) or empty($this->confirm)) {
      array_push($this->errors, 6);
    }
    
    $this->name_check();
    $this->email_check();
    $this->pass_check();
    $this->pass_confirm();
  }
}