<?php

declare(strict_types=1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Acme\Kozlekedes\Auto;
use Acme\Kozlekedes\Busz;
use Acme\Kozlekedes\Roller;

if ($argc > 4) {
  echo "Túl sok paraméter!" . PHP_EOL;
  exit(1);
}

$jarmuvek = [];

$jarmuvek[] = new Busz("Ikarus", "280", "kék", "diesel", 36);
$jarmuvek[] = new Auto("Tesla", "Model S", "fehér", "diesel", 5);
$jarmuvek[] = new Roller("Oxelo", "C900", "fekete", 2);
$jarmuvek[] = new Roller("Blackwheels", "Blink gyerek roller", "színes", 3);

if ($argc == 1) {
  foreach ($jarmuvek as $jarmu) {
    echo $jarmu->getGyarto() . " " . $jarmu->getTipus() . " " . $jarmu->getSzin() . PHP_EOL;
  }

  exit(0);
}

$tipus = mb_strtolower($argv[1]);

if (!in_array($tipus, ['auto', 'busz', 'roller'])) {
  echo "Nem megfelelő típus!" . PHP_EOL;
  exit(1);
}

$class = match ($tipus) {
  'auto' => Auto::class,
  'busz' => Busz::class,
  'roller' => Roller::class,
};

$filtered = array_filter($jarmuvek, fn($jarmu) => $jarmu instanceof $class);

if ($argc == 2) {
  foreach ($filtered as $jarmu) {
    echo $jarmu . PHP_EOL;
  }

  exit(0);
}

$output = $argv[2];
$outType = explode(".", $output)[1];

if (!in_array($outType, ['csv', 'json'])) {
  echo "Nem megfelelő kiterjesztés!" . PHP_EOL;
  exit(1);
}

if ($outType == 'csv') {
  $file = fopen(("out/" . $output), 'w');

  foreach ($filtered as $jarmu) {
    fwrite($file, implode(';', $jarmu->toArray(false)) . PHP_EOL);
  }

  fclose($file);

  exit(0);
}

$json = json_encode(array_map(fn($x) => $x->toArray(true), $filtered), JSON_PRETTY_PRINT);
file_put_contents(("out/" . $output), $json);
