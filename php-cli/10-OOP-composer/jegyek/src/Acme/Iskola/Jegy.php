<?php

namespace Acme\Iskola;

use DateTime;
use Stringable;

class Jegy implements Stringable
{
  private static array $tipusok = ["Témazáró", "Órai munka", "Teszt"];
  private static array $osztalyzatok = ["elégtelen", "elégséges", "közepes", "jó", "jeles"];
  private static array $tantargyak = ["Magyar", "Matematika", "Történelem", "Fizika", "Kémia", "Angol", "Német", "Testnevelés", "Informatika", "Biológia"];

  private string $tipus;
  private int $jegy;
  private string $tantargy;
  private string $tanar;
  private DateTime $beirva;

  public static function lehetsegesTipusok(): array
  {
    return self::$tipusok;
  }

  public static function lehetsegesOsztalyzatok(): array
  {
    return self::$osztalyzatok;
  }

  public static function lehetsegesTantargyak(): array
  {
    return self::$tantargyak;
  }

  public function __construct(string $tipus, int $jegy, string $tantargy, string $tanar, DateTime $beirva)
  {
    $this->tipus = $tipus;
    $this->jegy = $jegy;
    $this->tantargy = $tantargy;
    $this->tanar = $tanar;
    $this->beirva = $beirva;
  }

  public function __get($name): mixed
  {
    if ($name == "osztalyzat") {
      return self::$osztalyzatok[$this->jegy - 1];
    }

    return $this->$name;
  }

  public function __set($name, $value): void
  {
    $this->$name = $value;
  }

  public function __toString(): string
  {
    return $this->jegy . " - " . mb_strtoupper($this->osztalyzat) . " (" . $this->tantargy . ") " . $this->tanar . " " . $this->beirva->format("Y.m.d H:i");
  }

  public function toArray(bool $asszociativ): array
  {
    if ($asszociativ) {
      return [
        "tipus" => $this->tipus,
        "jegy" => $this->jegy,
        "tantargy" => $this->tantargy,
        "tanar" => $this->tanar,
        "beirva" => $this->beirva->format("Y.m.d H:i")
      ];
    }

    return [
      $this->tipus,
      $this->jegy,
      $this->tantargy,
      $this->tanar,
      $this->beirva->format("Y.m.d H:i")
    ];
  }
}
