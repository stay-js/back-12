<?php
require('fuggvenyek.php');

echo hetNapja(1) . PHP_EOL;
echo hetNapja(5) . PHP_EOL;

echo napSorszama("hétfő") . PHP_EOL;
echo napSorszama("péntek") . PHP_EOL;

var_dump(parosE(5));
var_dump(parosE(8));

var_dump(paratlanE(5));
var_dump(paratlanE(8));

var_dump(oszthatoE(5, 5));
var_dump(oszthatoE(8, 5));

var_dump(negativE(-3));
var_dump(negativE(96));

echo szignum(-836) . PHP_EOL;
echo szignum(0) . PHP_EOL;
echo szignum(1024) . PHP_EOL;

echo datumIdo("óra") . PHP_EOL;
echo datumIdo("perc") . PHP_EOL;
echo datumIdo("másodperc") . PHP_EOL;
echo datumIdo("év") . PHP_EOL;
echo datumIdo("hónap") . PHP_EOL;
echo datumIdo("nap") . PHP_EOL;


echo utolso([5, 11, 76, 3]) . PHP_EOL;

echo osszeg([5, 11, 76, 3]) . PHP_EOL;

echo szorzat([5, 11, 76, 3]) . PHP_EOL;

echo parosDb([]) . PHP_EOL;
echo parosDb([5, 11, 76, 3]) . PHP_EOL;
echo parosDb([37, 74, 3, 71, 54]) . PHP_EOL;

echo parosOsszeg([]) . PHP_EOL;
echo parosOsszeg([5, 11, 76, 3]) . PHP_EOL;
echo parosOsszeg([37, 74, 3, 71, 54]) . PHP_EOL;

echo elsoNOsszeg([5, 11, 76, 3], 2) . PHP_EOL;
echo elsoNOsszeg([37, 74, 3, 71, 54], 3) . PHP_EOL;

echo f2c(68) . PHP_EOL;
echo c2f(30) . PHP_EOL;
