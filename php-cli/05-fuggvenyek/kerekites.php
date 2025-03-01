<?php
require('fuggvenyek.php');

if ($argc > 3) {
  echo "Túl sok paraméter!\n";
  exit(1);
}

$input = $argv[1];

if (!is_numeric($input)) {
  echo "Az első paraméter csak szám lehet\n";
  exit(1);
}

if ($argc === 2) {
  echo matematikaiKerekites($input) . "\n";
  exit(0);
}

switch ($argv[2]) {
  case 'fel':
    echo felKerekites($input) . "\n";
    break;
  case 'le':
    echo leKerekites($input) . "\n";
    break;
  case 'ft':
    echo ftKerekites($input) . "\n";
    break;
  case 'bankar':
    echo bankarKerekites($input) . "\n";
    break;
  default:
    echo "Ismeretlen kerekítési mód!\n";
    exit(1);
}
