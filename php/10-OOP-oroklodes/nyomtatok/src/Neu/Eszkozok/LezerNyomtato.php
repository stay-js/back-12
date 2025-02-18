<?php

namespace Neu\Eszkozok;

use Stringable;

class LezerNyomtato extends Nyomtato implements Stringable
{
  protected int $tonerekSzama;

  public function __construct(string $gyarto, string $tipus, bool $szines, int $ar, int $tonerekSzama)
  {
    parent::__construct($gyarto, $tipus, $szines, $ar);
    $this->tonerekSzama = $tonerekSzama;
  }

  public function __toString(): string
  {
    return "{$this->gyarto} {$this->tipus} {$this->szinesAsString} " .
      "lézer nyomtató ({$this->tonerekSzama} toner) " .  number_format($this->ar, 0, ",", " ") . " Ft";
  }

  public function toArray(): array
  {
    return [
      $this->gyarto,
      $this->tipus,
      $this->szinesAsString,
      $this->tonerekSzama,
      $this->ar
    ];
  }
}
