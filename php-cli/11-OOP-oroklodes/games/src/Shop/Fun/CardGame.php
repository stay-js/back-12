<?php

namespace Shop\Fun;

use Stringable;

class CardGame extends Game implements Stringable
{
  private int $numberOfCards;

  public function __construct(string $name, string $type, string $publisher, float $price, int $numberOfCards)
  {
    parent::__construct($name, $type, $publisher, $price);
    $this->numberOfCards = $numberOfCards;
  }

  public function __toString(): string
  {
    return "{$this->publisher} {$this->name} {$this->type} card game ({$this->numberOfCards} cards) "
      . number_format($this->price, 2, ".", " ") . " EUR";
  }

  public function toArray(): array
  {
    return [
      $this->publisher,
      $this->name,
      $this->type,
      $this->numberOfCards,
      $this->price
    ];
  }
}
