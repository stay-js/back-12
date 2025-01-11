<?php

declare(strict_types=1);
ini_set("display_errors", 1);
error_reporting(E_ALL);


require __DIR__ . '/vendor/autoload.php';

use MediaCompany\AudioVideo\Fenykepezogep;

$faker = Faker\Factory::create("hu_HU");

if ($argc < 2) {
  echo "A szkriptnek nem lett megadva a kimeneti fájl neve!" . PHP_EOL;
  exit(2);
}

$file = $argv[1];

$fileParts = explode('.', $file);

if (!in_array($fileParts[1], ['txt', 'csv'])) {
  echo "A kimeneti fájl kiterjesztése csak `txt` vagy `csv` lehet!" . PHP_EOL;
  exit(7);
}

$records = $faker->numberBetween(1, 10);

if ($argc == 3 && $argv[2] > 0) {
  $records = $argv[2];
}

$cameras = [];

for ($i = 0; $i < $records; $i++) {
  $cameras[] = new Fenykepezogep(
    count($cameras) + 1,
    $faker->word(),
    $faker->firstName("female"),
    $faker->uuid(),
    $faker->numberBetween(date("Y") - 8, date("Y") - 1)
  );
}

$output = fopen(("out/" . $file), 'w');

if ($fileParts[1] == 'txt') {
  foreach ($cameras as $camera) {
    fwrite($output, $camera->getSorszam() . PHP_EOL);
    fwrite($output, $camera->getTeljesNev() . PHP_EOL);
    fwrite($output, $camera->getSorozatszam() . PHP_EOL);
    fwrite($output, $camera->getGyartasiEv() . PHP_EOL);
  }
} else {
  foreach ($cameras as $camera) {
    fputcsv($output, [
      $camera->getSorszam(),
      $camera->getTeljesNev(),
      $camera->getSorozatszam(),
      $camera->getGyartasiEv()
    ], ";");
  }
}

fclose($output);
