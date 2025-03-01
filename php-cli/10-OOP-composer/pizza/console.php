<?php

declare(strict_types=1);
ini_set("display_errors", 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use FooDev\Food\Pizza;
use Faker\Factory;

if ($argc < 2) {
  echo "Az első paraméter megadása kötelező!" . PHP_EOL;
  exit(9);
}

$count = $argv[1];

if (!is_numeric($count) || $count < 1) {
  echo "Nem megfelelő paraméter!" . PHP_EOL;
  echo "Az első paraméternek 0-nál nagyobb számnak kell lennie!" . PHP_EOL;
  exit(4);
}

$filter = null;

if ($argc == 3) {
  $filter = $argv[2];

  if (!in_array($filter, ["V", "G"])) {
    echo "Nem megfelelő paraméter!" . PHP_EOL;
    echo "A második paraméter csak 'V' (vegán) vagy 'G' (glutén mentes) lehet!" . PHP_EOL;
    exit(7);
  }
}

$pizzas = [];

$faker = Factory::create("it_IT");

for ($i = 0; $i < $count; $i++) {
  $pizzas[] = new Pizza(
    implode(" ", $faker->words(4)),
    $faker->randomElement([24, 32, 55]),
    $faker->boolean,
    $faker->boolean
  );
}

foreach ($pizzas as $pizza) {
  echo $pizza . PHP_EOL;
}

if ($filter == null) {
  $json = json_encode(array_map(fn($x) => $x->toArray(), $pizzas), JSON_PRETTY_PRINT);
  file_put_contents("out/orders.json", $json);

  exit(0);
}

if ($filter == "V") {
  $json = json_encode(array_map(fn($x) => $x->toArray(), array_filter($pizzas, fn($x) => $x->vegan)), JSON_PRETTY_PRINT);
  file_put_contents("out/orders-v.json", $json);

  exit(0);
}

$json = json_encode(array_map(fn($x) => $x->toArray(), array_filter($pizzas, fn($x) => $x->glutenFree)), JSON_PRETTY_PRINT);
file_put_contents("out/orders-g.json", $json);
