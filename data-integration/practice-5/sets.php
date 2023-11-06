<?php

session_start();


if (!isset($_SESSION['num_set1'])) {
  $_SESSION['num_set1'] = new Set([rand(0,20), rand(0,20), rand(0,20), rand(0,20), rand(0,20)]);
  $_SESSION['num_set2'] = new Set([rand(0,20), rand(0,20), rand(0,20), rand(0,20), rand(0,20)]);
  $_SESSION['num_set3'] = new Set([rand(0,20), rand(0,20), rand(0,20), rand(0,20), rand(0,20)]);
}


if (isset($_POST['submit'])) {
  $operation = $_POST['operation'];
  $selection = $_POST['set_select_1'];
  $second = $_POST['set_select_2'];
  $num_input = $_POST['num_input'];
  switch ($operation) {
    case "check":
      if ($num_input) {
        if ($_SESSION[$selection]->exists($num_input)) {
          $_SESSION['result'] = "{$num_input} is in the set";
        }
        else {
          $_SESSION['result'] = "{$num_input} is not in the set";
        }
      }
      else {
        $_SESSION['result'] = "Please fill out all required fields";
      }
      break;
    case "add":
      if ($num_input) {
        $_SESSION[$selection]->addNumber($num_input);
      }
      else {
        $_SESSION['result'] = "Please fill out all required fields";
      }
      break;
    case "remove":
      if ($num_input) {
        $_SESSION[$selection]->remove($num_input);
      }
      else {
        $_SESSION['result'] = "Please fill out all required fields";
      }
      break;
    case "union":
      $res = $_SESSION[$selection]->union($_SESSION[$second]->getSet());
      $_SESSION['result'] = implode(', ', $res);
      break;
    case "intersect":
      $res = $_SESSION[$selection]->intersection($_SESSION[$second]->getSet());
      $_SESSION['result'] = implode(', ', $res);
      break;
  }
}


require "sets.view.php";


class Set {
  function __construct(protected $set) {

  }

  function getSet() {
    // returns set of numbers
    return $this->set;
  }

  function exists($n) {
    // returns true if $n exists in the set
    return in_array($n, $this->set);
  }

  function addNumber($n) {
    // adds $n to the set if it does not already exist in the set
    if (!in_array($n, $this->set)) {
      array_push($this->set, $n);
    }
  }

  function remove($n) {
    // removes $n from the set if it exists and returns true
    // returns false if $n does not exist in set
    if (in_array($n, $this->set)) {
      foreach ($this->set as $key=>$val) {
        if ($val == $n) {
          unset($this->set[$key]);
        }
      }
      return true;
    }
    else {
      return false;
    }
  }

  function union($set2) {
    // returns a new set that is the union of the first two set
    return array_merge($this->set, $set2);
  }

  function intersection($set2) {
    // returns a new set that is the intersection of two points
    return [end($this->set), $set2[0]];
  }

  function printSet() {
    // returns an HTML string to display it in the browser
    return implode(', ', $this->set);
  }

  function minus($set2) {
    // returns a new set having the elements of set1 minus the matching ones from set2
    $res = $this->set;

    foreach ($res as $key=>$val) {
      foreach ($set2 as $comp) {
        if ($val == $comp) {
          unset($res[$key]);
        }
      }
    }

    return $res;
  }
}