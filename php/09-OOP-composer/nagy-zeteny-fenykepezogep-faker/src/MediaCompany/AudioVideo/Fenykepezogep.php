<?php

namespace MediaCompany\AudioVideo;

class Fenykepezogep
{
  private int $sorszam;
  private string $marka;
  private string $modell;
  private string $sorozatszam;
  private int $gyartasiEv;

  public function __construct(int $sorszam, string $marka, string $modell, string $sorozatszam, int $gyartasiEv)
  {
    $this->sorszam = $sorszam;
    $this->marka = $marka;
    $this->modell = $modell;
    $this->sorozatszam = $sorozatszam;
    $this->gyartasiEv = $gyartasiEv;
  }

  public function getSorszam(): int
  {
    return $this->sorszam;
  }

  public function getMarka(): string
  {
    return $this->marka;
  }

  public function getModell(): string
  {
    return $this->modell;
  }

  public function getSorozatszam(): string
  {
    return $this->sorozatszam;
  }

  public function getGyartasiEv(): int
  {
    return $this->gyartasiEv;
  }

  public function getTeljesNev(): string
  {
    return $this->marka . ' ' . $this->modell;
  }
}
