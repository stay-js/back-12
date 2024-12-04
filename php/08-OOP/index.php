<?php

require('src/Matematika/Geometria/Teglalap.php');

use Matematika\Geometria\Teglalap;

if ($argc != 4) {
  echo "Hibás paraméterezés!" . PHP_EOL;
  exit(1);
}


$rect = new Teglalap($argv[1], $argv[2]);

if ($argv[3] == "kerulet") {
  echo $rect->circumference() . PHP_EOL;
} else {
  echo $rect->area() . PHP_EOL;
}
