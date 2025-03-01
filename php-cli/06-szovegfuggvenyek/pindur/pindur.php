<?php
$pp = [
  "sziporka" => "Blossom",
  "puszedli" => "Bubbles",
  "csuporka" => "Butercup",
  "pukkancs" => "Bliss",
  "nyuszi" => "Bunny"
];

echo "Pindúr Pandúrok (The Powerpuff Girls)" . PHP_EOL;

$names = explode(";", $argv[1]);
$angolnevek = [];

foreach ($names as $name) {
  $name = mb_strtolower($name);
  if (array_key_exists($name, $pp)) $angolnevek[] = $pp[$name];
}

echo implode(PHP_EOL, $angolnevek) . PHP_EOL;
