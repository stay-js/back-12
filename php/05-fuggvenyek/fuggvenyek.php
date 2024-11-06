<?php

function hetNapja(int $number): string
{
  switch ($number) {
    case 1:
      return "hétfő";
    case 2:
      return "kedd";
    case 3:
      return "szerda";
    case 4:
      return "csütörtök";
    case 5:
      return "péntek";
    case 6:
      return "szombat";
    case 7:
      return "vasárnap";
    default:
      return "Nem megfelelő szám!";
  }
}

function napSorszama(string $str): int
{
  switch (strtolower($str)) {
    case "hétfő":
      return 1;
    case "kedd":
      return 2;
    case "szerda":
      return 3;
    case "csütörtök":
      return 4;
    case "péntek":
      return 5;
    case "szombat":
      return 6;
    case "vasárnap":
      return 7;
    default:
      return "Nem megfelelő nap!";
  }
}

function parosE(int $number): bool
{
  return $number % 2 === 0;
}

function paratlanE(int $number): bool
{
  return $number % 2 !== 0;
}

function oszthatoE(int $number, int $oszto): bool
{
  return $number % $oszto === 0;
}

function negativE(int $number): bool
{
  return $number < 0;
}

function szignum(float $number): int
{
  if ($number > 0) return 1;
  elseif ($number < 0) return -1;
  else return 0;
}

function datumIdo(string $format): string
{
  switch ($format) {
    case "óra":
      return date("H");
    case "perc":
      return date("i");
    case "másodperc":
      return date("s");
    case "év":
      return date("Y");
    case "hónap":
      return date("m");
    case "nap":
      return date("d");
    default:
      return "Nem megfelelő formátum!";
  }
}

function utolso(array $array)
{
  return end($array);
}

function osszeg(array $array): int
{
  return array_sum($array);
}

function szorzat(array $array): int
{
  return array_product($array);
}

function parosDb(array $array): int
{
  $count = 0;

  foreach ($array as $item) {
    if ($item % 2 === 0) $count++;
  }

  return $count;
}

function parosOsszeg(array $array): int
{
  $sum = 0;

  foreach ($array as $item) {
    if ($item % 2 === 0) $sum += $item;
  }

  return $sum;
}

function elsoNOsszeg(array $array, int $n): int
{
  $sum = 0;

  for ($i = 0; $i < $n; $i++) {
    $sum += $array[$i];
  }

  return $sum;
}

function f2c(float $value): float
{
  return ($value - 32) * 5 / 9;
}

function c2f(float $value): float
{
  return $value * 9 / 5 + 32;
}
