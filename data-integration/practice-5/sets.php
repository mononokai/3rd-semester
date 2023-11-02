<?php

session_start();

require "sets.view.php";

if (!isset($_SESSION['num_set1'])) {
  $_SESSION['num_set1'] = new Set([rand(0,20), rand(0,20), rand(0,20), rand(0,20), rand(0,20)]);
  $_SESSION['num_set2'] = new Set([rand(0,20), rand(0,20), rand(0,20), rand(0,20), rand(0,20)]);
  $_SESSION['num_set3'] = new Set([rand(0,20), rand(0,20), rand(0,20), rand(0,20), rand(0,20)]);
}



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