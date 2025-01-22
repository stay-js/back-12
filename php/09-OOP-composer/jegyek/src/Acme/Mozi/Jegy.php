<?php

namespace Acme\Mozi;

use DateTime;
use Stringable;

class Jegy
{
  private static array $termek = ["Spielberg", "Bujtor", "Coppola", "Hitchcock"];

  public static function termekNevei(): array
  {
    return self::$termek;
  }
}
