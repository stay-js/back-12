<?php

namespace Shop\Fun;

use Stringable;

class BoardGame extends Game implements Stringable
{
  private int $numberOfPlayers;

  public function __construct(string $name, string $type, string $publisher, float $price, int $numberOfPlayers)
  {
    parent::__construct($name, $type, $publisher, $price);
    $this->numberOfPlayers = $numberOfPlayers;
  }

  public function __toString(): string
  {
    return "{$this->publisher} {$this->name} {$this->type} board game ({$this->numberOfPlayers} players) "
      . number_format($this->price, 2, ".", " ") . " EUR";
  }

  public function toArray(): array
  {
    return [
      $this->publisher,
      $this->name,
      $this->type,
      $this->numberOfPlayers,
      $this->price
    ];
  }
}
