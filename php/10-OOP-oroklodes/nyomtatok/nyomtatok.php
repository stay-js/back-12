<?php

declare(strict_types=1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Neu\Eszkozok\LezerNyomtato;
use Neu\Eszkozok\TintasugarasNyomtato;
use Neu\Eszkozok\Nyomtato;
use Faker\Factory;

if ($argc < 2) {
  echo 'Túl kevés paraméter!' . PHP_EOL;
  exit(7);
}

if ($argc > 3) {
  echo 'Túl sok paraméter!' . PHP_EOL;
  exit(3);
}

$tipus = $argv[1];

if (!in_array($tipus, ['lezer', 'tintasugaras'])) {
  echo 'Nem megfelelő paraméter!' . PHP_EOL;
  exit(29);
}

$faker = Factory::create("hu_HU");

$class = match ($tipus) {
  'lezer' => LezerNyomtato::class,
  'tintasugaras' => TintasugarasNyomtato::class,
};

$minPrice = $tipus === 'lezer' ? 40_000 : 20_000;
$maxPrice = $tipus === 'lezer' ? 300_000 : 250_000;

$nyomtatok = [];

for ($i = 0; $i < 5; $i++) {
  $szines = $faker->boolean;

  $nyomtatok[] = new $class(
    $faker->randomElement(Nyomtato::getGyartok()),
    mb_strtoupper($faker->randomLetter()) . $faker->numberBetween(100, 999),
    $szines,
    $faker->numberBetween($minPrice, $maxPrice),
    $szines ? 4 : 1
  );
}

if ($argc === 2) {
  foreach ($nyomtatok as $nyomtato) {
    echo $nyomtato . PHP_EOL;
  }

  exit(0);
}

$param = $argv[2];

if ($param === 'fajlba') {
  $output = fopen('out/' . $tipus . '.csv', 'w');

  foreach ($nyomtatok as $nyomtato) {
    fputcsv($output, $nyomtato->toArray(), ";");
  }

  fclose($output);

  exit(0);
}

echo $nyomtatok[(int)$param] . PHP_EOL;
