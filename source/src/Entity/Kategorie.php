<?php

namespace App\Entity;

use App\Repository\KategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KategorieRepository::class)
 */
class Kategorie
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
     * @ORM\ManyToMany(targetEntity=Kategorie::class, inversedBy="kategories")
     */
    private $Id_podkat;

    /**
     * @ORM\ManyToMany(targetEntity=Kategorie::class, mappedBy="Id_podkat")
     */
    private $kategories;

    /**
     * @ORM\ManyToOne(targetEntity=Polozka::class, inversedBy="Kategorie")
     */
    private $polozka;

    /**
     * @ORM\ManyToMany(targetEntity=Stitek::class, inversedBy="kategories")
     */
    private $Stitek;

    public function __construct()
    {
        $this->Id_podkat = new ArrayCollection();
        $this->kategories = new ArrayCollection();
        $this->Stitek = new ArrayCollection();
    }

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

    /**
     * @return Collection|self[]
     */
    public function getIdPodkat(): Collection
    {
        return $this->Id_podkat;
    }

    public function addIdPodkat(self $idPodkat): self
    {
        if (!$this->Id_podkat->contains($idPodkat)) {
            $this->Id_podkat[] = $idPodkat;
        }

        return $this;
    }

    public function removeIdPodkat(self $idPodkat): self
    {
        if ($this->Id_podkat->contains($idPodkat)) {
            $this->Id_podkat->removeElement($idPodkat);
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getKategories(): Collection
    {
        return $this->kategories;
    }

    public function addKategory(self $kategory): self
    {
        if (!$this->kategories->contains($kategory)) {
            $this->kategories[] = $kategory;
            $kategory->addIdPodkat($this);
        }

        return $this;
    }

    public function removeKategory(self $kategory): self
    {
        if ($this->kategories->contains($kategory)) {
            $this->kategories->removeElement($kategory);
            $kategory->removeIdPodkat($this);
        }

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

    /**
     * @return Collection|Stitek[]
     */
    public function getStitek(): Collection
    {
        return $this->Stitek;
    }

    public function addStitek(Stitek $stitek): self
    {
        if (!$this->Stitek->contains($stitek)) {
            $this->Stitek[] = $stitek;
        }

        return $this;
    }

    public function removeStitek(Stitek $stitek): self
    {
        if ($this->Stitek->contains($stitek)) {
            $this->Stitek->removeElement($stitek);
        }

        return $this;
    }
}
