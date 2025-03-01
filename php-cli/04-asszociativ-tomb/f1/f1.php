<?php
require "versenyzok.php";

if ($argc > 2) {
  echo "Túl sok paraméter!\n";
  exit(1);
}

if ($argc == 2) {
  foreach ($versenyzok as $driver) {
    if ($driver["orszag"] == $argv[1]) {
      echo "- " . $driver["rajtszam"] . " : " . $driver["nev"] . "\n";
    }
  }

  exit(0);
}

echo "rajtsz.\tNév\tOrszág\tSzületési dátum\n";
foreach ($versenyzok as $versenyzo) {
  echo $versenyzo["rajtszam"] . "\t" . $versenyzo["nev"] . "\t" . $versenyzo["orszag"] . "\t" . $versenyzo["szulido"] . "\n";
}
