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
      <input type="text" name="username">
      <?php
        if ($_GET['error'] == 1) {
          echo "Username must be at least 6 characters";
        }
      ?>
    </div>
    <div>
      <label for="email">Email</label>
      <input type="email" name="email">
      <?php
        if ($_GET['error'] == 2) {
          echo "Invalid email address";
        }
      ?>
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password">
      <?php
        if ($_GET['error'] == 4) {
          echo "Password must be at least 6 characters";
        }
        if ($_GET['error'] == 3) {
          echo "Password must have at least one lowercase letter, uppercase letter, and number";
        }
      ?>
    </div>
    <div>
      <label for="confirm">Confirm Password</label>
      <input type="password">
      <?php
        if ($_GET['error'] == 5) {
          echo "Passwords do not match";
        }
      ?>
    </div>
    <?php
      if ($_GET['error'] == 6) {
        echo "All form entries must be filled out";
      }
    ?>

    <input type="submit" name="submit">
  </form>
</body>
</html>