<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daves Famous Disk Scheduler</title>
</head>
<body>
    <form action="scheduling_logic.php" method="POST">
        <input type="text" name="start">
        <input type="text" name="requests">
        <input type="text" name="size">
        <select name="type">
            <option value="fcfs">FCFS</option>
            <option value="sstf">SSTF</option>
        </select>
        <input type="submit">
    </form>
    <?php
    session_start();
    if (isset($_SESSION['totalHeadMovement'])) {
        echo "Total Head Movement: " . $_SESSION['totalHeadMovement'];
        echo "<br>";
        echo "buffer: ";
        print_r($_SESSION['buffer']);
        echo "<br>";
        echo "requests: ";
        print_r($_SESSION['requests']);
    }
    ?>
</body>
</html>