<?php
if ($argc < 3) {
  echo "Túl kevés paraméter";
  exit(1);
}

if ($argc > 3) {
  echo "Túl sok paraméter";
  exit(1);
}

$value = $argv[1];
$unit = strtolower($argv[2]);

if (!is_numeric($value)) {
  echo "Hibás hőfok";
  exit(1);
}

if (!in_array($unit, array("c", "celsius", "f", "fahrenheit"))) {
  echo "Hibás mértékegység";
  exit(1);
}

if ($unit == "c" || $unit == "celsius") {
  $f = $value * 9 / 5 + 32;
  echo "$value celsius az $f fahrenheit.";
} else {
  $c = ($value - 32) * 5 / 9;
  echo "$value fahrenheit az $c celsius.";
}
?>
