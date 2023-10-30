<?php
  // Print the following
  echo 'These are what I "ordered" -<br>';
  echo "\t1. My son's watch<br>";
  echo "\t2. 12 cans of soda<br>";
  echo "\t3. Some chips - <br>\t\tLays<br>\t\tPringles<br><br>";
  echo "Yes. the order id is \\5412\\";

  
  // Print the following
  $ans = 125 / pi();
  $ans2 = 7e9 * 7.139 / 100;
  $ans3 = $ans2 * 0.01;
  $ans4 = $ans3 * 365;
  echo "125 divided by pi is {$ans}<br><br>";
  echo "The current world population is about 7000000000 <br>Lets say 7.139 % of the are financially stable <br>That makes 7e9 * 7.139 / 100 = {$ans2} people <br> If {$ans2} people each donate $0.01 a day, imagine how much money we can collect! <br>{$ans2} * 0.01 would be {$ans3} dollars a day! <br>Which is equivalent to {$ans4} dollars a year!<br>";


  // 1
  function sumify($num1, $num2) {
    if ($num1 === $num2) {
      return ($num1 + $num2) * 3;
    }
    else {
      return $num1 + $num2;
    }
  };

  echo sumify(1,2) . "<br>"; // 3
  echo sumify(3,2) . "<br>"; // 5
  echo sumify(2,2) . "<br>"; // 12


  // 2
  function absDiff($n) {
    if ($n > 51) {
      return abs(($n - 51) * 3);
    }
    else {
      return abs($n - 51);
    }
  };

  echo absDiff(53) . "<br>"; // 6
  echo absDiff(30) . "<br>"; // 21
  echo absDiff(51) . "<br>"; // 0


  // 3
  function isItThirty($num1, $num2) {
    if ($num1 === 30 || $num2 === 30 || $num1 + $num2 === 30) {
      return true;
    }
    else {
      return false;
    }
  };

  echo var_dump(isItThirty(30,0)) . "<br>"; // 1
  echo var_dump(isItThirty(25,5)) . "<br>"; // 1
  echo var_dump(isItThirty(20,30)) . "<br>"; // 1
  echo var_dump(isItThirty(20,25)) . "<br>"; // 0


  // 4
  function closeNumber($num) {
    if (abs($num - 100) <= 10 || abs($num - 200) <= 10) {
      return true;
    }
    else {
      return false;
    }
  };

  echo var_dump(closeNumber(103)) . "<br>"; // 1
  echo var_dump(closeNumber(90)) . "<br>"; // 1
  echo var_dump(closeNumber(89)) . "<br>"; // 0


  // 10
  function threeOrSeven($num1) {
    if ($num1 % 3 === 0 || $num1 % 7 === 0) {
      return true;
    }
    else {
      return false;
    }
  };

  echo var_dump(threeOrSeven(3)) . "<br>"; // 1
  echo var_dump(threeOrSeven(14)) . "<br>"; // 1
  echo var_dump(threeOrSeven(12)) . "<br>"; // 1
  echo var_dump(threeOrSeven(37)) . "<br>"; // 0


  function tempCheck($num1, $num2) {
    if (($num1 < 0 && $num2 > 100) || ($num1 > 100 && $num2 < 0)) {
      return true;
    }
    else {
      return false;
    }
  };

  echo var_dump(tempCheck(120, -1)) . "<br>"; // 1
  echo var_dump(tempCheck(-1, 120)) . "<br>"; // 1
  echo var_dump(tempCheck(2, 120)) . "<br>"; // 0


  // 15
  function rangeCheck($num1, $num2, $num3) {
    if (($num1 >= 20 && $num1 <= 50) || ($num2 >= 20 && $num2 <= 50) || ($num3 >= 20 && $num3 <= 50)) {
      return true;
    }
    else {
      return false;
    }
  };

  echo var_dump(rangeCheck(11, 20, 12)) . "<br>"; // 1
  echo var_dump(rangeCheck(30, 30, 17)) . "<br>"; // 1
  echo var_dump(rangeCheck(25, 35, 50)) . "<br>"; // 1
  echo var_dump(rangeCheck(15, 12, 8)) . "<br>"; // 0


  // 42
  function threeOrSevenTwo($num) {
    if (($num % 3 === 0 && $num % 7 !== 0) || ($num % 3 !== 0 && $num % 7 === 0)) {
      return true;
    }
    else {
      return false;
    }
  };

  echo var_dump(threeOrSevenTwo(3)) . "<br>"; // 1
  echo var_dump(threeOrSevenTwo(7)) . "<br>"; // 1
  echo var_dump(threeOrSevenTwo(21)) . "<br>"; // 0


  // 43
  function twoWithinTen($num) {
    if ($num % 10 <= 2) {
      return true;
    }
    elseif ($num < 10) {
      if (10 - $num <= 2) {
        return true;
      }
    }
    else {
      return false;
    }
  };

  echo var_dump(twoWithinTen(3)) . "<br>"; // 0
  echo var_dump(twoWithinTen(7)) . "<br>"; // 0
  echo var_dump(twoWithinTen(8)) . "<br>"; // 1
  echo var_dump(twoWithinTen(21)) . "<br>"; // 1


  // Hash Triangle
  function hashTriangle() {
    $hash = "#";

    for ($i = 0; $i <= 6; $i++) {
      echo $hash . "<br>";
      $hash = $hash . "#";
    }
  }
  
  hashTriangle();


  // FizzBuzz
  function fizzBuzz() {
    for ($i = 1; $i <= 100; $i++) {
      if ($i % 3 === 0 && $i % 5 === 0) {
        echo "FizzBuzz <br>";
      }
      elseif ($i % 3 === 0) {
        echo "Fizz <br>";
      }
      elseif ( $i % 5 === 0) {
        echo "Buzz <br>";
      }
      else {
        echo "{$i} <br>";
      }
    };
  };

  fizzBuzz();


  // Ascending Numbers
  function ascendingNumbers() {
    for ($i= 1; $i <= 50; $i++) {
      echo $i . "<br>";
    }

    for ($i= 1; $i < 25; $i++) {
      echo $i . "<br>";
    }

    for ($i= 1; $i < 25; $i++) {
      if ($i % 2 === 1) {
        echo $i . "<br>";
      }
    }

    for ($i= 1; $i < 25; $i++) {
      if ($i % 3 === 0) {
        echo $i . "<br>";
      }
    }

    for ($i= 1; $i <= 50; $i++) {
      if ($i % 5 === 0) {
        echo $i . "<br>";
      }
    }

    for ($i= 1; $i < 50; $i++) {
      if ($i % 2 === 0 && $i % 3 === 0) {
        continue;
      }
      else if ($i % 2 === 0) {
        echo $i . "<br>";
      }
      else if ($i % 3 === 0) {
        echo $i . "<br>";
      }
    }

    for ($i= 1; $i < 100; $i++) {
      if ($i % 12 === 0) {
        continue;
      }
      else if ($i % 2 === 0) {
        echo $i . "<br>";
      }
      else if ($i % 3 === 0) {
        echo $i . "<br>";
      }
    }
  }

  ascendingNumbers();


  // Descending Numbers
  function descendingNumbers() {
    for ($i= 50; $i >= 1; $i--) {
      echo $i . "<br>";
    }

    for ($i= 25; $i >= 1; $i--) {
      echo $i . "<br>";
    }

    for ($i= 25; $i >= 1; $i--) {
      if ($i % 2 === 1) {
        echo $i . "<br>";
      }
    }

    for ($i= 25; $i >= 1; $i--) {
      if ($i % 3 === 0) {
        echo $i . "<br>";
      }
    }

    for ($i= 50; $i >= 1; $i--) {
      if ($i % 5 === 0) {
        echo $i . "<br>";
      }
    }

    for ($i= 50; $i >= 1; $i--) {
      if ($i % 2 === 0 && $i % 3 === 0) {
        continue;
      }
      else if ($i % 2 === 0) {
        echo $i . "<br>";
      }
      else if ($i % 3 === 0) {
        echo $i . "<br>";
      }
    }

    for ($i= 100; $i >= 1; $i--) {
      if ($i % 12 === 0) {
        continue;
      }
      else if ($i % 2 === 0) {
        echo $i . "<br>";
      }
      else if ($i % 3 === 0) {
        echo $i . "<br>";
      }
    }
  }

  descendingNumbers();


  // Multiples of 3
  function multiplyThree() {
    for ($i = 1; $i <= 10; $i++) {
      $num = $i * 3;
      echo "3x{$i} = {$num} <br>";
    }
  }

  multiplyThree();


  // Multiples of 17
  function multiplySeventeen() {
    for ($i = 1; $i <= 10; $i++) {
      $num = $i * 17;
      echo "17x{$i} = {$num} <br>";
    }
  }

  multiplySeventeen();
?>