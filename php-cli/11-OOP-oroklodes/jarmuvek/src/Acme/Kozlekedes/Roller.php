<?php

namespace Acme\Kozlekedes;

use Stringable;

class Roller extends Jarmu implements Stringable
{
  protected int $kerekekSzama;

  public function __construct(string $gyarto, string $tipus, string $szin, int $kerekekSzama)
  {
    parent::__construct($gyarto, $tipus, $szin);

    $this->kerekekSzama = $kerekekSzama;
  }

  public function getKerekekSzama(): int
  {
    return $this->kerekekSzama;
  }

  public function __toString(): string
  {
    return "Roller: {$this->gyarto} {$this->tipus} {$this->szin} {$this->kerekekSzama}";
  }


  public function toArray(bool $asszociativ): array
  {
    if ($asszociativ) {
      return [
        'gyarto' => $this->gyarto,
        'tipus' => $this->tipus,
        'szin' => $this->szin,
        'kerekekSzama' => $this->kerekekSzama,
      ];
    }

    return [
      $this->gyarto,
      $this->tipus,
      $this->szin,
      $this->kerekekSzama,
    ];
  }
}
