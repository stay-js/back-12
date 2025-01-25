<?php

namespace Acme\Mozi;

use DateTime;
use Stringable;

class Jegy implements Stringable
{
  private static array $termek = ["Spielberg", "Bujtor", "Coppola", "Hitchcock"];

  private string $cim;
  private int $ar;
  private string $terem;
  private string $sor;
  private int $ules;
  private DateTime $kezdes;
  private bool $felnott;

  public static function termekNevei(): array
  {
    return self::$termek;
  }

  public function __construct(string $cim, int $ar, string $terem, string $sor, int $ules, DateTime $kezdes, bool $felnott)
  {
    $this->cim = $cim;
    $this->ar = $ar;
    $this->terem = $terem;
    $this->sor = $sor;
    $this->ules = $ules;
    $this->kezdes = $kezdes;
    $this->felnott = $felnott;
  }

  public function __get($name): mixed
  {
    return $this->$name;
  }

  public function __set($name, $value): void
  {
    $this->$name = $value;
  }


  public function __toString(): string
  {
    return mb_strtoupper($this->cim) . " " . number_format($this->ar, 0, ".", " ") . " Ft [" . $this->terem . " terem " . $this->sor . " sor " . $this->ules . ". ülés] " . $this->kezdes->format("Y.m.d H:i") . " " . ($this->felnott ? "(18+)" : "");
  }

  public function toArray(bool $asszociativ): array
  {
    $ar = number_format($this->ar, 0, ".", " ") . " Ft";
    $korhataros = $this->felnott ? "igen" : "nem";

    if ($asszociativ) {
      return [
        "cim" => $this->cim,
        "ar" =>  $ar,
        "terem" => $this->terem,
        "sor" => $this->sor,
        "ules" => $this->ules,
        "kezdes" => $this->kezdes->format("Y.m.d H:i"),
        "felnott" => $korhataros
      ];
    }

    return [
      $this->cim,
      $ar,
      $this->terem,
      $this->sor,
      $this->ules,
      $this->kezdes->format("Y.m.d H:i"),
      $korhataros
    ];
  }
}
