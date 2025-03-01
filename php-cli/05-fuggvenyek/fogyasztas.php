<?php
require('fuggvenyek.php');

if ($argc < 4) {
  echo "Túl kevés paraméter\n";
  exit(1);
}

if ($argc > 4) {
  echo "Túl sok paraméter\n";
  exit(1);
}

$previous = $argv[1];
$current = $argv[2];
$distance = $current - $previous;
$liter = $argv[3];

echo "Előző óraállás: " . number_format($previous, 0, '.', ' ') . " km\n";
echo "Mostani óraállás: " . number_format($current, 0, '.', ' ') . " km\n";
echo "Megtett út: " . number_format($distance, 0, '.', ' ') . " km\n";
echo "Tankolt üzemanyag: $liter liter\n";
echo "Átlagfogyasztás: " . fogyasztas($distance, $liter) . " liter/100km\n";
