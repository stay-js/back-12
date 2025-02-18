<?php

namespace Neu\Eszkozok;

class Nyomtato
{
  protected string $gyarto;
  protected string $tipus;
  protected bool $szines;
  protected int $ar;

  private static array $gyartok = ["HP", "Canon", "Xerox", "Epson"];

  public static function getGyartok(): array
  {
    return self::$gyartok;
  }

  public function __construct(string $gyarto, string $tipus, bool $szines, int $ar)
  {
    $this->gyarto = $gyarto;
    $this->tipus = $tipus;
    $this->szines = $szines;
    $this->ar = $ar;
  }

  public function __get(string $name): mixed
  {
    if ($name === "szinesAsString") {
      return $this->szines ? "színes" : "fekete-fehér";
    }

    if (property_exists($this, $name)) return $this->$name;
  }

  public function __set(string $name, mixed $value): void
  {
    if (property_exists($this, $name)) $this->$name = $value;
  }
}
