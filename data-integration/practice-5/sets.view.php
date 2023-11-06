<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Sets</title>
</head>
<body>
  <h1>Check out these neat sets</h1>
  <h1>What the heck do they do</h1>
  <div class="sets">
    <h3>Set 1:</h3>
    <p>
      <?php
        if (isset($_SESSION['num_set1'])) {
          echo $_SESSION['num_set1']->printSet();
        }
      ?>
    </p>
    <h3>Set 2:</h3>
    <p>
      <?php
        echo $_SESSION['num_set2']->printSet();
      ?>
    </p>
    <h3>Set 3:</h3>
    <p>
      <?php
        echo $_SESSION['num_set3']->printSet();
      ?>
    </p>
  </div>
  <form action="sets.php" method="POST">
    <div>
      <label for="set_select_1">Select your set:</label>
      <select name="set_select_1">
        <option value="num_set1">Set 1</option>
        <option value="num_set2">Set 2</option>
        <option value="num_set3">Set 3</option>
      </select>
      <label for="set_select_2" >Select another set:</label>
      <select name="set_select_2">
        <option value="num_set1">Set 1</option>
        <option value="num_set2">Set 2</option>
        <option value="num_set3">Set 3</option>
      </select>
    </div>
    <label for="operation" >Select an operation:</label>
    <select name="operation">
      <option value="check">Check for a number</option>
      <option value="add">Add a number</option>
      <option value="remove">Remove a number</option>
      <option value="union">Create a union</option>
      <option value="intersect">Get the intersection</option>
    </select>
    <br>
    <label for="num_input">Enter a number (only for check, add, or remove)</label>
    <input type="number" name="num_input">
    <br>
    <input type="submit" name="submit" class="submit">
  </form>
  <?php
    if (isset($_SESSION['result'])) {
      echo "<h3>Result:<h3><br>";
      echo $_SESSION['result'];
      unset($_SESSION['result']);
    }
  ?>
</body>
</html>