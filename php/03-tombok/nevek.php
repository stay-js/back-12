<?php
$nevek = [
  "Robert Downey Jr.",
  "Chris Hemsworth",
  "Scarlett Johansson",
  "Karen Gillan",
  "Benedict Cumberbatch"
];

echo "2. feladat\n";
echo "Első: $nevek[0]\n";

echo "\n3. feladat\n";
echo "Utolsó: " . $nevek[count($nevek) - 1] . "\n";

echo "\n4. feladat\n";
foreach ($nevek as $name) {
  echo "\t- $name\n";
}
