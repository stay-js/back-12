<?php

declare(strict_types=1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

require("adatok.php");

function osszmagassag(array $players): int
{
  return array_sum(array_map(fn(array $x): int => $x["magassag"], $players));
}

function allampolgarsag(string $query, array $players): int
{
  $count = 0;

  foreach ($players as $player) {
    if (str_contains($player["allampolgarsag"], $query)) $count++;
  }

  return $count;
};

if ($argc > 2) {
  echo "Túl sok paraméter!" . PHP_EOL;
  exit(1);
}

if ($argc == 1) {
  foreach ($jatekosok as $player) {
    echo "#" . $player["mezszam"] . "\t" . mb_strtoupper($player["nev"]) . "\t" . $player["csapat"] . "\t(" . $player["poszt"] . ")" . PHP_EOL;
  }

  exit(0);
}

$input = $argv[1];

if ($input == "osszmagassag") {
  echo osszmagassag($jatekosok) . PHP_EOL;
  exit(0);
}

echo allampolgarsag($input, $jatekosok) . PHP_EOL;
