<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require("adatok.php");

if ($argc > 3) {
  echo "Túl sok paraméter!" . PHP_EOL;
  exit(4);
}

if ($argc == 3 && $argv[1] == "hozzafuz") {
  $input = explode("/", $argv[2]);

  $gyumolcsok[] = $input[0];
  $gyumolcsok[] = $input[1];

  for ($i = 0; $i < count($gyumolcsok); $i++) {
    echo $i . ": " . $gyumolcsok[$i] . PHP_EOL;
  }

  exit(0);
}

$fruits = array_chunk($gyumolcsok, 2);

if ($argc == 1) {
  echo "Gyümölcsök száma: " . count($fruits) . PHP_EOL;

  foreach ($fruits as $pair) {
    echo "- a(z) " . $pair[0] . " " . $pair[1] . " színű" . PHP_EOL;
  }

  exit(0);
}

$input = $argv[1];

if ($input == "megegyezik") {
  foreach ($fruits as $pair) {
    if ($pair[0] == $pair[1]) echo $pair[0] . PHP_EOL;
  }

  exit(0);
}

$matching = [];

foreach ($fruits as $pair) {
  if ($pair[1] == $input) $matching[] = $pair[0];
}

echo implode(", ", $matching) . PHP_EOL;
