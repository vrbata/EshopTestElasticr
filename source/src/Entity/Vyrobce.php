<?php

namespace App\Entity;

use App\Repository\VyrobceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VyrobceRepository::class)
 */
class Vyrobce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nazev;

    /**
     * @ORM\ManyToOne(targetEntity=Polozka::class, inversedBy="Vyrobce")
     */
    private $polozka;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazev(): ?string
    {
        return $this->Nazev;
    }

    public function setNazev(string $Nazev): self
    {
        $this->Nazev = $Nazev;

        return $this;
    }

    public function getPolozka(): ?Polozka
    {
        return $this->polozka;
    }

    public function setPolozka(?Polozka $polozka): self
    {
        $this->polozka = $polozka;

        return $this;
    }
}
