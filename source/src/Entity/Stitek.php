<?php

namespace App\Entity;

use App\Repository\StitekRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StitekRepository::class)
 */
class Stitek
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
     * @ORM\OneToMany(targetEntity=HodnotaStitek::class, mappedBy="stitek")
     */
    private $Hodnota;

    /**
     * @ORM\ManyToMany(targetEntity=Polozka::class, mappedBy="Stitek")
     */
    private $polozkas;

    /**
     * @ORM\ManyToMany(targetEntity=Kategorie::class, mappedBy="Stitek")
     */
    private $kategories;

    public function __construct()
    {
        $this->Hodnota = new ArrayCollection();
        $this->polozkas = new ArrayCollection();
        $this->kategories = new ArrayCollection();
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
     * @return Collection|HodnotaStitek[]
     */
    public function getHodnota(): Collection
    {
        return $this->Hodnota;
    }

    public function addHodnotum(HodnotaStitek $hodnotum): self
    {
        if (!$this->Hodnota->contains($hodnotum)) {
            $this->Hodnota[] = $hodnotum;
            $hodnotum->setStitek($this);
        }

        return $this;
    }

    public function removeHodnotum(HodnotaStitek $hodnotum): self
    {
        if ($this->Hodnota->contains($hodnotum)) {
            $this->Hodnota->removeElement($hodnotum);
            // set the owning side to null (unless already changed)
            if ($hodnotum->getStitek() === $this) {
                $hodnotum->setStitek(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Polozka[]
     */
    public function getPolozkas(): Collection
    {
        return $this->polozkas;
    }

    public function addPolozka(Polozka $polozka): self
    {
        if (!$this->polozkas->contains($polozka)) {
            $this->polozkas[] = $polozka;
            $polozka->addStitek($this);
        }

        return $this;
    }

    public function removePolozka(Polozka $polozka): self
    {
        if ($this->polozkas->contains($polozka)) {
            $this->polozkas->removeElement($polozka);
            $polozka->removeStitek($this);
        }

        return $this;
    }

    /**
     * @return Collection|Kategorie[]
     */
    public function getKategories(): Collection
    {
        return $this->kategories;
    }

    public function addKategory(Kategorie $kategory): self
    {
        if (!$this->kategories->contains($kategory)) {
            $this->kategories[] = $kategory;
            $kategory->addStitek($this);
        }

        return $this;
    }

    public function removeKategory(Kategorie $kategory): self
    {
        if ($this->kategories->contains($kategory)) {
            $this->kategories->removeElement($kategory);
            $kategory->removeStitek($this);
        }

        return $this;
    }
}
