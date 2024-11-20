<?php
$hero = $argv[1];
$lower = mb_strtolower($hero);

echo "Hős neve:\t" . mb_strtoupper($hero) . PHP_EOL;

echo "3. feladat" . PHP_EOL;
echo "Hős karaktereinek a száma: " . mb_strlen($hero) . PHP_EOL;

echo "4. feladat" . PHP_EOL;
echo "A hősnek " . ($argc == 3 ? "van" : "nincs") . " társa." . PHP_EOL;

echo "5. feladat" . PHP_EOL;
echo "A hős nevében " .
  (str_contains($lower, "man") ? "szerepel" : "nem szerepel") .
  " a 'man' angol szó." . PHP_EOL;

echo "6. feladat" . PHP_EOL;
echo "A hős neve " . ($lower == strrev($lower) ? "" : "NEM ") . "palindrom." . PHP_EOL;

echo "7. feladat" . PHP_EOL;
echo "A hős neve " . (str_starts_with($lower, "s") ? "" : "NEM ") . "'S' betűvel kezdődik." . PHP_EOL;

echo "8. feladat" . PHP_EOL;
echo "A hős neve " . (str_ends_with($lower, "n") ? "" : "NEM ") . "'n' betűvel végződik." . PHP_EOL;
