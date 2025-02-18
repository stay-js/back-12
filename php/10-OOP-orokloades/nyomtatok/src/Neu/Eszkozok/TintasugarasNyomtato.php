<?php

namespace Neu\Eszkozok;

use Stringable;

class TintasugarasNyomtato extends Nyomtato implements Stringable
{
  protected int $patronokSzama;

  public function __construct(string $gyarto, string $tipus, bool $szines, int $ar, int $patronokSzama)
  {
    parent::__construct($gyarto, $tipus, $szines, $ar);
    $this->patronokSzama = $patronokSzama;
  }

  public function __toString(): string
  {
    return "{$this->gyarto} {$this->tipus} {$this->szinesAsString} " .
      "tintasugaras nyomtató ({$this->patronokSzama} patron) " .  number_format($this->ar, 0, ",", " ") . " Ft";
  }

  public function toArray(): array
  {
    return [
      $this->gyarto,
      $this->tipus,
      $this->szinesAsString,
      $this->patronokSzama,
      $this->ar
    ];
  }
}
