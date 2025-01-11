<?php

declare(strict_types=1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use MediaCompany\AudioVideo\Fenykepezogep;

if ($argc < 2) {
  echo "A szkriptnek nem lett megadva a kimeneti fájl neve!" . PHP_EOL;
  exit(2);
}

$file = $argv[1];
$fileType = explode('.', $file)[1];

if (!in_array($fileType, ['txt', 'csv'])) {
  echo "A kimeneti fájl kiterjesztése csak `txt` vagy `csv` lehet!" . PHP_EOL;
  exit(7);
}

$faker = Faker\Factory::create("hu_HU");

$records = $argc == 3 && $argv[2] > 0
  ? $argv[2]
  : $faker->numberBetween(1, 10);

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

$serparator = $fileType == 'txt' ? PHP_EOL : ";";

foreach ($cameras as $camera) {
  fwrite($output, implode($serparator, [
    $camera->getSorszam(),
    $camera->getTeljesNev(),
    $camera->getSorozatszam(),
    $camera->getGyartasiEv()
  ]) . PHP_EOL);
}

fclose($output);
