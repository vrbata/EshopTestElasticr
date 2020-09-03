<?php

namespace App\Entity;

use App\Repository\StavRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StavRepository::class)
 */
class Stav
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $stav;

    /**
     * @ORM\ManyToOne(targetEntity=Polozka::class, inversedBy="Stav")
     */
    private $polozka;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStav(): ?int
    {
        return $this->stav;
    }

    public function setStav(int $stav): self
    {
        $this->stav = $stav;

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
