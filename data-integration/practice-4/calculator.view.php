<form action="calculator.php" method="post">
  <input type="number" name="num1" placeholder="Number 1">
  <input type="number" name="num2" placeholder="Number 2">
  <select name="operator" id="">
    <option value="none">None</option>
    <option value="add">Add</option>
    <option value="subtract">Subtract</option>
    <option value="multiply">Multiply</option>
    <option value="divide">Divide</option>
  </select>
  <br>
  <input type="submit" value="Calculate" name="calculate">
</form>

<?php
session_start();

if (isset($_SESSION['result'])) {
  echo "<h3>The answer is:<p><p>{$_SESSION['result']}</p>";
  unset($_SESSION['result']);
}