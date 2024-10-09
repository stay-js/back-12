<?php
$vegyes = [5, 9, "Hello", 11.2, "Béla", 33, "Márta", 48.98, 7];

if ($argc != 2) {
  echo "A szkript pontosan egy paramétert vár!\n";
  exit(1);
}

$valid = ["szamok", "egesz", "valos", "szoveg"];

if (!in_array($argv[1], $valid)) {
  echo "A paraméter csak 'szamok', 'egesz', 'valos', vagy 'szoveg' lehet.\n";
  exit(1);
}

if ($argv[1] == "szamok") {
  $szamok = [];
  foreach ($vegyes as $item) {
    if (is_numeric($item))
      $szamok[] = $item;
  }

  foreach ($szamok as $idx => $item) {
    echo $idx + 1 . ".szám: " . $item . "\n";
  }
}

if ($argv[1] == "egesz") {
  $egesz = [];
  foreach ($vegyes as $item) {
    if (is_int($item))
      $egesz[] = $item;
  }

  foreach ($egesz as $idx => $item) {
    echo $idx + 1 . ". egész szám: " . $item . "\n";
  }
}

if ($argv[1] == "valos") {
  $valos = [];
  foreach ($vegyes as $item) {
    if (is_float($item))
      $valos[] = $item;
  }

  foreach ($valos as $idx => $item) {
    echo $idx + 1 . ". valós szám: " . $item . "\n";
  }
}

if ($argv[1] == "szoveg") {
  $szovegek = [];
  foreach ($vegyes as $item) {
    if (is_string($item))
      $szovegek[] = $item;
  }

  foreach ($szovegek as $idx => $item) {
    echo $idx + 1 . ". szöveg: " . $item . "\n";
  }
}
