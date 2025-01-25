<?php

declare(strict_types=1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Acme\Iskola\Jegy as Osztalyzat;
use Acme\Mozi\Jegy as MoziJegy;
use Faker\Factory;

if ($argc < 3) {
  echo "Az első két paraméter megadása kötelező!" . PHP_EOL;
  exit(3);
}

$tipus = $argv[1];

if (!in_array($tipus, ["mozi", "osztalyzat"])) {
  echo "Az első paraméter csak 'mozi' vagy 'osztalyzat' lehet!" . PHP_EOL;
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

$jegyek = generateTickets($tipus, (int)$darabszam);

if ($kimenet == null) {
  foreach ($jegyek as $jegy) {
    echo $jegy . PHP_EOL;
  }

  exit(0);
}

$outPath = "out/" . ($tipus == "osztalyzat" ? "osztalyzatok" : "mozi") . "." . $kimenet;

if ($kimenet == "json") {
  $json = json_encode(array_map(fn($x) => $x->toArray(true), $jegyek), JSON_PRETTY_PRINT);
  file_put_contents($outPath, $json);

  exit(0);
}

$output = fopen($outPath, 'w');

foreach ($jegyek as $jegy) {
  fputcsv($output, $jegy->toArray(false), ";");
}

fclose($output);


function generateTickets(string $tipus, int $darabszam): array
{
  $faker = Factory::create("hu_HU");

  $jegyek = [];

  for ($i = 0; $i < $darabszam; $i++) {
    $jegyek[] = $tipus == "osztalyzat" ? new Osztalyzat(
      $faker->randomElement(Osztalyzat::lehetsegesTipusok()),
      $faker->numberBetween(1, 5),
      $faker->randomElement(Osztalyzat::lehetsegesTantargyak()),
      $faker->name(),
      $faker->dateTimeBetween("-2 weeks")
    ) : new MoziJegy(
      $faker->text(40),
      (int)($faker->numberBetween(9, 19) . "90"),
      $faker->randomElement(MoziJegy::termekNevei()),
      mb_strtoupper($faker->randomLetter()),
      $faker->numberBetween(1, 60),
      $faker->dateTimeBetween("+1 day", "+30 days"),
      $faker->boolean()
    );
  }

  return $jegyek;
}
