<?php

// string reverse
echo strrev(".dlroW olleH");
echo "<br>";

// repeat string
echo str_repeat("Hip", 2);
echo "<br>";

// uppercase string
echo strtoupper("hooray!");
echo "<br>";

// string length
echo strlen("intro");
echo "<br>";

// function
function greet() {
  print "Hello\n";
}
greet();
greet();
echo "<br>";

// arguments
// we've set a default value for lang
function howdy($lang='es') {
  if ($lang === 'es') return "Hola";
  if ($lang === 'fr') return "Bonjour";

  return "hello";
}

//  global variables
function dozap() {
  global $val;
  $val = 100;
}

// check if function exists
if (function_exists("array_combine")) {
  echo "Function exists";
}
else {
  echo "Function does not exist";
}

// // infinite call stack
// function chicken() {
//   return egg();
// }

// function egg() {
//   return chicken();
// }

// echo chicken() . " came first";





?>