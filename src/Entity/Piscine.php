<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PiscineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PiscineRepository::class)
 */
#[ApiResource]
class Piscine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $surface;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBuilt;

    /**
     * @ORM\Column(type="float")
     */
    private $longueur;

    /**
     * @ORM\Column(type="float")
     */
    private $largeur;

    /**
     * @ORM\Column(type="float")
     */
    private $profondeur;

    /**
     * @ORM\Column(type="float")
     */
    private $volume;

    /**
     * @ORM\OneToOne(targetEntity=Realisation::class, mappedBy="piscine", cascade={"persist", "remove"})
     */
    private $realisation;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="piscine")
     */
    private $images;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->isBuilt = false;
        $this->dateCreation = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getIsBuilt(): ?bool
    {
        return $this->isBuilt;
    }

    public function setIsBuilt(bool $isBuilt): self
    {
        $this->isBuilt = $isBuilt;

        return $this;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): self
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getProfondeur(): ?float
    {
        return $this->profondeur;
    }

    public function setProfondeur(float $profondeur): self
    {
        $this->profondeur = $profondeur;

        return $this;
    }

    public function getVolume(): ?float
    {
        return $this->volume;
    }

    public function setVolume(float $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getRealisation(): ?Realisation
    {
        return $this->realisation;
    }

    public function setRealisation(Realisation $realisation): self
    {
        // set the owning side of the relation if necessary
        if ($realisation->getPiscine() !== $this) {
            $realisation->setPiscine($this);
        }

        $this->realisation = $realisation;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setPiscine($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getPiscine() === $this) {
                $image->setPiscine(null);
            }
        }

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
}
