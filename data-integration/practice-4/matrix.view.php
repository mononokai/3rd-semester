<h2>2x2</h2>
<form action="matrix.php" method="post">
  (<input type="number" name="x1")> , <input type="number" name="y1">)
  <br>
  (<input type="number" name="x2"> , <input type="number" name="y2">)
  <br>
  <select name="operator" id="">
    <option value="none">None</option>
    <option value="add">Add</option>
    <option value="subtract">Subtract</option>
    <option value="multiply">Multiply</option>
    <option value="divide">Divide</option>
  </select>
  <input type="submit" name="calc2">
</form>

<br>

<h2>3x3</h2>
<form action="matrix.php" method="post">
  (<input type="number" name="x1")> , <input type="number" name="y1"> , <input type="number" name="z1">)
  <br>
  (<input type="number" name="x2"> , <input type="number" name="y2"> , <input type="number" name="z2">)
  <br>
  (<input type="number" name="x3"> , <input type="number" name="y3"> , <input type="number" name="z3">)
  <br>
  <select name="operator" id="">
    <option value="none">None</option>
    <option value="add">Add</option>
    <option value="subtract">Subtract</option>
    <option value="multiply">Multiply</option>
    <option value="divide">Divide</option>
  </select>
  <input type="submit" name="calc3">
</form>