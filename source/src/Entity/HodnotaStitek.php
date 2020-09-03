<?php

namespace App\Entity;

use App\Repository\HodnotaStitekRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HodnotaStitekRepository::class)
 */
class HodnotaStitek
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Hodnota;

    /**
     * @ORM\ManyToOne(targetEntity=Stitek::class, inversedBy="Hodnota")
     */
    private $stitek;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHodnota(): ?int
    {
        return $this->Hodnota;
    }

    public function setHodnota(int $Hodnota): self
    {
        $this->Hodnota = $Hodnota;

        return $this;
    }

    public function getStitek(): ?Stitek
    {
        return $this->stitek;
    }

    public function setStitek(?Stitek $stitek): self
    {
        $this->stitek = $stitek;

        return $this;
    }
}
