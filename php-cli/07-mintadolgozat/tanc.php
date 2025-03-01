<?php
require('adatok.php');

if ($argc > 2) {
  echo 'Túl sok paraméter!' . PHP_EOL;
  exit(4);
}

$pairs = array_chunk($parok, 2);

if ($argc == 1) {
  foreach ($pairs as $pair) {
    echo $pair[0] . ' - ' . $pair[1] . PHP_EOL;
  }
  exit(0);
}

$arg = mb_strtolower($argv[1]);

if (!in_array($arg, ['fiuk', 'lanyok', 'utolso', 'letszam'])) {
  echo 'Ismeretlen paraméter!' . PHP_EOL;
  exit(3);
}

if ($arg == 'fiuk') {
  foreach ($pairs as $pair) {
    echo "- " . explode(" ", $pair[1])[0] . PHP_EOL;
  }
  exit(0);
}

if ($arg == 'lanyok') {
  echo implode(", ", array_map(fn($x) => explode(" ", $x[0])[1], $pairs)) . PHP_EOL;
  exit(0);
}

if ($arg == 'utolso') {
  $lastPair = end($pairs);
  echo $lastPair[0] . ' - ' . $lastPair[1] . PHP_EOL;
  exit(0);
}

echo count($parok) . PHP_EOL;
