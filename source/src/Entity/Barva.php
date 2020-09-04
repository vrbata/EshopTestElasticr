<?php

namespace App\Entity;

use App\Repository\BarvaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BarvaRepository::class)
 */
class Barva
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
     * @ORM\ManyToOne(targetEntity=Polozka::class, inversedBy="Barva")
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
