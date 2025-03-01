<?php
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
  $f = $value * 9 / 5 + 32;
  echo "$value celsius az $f fahrenheit.\n";
} else {
  $c = ($value - 32) * 5 / 9;
  echo "$value fahrenheit az $c celsius.\n";
}
