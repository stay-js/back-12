<?php

namespace Matematika\Geometria;

class Negyzet
{
  private int $a;

  public function __construct(int $a)
  {
    $this->a = $a;
  }

  public function circumference(): int
  {
    return 4 * $this->a;
  }

  public function area(): int
  {
    return pow($this->a, 2);
  }
}
