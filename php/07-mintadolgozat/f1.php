<?php
require('adatok.php');

if ($argc > 2) {
  echo 'Túl sok paraméter!' . PHP_EOL;
  exit(4);
}

$vb = array_sum(array_map(fn($x) => $x['vb'], $versenyzok));

$dobogo = function (int $rajtszam) use ($versenyzok): int {
  foreach ($versenyzok as $versenyzo) {
    if ($versenyzo['rajtszam'] == $rajtszam) return $versenyzo['dobogo'];
  }

  return 0;
};


if ($argc == 1) {
  foreach ($versenyzok as $versenyzo) {
    echo $versenyzo['nev'] . ' (' . $versenyzo['rajtszam'] . ') [' .  $versenyzo['csapat'] . ']' . PHP_EOL;
  }
  exit(0);
}

$arg = mb_strtolower($argv[1]);

if ($arg == 'vb') {
  echo $vb . PHP_EOL;
  exit(0);
}

if (is_numeric($arg) && $arg > 0 && $arg < 100) {
  echo $dobogo((int)$arg) . PHP_EOL;
}
