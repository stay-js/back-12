<?php

declare(strict_types=1);
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

use Shop\Fun\BoardGame;
use Shop\Fun\CardGame;
use Shop\Fun\Game;
use Faker\Factory;

if ($argc < 2) {
  echo 'Túl kevés paraméter!' . PHP_EOL;
  exit(4);
}

$type = $argv[1];

if (!in_array($type, ['boardgame', 'cardgame'])) {
  echo 'Nem megfelelő paraméter!' . PHP_EOL;
  exit(49);
}

$class = match ($type) {
  'boardgame' => BoardGame::class,
  'cardgame' => CardGame::class
};

$faker = Factory::create('hu_HU');

$games = [];
$isBoardGame = $type == 'boardgame';

$minPrice = $isBoardGame ? 20 : 10;
$maxPrice = $isBoardGame ? 100 : 50;

for ($i = 0; $i < 6; $i++) {
  $games[] = new $class(
    implode(" ", $faker->words(2)) . ' ' . $faker->numberBetween(1, 9),
    $isBoardGame ? 'strategy' : 'deck building',
    $faker->randomElement(Game::publishers()),
    $faker->randomFloat(2, $minPrice, $maxPrice),
    $isBoardGame ? $faker->numberBetween(1, 6) : 52
  );
}

if ($argc == 2) {
  foreach ($games as $game) {
    echo $game . PHP_EOL;
  }

  exit(0);
}

if ($argv[2] == 'csv') {
  $out = fopen('out/' . $type . '.csv', "w");

  foreach ($games as $game) {
    fputcsv($out, $game->toArray(), ";");
  }

  fclose($out);
}
