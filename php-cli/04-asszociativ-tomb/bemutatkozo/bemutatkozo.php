<?php
require "en.php";

if ($argc != 2) {
  echo "A szkript pontosan 1 paramétert vár!\n";
  exit(1);
}

$en["jelszo"] = "password";
$en["titok"] = "secret";

$input = $argv[1];

if (in_array($input, ["nev", "szuletesi_datum", "kor", "kedvenc_szin"])) {
  echo $en[$input] . "\n";
  exit(0);
}

if ($input == $en["jelszo"]) {
  echo $en["titok"] . "\n";
  exit(0);
}

echo "Nincs ilyen kulcs!\n";
exit(2);
