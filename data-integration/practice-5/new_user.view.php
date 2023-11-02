<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>New User</title>
</head>
<body>
  <h1>Create New User</h1>
  <form action="new_user.php" method="POST">
    <div>
      <label for="username">Username</label>
      <input type="text" name="username" value="<?= isset($_SESSION['inputs']['username']) ? $_SESSION['inputs']['username'] : ''?>">
      <?php
        if (isset($_SESSION['errors']) and in_array(1, $_SESSION['errors'])) {
          echo "<br>Username must be at least 6 characters";
        }
        if (isset($_POST['username'])) {
          echo $_POST['username'];
        }
      ?>
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email" name="email" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''?>">
      <?php
        if (isset($_SESSION['errors']) and in_array(2, $_SESSION['errors'])) {
          echo "<br>Invalid email address";
        }
      ?>
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password">
      <?php
        if (isset($_SESSION['errors']) and in_array(3, $_SESSION['errors'])) {
          echo "<br>Password must be at least 6 characters";
        }
        if (isset($_SESSION['errors']) and in_array(4, $_SESSION['errors'])) {
          echo "<br>Password must have at least one lowercase letter, uppercase letter, and number<br>";
          echo $_SESSION['inputs']['password'];
        }
      ?>
    </div>
    <div>
      <label for="confirm">Confirm Password</label>
      <input type="password" name="confirm">
      <?php
        if (isset($_SESSION['errors']) and in_array(5, $_SESSION['errors'])) {
          echo "<br>Passwords do not match";
        }
      ?>
    </div>

    <input type="submit" name="submit">
    <?php
      if (isset($_SESSION['errors']) and in_array(6, $_SESSION['errors'])) {
        echo "<br>All form entries must be filled out";
      }

      if (isset($_SESSION['inputs'])) {
        unset($_SESSION['inputs']);
      }
      if (isset($_SESSION['errors'])) {
        unset($_SESSION['errors']);
      }
    ?>
  </form>
</body>
</html>