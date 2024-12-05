<?php
require('src/Matematika/Geometria/Negyzet.php');
require('src/Matematika/Geometria/Teglalap.php');

use Matematika\Geometria\Negyzet;
use Matematika\Geometria\Teglalap;

if ($argc < 3 || $argc > 4) {
  echo "Hibás paraméterezés!" . PHP_EOL;
  exit(1);
}

if ($argc == 3) {
  $square = new Negyzet($argv[1]);

  if ($argv[2] == "k") {
    echo $square->circumference() . PHP_EOL;
    exit(0);
  }

  echo $square->area() . PHP_EOL;
  exit(0);
}

$rect = new Teglalap($argv[1], $argv[2]);

if ($argv[3] == "k") {
  echo $rect->circumference() . PHP_EOL;
  exit(0);
}

echo $rect->area() . PHP_EOL;
