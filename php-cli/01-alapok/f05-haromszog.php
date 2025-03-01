<?php
if ($argc != 4) {
  echo "Hibás paraméterek\n";
  exit(1);
}

$a = $argv[1];
$b = $argv[2];
$c = $argv[3];

if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
  echo "A háromszög nem szerkeszthető\n";
  exit(1);
}

$k = round($a + $b + $c, 3);
$s = ($a + $b + $c) / 2;
$t = round(sqrt($s * ($s - $a) * ($s - $b) * ($s - $c)), 3);

echo "T=$t\n";
echo "K=$k\n";
