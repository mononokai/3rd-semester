<h1>Sign up</h1>
<form action="index.php" method="post">
  <label for="name">Name</label>
  <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''?>" required>
  <br>
  <label for="name">Email:</label>
  <input type="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>" required>
  <br>
  <label for="password">Password:</label>
  <input type="password" name="password" required>
  <br>
  <label for="confirm">Confirm Password:</label>
  <input type="password" name="confirm" required>
  <br>
  <input type="submit" name="submit">
</form>