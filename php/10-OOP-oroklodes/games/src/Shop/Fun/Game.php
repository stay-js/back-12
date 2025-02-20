<?php

namespace Shop\Fun;

class Game
{
  protected string $name;
  protected string $type;
  protected string $publisher;
  protected float $price;

  public static array $publishers = ['Hasbro', 'Mattel', 'Asmodee'];

  public function __construct(string $name, string $type, string $publisher, float $price)
  {
    $this->name = $name;
    $this->type = $type;
    $this->publisher = $publisher;
    $this->price = $price;
  }

  public function __get(string $name): mixed
  {
    if (property_exists($this, $name)) return $this->$name;
  }

  public function __set(string $name, mixed $value): void
  {
    if (property_exists($this, $name)) $this->$name = $value;
  }

  public static function publishers(): array
  {
    return self::$publishers;
  }
}
