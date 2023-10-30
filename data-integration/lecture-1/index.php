<?php
  echo "Hi there<br>";
  print 12 . "<br>";
  echo 10+5 . "<br>";

  $name = "David";
  echo $name . " is my name. <br>";
  echo "I am $name, and I love PHP. <br>";

  // this do be a comment

  // String length
  echo strlen("I Love PHP!"); // 11
  echo "<br>";

  // Word count
  echo str_word_count("I Love PHP!"); // 3
  echo "<br>";

  // String reverse
  echo strrev("I Love PHP!");
  echo "<br>";

  // Find substring position
  echo strpos("I Love PHP!", "ove");
  echo "<br>";

  // Replace substring with another string
  echo str_replace("HTML", "PHP", "I Love HTML!");
  echo "<br>";

  echo "I am $name <br>"; // I am David
  echo 'I am $name <br>'; // I am $name


?>