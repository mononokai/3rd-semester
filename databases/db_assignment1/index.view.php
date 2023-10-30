<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <title>Disk Scheduling</title>
</head>
<body>
  <h1 class="animate__animated animate__slideInDown"><a href="index.php">Disk Scheduling Calculator</a></h1>
  <form action="index.php" method="post" class="animate__animated animate__bounceInLeft">
    <label for="start">Starting position:</label>
    <input type="number" name="start" required>

    <label for="list">List the position numbers, separated by commas:</label>
    <textarea name="list" rows="5" required></textarea>

    <label for="sector">Sector size:</label>
    <input type="number" name="sector" required>

    <input type="submit" value="Calculate" name="calculate" id="submit" onmouseenter="jiggle()" onmouseleave="unjiggle()">
  </form>

  <script>
    function jiggle() {
      document.querySelector("#submit").className = "animate__animated animate__tada";
    }
    function unjiggle() {
      document.querySelector("#submit").className = "";
    }
  </script>
</body>
</html>