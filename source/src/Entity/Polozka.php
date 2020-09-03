<?php

namespace App\Entity;

use App\Repository\PolozkaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PolozkaRepository::class)
 */
class Polozka
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
     * @ORM\Column(type="integer")
     */
    private $Cena;

    /**
     * @ORM\OneToMany(targetEntity=Kategorie::class, mappedBy="polozka")
     */
    private $Kategorie;

    /**
     * @ORM\OneToMany(targetEntity=Vyrobce::class, mappedBy="polozka")
     */
    private $Vyrobce;

    /**
     * @ORM\OneToMany(targetEntity=Barva::class, mappedBy="polozka")
     */
    private $Barva;

    /**
     * @ORM\OneToMany(targetEntity=Stav::class, mappedBy="polozka")
     */
    private $Stav;

    /**
     * @ORM\ManyToMany(targetEntity=Stitek::class, inversedBy="polozkas")
     */
    private $Stitek;

    public function __construct()
    {
        $this->Kategorie = new ArrayCollection();
        $this->Vyrobce = new ArrayCollection();
        $this->Barva = new ArrayCollection();
        $this->Stav = new ArrayCollection();
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

    public function getCena(): ?int
    {
        return $this->Cena;
    }

    public function setCena(int $Cena): self
    {
        $this->Cena = $Cena;

        return $this;
    }
    
    /**
     * @return Collection|Kategorie[]
     */
    public function getKategorie(): Collection
    {
        return $this->Kategorie;
    }

    public function addKategorie(Kategorie $kategorie): self
    {
        if (!$this->Kategorie->contains($kategorie)) {
            $this->Kategorie[] = $kategorie;
            $kategorie->setPolozka($this);
        }

        return $this;
    }

    public function removeKategorie(Kategorie $kategorie): self
    {
        if ($this->Kategorie->contains($kategorie)) {
            $this->Kategorie->removeElement($kategorie);
            // set the owning side to null (unless already changed)
            if ($kategorie->getPolozka() === $this) {
                $kategorie->setPolozka(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vyrobce[]
     */
    public function getVyrobce(): Collection
    {
        return $this->Vyrobce;
    }

    public function addVyrobce(Vyrobce $vyrobce): self
    {
        if (!$this->Vyrobce->contains($vyrobce)) {
            $this->Vyrobce[] = $vyrobce;
            $vyrobce->setPolozka($this);
        }

        return $this;
    }

    public function removeVyrobce(Vyrobce $vyrobce): self
    {
        if ($this->Vyrobce->contains($vyrobce)) {
            $this->Vyrobce->removeElement($vyrobce);
            // set the owning side to null (unless already changed)
            if ($vyrobce->getPolozka() === $this) {
                $vyrobce->setPolozka(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Barva[]
     */
    public function getBarva(): Collection
    {
        return $this->Barva;
    }

    public function addBarva(Barva $barva): self
    {
        if (!$this->Barva->contains($barva)) {
            $this->Barva[] = $barva;
            $barva->setPolozka($this);
        }

        return $this;
    }

    public function removeBarva(Barva $barva): self
    {
        if ($this->Barva->contains($barva)) {
            $this->Barva->removeElement($barva);
            // set the owning side to null (unless already changed)
            if ($barva->getPolozka() === $this) {
                $barva->setPolozka(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Stav[]
     */
    public function getStav(): Collection
    {
        return $this->Stav;
    }

    public function addStav(Stav $stav): self
    {
        if (!$this->Stav->contains($stav)) {
            $this->Stav[] = $stav;
            $stav->setPolozka($this);
        }

        return $this;
    }

    public function removeStav(Stav $stav): self
    {
        if ($this->Stav->contains($stav)) {
            $this->Stav->removeElement($stav);
            // set the owning side to null (unless already changed)
            if ($stav->getPolozka() === $this) {
                $stav->setPolozka(null);
            }
        }

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
