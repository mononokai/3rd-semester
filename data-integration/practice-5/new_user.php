<?php

require 'new_user.view.php';

echo $_POST['username'];
if (isset($_POST['submit'])) {
  echo "submit";
}

if (isset($_POST["submit"])) {
  $user = new New_User($_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm']);
  echo "user made";
  $user->validate();
  header("Location: home.php");
}

class New_User {
  function __construct(public $username, public $email, private $password, private $confirm)
  {

  }

  // Name can't be less than 6 chars
  function name_check() {
    if (strlen($this->username) < 6) {
      header("Location: new_user.php?error=1");
    }
  }

  // Must be valid email
  function email_check() {
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      header("Location: new_user.php?error=2");
    }
  }

  // Password must have at least one uppercase letter, lowercase letter, and number
  // Password must have at least 6 chars
  function pass_check() {
    if (strlen($this->password) < 6) {
      header("Location: new_user.php?error=3");
    }
    if (!preg_match("/[A-Z],[a-z],[0-9]/", $this->password)) {
      header("Location: new_user.php?error=4");
    }
  }

  // Passwords must match
  function pass_confirm() {
    if ($this->password != $this->confirm) {
      header("Location: new_user.php?error=5");
    }
  }

  // No field can be empty
  // Return an error array when all checks are done
  function validate() {
    if (empty($this->username) or empty($this->email) or empty($this->password) or empty($this->confirm)) {
      header("Location: new_user.php?error=6");
    }
    
    $this->name_check();
    $this->email_check();
    $this->pass_check();
    $this->pass_confirm();
  }
}