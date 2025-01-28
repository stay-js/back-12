<?php

namespace FooDev\Food;

use Stringable;

class Pizza implements Stringable
{
  private static array $availableToppings = [
    "Pepperoni",
    "Mushrooms",
    "Onions",
    "Sausage",
    "Bacon",
    "Black Olives",
    "Green Peppers",
    "Fresh Tomatoes",
    "Pineapple",
    "Ham",
    "Jalapeños",
    "Spinach",
    "Anchovies",
    "Chicken",
    "Ground Beef",
    "Artichoke Hearts",
    "Feta Cheese",
    "Ricotta Cheese",
    "Sun-Dried Tomatoes",
    "Basil",
    "Prosciutto",
    "Salami",
    "Red Peppers",
    "Garlic",
    "BBQ Sauce",
    "Pesto",
    "Goat Cheese",
    "Corn",
    "Capers",
    "Arugula",
  ];

  private static array $sizePrice = [
    24 => 10,
    32 => 15,
    55 => 20,
  ];

  private string $name;
  private int $size;
  private bool $vegan;
  private bool $glutenFree;
  private array $toppings = [];

  public static function availableToppings(): array
  {
    return self::$availableToppings;
  }

  public function __construct(string $name, int $size, bool $vegan, bool $glutenFree)
  {
    $this->name = ucwords(strtolower($name));
    $this->size = $size;
    $this->vegan = $vegan;
    $this->glutenFree = $glutenFree;
  }

  public function __get($name): mixed
  {
    if ($name == "price") {
      return self::$sizePrice[$this->size] + count($this->toppings);
    }

    if (property_exists($this, $name)) return $this->$name;
  }

  public function __set($name, $value): void
  {
    if (property_exists($this, $name)) $this->$name = $value;
  }

  public function addTopping(string $topping): void
  {
    if (in_array($topping, self::$availableToppings)) $this->toppings[] = $topping;
  }

  public function __toString(): string
  {
    return mb_strtoupper($this->name) . " (" . $this->price . "€)";
  }

  public function toArray(): array
  {
    return [
      "name" => $this->name,
      "size" => $this->size,
      "vegan" => $this->vegan,
      "glutenFree" => $this->glutenFree,
      "price" => $this->price,
      "toppings" => $this->toppings,
    ];
  }
}
