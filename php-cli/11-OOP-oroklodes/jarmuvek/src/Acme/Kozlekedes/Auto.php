<?php

namespace Acme\Kozlekedes;

use Stringable;

class Auto extends Gepjarmu implements Stringable
{
  protected int $ajtok;

  public function __construct(string $gyarto, string $tipus, string $szin, string $motor, int $ajtok)
  {
    parent::__construct($gyarto, $tipus, $szin, $motor);

    $this->ajtok = $ajtok;
  }

  public function getAjtok(): string
  {
    return $this->ajtok;
  }

  public function __toString(): string
  {
    return "Autó: {$this->gyarto} {$this->tipus} {$this->szin} {$this->motor} {$this->ajtok}";
  }

  public function toArray(bool $asszociativ): array
  {
    if ($asszociativ) {
      return [
        'gyarto' => $this->gyarto,
        'tipus' => $this->tipus,
        'szin' => $this->szin,
        'motor' => $this->motor,
        'ajtok' => $this->ajtok,
      ];
    }

    return [
      $this->gyarto,
      $this->tipus,
      $this->szin,
      $this->motor,
      $this->ajtok,
    ];
  }
}
