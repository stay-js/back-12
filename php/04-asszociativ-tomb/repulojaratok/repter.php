<?php
require "jaratok.php";

if ($argc > 3) {
  echo "Túl sok paraméter!\n";
  exit(4);
}

if ($argc == 1) {
  foreach ($jaratok as $jaratszam => $jarat) {
    echo $jaratszam . "\t" . $jarat["indulas"] . "-" . $jarat["erkezes"] . "\t" . $jarat["indulas_ido"] . "-" . $jarat["erkezes_ido"] . "\t" . $jarat["legitarsasag"] . "\n";
  }

  exit(0);
}

if ($argc == 2) {
  $input = strtoupper($argv[1]);

  if (!array_key_exists($input, $jaratok)) {
    echo "A keresett járat ($input) nem található!\n";
    exit(7);
  }

  $jarat = $jaratok[$input];

  echo $jarat["indulas"] . "-" . $jarat["erkezes"] . " " . $jarat["indulas_ido"] . "-" . $jarat["erkezes_ido"] . " (" . $jarat["legitarsasag"] . ")\n";

  exit(0);
}

$type = $argv[1];
$query = $argv[2];

if ($type == "legitarsasag") {
  $count = 0;

  foreach ($jaratok as $jarat) {
    if ($jarat["legitarsasag"] == $query) $count++;
  }

  echo "A(z) $query légitársaságnak $count járata van az adatok között.\n";

  exit(0);
}

if ($type == "repter") {
  $query = strtoupper($query);
  $count = 0;

  foreach ($jaratok as $jarat) {
    if ($jarat["indulas"] == $query || $jarat["erkezes"] == $query) $count++;
  }

  echo "A(z) $query azonosítójú reptér $count x szerepel az adatok között.\n";

  exit(0);
}

echo "Ismeretlen paraméter $type\n";
exit(9);
