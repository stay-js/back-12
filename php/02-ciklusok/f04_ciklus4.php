<?php
if ($argc != 3) {
  echo "Használat: php $argv[0] <start> <end>\n";
  exit(1);
}

if ($argv[1] < $argv[2]) {
  for ($i = $argv[1]; $i <= $argv[2]; $i++) {
    if ($i % 2 != 0) echo "$i\n";
  }
} else {
  for ($i = $argv[1]; $i >= $argv[2]; $i--) {
    if ($i % 2 != 0) echo "$i\n";
  }
}
?>
