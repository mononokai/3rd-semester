<?php
require 'user_interface.php';
session_start();

$start = $_POST['start'];
$requests = explode(",", $_POST['requests']);
$_SESSION['requests'] = $requests;

$size = $_POST['size'];


switch ($_POST['type']) {
    case 'fcfs':
        fcfs_calc($start, $requests);
        break;
    case 'sstf':
        sstf_calc($start, $requests, $size);
}

function fcfs_calc($start, $requests) {
    $totalHeadMovement = 0;
    array_unshift($requests, $start);
    $_SESSION['requests'] = $requests;
    for ($i = 1; $i < count($requests); $i++) {
        echo $requests[$i];
        $movement = abs($requests[$i] - $requests[$i-1]);
        $totalHeadMovement += $movement;
    }
    $_SESSION['totalHeadMovement'] = $totalHeadMovement;
}

function sstf_calc($start, $requests) {
    $currentPosition = $start;
    $totalHeadMovement = 0;
    $buffer = array_splice($requests, 0, 3);
    $count = 0;
    while ($buffer) {
        $count++;
        $closest = null;
        foreach ($buffer as $request) {
            if ($closest === null || abs($currentPosition - $request) < abs($currentPosition - $closest)) {
                $closest = $request;
            }
        }
        $totalHeadMovement += abs($currentPosition - $closest);
        $currentPosition = $closest;
        array_splice($buffer, array_search($closest, $buffer), 1);
        if ($requests) {
          array_push($buffer, array_shift($requests));
        }
        $_SESSION['buffer'] = $buffer;
        $_SESSION['requests'] = $requests;
    }
    $_SESSION['totalHeadMovement'] = $totalHeadMovement;
}



?>