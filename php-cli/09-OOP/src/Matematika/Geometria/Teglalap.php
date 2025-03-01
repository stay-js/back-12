<?php

namespace Matematika\Geometria;

class Teglalap
{
  private int $a;
  private int $b;

  public function __construct(int $a, int $b)
  {
    $this->a = $a;
    $this->b = $b;
  }

  public function circumference(): int
  {
    return 2 * ($this->a + $this->b);
  }

  public function area(): int
  {
    return $this->a * $this->b;
  }
}
