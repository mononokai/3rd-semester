<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Home</title>
</head>
<body>
  <h1>Welcome, <?=$_SESSION['username']?></h1>

  <form action="home.php" method="post">
    <input type="submit" name="logout" value="Log Out">
  </form>

</body>
</html>