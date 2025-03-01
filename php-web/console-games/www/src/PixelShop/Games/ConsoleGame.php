<?php

namespace PixelShop\Games;

class ConsoleGame
{
  private int $id;
  private string $platform;
  private string $title;
  private int $price;
  private string $imageName;

  public function __construct(int $id, string $platform, string $title, int $price, string $imageName)
  {
    $this->id = $id;
    $this->platform = $platform;
    $this->title = $title;
    $this->price = $price;
    $this->imageName = $imageName;
  }

  public function __get(string $property): mixed
  {
    if ($property === 'image') return "img/{$this->imageName}.jpg";
    if (property_exists($this, $property)) return $this->$property;
    return null;
  }

  public function __set(string $property, mixed $value): void
  {
    if (property_exists($this, $property)) $this->$property = $value;
  }

  public function getPillColor(): string
  {
    switch ($this->platform) {
      case 'PS5':
        return 'text-bg-primary';
      case 'Nintendo Switch':
        return 'text-bg-danger';
      case 'XBOX Series X':
        return 'text-bg-success';
      default:
        return 'text-bg-secondary';
    }
  }
}
