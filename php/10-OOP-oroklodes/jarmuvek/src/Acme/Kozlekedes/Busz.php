<?php

namespace Acme\Kozlekedes;

use Stringable;

class Busz extends Gepjarmu implements Stringable
{
  protected int $ulesek;

  public function __construct(string $gyarto, string $tipus, string $szin, string $motor, int $ulesek)
  {
    parent::__construct($gyarto, $tipus, $szin, $motor);

    $this->ulesek = $ulesek;
  }

  public function getUlesek(): int
  {
    return $this->ulesek;
  }

  public function __toString(): string
  {
    return "Busz: {$this->gyarto} {$this->tipus} {$this->szin} {$this->motor} {$this->ulesek}";
  }

  public function toArray(bool $asszociativ): array
  {
    if ($asszociativ) {
      return [
        'gyarto' => $this->gyarto,
        'tipus' => $this->tipus,
        'szin' => $this->szin,
        'motor' => $this->motor,
        'ulesek' => $this->ulesek,
      ];
    }

    return [
      $this->gyarto,
      $this->tipus,
      $this->szin,
      $this->motor,
      $this->ulesek,
    ];
  }
}
