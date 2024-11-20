<?php
require('fuggvenyek.php');

if ($argc < 3) {
  echo "Túl kevés paraméter\n";
  exit(1);
}

if ($argc > 3) {
  echo "Túl sok paraméter\n";
  exit(1);
}

$value = $argv[1];
$unit = mb_strtolower($argv[2]);

if (!is_numeric($value)) {
  echo "Hibás hőfok\n";
  exit(1);
}

if (!in_array($unit, ["c", "celsius", "f", "fahrenheit"])) {
  echo "Hibás mértékegység\n";
  exit(1);
}

if ($unit == "c" || $unit == "celsius") {
  $f = c2f($value);
  echo "$value celsius = $f fahrenheit\n";
} else {
  $c = f2c($value);
  echo "$value fahrenheit = $c celsius\n";
}
