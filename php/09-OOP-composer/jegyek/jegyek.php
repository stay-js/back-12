<?php

declare(strict_types=1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Acme\Iskola\Jegy;
use Faker\Factory;

if ($argc < 3) {
  echo "Az első két paraméter megadása kötelező!" . PHP_EOL;
  exit(3);
}

$tipus = $argv[1];

if (!in_array($tipus, ["busz", "mozi", "osztalyzat", "repulo"])) {
  echo "Az első paraméter csak 'busz', 'mozi', 'osztalyzat' vagy 'repulo' lehet!" . PHP_EOL;
  exit(7);
}

$darabszam = $argv[2];

if (!is_numeric($darabszam) || $darabszam < 1) {
  echo "Nem megfelelő paraméter!" . PHP_EOL;
  echo "A második paraméternek 0-nál nagyobb számnak kell lennie!" . PHP_EOL;
  exit(2);
}

$kimenet = null;

if ($argc == 4) {
  $kimenet = $argv[3];

  if (!in_array($kimenet, ["csv", "json"])) {
    echo "Nem megfelelő paraméter!" . PHP_EOL;
    echo "A harmadik paraméter csak `csv` vagy `json` lehet amennyiben meg lett adva!" . PHP_EOL;
    exit(9);
  }
}

$faker = Factory::create("hu_HU");

$jegyek = [];

if ($tipus == "osztalyzat") {
  for ($i = 0; $i < $darabszam; $i++) {
    $jegyek[] = new Jegy(
      $faker->randomElement(Jegy::lehetsegesTipusok()),
      $faker->numberBetween(1, 5),
      $faker->word(),
      $faker->name(),
      $faker->dateTimeBetween("-2 weeks")
    );
  }

  if ($kimenet == null) {
    foreach ($jegyek as $jegy) {
      echo $jegy . PHP_EOL;
    }
  }

  if ($kimenet == "json") {
    $json = json_encode(array_map(fn($x) => $x->toArray(true), $jegyek), JSON_PRETTY_PRINT);
    file_put_contents("out/jegyek.json", $json);
  }

  if ($kimenet == "csv") {
    $output = fopen("out/jegyek.csv", 'w');

    foreach ($jegyek as $jegy) {
      fputcsv($output, $jegy->toArray(false));
    }

    fclose($output);
  }
}
